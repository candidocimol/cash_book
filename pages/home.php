<?php
    require_once DIR_BASE."template/header.php";

    require_once DIR_BASE."template/msg.php";
    ?>
    <main>
    <?php
    if(!isset($_SESSION['user'])){
        echo "<a href='".URL_BASE."?page=user&action=login' >Login</a>";
    }else{
        echo "<a href='".URL_BASE."?page=cash_book' >Cash Book</a>";
        echo "<a href='".URL_BASE."?page=user&action=logout' >Logout</a>";
    }
  ?>
  </main>
  

