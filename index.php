<?php 
  require_once "lib/function.php"; ?>
<?php $data = getFeed('http://www.bfmtv.com/rss/politique/');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Rss Config</title>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<META NAME="robots" CONTENT="none">

<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Pathway+Gothic+One' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/lib.js"></script>

<body>
<div class="container"> 
  <!-- Fin row logo-->
<div class="row">
<div class="col-lg-3"> <img class="img-responsive" src="img/logo.png"  alt=""/> </div>
<div class="col-lg-9">
  <blockquote>
    <p class="trafic"> <strong> Bulletin trafic en temps réel :</strong><?php echo $trafic; ?></p>
  </blockquote>
</div>
</div>
<!-- Fin row logo-->
<div class="row">
<div class="col-lg-6">

  <!-- 16:9 aspect ratio -->
  <div class="embed-responsive embed-responsive-16by9 iframe">
    <iframe   allowTransparency="true" frameborder="0"  scrolling="no" class="embed-responsive-item" src="http://www.sytadin.fr/frame/cartographie.jsp.html?largeur=550"></iframe>
  </div>

</div>
<!-- Fin parti gauche -->
<div class="col-lg-6" >

  <ul class="fluxRss">
    <?php $i = 0;
    foreach($data  as $entry){
    $i++;
    if($i == 20){
    break;
    }
    ?>
    <li> <?php print $entry->title; ?> <small> -- <?php print $newDate = date("d-M-Y  G:i", strtotime($entry->pubDate)); ?></small> </li>
    <?php } ?>
  </ul>
</div>
</div>

<div class="row">
<div class="col-lg-8">
<div  id="cont_e2508165e5247a67af38814451175b7f"> <span class="" id="h_e2508165e5247a67af38814451175b7f" ></span>
  <script type="text/javascript" >
conte = document.getElementById("cont_e2508165e5247a67af38814451175b7f");
                    enlace = document.getElementById("h_e2508165e5247a67af38814451175b7f");
                    anchor = document.getElementById("a_e2508165e5247a67af38814451175b7f");
                    h2_enlace = document.getElementById("h2_e2508165e5247a67af38814451175b7f");
                    if (conte && enlace){
                        enlace.style.cssText = "font-family:Helvetica;font-size:14px; height:19px; text-align:center; cursor:pointer; text-decoration:underline";
                        conte.style.cssText = "text-align:center; 100%; color:#808080;";
                        if (h2_enlace) h2_enlace.style.cssText = "font-weight:normal;display:inline;";
                        elem = document.createElement("iframe");
                        elem.style.cssText = "width:750px; color:#808080; height:209px;";
                        elem.id = "e2508165e5247a67af38814451175b7f";
                        elem.class = "border";
                        elem.src = "http://www.tameteo.com/getwid/e2508165e5247a67af38814451175b7f";
                        elem.frameBorder = 0;
                        elem.allowTransparency = true;
                        elem.scrolling = "no";
                        elem.name = "flipe";
                        elem.style.height = "209";
                        conte.appendChild(elem);
                    }


</script>
</div>
</div>

<div class="col-lg-4">
      <div class="col-lg-12 text-center">
          <div class="btn btn-success btn-lg CurrencyView">
              <h2 class=" "><?php echo $CurrencyView; ?></h2>
          </div>
      </div>
  </div>

</div

</div>
<div class="modal-footer text-center">&copy; 2015</div>
<!-- js --> 
<script src="js/jquery-latest.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script>
   hiddenAllDiv();
</script>
</body>
</html>
