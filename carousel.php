<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2>Atsiliepimai</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php
          error_reporting(0);
          include_once("db-functions.php");
          $atsiliepimas1 = getAtsiliepimas(1);
          $atsiliepimas2 = getAtsiliepimas(2);
          $atsiliepimas3 = getAtsiliepimas(3);
        ?>
      <div class="item active">
        <h4><?= $atsiliepimas1[1] ?><br><span><?= $atsiliepimas1[2] ?></span></h4>
      </div>
      <div class="item">
        <h4><?= $atsiliepimas2[1] ?><br><span><?= $atsiliepimas2[2] ?></span></h4>
      </div>
      <div class="item">
        <h4><?= $atsiliepimas3[1] ?><br><span><?= $atsiliepimas3[2] ?></span></h4>
      </div>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Pirmyn</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Atgal</span>
    </a>
  </div>
</div>
