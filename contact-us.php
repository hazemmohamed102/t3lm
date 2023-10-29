<?php
    require_once "include/header.php";
?>



<section id="contentSection">
    <div class="row">

        <div class="col-12">
         <div class="left_content">
          <div class="contact_area">
            <h2>يمكنك زيارتنا في اي وقت</h2>
            <?php 
                $get_details = "SELECT * FROM contact_us ORDER BY id DESC LIMIT 1";
                $get_details_result = mysqli_query($conn , $get_details);

                if($get_details_result){
                  while ($rows = mysqli_fetch_assoc($get_details_result) ){

                    $address = ucwords($rows["address"]);
                    $phn = $rows["phn"];
                    $email = ucfirst($rows["email"]);
                    $fax = $rows["fax"];
                    ?>
            <iframe src="https://www.google.com/maps?q=<?php echo $address; ?>&output=embed" style="border:3; height:400px; width:100%;" allowfullscreen="" loading="lazy"></iframe>
           </div>
        </div>
        </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="left_content">
          <div class="contact_area">
            <h2>تواصل معنا</h2>
            <h4 class="text-center">نحن متاحون للتعديلات المقترحة علي رقم الوتساب</h4>
            <form action="#" class="contact_form">
              <input class="form-control" type="text" placeholder="الأسم*">
              <input class="form-control" type="email" placeholder="الإيميل*">
              <textarea class="form-control" cols="30" style="resize: none;" rows="10" placeholder="Message*"></textarea>
              <input type="submit" value="إرسال الرسالة">
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="right_content" style=" position: relative;">
            <div class="contact_area" style="font-size:20px;" >

              <h2>تواصل بنقرة واحدة</h2>

              <p ><i style="font-size:29px;" class="fa fa-map-marker" aria-hidden="true"></i>
                &nbsp;&nbsp;  
                العنوان: <span style="text-align: justify; width: 100px;"> <?php echo $address; ?> </span>
               </p>

              <p><i style="font-size:29px;" class="fa fa-phone" aria-hidden="true"></i> 
                &nbsp;&nbsp; الهاتف: <a href="tel:<?php echo $phn ?>"> <?php echo $phn; ?> </a> </p>

                
                <p ><i style="font-size:29px;" class="fa fa-location-arrow fa-10x" aria-hidden="true"></i>
                &nbsp; &nbsp; الإيميل: <a href = "mailto:<?php echo $email; ?>"> <?php echo $email; ?> </a></p>
                
                <p><i class="fa fa-whatsapp" aria-hidden="true"></i>
                &nbsp;&nbsp; الواتساب: <a href="fax:<?php echo $fax; ?>"> <?php echo $fax; ?> </a>
              </p>

              <?php
                  }
                }
            ?>
            </div>
          </div>
      </div>
      <!-- closing row -->
  </div>


</section>
<?php 

require_once "include/footer.php";

?>

</body>
</html>