<?php
error_reporting(0);
  if(!isset($_POST["buton1"])){
      echo"Lütfen, Önce Formu doldurunuz!";
      header('Location:kayit.php?hata=1');
      exit;
  }
    
    
        $kad=$_POST["ad"];
        $ksoyad=$_POST["soyad"];
        $mail=$_POST["eposta"];
        $sifre=$_POST["sifre"];
        $sifre2=$_POST["sifre2"];
    
    //epostayı kontrol edelim
    if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
           header('Location:kayit.php?hata=2');
    }
   //boşlukları temizleyelim
   $kad=trim($kad);
    
   // isim boş mu
    if(empty($kad)){
        header('Location:kayit.php?hata=3');
        exit;
    } 
    if(empty($ksoyad)){
        
         header('Location:kayit.php?hata=4');
        exit;
    } 
    
    //İsim en az 3 karakter
    if(strlen($kad)<3){
      
         header('Location:kayit.php?hata=5');
        exit;
    }
 //Soyad en az 3 karakter
    if(strlen($ksoyad)<3){
        
         header('Location:kayit.php?hata=6');
        exit;
    }
    //şifre en az 3 karakter
    if(strlen($sifre)<3){
        
         header('Location:kayit.php?hata=7');
        exit;
    }
    
    //sifre ve sifre2 aynı mı
    if($sifre !== $sifre2){
        
         header('Location:kayit.php?hata=8');
        exit;
    }
    //şifreyi sifreyelelim kripto
    $sifreyeni= password_hash($sifre,PASSWORD_DEFAULT);
    
    //echo $sifreyeni;
       include "inc/vtbaglan.inc.php";

        //GENEL TEMİZLİK- VT BAĞLANTISI YAPILDIKTAN SONRA YAPILMALI
        $kad = $vt->real_escape_string($kad);
         $ksoyad = $vt->real_escape_string($ksoyad);
         $mail = $vt->real_escape_string($mail);
    
        $sql = "INSERT INTO uye (ad, soyad, eposta, sifre, kayitzamani) VALUES ('$kad', '$ksoyad', '$mail', '$sifreyeni', current_timestamp())";
        if ($vt->query($sql) === true) {
            echo("<script LANGUAGE='JavaScript'>
            window.alert('Kaydınız Başarıyla yapıldı,Lütfen Giriş yapınız.');
            window.location.href='giris.php';
            </script>");
        }
        else
        {
          $mesaj = $vt->error;
            $mesaj .= "  <br/> SQL: $sql" ;
            error_log($mesaj);//hata dosyasını direk olarak katdediyor.
            exit;
        }


       include "inc/vtkes.inc.php"
        ?>
