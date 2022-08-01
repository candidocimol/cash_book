<?php
require_once DIR_BASE."template/header.php";
require_once DIR_BASE."template/msg.php";

if(isset($action)){
    if($action=="add"){
        require_once DIR_BASE."pages/moviment/formMoviment.php";
    }else if($action=="save"){
        if(isset($_POST["save_moviment"])){
            $moviment=new Moviment();
            $data['date']=$_POST['date'];
            $data['description']=$_POST['description'];
            $data['value']=$_POST['value'];
            $data['type']=$_POST['type'];
            $data['user_id']=$_SESSION['user']['id'];
            $res=$moviment::save($data);
            if($res['result']){
                $m['msg']="Success!";
                $m['class']="success";
            }else{
                $m['msg']="Failed!";
                $m['class']="danger";
            }
            
        }else{
            $m['msg']="Failed!";
            $m['class']="danger";
        }
        $_SESSION['msgs'][]=$m;

        header("Location:".DIR_BASE."?page=moviments");
    }else{
        require_once DIR_BASE."pages/error_404.php";
    }
}else{
    require_once DIR_BASE."pages/moviment/cash_book.php";
}
