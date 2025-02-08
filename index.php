<?php
    require_once 'views/layout/header.php';
    require_once 'app/controllers/HomeController.php';
    require_once 'autoload.php';
    $home = new HomeController;
    
    $pages = ['home', 'add', 'update', 'delete', 'auth/login', 'auth/register', 'artist/songs', 'artist/dashboard'];

    if(isset($_GET['page'])) {
        if(in_array($_GET['page'], $pages)) {
            $page = $_GET['page'];
            if($page !== 'auth/login' && $page !== 'auth/register') {
                require_once 'views/layout/sidebar.php';
            }
            $home->index($page);
        } else {
            include 'views/include/error404.php';
        }
    } else {
        $home->index('home');
    }

    require_once 'views/layout/footer.php';