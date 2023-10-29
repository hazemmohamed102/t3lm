<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="../assets/image/ta.png" type="image/x-icon"/>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">


    <title>T3LM</title>
    <style>
    body, html {
    height: 100%;
    margin: 0;
    }

.bg {
  background-image: url("../background.jpg");
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  
}

</style>
  </head>
  <body >

  <!-- php script start -->
  <?php 

      $email_err = $pass_err = $login_Err = "";
      $email = $pass = "";

      if( $_SERVER["REQUEST_METHOD"] == "POST" ){
         
        if( empty($_REQUEST["email"]) ){
         $email_err = " <p style='color:red'> * لا يمكنك التسجيل بدون حساب</p> ";
        }else {
         $email = $_REQUEST["email"];
        }

        if ( empty($_REQUEST["password"]) ){
         $pass_err =  " <p style='color:red'> *كلمة المرور مطلوبة</p> ";
        }else {
          $pass = $_REQUEST["password"];
        }

        if( !empty($email) && !empty($pass) ){

          // database connection
          require_once "include/connection.php";

          $sql_query = "SELECT * FROM admin WHERE email='$email' && password = '$pass'  ";
          $result = mysqli_query($conn , $sql_query);

          if ( mysqli_num_rows($result) > 0 ){
           while( $rows = mysqli_fetch_assoc($result) ){
            session_start();
            $_SESSION["email"] = $rows["email"];
            header("Location: index.php?login-sucess");
           }
          }else{
            $login_Err = "<div class='alert alert-warning alert-dismissible fade show'>
            <strong>خطأ في الإيميل او كلمة المرور</strong>
            <button type='button' class='close' data-dismiss='alert' >
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
          }
      
        }

      }

  ?>
 <!-- php script end -->
 <div class="container" id="container">

<div class="form-container login-container">
<form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
         <h1>Login hire.</h1>
         <div class="text-center my-5"> <?php echo $login_Err; ?> </div>

         <input type="email" class="form-control" value="<?php echo $email; ?>" name="email" placeholder="البريد الإلكتروني"> 
         <?php echo $email_err; ?>            
         <input type="password" class="form-control" name="password" placeholder="كلمة السر" >
         <?php echo $pass_err; ?>            
         <div class="content">
           <div class="checkbox">
             <input type="checkbox" name="checkbox" id="checkbox">
             <label>Remember me</label>
           </div>
           <div class="pass-link">
             <a href="#">Forgot password?</a>
           </div>
         </div>
         <button type="submit" value="تسجيل الدخول" class="btn btn-primary btn-lg w-100 " name="signin" >تسجيل الدخول
       </form>
     </div>
 

<div class="overlay-container">
  <div class="overlay">
    <div class="overlay-panel overlay-left">
      <h1 class="title">Hello <br> friends</h1>
      <p>if Yout have an account, login here and have fun</p>
      <button class="ghost" id="login">Login
        <i class="lni lni-arrow-left login"></i>
      </button>
    </div>
    <div class="overlay-panel overlay-right">
      <h1 class="title">Start yout <br> journy now</h1>
      <p>if you don't have an account yet, join us and start your journey.</p>
      <button class="ghost" id="register">Register
        <i class="lni lni-arrow-right register"></i>
      </button>
    </div>
  </div>
</div>

</div>


  <script src="script.js"></script>
  </body>
</html>