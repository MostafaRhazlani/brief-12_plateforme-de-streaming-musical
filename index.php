<?php
    require_once 'views/layout/header.php';
    require_once 'app/controllers/HomeController.php';
    require_once 'autoload.php';
    $home = new HomeController;
    
    $pagesAdmin = ['auth/login', 'auth/register', 'admin/category'];
    $pagesArtist = ['albums', 'auth/login', 'auth/register', 'artist/songs', 'artist/dashboard'];
    $pagesUser = ['home', 'albums', 'auth/login', 'auth/register', 'artist/songs', 'artist/dashboard'];

    if(isset($_GET['page'])) {
        if(isset($_SESSION['user'])) {
            if($_SESSION['user']['role'] == 'Admin') {
                if(in_array($_GET['page'], $pagesAdmin)) {
                    $page = $_GET['page'];
                    if($page !== 'auth/login' && $page !== 'auth/register') {
                        require_once 'views/layout/sidebar.php';
                    }
                    $home->index($page);
                } else {
                    include 'views/include/error404.php';
                }
            } else if($_SESSION['user']['role'] == 'Artist') {
                if(in_array($_GET['page'], $pagesArtist)) {
                    $page = $_GET['page'];
                    if($page !== 'auth/login' && $page !== 'auth/register') {
                        require_once 'views/layout/sidebar.php';
                    }
                    $home->index($page);
                } else {
                    include 'views/include/error404.php';
                }
            } else if($_SESSION['user']['role'] == 'User') {
                if(in_array($_GET['page'], $pagesUser)) {
                    $page = $_GET['page'];
                    if($page !== 'auth/login' && $page !== 'auth/register') {
                        require_once 'views/layout/sidebar.php';
                    }
                    $home->index($page);
                } else {
                    include 'views/include/error404.php';
                }
            } else {
                $home->index('auth/login');
            }
        } else {
            $home->index('auth/login');
        }
    } else {
        $home->index('home');
    }

    require_once 'views/layout/footer.php';