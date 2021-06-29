<?php
session_start();
error_reporting(0);
//Eğer dosyayı bulamassa sonlandırcak require
require "fonksiyonlar.php";
sayfaUN("liste");
//url de sayfa diye bişi yok koontrol et
if(isset($_GET["sayfa"])){
    $sayfa=$_GET["sayfa"]; //url den alıyorum
}else{
    $sayfa=1;
}
 $sayfabasina=3;

$oncekisayfa=$sayfa - 1;
$sonrakisayfa= $sayfa + 1;

//sayfa sayısı hesaplaması lazım
//$sayfasayisi=3;
// baslantıdan sınra al aramayı
include "inc/vtbaglan.inc.php";
//araifade boşsa $ara degişkenıne GET ile çektiğimiz araifadeyi temizleyip atıyoruz ve vt sorgusunda baslik like $ara diyoruz
  if(isset($_GET["araifade"])){
  $ara = $vt->real_escape_string($_GET["araifade"]);
  $sql = "SELECT count(*) as kayitsayisi FROM yemek,kategori WHERE yemek.kategori = kategori.kod AND yemek.baslik like '%$ara%'";
  }else{
  $sql = "SELECT count(*) as kayitsayisi FROM yemek,kategori WHERE yemek.kategori = kategori.kod" ;
  }
   $sonuc=$vt->query($sql);
if ($vt->error) {
    $mesaj = $vt->error;
    $mesaj .= "<br /> SQL: $sql;";
    error_log($mesaj);
    exit;
}
$satir = $sonuc ->fetch_assoc(); //kaydını aldık fetch assoc la
$kayitsayisi=$satir["kayitsayisi"];
$sayfasayisi=ceil($kayitsayisi / $sayfabasina); // yukarı tabana yuvarlama ceil

//adresleme için ara ifadedsi varsa?
if(isset($_GET["araifade"])){
   $adres="liste.php?araifade=".$_GET["araifade"]."&sayfa="; // iki değişkenim var ara ifade ve sayfa bunları & ile bağladım.
}else{ //araifade yoksas
   $adres="liste.php?sayfa=";
}
  $sonuc=$vt->query($sql);
if ($vt->error) {
      echo $vt->error;
      echo " <br /> SQL: $sql" ;
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
<div class='container'>
  <h2 style="text-align: center; position: relative; margin: auto;  margin-right: auto; margin-left: auto;">YEMEK LİSTEMİZ</h2>

  <?php
    include "inc/vtbaglan.inc.php";
    // ara.php için aramayı yemek adı için yapacağız. '%$ara%' başında sonunda ara da yazacağım ifadeyi ara
  if(isset($_GET["araifade"])){
  $ara = $vt->real_escape_string($_GET["araifade"]);
  $sql = "SELECT yemek.yol, yemek.kod, yemek.baslik, yemek.tarif, kategori.etiket FROM yemek,kategori WHERE yemek.kategori = kategori.kod AND yemek.baslik like '%$ara%'";
  }else{
  $sql = "SELECT yemek.yol, yemek.kod, yemek.baslik, yemek.tarif, kategori.etiket FROM yemek,kategori WHERE yemek.kategori = kategori.kod" ;
  }
   $sonuc=$vt->query($sql);

      if ($vt->error) {
      echo $vt->error;
      echo " <br /> SQL: $sql" ;
      exit;
      }
      if(isset($_GET["araifade"])){
      echo " <h3> Arama Sonuçları: </h3>";
      echo "<p> Aradığınız ifade:";
          echo htmlentities($_GET["araifade"]);
          echo "</p>";
      }//burada seçeneklerimizi veritabanına bağladık orada çoğaltabilirzzz.
while($satir=$sonuc->fetch_assoc()){
echo "
<div class='row'>
<div class='col-xs-6 wo col-md-4' style=' position: relative; margin: auto;'>
    <img class='card-img-top' src='";
                            echo htmlspecialchars($satir["yol"]);
                            echo"' alt='Card image' style='width:100%;padding: 10px; '>
    <div class='card-body'>
        <h4 class='card-title'>";

            echo htmlspecialchars($satir["baslik"]);

            echo "</h4>
        <p class='card-text'>";
            echo htmlspecialchars($satir["tarif"]);
            echo"</p>";
        echo "<p class='card-text' name='kod'><i>";
                echo "Kategori: ".$satir["etiket"];
                echo "</i></p>";
        echo" <a href='";

                               echo "yemek.php?kod=".$satir["kod"];

                              echo" ' class='btn btn-primary'>İncele</a>
    </div>
</div>

</div>";

}
include"inc/vtkes.inc.php";
    
?>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <?php
                if($oncekisayfa >0 ){
                ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo $adres.$oncekisayfa;?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                 <?php
                
                ?>
                <li class="page-item"><a class="page-link" href="<?php echo $adres.$oncekisayfa;?>">
                        <?php echo $oncekisayfa; ?>
                    </a>
                </li>
                 <?php
                }
                ?>
                <li class="page-item active">
                    <a class="page-link" href="<?php echo $adres.$sayfa;?>">
                        <?php echo $sayfa; ?>
                    </a>
                </li>
                <?php
                  if($sonrakisayfa <= $sayfasayisi){
                ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo $adres.$sonrakisayfa;?>">
                        <?php echo $sonrakisayfa; ?>
                    </a>
                </li>
                <?php
               
                ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo $adres.$sonrakisayfa;?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                <?php 
                    }
                ?>
            </ul>
        </nav>

  </div>

  <hr>
  <?php
Footer();
sayfaAlt(); ?>
