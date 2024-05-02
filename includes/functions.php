<?php
require_once('db.php');
session_start();

/* format arrays */
function formatcode($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

/* ========================= PET ACTIONS ======================= */

/* select all */
function selectAllPets($search = null){
    global $mysqli;
    $data = array();
    $sql = 'SELECT * FROM pets WHERE status = "available"';
    if ($search) {
        $sql .= ' AND name LIKE ?';
    }
    $stmt = $mysqli->prepare($sql);
    if ($search) {
        $search = "%$search%";
        $stmt->bind_param('s', $search);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0):
        echo 'There are currently no records in the database';
    else:
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
    endif;
    $stmt->close();
    return $data;
}

/* select single */
function selectPet($id = NULL) {
    global $mysqli;
    $stmt = $mysqli->prepare('SELECT * FROM pets WHERE petid = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row;
}

/* select pets by shelter */
function selectMyPets($shelterid = NULL){
    global $mysqli;
    $data = array();
    $status = 'available';
    $stmt = $mysqli->prepare('SELECT * FROM pets WHERE shelterid = ? AND status = ?');
    $stmt->bind_param('is', $shelterid, $status);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0):
        echo 'There are currently no pets in the table with your Shelter ID';
    else:
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
    endif;
    $stmt->close();
    return $data;
}

/* select pets by shelter */
function selectMyAdoptedPets($shelterid = NULL){
    global $mysqli;
    $data = array();
    $status = 'adopted';
    $stmt = $mysqli->prepare('SELECT * FROM pets WHERE shelterid = ? AND status = ?');
    $stmt->bind_param('is', $shelterid, $status);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0):
        echo 'There are currently no pets in the table with your Shelter ID';
    else:
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
    endif;
    $stmt->close();
    return $data;
}

