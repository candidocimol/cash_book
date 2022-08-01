<?php
  if(isset($_POST['send_login'])){
    if(isset($_POST['email']) and isset($_POST['password'])){
      $resp=User::login($_POST['email'], MD5($_POST['password']));
      if($resp){
        if(!isset($resp['error'])){
          $_SESSION['user']=$resp['user']; 
          $msg['msg']="Login successfully done!";
          $msg['class']="success";
          $_SESSION['msgs'][]=$msg;
        }else{
          $msg['msg']="Error: ".$resp['error'];
          $msg['class']="danger";
          $_SESSION['msgs'][]=$msg;
        }
      }
    }else{
      $msg['msg']="Error: Invalid login attempt";
      $msg['class']="danger";
      $_SESSION['msgs'][]=$msg;
    }
    header("Location:".URL_BASE);
  }else{
    
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<section class="vh-100">
<div id='msg' style="width:100vw;height:3vh;">
  <?php
    if(isset($_SESSION['msgs'])){
        foreach($_SESSION['msgs'] AS $msg){
            echo "<div class='alert alert-{$msg['class']}' role='alert'>";
            echo $msg['msg'];
             echo "</div>";
        }
        unset($_SESSION['msgs']);
    }
  ?>  
</div>
<script>
    setTimeout(()=>{document.querySelector('#msg').innerHTML=''},3000)
</script>

  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="<?php echo URL_BASE?>" method="POST">
          
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="email" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            <label class="form-label">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="password" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label">Password</label>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="submit" name="send_login"class="btn btn-primary btn-lg" value="Login"
              style="padding-left: 2.5rem; padding-right: 2.5rem;"/>
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section>
<?php
  }