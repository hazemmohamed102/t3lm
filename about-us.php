<?php 
    require_once "include/header.php";
?>

<section id="contentSection">
    <div class="row">
        <div class="col-lg3-3 col-md-3 col-sm-12">
         <div class="left_content">
          <div class="contact_area">
              <h2>من نحن</h2>                   
          </div>
         </div>
        </div>
        <div class="col-lg-6"> <br> <br>
            <?php      
                    $get_about_us = "SELECT * FROM about_us ORDER BY id DESC LIMIT 1";
                    $result_about_us = mysqli_query($conn , $get_about_us);
                    if($result_about_us){
                        while( $about_us_rows = mysqli_fetch_assoc($result_about_us) ){
                                echo $about_us_rows["about"] . "<br>";
                        }
                    }
            ?>

        </div>

        
        <!-- row end -->
    </div>
</section>

<?php 

require_once "include/footer.php";

?>
</body>
</html>