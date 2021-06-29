<?php
session_start();
error_reporting(0);
require "fonksiyonlar.php";
$hatakodlari[1]="Lütfen,önce formu doldurunuz!";
$hatakodlari[2]="Geçerli bir e-posta giriniz.!";
$hatakodlari[3]="İsim boş olamaz.!";
$hatakodlari[4]="Soyad boş olamaz.!";
$hatakodlari[5]="İsim 3 karakterden kısa olamaz!";
$hatakodlari[6]="Soyad 3 karakterden kısa olamaz.!";
$hatakodlari[7]="Şifre 3 karakterden az olamaz.!";
$hatakodlari[8]="Şifreler uyuşmuyor, lütfen tekrar deneyin.!";
sayfaUN("kayit");
?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Kayıt Olalım...</h1>
            <span class="subheading">Bize Katılmak İster Misiniz?</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Bize katılın, birbirinden farklı güzel yemekleri birlikte yapalım ve paylaşalım.. <br/>
           Yapmanız gereken sadece alltakı formu doldurmak. :)</p>
<?php 
 if(isset($_GET["hata"])){ ?>
    <div class="alert alert-danger" role="alert">
    <?php  
    if(0<$_GET["hata"] and $_GET["hata"]<=8) {
        echo "<p style='text-align:center'>".$hatakodlari[$_GET["hata"]]."</p>";
    }
     ?>
    </div>
<?php 
 }
 ?> 
        <form method="post" action="kayitkontrol.php" class="formbicim "name="sentMessage" >
        <!-- id="contactForm" novalidate -->
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Adınız</label>
              <input type="text" class="form-control" placeholder="Ad" name="ad" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Soyadınız</label>
              <input type="text" class="form-control" placeholder="Soyad" name="soyad" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email Adresiniz</label>
              <input type="email" class="form-control" placeholder="Email Adresiniz"  name="eposta" required="required" data-validation-required-message="Lütfen geçerli mail giriniz">
              <p class="help-block text-danger"></p>
            </div>
          </div>
           <div class="control-group">
            <div type="hidden" class="form-group col-xs-12 floating-label-form-group controls">
              <label>Şifreniz</label>
              <input type="password" class="form-control" placeholder="Şifre Girin"  name="sifre" >
              <p class="help-block text-danger"></p>
            </div>
          </div>
           <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Şifre Tekrar</label>
              <input type="password" class="form-control" placeholder="Şifrenizi Tekrar Girin" name="sifre2"  >
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button name="buton1"type="submit" class="btn btn-primary"  href="giris.php">Kayıt Ol</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <hr>

  
  
<?php
Footer();
 sayfaAlt();
 ?>
