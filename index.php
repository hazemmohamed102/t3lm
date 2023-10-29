<?php 
    require_once "include/header.php";
?>
<head>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="shortcut icon" href="assets/image/ta.png" type="image/x-icon"/>
</head>


<?php 
if( !empty($_SESSION["email"]) ){
    // تحقق من وجود البريد الإلكتروني في الجلسة
    $email = $_SESSION['email'];
?>
    <div class="floating-message" id="floatingMessage">
        <span class="close-btn" onclick="closeMessage()">×</span>
        <div class="message-content">
            <p>أهلاً بك مرة أخرى، <?php echo $name; ?></p>
        </div>
    </div>
<?php
}
?>


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

<section id="sliderSection">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="slick_slider">

        <!-- adding carousel -------------------------------------------------------------------------->
        <?php 
            
            $latest = "SELECT * FROM post_description ORDER BY p_time DESC LIMIT 5";
            $latest_n = mysqli_query($conn , $latest);
            if($latest_n){
              while( $rows = mysqli_fetch_assoc($latest_n) ){
                $heading = $rows["p_heading"];
                $img = $rows["p_carousel"];
                $description = $rows["p_description"];
                $news_id = $rows["p_id"];
                ?>
                 <div class="single_iteam"> <a href="read-post.php?id=<?php echo $news_id ?>"> <img src="admin/upload/carousel/<?php echo $img; ?>" ></a>
                  <div class="slider_article">
                    <h2><a class="slider_tittle" href="read-post.php?id=<?php echo $news_id ?>"><?php echo $heading; ?></a></h2>
                    <p> <?php echo $description; ?> </p>
                  </div>
             </div>
                <?php
              
              }
            }
            ?>
  <!-- end carousel----------------------------------------------------------------------------------------- -->
        </div>
      </div>
    </div>
</section>
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
           
          <!-- style  -->
        <?php

              // selecting category Name-----------------------------------------------
            
              $select_cat = "SELECT * FROM post_category";
            $result = mysqli_query($conn , $select_cat);

            if ($result) {
              while ($rows = mysqli_fetch_assoc($result)) {
                $cat_name =  $rows["c_name"];
                echo "<div class='latest_post'>";
                echo "<h2><span>$cat_name</span></h2>";
                // إذا كان لديك عناصر أخرى لتعيين لها تنسيق، يمكنك إضافتها هنا
                echo "</div>";
            

            // selecting category latest 1 news-------------------------------------------------
             if($cat_name ){

              $select_news = "SELECT * FROM post_description WHERE p_category = '$cat_name' ORDER BY p_time DESC  LIMIT 1 ";
              $result_news = mysqli_query( $conn , $select_news );
              if( $result_news ){
                $n = 0;
                  while( $rows_news= mysqli_fetch_assoc($result_news) ){
                    $news_thumb = $rows_news["p_thumbnail"];
                    $news_heading = $rows_news["p_heading"];
                   $news_description = $rows_news["p_description"];
                  $id_n = $rows_news["p_id"];
                 ?>

                    <!-- Display big news left side -->
                <div class="row">  
                    <div class="col-lg-6 col-md-6 col-sm-12">      
                        <ul class="wow fadeInDown">
                            <li>
                            <a href="read-post.php?id=<?php echo $id_n ?>" > <img alt=""  class="img-fluid img-responsive" src="admin/upload/thumbnail/<?php echo $news_thumb; ?>"> </a>
                                <div> <a href="read-post.php?id=<?php echo $id_n ?>" > <h3> <?php echo ucwords($news_heading); ?> </h3> </a> </div>
                                <div> <a href="read-post.php?id=<?php echo $id_n ?>" > <?php echo ucwords($news_description); ?>  </a> </div>        
                            </li>
                        </ul>      
                    </div>
                    <?php 
                        }
                    }

                    $select_small_news =  "SELECT * FROM post_description WHERE p_category = '$cat_name' ORDER BY p_time DESC  LIMIT 5 OFFSET 1  ";
                    $small_news_result = mysqli_query($conn , $select_small_news);
                    if( $small_news_result ){
                        while( $small_rows = mysqli_fetch_assoc($small_news_result) ){
                            $small_headline = $small_rows["p_heading"];
                            $small_thumb = $small_rows["p_thumbnail"];
                            $id_n = $small_rows["p_id"];
                            $small_cat = $small_rows["p_category"];
                           ?>
                           
                           <!-- adding 5 small news right side -->

                           <div  class=" d-flex flex-row justify-content-start"> 
                         <div class=" col-lg-2 col-md-2 col-sm-6">  
                            <ul class="wow fadeInDown">
                             <li>
                                  <div> <a href="read-post.php?id=<?php echo $id_n ?>" > <img style="height:60px;" class="img-fluid img-responsive" src="admin/upload/thumbnail/<?php echo $small_thumb; ?>"> </a>
                                  </div>
                             </li>
                           </ul>
                         </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <ul class="wow fadeInDown">
                              <li>
                                  <div> <a href="read-post.php?id=<?php echo $id_n ?>" > <?php echo ucwords($small_headline); ?>  </a> </div>
                                  <br>
                              </li>
                             </ul>
                        </div>
                        &nbsp;
                    </div>
                            <?php 
                        }
                    }
                    ?>

                    </div>
                      <!-- see more -->
                      <div style="position: relative;">
    <a class="more" href="read-category.php?category=<?php echo $cat_name; ?>"
        style="position: absolute; bottom: 8px; right: 16px; padding: 8px 8px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 4px;">اقرأ المزيد</a>
</div>
                    <!-- end see more -->
                 <?php
             }
          }
        }
      ?>

          </div> 
        </div> 
    </div>
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
                <?php
                if( $i > 4 ){
                  break;
                }
                $i++;

              }
            }
           
           ?>

<style>





/* تكبير الصورة لتملأ المودال بالكامل */

.modal-content img {

    width: 100%;

    height: auto;

    max-width: none;

}



/* تخصيص الخلفية السوداء */

.modal-content {

    background-color: rgb(32 54 51 / 86%);

}



/* تخصيص المحتوى الداخلي للمودال */

.modal-body {

    text-align: center;

    padding: 20px;

}





/* توسيع مساحة عنوان المودال */

.modal-title {

    text-align: center;

    width: 100%;

    font-size: 20px;

    font-weight: 700;

    color: #ff1;



}



/* تخصيص زر اكمل القراءة */

.btn-primary {

    background-color: rgb(96 124 120 / 86%);

    border-color: #333;

    border-radius: 30px;

    font-size: 20px;

    padding: 10px;

}



.btn-secondary:hover {

    background-color: #555;

    border-color: #555;

}





</style>





<script>



// يتم فتح المودال كل دقيقة
setInterval(function() {
    $('#autoModal').modal('show');
}, 720000);


document.addEventListener('DOMContentLoaded', function() {
    // تحقق مما إذا كان المستخدم دخل الموقع أو تم تحديث الصفحة
    var isNewUser = sessionStorage.getItem('isUser');
    if (isNewUser === null) {
        $('#autoModal').modal('show');
        sessionStorage.setItem('isNewUser', 'false');
    }
});


</script>

<?php 
  require_once "include/footer.php";
?>