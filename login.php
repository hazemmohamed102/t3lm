<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">

    <title>t3lm</title>
    <style>
    body, html {
    height: 100%;
    margin: 0;
    padding: 50px 0;
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
          require_once "admin/include/connection.php";

          $sql_query = "SELECT * FROM users WHERE email='$email' && password = '$pass'  ";
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

 <?php

$name_err = $email_err = $pass_err = "";
$name = $email = $pass = "";
$login_Err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_REQUEST["name"])) {
        $name_err = "<p style='color:red'> * يجب إدخال الاسم</p>";
    } else {
        $name = $_REQUEST["name"];
    }

    if (empty($_REQUEST["email"])) {
        $email_err = "<p style='color:red'> * يجب إدخال البريد الإلكتروني</p>";
    } else {
        $email = $_REQUEST["email"];
    }

    if (empty($_REQUEST["gender"])) {
    $gender_err = "<p style='color:red'> * يجب إدخال الجنس</p>";
} else {
    $gender = $_REQUEST["gender"];
}
    
    if (empty($_REQUEST["password"])) {
        $pass_err = "<p style='color:red'> * يجب إدخال كلمة المرور</p>";
    } else {
        $pass = $_REQUEST["password"];
    }

    if (!empty($name) && !empty($email) && !empty($pass)) {
        // database connection
        require_once "admin/include/connection.php";

        // Check if email already exists
        $sql_check_email = "SELECT * FROM users WHERE email='$email'";
        $result_check_email = mysqli_query($conn, $sql_check_email);

        if (mysqli_num_rows($result_check_email) > 0) {
            $email_err = "<p style='color:red'> * هذا البريد الإلكتروني مستخدم بالفعل</p>";
        } else {
            // Add code to upload and handle profile picture

            $sql_query = "INSERT INTO users (name, email, password, gender) VALUES ('$name', '$email', '$pass', '$gender')";

            

            if ($conn->query($sql_query) === TRUE) {
                echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                            successModal.show();
                        });
                      </script>";
            } else {
                echo "حدث خطأ: " . $conn->error;
            }

        }

        $conn->close();
    }
}

?>



 



<!-- Sing in  Form -->
<div class="container" id="container">
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تم تسجيل الحساب بنجاح</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>شكراً لتسجيلك، تم إنشاء الحساب بنجاح.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">موافق</button>
            </div>
        </div>
    </div>
</div>

<div class="form-container register-container">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    <h1>حساب جديد</h1>
    <input type="text"value="<?php echo $name; ?>" name="name" id="name" placeholder="الأسم"/>
    <?php echo $name_err; ?>
    <input type="email" name="email"value="<?php echo $email; ?>" id="email" placeholder="البريد الإلكتروني"/>
    <?php echo $email_err; ?>
    <input type="password" name="password" id="pass" placeholder="كلمة السر"/>
    <?php echo $pass_err; ?>
    <div class="content">
           <div class="checkbox">
            
<label for="gender">الجنس:</label>
<select name="gender" id="gender">
    <option value="">اختر</option>
    <option value="male">ذكر</option>
    <option value="female">انثى</option>
</select>
<span id="gender_err" style="color:red;"></span>           </div>
           <div class="pass-link">
           <a href="index.php">المتابعة بدون حساب</a>
           </div>
         </div>
    <button type="submit" name="register" id="signup" class="form-submit" value="التسجيل">التسجيل 
  </form>
</div>

<div class="form-container login-container">
  <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
         <h1>الدخول</h1>
         <input type="email" placeholder="البريد الألكتروني" value="<?php echo $email; ?>" name="email"> 
                         <?php echo $email_err; ?>            
                         <input type="password" placeholder="كلمة السر"  name="password" >
                         <?php echo $pass_err; ?>            
         <div class="content">
           <div class="checkbox">
             <input type="checkbox" name="checkbox" id="checkbox">
             <label>تذكرني</label>
           </div>
           <div class="pass-link">
           <a href="index.php">المتابعة بدون حساب</a>
           </div>
         </div>
                     <button type="submit" value="تسجيل الدخول" id="signin" class="form-submit" name="signin" >تسجيل الدخول
       </form>
     </div>
 

<div class="overlay-container">
  <div class="overlay">
    <div class="overlay-panel overlay-left">
      <h1 class="title"> اهلا بك <br> سجل الدخول الأن</h1>
      <p>اذا كان عندك حساب يمكنك تسجيل الدخول</p>
      <button class="ghost" id="login">تسجيل الدخول
        <i class="lni lni-arrow-left login"></i>
      </button>
    </div>
    <div class="overlay-panel overlay-right">
    <h1 class="title" > اهلا بك<br> سجل حساب جديد</h1>
    <p>اذا كنت لا تملك حساب, سجل هنا و استمتع</p>
      <button class="ghost" id="register">التسجيل
        <i class="lni lni-arrow-right register"></i>
      </button>
    </div>
  </div>
</div>

</div>




</div>
<!-- Sign up form -->
                <div id="message-container">
    <?php echo $login_Err; ?>
    </div>



     <!-- JS -->
    <script src="script.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="admin/resorce/plugins/common/common.min.js"></script>
    <script src="admin/resorce/js/custom.min.js"></script>
    <script src="admin/resorce/js/settings.js"></script>
    <script src="admin/resorce/js/gleek.js"></script>
    <script src="admin/resorce/js/styleSwitcher.js"></script>
  </body>
</html>