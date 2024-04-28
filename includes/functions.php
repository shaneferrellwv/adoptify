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
function selectAllPets(){
    global $mysqli;
    $data = array();
    $stmt = $mysqli->prepare('SELECT * FROM pets');
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
    $stmt = $mysqli->prepare('SELECT * FROM pets WHERE shelterid = ?');
    $stmt->bind_param('i', $shelterid);
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
