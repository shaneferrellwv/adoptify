<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="home.php">
        <img src="media/logo.png" class="img-fluid" width="80" height="80">Adoptify</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
                <a class="navbar-brand" href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="browse.php">Browse Pets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="shelter.php">Shelter Profile</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="login.php">Log In</a>
                    <a class="dropdown-item" href="logout.php">Log Out</a>
                    <a class="dropdown-item" href="signup.php">Sign Up</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- Welcome, <?php echo $_SESSION['user']['username'];
            echo $_SESSION['user']['id']; ?> -->
</header>