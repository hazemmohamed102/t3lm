<?php 
        header("Location: http://t3lm.rf.gd/?i=1?اقرأ ملف مهم جدا في مجلد الأبوت ");
?>

<?php 
    session_start();
    if( empty($_SESSION["email"]) ){
        header("Location:");
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
<link rel="shortcut icon" href="assets/image/logo2.png" type="image/x-icon"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/fontawesome.min.css" integrity="sha512-W5OxdLWuf3G9SMWFKJLHLct/Ljy7CmSxaABQLV2WIfAQPQZyLSDW/bKrw71Nx7mZKN5zcL+r8pRCZw+5bIoHHw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>



<?php  
    // databaseconnection
    require_once "admin/include/connection.php";

    if(isset($_SESSION['email'])){
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
    }
?>
<?php 
if( !empty($_SESSION["email"]) ){
    // تحقق من وجود البريد الإلكتروني في الجلسة
    $email = $_SESSION['email'];
?>
<div class="sticky-container">
  <ul class="sticky">
    <li> 
      <a href="profile.php">
        <img width="32" height="32" title="" alt="" src="   https://cdn-icons-png.flaticon.com/512/1077/1077012.png " />
        <p>الملف الشخصي</p>
      </a>
    </li>
    <li> 
      <a href="index.php" >
        <img width="32" height="32" title="" alt="" src="   https://cdn-icons-png.flaticon.com/512/609/609803.png" />
        <p>الصفحة الرئيسية</p>
      </a>
    </li>
    <li> 
      <a href="https://www.webintoapp.com/store/173071">
        <img width="32" height="32" title="" alt="" src="https://cdn-icons-png.flaticon.com/512/732/732208.png" />
        <p>تطبيق الهاتف</p>
      </a>
    </li>
    <li> 
      <a href="https://api.whatsapp.com/send/?phone=%2B201148499115&text&type=phone_number&app_absent=0">
        <img width="32" height="32" title="" alt="" src="   https://cdn-icons-png.flaticon.com/512/5298/5298720.png " />
        <p>للإعلانات</p>
      </a>
    </li>
    <li> 
  <a id="toggleDarkMode" target="_blank" tooltip="switch mode">
    <img width="32" height="32" title="" alt="" src="https://cdn-icons-png.flaticon.com/512/869/869869.png" />
    <p>تغيير الوضع</p>
  </a>
</li>    <!-- <li> 
      <a href="login.php">
        <img width="32" height="32" title="" alt="" src="   https://cdn-icons-png.flaticon.com/512/364/364090.png " />
        <p>تسجيل الدخول</p>
      </a>
    </li> -->
    <li> 
      <a href="logout.php">
        <img width="32" height="32" title="" alt="" src="   https://cdn-icons-png.flaticon.com/512/1828/1828490.png " />
        <p>تسجيل الخروج</p>
      </a>
    </li>
    <li> 
      <a href="https://www.facebook.com/7azem.mohamed1">
        <img width="30" height="32" title="" alt="" src="https://www.cssscript.com/demo/creating-a-sticky-social-share-bar-with-css3-transitions-and-transforms/img/fb1.png" />
        <p>FaceBook</p>
      </a>
    </li>
  </ul>
</div>


<?php
}
?>
<div class="status-message" style="display:none;"></div>

<script>
  function toggleDarkMode() {
    var isDarkMode = document.body.classList.toggle('dark-mode');
    var message = isDarkMode ? 'تم التبديل للوضع الفاتح' : 'تم التبديل للوضع الداكن';
    
    var statusMessage = document.querySelector('.status-message');
    if (statusMessage) {
      statusMessage.innerText = message;
      statusMessage.style.display = 'block';
  
      setTimeout(function() {
          statusMessage.style.display = 'none';
      }, 1500); // 1.5 ثانية
    }
  
    // حفظ حالة الوضع في التخزين المحلي لكل جهاز
    localStorage.setItem('darkMode', isDarkMode);
  }
  
  document.getElementById('toggleDarkMode').addEventListener('click', toggleDarkMode);
  
  // استعادة الوضع عند تحديث الصفحة
  window.onload = function() {
    var darkMode = localStorage.getItem('darkMode');
    if (darkMode === 'true') {
        document.body.classList.add('dark-mode');
    }
  };
</script>
<style>
  .sticky-container {
/*background-color: #333;*/
padding: 0px;
margin: 0px;
position: fixed;
right: -119px;
top: 60px;
width: 200px;
z-index: 9999;
}
.sticky li {
list-style-type: none;
background-color: #333;
color: #efefef;
height: 43px;
padding: 0px;
margin: 0px 0px 1px 0px;
-webkit-transition: all 0.25s ease-in-out;
-moz-transition: all 0.25s ease-in-out;
-o-transition: all 0.25s ease-in-out;
transition: all 0.25s ease-in-out;
cursor: pointer;
filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale");
filter: gray;
-webkit-filter: grayscale(100%);
border-radius:10px;

}
.sticky li:hover {
margin-left: -115px;
/*-webkit-transform: translateX(-115px);
		-moz-transform: translateX(-115px);
		-o-transform: translateX(-115px);
		-ms-transform: translateX(-115px);
		transform:translateX(-115px);*/
		/*background-color: #8e44ad;*/
filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'1 0 0 0 0, 0 1 0 0 0, 0 0 1 0 0, 0 0 0 1 0\'/></filter></svg>#grayscale");
-webkit-filter: grayscale(0%);
}
.sticky li img {
float: left;
margin: 5px 5px;
margin-right: 10px;
}
.sticky li p {
padding: 0px;
margin: 0px;
text-transform: uppercase;
line-height: 43px;
}
/** content **/
.content {
margin-top: 150px;
margin-left: 100px;
width: 700px;
}
h1, h2 {
font-family: "Source Sans Pro", sans-serif;
color: #ecf0f1;
padding: 0px;
margin: 0px;
font-weight: normal;
}
h1 {
font-weight: 900;
font-size: 64px;
}
h2 {
font-size: 26px;
}
p {
color: #ecf0f1;
font-family: "Lato";
line-height: 28px;
font-size: 15px;
}
p.credit {
padding-top: 20px;
font-size: 12px;
}
p a {
color: #ecf0f1;
}
/** fork icon**/
.fork {
position: absolute;
top: 0px;
left: 0px;
}
</style>
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
<div class="sticky-container">
  <ul class="sticky">
    <li> 
      <a href="index.php">
        <img width="32" height="32" title="" alt="" src="   https://cdn-icons-png.flaticon.com/512/609/609803.png" />
        <p>الصفحة الرئيسية</p>
      </a>
    </li>
    <li> 
      <a href="https://www.webintoapp.com/store/173071">
        <img width="32" height="32" title="" alt="" src="https://cdn-icons-png.flaticon.com/512/732/732208.png" />
        <p>تطبيق الهاتف</p>
      </a>
    </li>
    <li> 
      <a href="https://api.whatsapp.com/send/?phone=%2B201148499115&text&type=phone_number&app_absent=0">
        <img width="32" height="32" title="" alt="" src="   https://cdn-icons-png.flaticon.com/512/5298/5298720.png " />
        <p>للإعلانات</p>
      </a>
    </li>
    <li> 
      <a  id="toggleDarkMode">
        <img width="32" height="32" title="" alt="" src="   https://cdn-icons-png.flaticon.com/512/869/869869.png " />
        <p>تغيير الوضع</p>
      </a>
    </li>
    <li> 
      <a href="login.php">
        <img width="32" height="32" title="" alt="" src="   https://cdn-icons-png.flaticon.com/512/364/364090.png " />
        <p>تسجيل الدخول</p>
      </a>
    </li>
  </ul>
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
 
      
