<?php require_once 'admin/pages/inc-functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Anasayfa</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <?php require 'includes/inc-menu.php'; ?>


  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.png')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Hoşgeldiniz!</h1>
            <span class="subheading">Blog Yazılarım</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

      <?php 
      @$aramayap = $_GET["arama"];

      if($aramayap!=""){
        echo "<p>Aranan kelime: $aramayap | <a href='index.php'>     << Anasayfa geri dön </a></p>";
        $cek = $db->prepare("SELECT * FROM `blog` WHERE `aktif` = :aktif && `baslik` LIKE :aranan ORDER BY `id` DESC ");
        $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
        $cek->bindValue(":aranan","%$aramayap%", PDO::PARAM_STR);

      } else {

      $cek = $db->prepare("SELECT * FROM `blog` WHERE `aktif` = :aktif ORDER BY `id` DESC");
      $cek->bindValue(":aktif",1,PDO::PARAM_INT);

      }
      $cek->execute();
      while($row = $cek->fetch(PDO::FETCH_ASSOC)){
      ?>
        <div class="post-preview">
          <a href="blog-detay.php?id=<?=$row["id"]?>">
            <h2 class="post-title">
            <?= $row["baslik"] ?>
            </h2>
            <h3 class="post-subtitle">
            <?= $row["alt_baslik"] ?>
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Eren Taşçı</a>
            <?= $row["tarih"]?></p>
        </div>
        <hr>

      <?php } ?>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <hr>

<!-- Footer -->

<?php require 'includes/inc-footer.php'; ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
