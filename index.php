<?php
session_start();
error_reporting(0);
//Eğer dosyayı bulamassa sonlandırcak require
require "fonksiyonlar.php";
sayfaUN("anasayfa");
?>
 
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/food.jpeg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>MakeFoods</h1>
            <span class="subheading">Yemek yaparak paylaştığımız, Paylaşarak yemek yaptığımız sayfamıza Hoş geldiniz.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          <a href="yemek.php?kod=1">
            <h2 class="post-title">
              Browni Tarifi 
            </h2>
            <h3 class="post-subtitle">
              Harika bir tarif arkadaşlar hem pratik hem muhteşem lezzetli.
            </h3>
          </a>
          <p class="post-meta">Yorumu yapan
            <a href="#">Afra nur Vatansever</a>
            14 Nisan 2020</p>
        </div>
        <hr>
        <div class="post-preview">
          <a href="yemek.php?kod=18">
            <h2 class="post-title">
              Beyti Kebabı Tarifi için
            </h2>
            <h3 class="post-subtitle">
              Enfes ağzınıza dağılan bir kebab tarifi arkadaşlar hem pratik hem muhteşem lezzetli.
            </h3>
          </a>
          <p class="post-meta">Yorumu yapan
            <a href="#">Elif Barca</a>
            24 Nisan 2020</p>
        </div>
        <hr>
       <div class="post-preview">
          <a href="yemek.php?kod=16">
            <h2 class="post-title">
             Çilekli Pasta Tarifi için
            </h2>
            <h3 class="post-subtitle">
              Pastane pastası gibi Harika bir tarif arkadaşlar hem pratik hem muhteşem lezzetli.
            </h3>
          </a>
          <p class="post-meta">Yorumu yapan
            <a href="#">Eda Nur Vatansever</a>
            19 Nisan 2020</p>
        </div>
        <hr>
       <div class="post-preview">
          <a href="yemek.php?kod=17">
            <h2 class="post-title">
            İçli Köfte Tarifi için
            </h2>
            <h3 class="post-subtitle">
               Harika bir tarif arkadaşlar hem pratik hem muhteşem lezzetli.
            </h3>
          </a>
          <p class="post-meta">Yorum yapan
            <a href="#">Feride Çetinkaya</a>
            6 Temmuz 2020</p>
        </div>
        <hr>
        <!-- Pager -->
        <div class="clearfix">
                 <input style="display:none;" id="dosya" onChange="dosya_adi()" class="form-control" type="file" />
                <a class="btn btn-primary float-right" for="dosya" href="liste.php" > Yemek Tarifleri Görüntüle</a>         
        </div>
      </div>
    </div>
  </div>

  <hr>
 <?php 
Footer();
sayfaAlt(); ?>