<?php $page_location = explode('/',trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'))[0]; ?>
<header>
    <section class="navbar-fixed">
        <nav class="transparent">
            <div class="nav-wrapper container transparent">
                <a href="/" class="brand-logo"><span class="green-text text-darken-2">P</span><span class="green-text">S</span><span class="green-text text-lighten-2">X</span> - J</a>
                <a href="#" data-target="side-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="/">User</a></li>
                </ul>
            </div>
        </nav>
    </section>

    <ul id="side-nav" class="sidenav sidenav-fixed">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="images/office.jpg">
                </div>
                <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
                <a href="#name"><span class="white-text name">John Doe</span></a>
                <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
            </div>
        </li>
        <li><a href="./dashboard.php" class="white-text <?php echo $page_location == 'dashboard.php' ? 'active-tab' : ''; ?>">Dashboard</a></li>
        </ul>
</header>