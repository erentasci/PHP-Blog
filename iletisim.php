<?php require_once 'admin/pages/inc-functions.php'; ?>

<?php 

if(@$_POST["submit"]){
  $ad = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
  $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
  $tel = htmlspecialchars($_POST["phone"], ENT_QUOTES, 'UTF-8');
  $mesaj = htmlspecialchars($_POST["message"], ENT_QUOTES, 'UTF-8');

  $ekle = $db->prepare("INSERT INTO `iletisim` (`ad`,`email`,`tel`,`mesaj`) VALUE (:ad,:email,:tel,:mesaj)");

  $ekle->bindValue(":ad", $ad, PDO::PARAM_STR);
  $ekle->bindValue(":email", $email, PDO::PARAM_STR);
  $ekle->bindValue(":tel", $tel, PDO::PARAM_STR);
  $ekle->bindValue(":mesaj", $mesaj, PDO::PARAM_STR);


  if($ekle->execute()){
  header("Location: iletisim.php?i=basarili");
  } else {
    header("Location: iletisim.php?i=hata");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>İletişim</title>

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
 
  <?php require_once 'includes/inc-menu.php';?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/contact-bg.png')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Benimle İletişime Geçin</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Bana ulaşmak için lütfen iletişim formunu doldurunuz..</p>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form method="POST" action="iletisim.php#bildiri">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Ad Soyad</label>
              <input type="text" class="form-control" placeholder="Ad Soyad" name="name" required data-validation-required-message="Ad Soyad giriniz..">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>E-Mail Adres</label>
              <input type="email" class="form-control" placeholder="E-Mail Adres" name="email" required data-validation-required-message="E-Mail adresinizi giriniz..">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Telefon Numarası</label>
              <input type="tel" class="form-control" placeholder="Telefon Numarası" name="phone" required data-validation-required-message="Telefon numaranızı giriniz..">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Mesaj</label>
              <textarea rows="5" class="form-control" placeholder="Mesaj" name="message" required data-validation-required-message="Mesajınızı giriniz.."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary" value="Gönder">
          </div>  

          <div id="bildiri">
          <?php 
          if(@$_GET["i"] == "basarili"){
            echo '<p class="text-center alert alert-success">Mesaj Başarıyla Gönderildi!</p>';
          }elseif(@$_GET["i"] == "hata"){
            echo '<p class="text-center alert alert-danger">Mesaj Gönderilirken Hata Oluştu!</p>';
          }
          
          ?>
          </div>
        </form>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <?php require_once 'includes/inc-footer.php';?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <!-- <script src="js/contact_me.js"></script> -->

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
