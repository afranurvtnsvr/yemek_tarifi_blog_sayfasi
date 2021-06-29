 <?php
session_start();
error_reporting(0);// var olan hatalrı gözükmemesini sağlıyor
//Eğer dosyayı bulamassa sonlandırcak require
require "fonksiyonlar.php";
sayfaUN("giris");
?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Yemeklerle Dolu Dünyamıza <br/>Hoş Geldiniz :)</h1>
            <span class="subheading">Giriş yap ve yeni tarifler keşfet,keşfettir...</span>
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
         if(isset($_GET["hata"])){ ?>
           
            <div class="alert alert-danger" role="alert">
            <p style='text-align:center'> E-posta veya Şifre Hatalı! </p>
         
            </div>
        <?php 
         }
         ?>
      
        <form name="sentMessage" action="giriskontrol.php" method="post" >
        
            <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email Adresiniz</label>
              <input type="email" class="form-control" placeholder="Email Adresinizi Girin" name="eposta" required="required" data-validation-required-message="Lütfen geçerli mail giriniz">
              <p class="help-block text-danger"></p>
            </div>
          </div>
           <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Şifreniz</label>
              <input type="password" class="form-control" placeholder="Şifrenizi Girin" name="sifre">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="buton2" href="index.php">Giriş Yap</button>
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
  