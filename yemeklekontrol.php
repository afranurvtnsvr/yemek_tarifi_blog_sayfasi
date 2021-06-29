<?php
session_start();
error_reporting(0);
//Giriş yaptı mı
if(!isset($_SESSION["eposta"])){
   echo("<script LANGUAGE='JavaScript'>
            window.alert('Yemek Paylaşmak için önce Giriş yapınız.');
            window.location.href='giris.php';
            </script>");
            exit;
}
//eklemek istediği dosya cok büyükse(8mb+) ve formdan geliyorsam
  if(!isset($_POST["butonekle"])){
      echo("<script LANGUAGE='JavaScript'>
            window.alert('Form bilgilerine ulaşılamadı.');
            window.location.href='ekle.php';
            </script>");
            exit;
  }

//Formdan geliyor mu Dosya büyüklüğü hatası olursa 2mb-8mb arası
if($_FILES["dosya"]["error"]){
   echo("<script LANGUAGE='JavaScript'>
            window.alert('Form bilgilerine ulaşılamadı.');
            window.location.href='ekle.php';
            </script>");
            exit;
}
//Dosya Türü istediğim giibi mi?
if($_FILES["dosya"]["type"]!="image/jpeg") {
  echo("<script LANGUAGE='JavaScript'>
            window.alert('Form bilgilerine ulaşılamadı.');
            window.location.href='ekle.php';
            </script>");
            exit;
}

        $tarif=$_POST["tarif"];
        $baslik=$_POST["baslik"];
// boslukları temizleyelim
$baslik=trim($baslik);
$tarif=trim($tarif);

//baslik boş mu?
if(empty($baslik)){
    echo("<script LANGUAGE='JavaScript'>
            window.alert('Başlık boş olamaz.');
            window.location.href='ekle.php';
            </script>");
            exit;
}
//önce vt bağlanmalıyız
include "inc/vtbaglan.inc.php";


//tırnaklar kullanıldıysa Genel temizlik
$baslik=$vt->real_escape_string($baslik);
$tarif=$vt->real_escape_string($tarif);

$dizin='yuklenenler/';
//bizim yolumuz oldu. aynı saniyede aynı dosya yükleem çook az
$yuklenecek_dosya=$dizin.time().basename($_FILES['dosya']['name']);
//yükleyen bilgisi alındı
$yukleyen=$_SESSION["eposta"];
$kategori=$_POST["kategori"];

if (!move_uploaded_file($_FILES['dosya']['tmp_name'],$yuklenecek_dosya)){
   error_log("Dosya yüklenirken bir hata oluştu,sunucuya aktarılamadı!/r/n");
    echo("<script LANGUAGE='JavaScript'>
            window.alert('Dosya taşınırken bir hata oluştu lütfen tekrar deneyiniz.');
            window.location.href='ekle.php';
            </script>");
            exit;
}

if(empty($tarif)){
    $sql = "INSERT INTO yemek VALUES (NULL, '$baslik', NULL,'$yuklenecek_dosya', current_timestamp(), '$yukleyen',$kategori)";
}else{
$sql = "INSERT INTO yemek VALUES (NULL, '$baslik', '$tarif','$yuklenecek_dosya', current_timestamp(), '$yukleyen',$kategori)";
} 
 //sorgumu giderirken
$vt->query($sql);
if ($vt->error) {
            $mesaj = $vt->error;
            $mesaj .= "  <br/> SQL: $sql" ;
            error_log($mesaj);//hata dosyasını direk olarak kaydediyor.
            exit;
        }

 include"inc/vtkes.inc.php";
header('Location:liste.php');
exit;
     
     
        ?>
