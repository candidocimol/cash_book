<?php
session_start();
require_once "config.php";

spl_autoload_register(function ($class_name) {
    
    include "./class/".$class_name . '.php';
});

if(isset($_GET['path'])){
    $path=explode("/",$_GET['path']);
    $page=$path[0];
    if(count($path)>1){
        $action=$path[1];
    }
    if(count($path)>2){
        unset($path[0]);
        unset($path[1]);
        $params=array_values($path);
    }
}

/*
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
if(isset($_GET['action'])){
    $action=$_GET['action'];
}
if(isset($_GET['params'])){
    $params=explode("/",$_GET['params']);
}
*/  
if(!isset($_SESSION['user'])){
    require_once DIR_BASE."pages/user/login.php";
}else{
    if(isset($page)){
        if($page=="users"){
            include "./pages/user/index.php";
        } else if($page=="moviments"){
            include "./pages/moviment/index.php";
        }else if($page=="reports"){
            include "./pages/em_construcao.php";
        }else{
            include "./pages/error_404.php";
        }

    }else{
        include "./pages/home.php";
    }
    require_once DIR_BASE."template/footer.php";
}
