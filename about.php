<div id="about" class="container-fluid div-height">
  <div class="row">
    <div class="col-sm-8">
      <?php
          error_reporting(0);
          include_once("db-functions.php");
          $sql = "SELECT * FROM about";
          $result = mysqli_query($prisijungimas, $sql);
          $datas = array();
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $datas[] = $row;
            }
          }
          foreach ($datas[0] as $about) {

          }
          foreach ($datas[1] as $about1) {

          }
        ?>
      <h2>About Company Page</h2><br>
      <h4><?php echo $about; ?></h4><br>
      <p><?php echo $about1; ?></p>
      <br>
    </div>
    <div class="col-sm-4">
      <img class="main-photo rounded-circle" src="img/law.jpg" alt="">
    </div>
  </div>
</div>
