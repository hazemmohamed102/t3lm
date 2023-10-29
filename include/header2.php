<?php 
        // header("Location: http://t3lm.rf.gd/?i=1?اقرأ ملف مهم جدا في مجلد الأبوت ");
?>

<?php 
    session_start();
    if( empty($_SESSION["email"]) ){
        header("Location: login.php?login-first");
    }

?>

<!DOCTYPE html>
<html>
<head>
<title>تعلم</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="shortcut icon" href="assets/image/ta.png" type="image/x-icon"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/fontawesome.min.css" integrity="sha512-W5OxdLWuf3G9SMWFKJLHLct/Ljy7CmSxaABQLV2WIfAQPQZyLSDW/bKrw71Nx7mZKN5zcL+r8pRCZw+5bIoHHw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>



<?php  
    


    // databaseconnection
    require_once "admin/include/connection.php";

    $sql_command = "SELECT * FROM users WHERE email = '$_SESSION[email]' ";
    $result = mysqli_query($conn , $sql_command);

    if( mysqli_num_rows($result) > 0){
       while( $rows = mysqli_fetch_assoc($result) ){
           $name = ucwords($rows["name"]);
           $gender = ucwords($rows["gender"]);
            $dp = $rows["dp"];
       }

       if( empty($gender)){
           $gender = "Not Defined";
       }

}
 ?>
<div class="floating-message" id="floatingMessage">
    <span class="close-btn" onclick="closeMessage()">×</span>
    <div class="message-content">
        <p>أهلاً بك مرة أخرى، <?php echo $name; ?></p>
    </div>
</div>


<style>
  .floating-message {
    position: fixed;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    background-color: #4caf50;
    color: #ffffff;
    padding: 10px 20px;
    text-align: center;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    display: none;
    transition: opacity 0.5s ease;
    z-index: 99999;
}

.close-btn {
    position: absolute;
    top: 5px;
    right: 10px;
    cursor: pointer;
    font-size: 20px;
}

.message-content p {
    margin: 0;
    font-size: 16px;
    line-height: 1.5;
}

.show-message {
    display: block;
    animation: fadeIn 0.5s ease 0s 1 normal forwards;
    animation-delay: 0s;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

</style>

    <script>
function toggleMenu() {
    var menu = document.getElementById("profileMenu");
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
}

document.addEventListener("click", function(event) {
    var menu = document.getElementById("profileMenu");
    if (event.target.closest(".profile-icon") === null) {
        menu.style.display = "none";
    }
});



// في مكان مناسب في الصفحة
setTimeout(function(){
    document.getElementById('floatingMessage').classList.add('show-message');
}, 1000);

function closeMessage() {
    document.getElementById('floatingMessage').style.display = 'none';
}
    </script>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader" >
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
    <!--*******************
        Preloader end
    ********************-->
    <div class="sbuttons">	
  <a id="toggleDarkMode" target="_blank" class="sbutton switch" tooltip="switch mode"><i class="fa fa-moon-o">
    <div class="status-message"></div></i></a>  
	  
  <a href="about-us.php" target="_blank" class="sbutton twitt" tooltip="About Us"><i class="fa fa-info-circle" aria-hidden="true"></i></a>

  <a href="contact-us.php" target="_blank" class="sbutton phone" tooltip="contact us"><i class="fa fa-phone" aria-hidden="true"></i></a>


  <a target="_blank" class="sbutton mainsbutton" tooltip="Share"><i class="fa fa-cog" aria-hidden="true"></i></a>  
</div>



  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
 <header id="header"> 

 <div class="header_top1">
  <div class="logo">

      <i class="fa fa-clock-o"></i>
    <div  id="clock"></div>

</div>
<div class="logo">
  <a href="index.php"><img src="assets/image/logo2.png" alt="لوجو الموقع"></a>
</div>



  <div class="date">
    <i class="fa fa-calendar"></i>
    <span id="date"></span>
  </div>
</div>



</header>  
<style>
  
  .header_top1 {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.logo, .date {
  display: flex;
  align-items: center;
  color: #b2a3ff;
}

.logo i, .date i {
  margin-right: 5px; /* تباعد بين الرمز والنص */
}




.logo {
  text-align: center; /* لوضع اللوجو في المنتصف */
  display: flex;

}


  
  
  
  
  
.header_top_right {
    margin-left: 10px; /* تضبيط المسافة بين العناصر */
}

@media screen and (max-width: 350px) {
    .header_top_right {
        display: none; /* إخفاء العناصر عندما يكون العرض أقل من 650 بكسل */
    }
}

#clock1{
color:#fff;

}
</style>

          



<style>

    #navArea {
      position: fixed;
      bottom:-3%;
      width: 100%;
      border-top: 1px solid #ccc;
    }

</style>

</li>
            </ul>
          </div>


          </div>

        </div>
      </div>
      
    </div>

<style>
.progress-container {
    width: 100%;
    position: fixed;
    height: 7px; /* ارتفاع الشريط */
    z-index: 9999; /* ضعه فوق العناصر الأخرى */
}

.progress-bar {
    height: 100%;
    width: 0;
}
.end-message {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    background-color: #0000008a;
    transform: translate(-50%, -50%);
    color: #fff;
    padding: 20px;
    font-size: 24px;
    border-radius: 10px;
    z-index: 9999; /* ضعه فوق العناصر الأخرى */
    max-width: 80%; /* العرض الأقصى للرسالة */
    text-align: center; /* محاذاة النص في الوسط */
}



.progress-bar {
    background-color: #b2a3ff; /* لون الشريط (أخضر) */
    border-radius: 30px;

}

    </style>
  </header>
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
    <div class="progress-container">
    <div class="progress-bar"></div>
</div>
<div class="end-message">
    لقد انهيت محتوى الصفحة
</div>
</div>

      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="./index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show"> </span></a></li>
         <li> <a href="all-posts.php">كل المنشورات</a>
         </a>  </li>
         <!-- category------------------------------------------------------------------------- -->
         <?php 
            require_once "./admin/include/connection.php";

            $get_category = "SELECT * FROM post_category LIMIT 15"; // أضف LIMIT 15 هنا
            $result = mysqli_query($conn , $get_category);

            if($result) {
                while ($rows =  mysqli_fetch_assoc($result)) {
                    $c_name = $rows["c_name"];
        ?> 
            <li><a href="read-category.php?category=<?php echo $c_name; ?>"><?php echo $c_name; ?></a></li>
        <?php
                }
            }
        ?>
        </ul>
      </div>
    </nav>
  </section>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        
        <div class="latest_newsarea">
           <span>اخر الأخبار</span>
          <ul id="ticker01" class="news_sticker">
          <!-- latest news------------------------------------------------------------ -->
            <?php 
            
            $latest = "SELECT * FROM post_description ORDER BY p_time DESC";
            $latest_n = mysqli_query($conn , $latest);
            if($latest_n){
              $i = 1;
              while( $rows = mysqli_fetch_assoc($latest_n) ){
                $heading = $rows["p_heading"];
                $img = $rows["p_thumbnail"];
                $id = $rows["p_id"];
              
                ?>
               <li><a href='read-post.php?id=<?php echo $id; ?>'><img   src="./admin/upload/thumbnail/<?php echo $img; ?>"> <?php echo $heading ?> </a></li>
                <?php
                if( $i > 4 ){
                  break;
                }
                $i++;

              }
            }
           
           ?>
        </div>
      </div>
    </div>
  </section>
 
      
