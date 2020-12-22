<?php $page_location = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'))[0]; ?>
<header>
    <section class="navbar-fixed">
        <nav>
            <div class="nav-wrapper container transparent">
                <a href="/" class="brand-logo"><span class="green-text text-darken-2">P</span><span class="green-text">S</span><span class="green-text text-lighten-2">X</span> - J</a>
                <a href="#" data-target="side-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li class="truncate"><a href="#" class="dropdown-trigger" data-target="nav-user-dropdown"><?php echo $_SESSION['full-name']; ?></a></li>
                </ul>
            </div>
        </nav>
    </section>

    <ul id="side-nav" class="sidenav sidenav-fixed white-text">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="./assets/images/default/user-banner.jpg">
                </div>
                <a href="account.php"><img class="circle" src="./assets/images/default/profile-picture.jpg"></a>
                <a href="account.php"><span class="white-text name"><?php echo $_SESSION['full-name']; ?></span></a>
                <a href="#email"><span class="white-text email"><?php echo $_SESSION['email']; ?></span></a>
            </div>
        </li>
        <li><a href="./dashboard.php" class="white-text <?php echo $page_location == 'dashboard.php' ? 'active-tab' : ''; ?>"><i class="material-icons white-text">dashboard</i> Dashboard</a></li>
        <li><a href="./account.php" class="white-text <?php echo $page_location == 'account.php' ? 'active-tab' : ''; ?>"><i class="material-icons white-text">person</i> Account</a></li>
        <li><a href="#" class="white-text logout-btn"><i class="material-icons white-text">login</i> Logout</a></li>
    </ul>

    <ul class="dropdown-content" id="nav-user-dropdown">
        <li><a href="account.php">Account</a></li>
        <li><a href="#!" class="logout-btn">Logout</a></li>
    </ul>
</header>