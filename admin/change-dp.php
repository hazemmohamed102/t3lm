<?php 
require_once "include/header.php";
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>

<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
     
            $filename = $_FILES["dp"]['name'];
            $temp_loc = $_FILES["dp"]["tmp_name"];

            $temp_ex = explode("." , $filename);
            $extension = strtolower( end($temp_ex) );
            $allowed_types = array("png","jpg","jpeg");

        if( in_array($extension , $allowed_types)  ){
            $new_file_name = uniqid("",true).".".$extension;
            $location = "upload/dp/".$new_file_name;
            if(move_uploaded_file($temp_loc, $location)){
                
                // database connection 
                require_once "include/connection.php";
                $sql = " UPDATE admin SET dp = '$new_file_name' WHERE email = '$_SESSION[email]' ";
                $result = mysqli_query($conn , $sql);
                if($result){
                    echo "<script>
                    $(document).ready( function(){
                        $('#showModal').modal('show');
                        $('#addMsg').text('!!تم تحديث صورة الملف الشخصي بنجاح');
                        $('#linkBtn').attr('href', 'profile.php');
                        $('#linkBtn').text('فتح الملف الشخصي');
                        $('#closeBtn').text('تحميل صورة اخرى');
                    })
                </script>
                ";
                }
                
            }
        } else{ echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#addMsg').text('فقط JPG, PNG و JPEG ملفات يسمع بتحميلها!!');
                $('#linkBtn').attr('href', 'profile.php');
                $('#linkBtn').hide();
                $('#closeBtn').text('حسنا !!');
            })
        </script>
        ";
         
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
                                    <h4 class="text-center">تغيير صورة الملف الشخصي</h4>
                                    <form method="POST" enctype="multipart/form-data" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                        <div class="form-group">
                                            <label >اختر الصورة : </label>
                                            <input type="file" name="dp" class="form-control">
                                           
                                        </div>
                                
                
                                        <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                            <div class="btn-group">
                                        <input type="submit" value="حفظ التغييرات" class="btn btn-primary w-20 " name="save_changes" >        
                                            </div>
                                            <div class="input-group">
                                                <a href="profile.php" class="btn btn-primary w-20">اغلاق</a>
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


<?php
require_once "include/footer.php";
?>