/* insert */
function insertPet($name = NULL, $age = NULL, $species = NULL, $breed = NULL, $description = NULL, $image_url = NULL, $shelterid = NULL){
    global $mysqli;
    $stmt = $mysqli->prepare('INSERT INTO pets (shelterid, name, age, species, breed, description, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('isissss', $shelterid, $name, $age, $species, $breed, $description, $image_url);
    if ($stmt->execute()) {
        echo 'Successfully added a new pet';
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

/* update (edit) pet */
function updatePet($name = NULL, $age = NULL, $species = NULL, $breed = NULL, $description = NULL, $petid = NULL){
    global $mysqli;
    $stmt = $mysqli->prepare('UPDATE pets SET name = ?, age = ?, species = ?, breed = ?, description = ? WHERE petid = ?');
    $stmt->bind_param('sisssi', $name, $age, $species, $breed, $description, $petid);
    $stmt->execute();
    if($stmt->affected_rows === 0):
        echo 'You did not make any changes';
    else:
        echo 'Successfully updated the selected pet';
    endif;
    $stmt->close();
}

/* delete pet */
function deletePet($petid){
    global $mysqli;
    $stmt = $mysqli->prepare('DELETE FROM pets WHERE petid =?');
    $stmt->bind_param('i', $petid);
    $stmt->execute();
    $stmt->close();
    echo 'Successfully deleted the pet';
    exit();
}

function getPetCarousel() {
    global $mysqli;
    $data = array();
    $stmt = $mysqli->prepare('SELECT name, description, image_url FROM pets');
    $stmt->execute();
    $result = $stmt->get_result();
    $pets = [];
    while ($row = $result->fetch_assoc()) {
        $pets[] = [
            'image_url' => $row['image_url'],
            'name' => $row['name'],
            'description' => $row['description']
        ];
    }
    return $pets;
}

/* ====================== APPLICATIONS ==================== */

/* insert */
function insertApplication($name = NULL, $numPets = NULL, $phone = NULL, $email = NULL, $address = NULL, $visit = NULL, $info = NULL, $petid = NULL, $userid = NULL, $shelterid = NULL){
    global $mysqli;
    $status = 'pending';
    $stmt = $mysqli->prepare('INSERT INTO applications (petid, adopterid, status, phone, email, address, info, name, number_of_pets, visit, shelterid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('iissssssisi', $petid, $userid, $status, $phone, $email, $address, $info, $name, $numPets, $visit, $shelterid);
    if ($stmt->execute()) {
        echo 'Successfully submitted application';
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

/* select single application */
function selectApplication($id = NULL) {
    global $mysqli;
    $stmt = $mysqli->prepare('SELECT * FROM applications WHERE applicationid = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row;
}

/* select applications by adopter */
function selectSubmittedApplications($userid = NULL){
    global $mysqli;
    $data = array();
    $stmt = $mysqli->prepare('SELECT * FROM applications WHERE adopterid = ?');
    $stmt->bind_param('i', $userid);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0):
        echo 'You have no submitted applications';
    else:
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
    endif;
    $stmt->close();
    return $data;
}

/* select applications by shelter */
function selectMyApplications($userid = NULL){
    global $mysqli;
    $data = array();
    $stmt = $mysqli->prepare('SELECT * FROM applications WHERE shelterid = ?');
    $stmt->bind_param('i', $userid);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0):
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
    endif;
    $stmt->close();
    return $data;
}

/* update application */

/* approve */
function approveApplication($id, $feedback = NULL) {
    global $mysqli;
    $status = 'approved';
    $stmt = $mysqli->prepare('UPDATE applications SET status = ?, feedback = ? WHERE applicationid = ?');
    $stmt->bind_param('ssi', $status, $feedback, $id);
    if ($stmt->execute()) {
        echo 'Successfully approved application';
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();

    // get petid
    $stmt = $mysqli->prepare('SELECT petid FROM applications WHERE applicationid = ?');
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $petid = $row['petid'];
        }
    }
    $stmt->close();

    // set pet as adopted
    $status = 'adopted';
    $stmt = $mysqli->prepare('UPDATE pets SET status = ? WHERE petid = ?');
    $stmt->bind_param('si', $status, $petid);
    $stmt->execute();
    $stmt->close();
}

/* reject */
function rejectApplication($id, $feedback = NULL) {
    global $mysqli;
    $status = 'rejected';
    $stmt = $mysqli->prepare('UPDATE applications SET status = ?, feedback = ? WHERE applicationid = ?');
    $stmt->bind_param('ssi', $status, $feedback, $id);
    if ($stmt->execute()) {
        echo 'Successfully rejected application';
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();

    // get petid
    $stmt = $mysqli->prepare('SELECT petid FROM applications WHERE applicationid = ?');
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $petid = $row['petid'];
        }
    }
    $stmt->close();

    // set pet as available
    $status = 'available';
    $stmt = $mysqli->prepare('UPDATE pets SET status = ? WHERE petid = ?');
    $stmt->bind_param('si', $status, $petid);
    $stmt->execute();
    $stmt->close();
}

/* ====================== USER AUTHENTICATION ==================== */

/* create user */
function createUser($username = NULL, $password = NULL, $usertype = NULL) {
    global $mysqli;
    $stmt = $mysqli->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows !== 0):
        echo 'The username you chose is taken. Please try again.';
    else:
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $mysqli->prepare('INSERT INTO users (username, password, usertype) VALUES (?, ?, ?)');
        $stmt->bind_param('sss', $username, $password, $usertype);
        if ($stmt->execute()) :
            echo 'Successfully added a new user';
        else:
            echo  "Error: " . $stmt->error;
        endif;
        $stmt->close();
    endif;
}

/* log in */
function logInUser($username = NULL, $password = NULL) {
    global $mysqli;
    $stmt = $mysqli->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        $hash = $row['password'];
        if(password_verify($password, $hash)):
            $_SESSION['user']['id'] = $row['userid'];
            $_SESSION['user']['username'] = $row['username'];
            $_SESSION['user']['usertype'] = $row['usertype'];
            return true;
        else:
            echo 'Your username or password is incorrect. Please try again.';
            return false;
        endif;
    }
    $stmt->close();
}

/* log out */
function logOut() {
    unset($_SESSION['user']);
    echo 'You have been successfully logged out.';
}

?>
