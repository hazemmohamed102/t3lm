<?php 
    require_once "admin/include/header2.php";
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>t3lm</title>
    <link rel="shortcut icon" href="../assets/image/ta.png" type="image/x-icon"/>

    <link href="admin/resorce/css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>

    <style> 
        .hidden {
            display: none;
        }
    </style>
</head>

<?php 
      $old_passErr = $new_passErr = $confirm_passErr = "";
     $old_pass = $new_pass = $confirm_pass = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_REQUEST["old_pass"])){
            $old_passErr = " <p style='color:red'>* كلمة المرور القديمة مطلوبة </p>";
        }else{
            $old_pass = trim($_REQUEST["old_pass"]);
        }
        
        if(empty($_REQUEST["new_pass"])){
            $new_passErr = " <p style='color:red'>* كلمة المرور الجديدة مطلوبة </p>";
        }else{
            $new_pass = trim($_REQUEST["new_pass"]);
        }

        if(empty($_REQUEST["confirm_pass"])){
            $confirm_passErr = " <p style='color:red'>* !رجاء تأكيد كلمة المرور الجديدة </p>";
        }else{
            $confirm_pass = trim($_REQUEST["confirm_pass"]);
        }

        if(!empty($old_pass) && !empty($new_pass) && !empty($confirm_pass) ){

            require_once "admin/include/connection.php";

            $check_old_pass = "SELECT password FROM users WHERE email = '$_SESSION[email]' && password = '$old_pass' ";
            $result = mysqli_query($conn , $check_old_pass);
            if( mysqli_num_rows($result) > 0 ){
               
                if( $new_pass === $confirm_pass ){
                  
                    $change_pass_query = "UPDATE users SET password = '$new_pass' WHERE email = '$_SESSION[email]' ";
                    if (mysqli_query($conn , $change_pass_query) ){
                        session_unset();
                        session_destroy();
                        echo "<script>
                        $(document).ready(function() {
                            $('#addMsg').text( 'تم تحديث كلمة المرور بنجاح! سجل الأن بكلمة المرور الجديدة');
                            $('#linkBtn').attr('href','login.php');
                            $('#linkBtn').text('حسنا');
                            $('#modalHead').hide();
                            $('#closeBtn').hide();
                            $('#showModal').modal('show');
                        });
                        </script>";
                    }
                    
                }else{
                    $confirm_passErr = "<p style='color:red'>* تأكد هذه ليست كلمة المرور الجديدة! </p>";
                }

            }else{
               $old_passErr = " <p style='color:red'>*نأسف! كلمة المرور القديمة خاطئة </p> ";
            }
        }
    }
?>


<div style="margin-top:100px"> 
<div class="login-form-bg h-100">
        <div class="container mt-5 h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5 shadow">                       
                                    <h4 class="text-center">تغيير كلمة المرور</h4>
                                    <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                        <div class="form-group">
                                            <label >كلمة المرور القديمة : </label>
                                            <input type="password" name="old_pass" class="form-control">
                                            <?php echo $old_passErr; ?>
                                        </div>
                                        <div class="form-group">
                                            <label >كلمة المرور الجديدة : </label>
                                            <input type="password" name="new_pass" class="form-control">
                                            <?php echo $new_passErr; ?>

                                        </div>
                                        <div class="form-group">
                                            <label >تأكيد كلمة المرورd : </label>
                                            <input type="password" name="confirm_pass" class="form-control">
                                            <?php echo $confirm_passErr; ?>

                                        </div>
                
                                        <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group">
                                        <input type="submit" value="حفظ التغييرات" class="btn btn-primary w-20 " name="save_changes" >        
                                            </div>
                                            <div class="input-group">
                                                <a href="profile.php" class="btn btn-primary w-20">إغلاق</a>
                                            </div>
                                        </div>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!--**********************************
        Scripts
    ***********************************-->
    <script src="admin/resorce/plugins/common/common.min.js"></script>
    <script src="admin/resorce/js/custom.min.js"></script>
    <script src="admin/resorce/js/settings.js"></script>
    <script src="admin/resorce/js/gleek.js"></script>
    <script src="admin/resorce/js/styleSwitcher.js"></script>

<?php 
require_once "admin/include/footer2.php";
?>
