<?php 
    require_once "admin/include/header2.php";
?>
<!DOCTYPE html>
<html lang="en">

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


        // database connection
        require_once "admin/include/connection.php";
        

        $session_email =  $_SESSION["email"];
    $sql = "SELECT * FROM users WHERE email= '$session_email' ";
    $result = mysqli_query($conn , $sql);

    if(mysqli_num_rows($result) > 0 ){
       
        while($rows = mysqli_fetch_assoc($result) ){
            $name = $rows["name"];
            $email = $rows["email"];
            $gender = $rows["gender"];
        }
    }

        $nameErr = $emailErr = "";
    

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){
 
            if( empty($_REQUEST["gender"]) ){
                $gender ="";
            }else {
                $gender = $_REQUEST["gender"];
            }

            if( empty($_REQUEST["name"]) ){
                $nameErr = "<p style='color:red'> * الأسم مطلوب</p>";
                $name = "";
            }else {
                $name = $_REQUEST["name"];
            }

            if( empty($_REQUEST["email"]) ){
                $emailErr = "<p style='color:red'> * الإيميل مطلوب</p> ";
                $email = "";
            }else{
                $email = $_REQUEST["email"];
            }


            if( !empty($name) && !empty($email) ){
            
                $sql_select_query = "SELECT email FROM users WHERE email = '$email' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 10 ){
                    $emailErr = "<p style='color:red'> * الإيميل مسجل بالفعل</p>";
                } else{

                    $sql = "UPDATE users SET name = '$name', email = '$email', gender= '$gender' WHERE email='$_SESSION[email]' ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        $_SESSION['email']= $email;
                        echo "<script>
                            $(document).ready( function(){
                                $('#showModal').modal('show');
                                $('#modalHead').hide();
                                $('#linkBtn').attr('href', 'profile.php');
                                $('#linkBtn').text('عرض الملف الشخصي');
                                $('#addMsg').text('!!تم تحديث معلومات الملف الشخصي');
                                $('#closeBtn').hide();
                            })
                        </script>
                        ";
                    }
                }

            }
        }
?>



<div style=""> 
<div class="login-form-bg h-100">
        <div class="container mt-5 h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5 shadow">                       
                                    <h4 class="text-center">تعديل ملفك الشخصي</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                            
                                <div class="form-group">
                                    <label >الأسم الكامل :</label>
                                    <input type="text" class="form-control" value="<?php echo $name; ?>"  name="name" >
                                   <?php echo $nameErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >الإيميل :</label>
                                    <input type="email" class="form-control" value="<?php echo $email; ?>"  name="email" >     
                                    <?php echo $emailErr; ?>
                                 </div>

                                <div class="form-group form-check form-check-inline">
                                    <label class="form-check-label" >الجنس :</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Male" ){ echo "checked"; } ?>  value="Male"  selected>
                                    <label class="form-check-label" >ذكر</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Female" ){ echo "checked"; } ?>  value="Female">
                                    <label class="form-check-label" >انثى</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Other" ){ echo "checked"; } ?>  value="Other">
                                    <label class="form-check-label" >اخر</label>
                                </div>


                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group">
                                   <input type="submit" value="حفظ التغيرات" class="btn btn-primary w-20 " name="save_changes" >        
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
