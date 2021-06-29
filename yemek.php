<?php
session_start();
//Eğer dosyayı bulamassa sonlandırcak require
require "fonksiyonlar.php";
sayfaUN("null");

style();
include "inc/vtbaglan.inc.php";
// her yemeğin bir kodu var
$kod=$_REQUEST["kod"];
$kod = $vt->real_escape_string($kod);

//siteden yorum yapmayı aktif hale getirme
if (isset($_POST["yorumButon"])) {
    $yorum = $vt->real_escape_string($_POST["yorum"]);
    $yapan = $_SESSION["eposta"];
    $sql = "INSERT INTO `yorum` (`yapan`, `yapilan`, `metin`, `zaman`) VALUES ('$yapan', '$kod', '$yorum', CURRENT_TIMESTAMP)";
    if ($vt->query($sql) !== TRUE) {
        echo ("<script LANGUAGE='JavaScript'> window.alert('Yorumunuz eklenemedi, lütfen tekrar deneyiniz!');</script>");
    } 
}

// nereden gelıyor hangi yemek
if (!isset($_REQUEST["kod"])) {
    echo ("<script LANGUAGE='JavaScript'> window.alert('Lütfen makale seçiniz!');
    window.location.href='liste.php'; </script>");
}



$sql = "SELECT * FROM yemek WHERE kod = $kod ";
$sonuc=$vt->query($sql);

if ($vt->error) {
echo $vt->error;
echo "  <br/> SQL: $sql" ;
exit;
 }
 
?>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/brownie.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Tüm Yemeklerimiz</h1>
            <span class="subheading">Yemeklerin üzerine tıklayarak inceleyebilirsiniz..</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
   
<?php 
  //burada seçeneklerimizi veritabanına bağladık orada çoğaltabilirzzz.
$satir=$sonuc->fetch_assoc();

    echo " <div class='row'> ";
    echo " <div class='col-xs-6 col-md-4' >";
    echo "<h2 class='card-header'>";
        echo htmlspecialchars($satir["baslik"]);
      echo "</h2>";
     echo " <img src='";
        echo htmlspecialchars($satir["yol"]);
     echo "' alt='HTML5 Icon' style='width:100%;height:450px;'>";
     echo "  </div>";
     echo "    <div class='col-xs-2 col-md-8' > ";
     echo "     <p>Malzemeler & Tarifimiz <br/>";
     echo "   </p>"; 
     echo "<p class='post-meta'>";
         echo  $satir["tarif"];
      echo "</p>";
     echo "   </div>";
     echo " </div>";
     //giriş yapılmışsa yorum yapsın
      if(isset($_SESSION["eposta"])){
 ?>
 <!-- yorum ekleme penceresi -->
 <form action=""  method="POST" >
  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
         <br/>
            <textarea id="comment" name="yorum" placeholder="Yorumunuzu giriniz"></textarea> 
            <!-- Gizli bir alan açıyoruz burada yorum  -->
             <input type="hidden" name="kod" value="<?php echo $kod; ?>">
            <br/>
            <input type="radio" name="rating" value="1" />Çok İyi
            <input type="radio" name="rating" value="2" />İyi
            <input type="radio" name="rating" value="3" />Orta
            <input type="radio" name="rating" value="4" />Kötü
    
            <input type="radio" name="rating" value="5" />Çok Kötü
            <br/>
              <input type="submit" class="btn btn-primary float-right" name="yorumButon"value="Yükle"/> 

        </div>
      
  </div>
 </form>
<?php
      }
 ?>

   <!-- yorum kısmı -->
  <?php
      // kodu yukarıda real_escape_string le temizlemiştik tekrar kodu kullanabiliriz
         $sql = "SELECT  yorum.*, uye.ad, uye.soyad from yorum, uye WHERE yapilan = '$kod' and uye.eposta = yorum.yapan";
          $sonuc=$vt->query($sql);
 
             if ($vt->error) {
               echo $vt->error;
               echo "  <br/> SQL: $sql" ;
               exit;
              }
  //burada seçeneklerimizi veritabanına bağladık orada çoğaltabilirzzz.
 while($satir=$sonuc->fetch_assoc()){
echo "<div class='row'>";
  echo "    <div class='col-lg-8 col-md-10 mx-auto'>";
   echo "     <div class='post-preview'>";
     echo "     <a href='post.html'>";
        echo "    <h2 class='post-title'>";
        echo "     Tarifin Yorumu ";
        echo "    </h2> ";
        echo "    <h3 class='post-subtitle'>";
              echo htmlspecialchars($satir["metin"]);
      echo "      </h3>";
      echo "    </a>";
      echo "    <p class='post-meta'>Yorumu yapan";
      echo "    <a href='index.php'>";
              echo  htmlspecialchars($satir["ad"]);
             echo " ";
              echo  htmlspecialchars($satir["soyad"]);
      echo"</a>";
               echo $satir["zaman"];     
      echo "</p>";
      echo "    </div>";
      echo "    <hr>";
          
 echo " </div>";
 
  echo "  </div>";
 echo " <hr> ";
 }   
      include"inc/vtkes.inc.php";
      
?>
 
  

  <?php 
       
      Footer();
    sayfaAlt(); 
  ?>
