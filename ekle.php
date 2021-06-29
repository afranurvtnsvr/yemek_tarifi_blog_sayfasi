<?php
session_start();
//değer atandı mı epostaya bakacağım
if(!isset($_SESSION["eposta"])){
   echo("<script LANGUAGE='JavaScript'>
            window.alert('Yemek Paylaşmak için önce Giriş yapınız.');
            window.location.href='giris.php';
            </script>");
            exit;
}
//Eğer dosyayı bulamassa sonlandırcak require
require "fonksiyonlar.php";
sayfaUN("ekle");
style();
?>


  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/piza.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>Yemeklerimizi Birlikte Yapalım.</h1>
            <h2 class="subheading">Yeni Tarifler Ekleyelim</h2>
            <span class="meta">MakeFoods
              <a href="index.php">MakeFoods</a>
              on April 14, 2020</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->

    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <!-- Yorum ekleme kısmı-->
        <form action="yemeklekontrol.php" method="post" class="yemekle" enctype="multipart/form-data">
            <div class="form-group">
                  <label for="sel1">Yemek Türü Seçiniz:</label>
                  <select class="form-control" id="sel1" name="kategori">
                   <?php
                      include "inc/vtbaglan.inc.php";
                      $sql = "SELECT * FROM kategori";
                       $sonuc=$vt->query($sql);

                        if ($vt->error) {
                            echo $vt->error;
                            echo "  <br/> SQL: $sql" ;
                            exit;
                            }
                          //burada seçeneklerimizi veritabanına bağladık orada çoğaltabilirzzz.
                         while($satir=$sonuc->fetch_assoc()){
                          echo "<option value=".$satir["kod"].">".$satir["etiket"]."</option>";

                         }
                          include"inc/vtkes.inc.php";
                    ?>
                    
                  </select>
                </div>
           <input type="text" id="username" name="baslik" placeholder="Tarifin Başlığı" />
            <textarea id="comment" name="tarif" placeholder="Buraya Tarifi Yazınız"></textarea>
            
          
        
            <br>
           
           
                <li class="comments">
                    <input type="file" style="display:none;" name="dosya" id="dosya" onChange="dosya_adi()" class="form-control"  />
                     <label for="dosya" style="border: 5px solid; border-color: tan; border-bottom-style:ridge" >Görsel seç</label> 
                        <div id="dosya-adi"></div>

                        <script type="text/javascript">
                            function dosya_adi(){
                            var ad=document.getElementById ("dosya").files[0].name;
                            document.getElementById ("dosya-adi").innerHTML="Dosya Adı : "+ad;
                            }
                        </script>
                 </li>
               <input type="submit" class="btn btn-primary float-right" name="butonekle"value="Yükle">
             
         </form>
        </div>
      </div>
    </div>

<br/>
<br/>
  <hr>

 

  ?php
  Footer();
 sayfaAlt();
 ?>
