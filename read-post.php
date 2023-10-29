<?php

require_once "include/header.php";

?>



            <?php 

            require_once "./admin/include/connection.php";



            $get_category = "SELECT * FROM post_category";

            $result = mysqli_query($conn , $get_category);

            if($result){

              while ( $rows =  mysqli_fetch_assoc($result) ){

                $c_name = $rows["c_name"]

          ?>            



    <?php

          }

       }

    ?>



<?php 



  $id = $_GET["id"];

  $read_news = "SELECT * FROM post_description WHERE p_id = '$id' ";

  $read_result = mysqli_query($conn , $read_news);

  if($read_news){

    while( $rows = mysqli_fetch_assoc($read_result) ){

      $heading =  $rows["p_heading"];

      $details =  $rows["complete_post"];

       $time = $rows["p_time"];

      $category = $rows["p_category"];

      $img = $rows["p_carousel"];

?>




  <section id="contentSection">

    <div class="row">

      <div class="col-lg-8 col-md-8 col-sm-8">

        <div class="left_content">

          <div class="single_page">

            <h1> <?php echo $heading; ?> </h1>



           <div  class="post_commentbox"> <a href="all-posts.php"><i class="fa fa-user"></i>Hazem Mohamed</a> <span><i class="fa fa-calendar"></i> <?php echo date('d-M-Y ' , $time); ?> </span> <a href="read-category.php?category=<?php echo $category; ?> "><i class="fa fa-tags"></i><?php echo $category; ?></a> </div>




            

           <a href="#" data-toggle="modal" data-target="#exampleModal">
    <div id="image-container" class="single_page_content">
        <img id="zoomableImage" class="img-center" style="width:100%; height:90%" src="admin/upload/carousel/<?php echo $img; ?>" alt="">
    </div>
</a>

              <blockquote> <?php echo $details; ?> </blockquote>

             

<!-- مودال بووتستراب -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">تحميل و توضيح الصورة</h5>


            </div>

            <div class="modal-body">

                <img src="admin/upload/carousel/<?php echo $img; ?>" alt="صورة" id="modalImage">

                <button id="downloadButton" class="btn btn-primary">تحميل الصورة</button>

                <button class="btn btn-primary" id="continueReadingButton" data-dismiss="modal">اكمل القراءة</button>

            </div>

        </div>

    </div>

</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#copyModal">

    نسخ عنوان المنشور

</button>




<!-- ... (بقية الكود) ... -->

<div class="modal fade" id="copyModal" tabindex="-1" role="dialog" aria-labelledby="copyModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

            <img src="admin/upload/carousel/<?php echo $img; ?>" alt="صورة" id="modalImage">

            <h1> <?php echo $heading; ?> </h1>

                <h5 class="modal-title" id="copyModalLabel">رابط المنشور</h5>


            </div>

            <div class="modal-body">

            <input type="text" class="form-control" id="postLink"  value="<?php echo $postLink; ?>" readonly>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-dismiss="modal">إغلاق</button>

                <button type="button" class="btn btn-primary" onclick="copyPostLink()">نسخ</button>

            </div>

        </div>

    </div>

</div></div>

<!-- مودال بووتستراب الثالث (بعد النسخ) -->

<div class="modal fade" id="copiedModal" tabindex="-1" role="dialog" aria-labelledby="copiedModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="copiedModalLabel">تم النسخ بنجاح</h5>

            </div>

            <p style="font-size: 18px;">!!! تم نسخ رابط الصفحة يمكنك بدأ مشاركته الأن </p>

            <h3>!!!👇👇او تواصل معنا الأن</h3>

            <ul class="sociallink_nav">

                <li><a href="https://www.facebook.com/7azem.mohamed1?mibextid=ZbWKwL"><i class="fa fa-facebook"></i></a></li>

                <li><a href="https://instagram.com/hazemtmr?igshid=MzNlNGNkZWQ4Mg=="><i class="fa fa-instagram"></i></a></li>

                <li><a href="https://wa.me/qr/WRARCQACVMYNJ1"><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">

  <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>

</svg></i></a></li>

              </ul>



            <div class="modal-footer">

                <button type="button" class="btn btn-primary close-all-modals">اكمل القراءة</button>

            </div>

        </div>

    </div>

</div>



<!-- رسالة تأكيد التحميل -->

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="confirmationModalLabel">تأكيد التحميل</h5>

            </div>

            <div class="modal-body">

                هل تريد تحميل هذه الصورة؟

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-primary" id="confirmDownloadButton">نعم</button>

                <button type="button" class="btn btn-primary" data-dismiss="modal">لا</button>

            </div>

        </div>

    </div>

</div>



<!-- مودال بووتستراب الثاني (بعد تحميل الصورة) -->

<div class="modal fade" id="downloadedModal" tabindex="-1" role="dialog" aria-labelledby="downloadedModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="downloadedModalLabel">تم تحميل الصورة</h5>


            </div>

            <div class="modal-body">

                <!-- العناصر الإضافية -->

              <ul class="sociallink_nav">

                <li><a href="https://www.facebook.com/7azem.mohamed1?mibextid=ZbWKwL"><i class="fa fa-facebook"></i></a></li>

                <li><a href="https://instagram.com/hazemtmr?igshid=MzNlNGNkZWQ4Mg=="><i class="fa fa-instagram"></i></a></li>

                <li><a href="https://wa.me/qr/WRARCQACVMYNJ1"><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">

  <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>

</svg></i></a></li>

              </ul>

              <button class="btn btn-primary close-all-modals">اكمل القراءة</button>

              </div>

        </div>

    </div>

</div>

            </div>

            <div class="social_link">
            <?php
  $description = ""; // يتم استبداله بالقيمة التي يدخلها المستخدم

  // ترميز النصوص لاستخدامها في الرابط
  $encoded_heading = urlencode($heading);
  $encoded_details = urlencode($details);
  $encoded_description = urlencode($description);
?>

              <ul class="sociallink_nav">
                <li><a href="https://api.whatsapp.com/send?phone=&text=<?php echo $encoded_heading . "%0A%0A" . $postLink; ?>" target="_blank"><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">

  <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>

</svg></i></a></li>


                <!-- <li><a href="https://www.facebook.com/7azem.mohamed1?mibextid=ZbWKwL"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

                <li><a href="https://instagram.com/hazemtmr?igshid=MzNlNGNkZWQ4Mg=="><i class="fa fa-instagram"></i></a></li> -->


              </ul>

            </div>


            <div class="related_post">

              <h2>اخبار متشابهة<i class="fa fa-thumbs-o-up"></i></h2>

              <ul class="spost_nav wow fadeInDown animated">

            <?php



              $selet_related_post = "SELECT * FROM post_description WHERE p_category = '$category' ORDER BY RAND() LIMIT 3 ";

              $relted_post = mysqli_query($conn , $selet_related_post);



              if($relted_post){

                while ( $relted_post_row = mysqli_fetch_assoc($relted_post) ){

                  $thumb = $relted_post_row["p_thumbnail"];

                  $related_heading = $relted_post_row["p_heading"];

                  $related_id = $relted_post_row["p_id"];

                  ?>

                <li>

                  <div class="media"> <a class="media-left" href="read-post.php?id=<?php echo $related_id; ?>"> <img src="admin/upload/thumbnail/<?php echo $thumb; ?>" > </a>

                    <div class="media-body"> <a class="catg_title" href="read-post.php?id=<?php echo $related_id; ?>""> <?php echo $related_heading; ?> </a> </div>

                  </div>

                </li>

                  <?php

                }

              }

            ?>

              </ul>

            </div>

          </div>

        </div>

      </div>

      <?php

    }

  }

?>



<!-- style + js = the modale , image  -->



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

    color: #b2a3ff;



}



/* تخصيص زر اكمل القراءة */

.btn-primary {

    background-color: #b2a3ff;

    border-color: #333;

    border-radius: 30px;

    font-size: 20px;

    padding: 10px;

}



.btn-secondary:hover {

    background-color: #555;

    border-color: #555;

}



.floating-message {
    position: absolute;
    top: 153px;
    right: -66px;
    transform: translate(-50%, -50%);
    padding: 10px;
    border-radius: 10px;
    color: #000000;
    font-size: 16px;
    background-color: rgb(96 124 120 / 26%);
    font-weight: 700;
    box-shadow:  #0000008f -4px 8px 11px 12px;

}
@media (min-width: 1122px) {
  .col-md-4 {
    width: 33.33333333%;
    float: left;
    top: 33%;
    position: absolute;
  }
}
</style>


<!-- زر لفتح المودال -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
اقرأ فقط
</button> -->

<!-- المودال -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">(اقرأ فقط)<?php echo $heading; ?></h5>
      </div>
      <div class="modal-body">
      <?php echo $details;  ?>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>

<?php 

require_once "include/footer.php";

?>

