<?php
session_start();
 ?>


  <!--nav bar open-->
  <?php
    include_once("./header.php");
   ?>
  <!--nav bar close-->
  <div class="jumbotron text-center">

    <h1>Kompanyje</h1>
    <p>Musu sukis yra!</p>
  </div>
  <!--Container (About Section) open-->
  <?php
    include_once("./about.php");
   ?>
  <!--Container (About Section) close-->
  <!-- Container 2 (About Section) open-->
  <div class="container-fluid bg-grey div-height">
    <div class="row">
      <div class="col-sm-4">
        <span class="glyphicon glyphicon-globe logo slideanim"></span>
      </div>
      <div class="col-sm-8">
        <h2>Our Values</h2><br>
        <?php
          
          include_once("db-functions.php");
          $sql = "SELECT * FROM darbai";
          $result = mysqli_query($prisijungimas, $sql);
          $datas = array();
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $datas[] = $row;
            }
          }
          foreach ($datas[0] as $data) {

          }
          foreach ($datas[1] as $data1) {

          }
        ?>
        <h4><strong>MISSION:</strong><?php echo $data; ?></h4><br>
        <p><strong>VISION:</strong><?php echo $data1; ?></p>
      </div>
    </div>
  </div>
  <!-- Container 2 (About Section) close-->
  <!-- Container (paslaugos Section) open-->
  <?php
    include_once("./service.php");
  ?>
  <!-- Container (paslaugos Section) close-->
  <!-- Container (atsiliepimai Section) -->
  <?php
    include_once("./carousel.php");
  ?>
  <!-- Container (atsiliepimai Section) close-->
  <!-- Container (Contact Section) open-->
  <div id="contact" class="container-fluid div-height bg-grey">
    <h2 class="text-center">CONTACT</h2>
    <div class="row">
      <div class="col-sm-5">
        <p>Contact us and we'll get back to you.</p>
        <p><span class="glyphicon glyphicon-map-marker"></span> Vilnius, Lithuania</p>
        <p><span class="glyphicon glyphicon-phone"></span> +37065508999</p>
        <p><span class="glyphicon glyphicon-envelope"></span> email@email.com</p>
      </div>
      <div class="col-sm-7 slideanim">
        <form class="" action="send-email.php" method="GET">
          <div class="row">
            <div class="col-sm-6 form-group">
              <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
            </div>
            <div class="col-sm-6 form-group">
              <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
            </div>
          </div>
          <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
          <div class="row">
            <div class="col-sm-12 form-group">
              <button class="btn btn-default pull-right" type="submit">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Container (Contact Section) open-->
  <!-- Add Maps-->
  <div id="googleMap slideanim" >
    <iframe id="gmap_canvas" width="100%" height="400px" src="https://maps.google.com/maps?q=vilnius&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
  </div>

  <?php
  include_once("./comment-box.php");
  ?>

  <!-- footer start -->
  <?php
    include_once("./footer.php");
  ?>
  <!-- footer end-->
  <?php
    include_once("./js-script.php");
  ?>

</body>
</html>
