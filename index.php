<?php
    require_once 'app/controllers/HomeController.php';
    require_once 'autoload.php';
    $home = new HomeController;
    
    $pages = ['home', 'add', 'update', 'delete'];
    if(isset($_GET['page'])) {
        if(in_array($_GET['page'], $pages)) {
            $page = $_GET['page'];
            $home->index($page);
        } else {
            echo "This page does't exist";
        }
    } else {
        $home->index('home');
    }