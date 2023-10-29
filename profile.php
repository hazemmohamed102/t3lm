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

    $sql_command = "SELECT * FROM users WHERE email = '$_SESSION[email]' ";
    $result = mysqli_query($conn , $sql_command);

    if (mysqli_num_rows($result) > 0) {
        while ($rows = mysqli_fetch_assoc($result)) {
            $name = ucwords($rows["name"]);
            $gender = ucwords($rows["gender"]);
            $dp = $rows["dp"];
        }

        if (empty($gender)) {
            $gender = "Not Defined";
        }
    }
 ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6">
            <div class="card shadow">
                <img src="admin/upload/dp/<?php echo (!empty($dp)) ? $dp : "1.jpg"; ?>" class="rounded img-fluid card-img-top" style="height: 300px;" alt="...">
                <div class="card-body">
                    <h2 class="text-center mb-4"><?php echo $name; ?></h2>
                    <p class="card-text">ألإيميل: <?php echo $_SESSION["email"] ?></p>
                    <p class="card-text">الجنس: <?php echo $gender ?></p>
                    <p class="text-center">
                        <a href="edit-profile.php" class="btn btn-outline-primary">تعديل الملف الشخصي</a>
                        <a href="change-pass.php" class="btn btn-outline-primary">تغيير كلمة المرور</a>
                        <a href="change-dp.php" class="mt-2 btn btn-outline-primary">تغيير صورة الملف الشخصي</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    
</style>
<!-- Scripts -->
<script src="admin/resorce/plugins/common/common.min.js"></script>
<script src="admin/resorce/js/custom.min.js"></script>
<script src="admin/resorce/js/settings.js"></script>
<script src="admin/resorce/js/gleek.js"></script>
<script src="admin/resorce/js/styleSwitcher.js"></script>

<?php 
    require_once "admin/include/footer2.php";
?>
