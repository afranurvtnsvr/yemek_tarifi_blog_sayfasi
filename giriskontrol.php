<?php
session_start();
error_reporting(0);// var olan hatalrı gözükmemesini sağlıyor
  if(!isset($_POST["buton2"])){
      header('Location:giris.php');
      exit;
  }
        $mail=$_POST["eposta"];
        $sifre=$_POST["sifre"];
      
    
       include"inc/vtbaglan.inc.php";

        //GENEL TEMİZLİK- VT BAĞLANTISI YAPILDIKTAN SONRA YAPILMALI 
         $mail = $vt->real_escape_string($mail);
    
        $sql = "SELECT * FROM uye WHERE eposta like '$mail'";
        $sonuc=$vt->query($sql);

        if ($vt->error) {
            $mesaj = $vt->error;
            $mesaj .= "  <br/> SQL: $sql" ;
            error_log($mesaj);//hata dosyasını direk olarak katdediyor.
            exit;
        }
        include"inc/vtkes.inc.php";
       if($sonuc->num_rows){
              //Şifre karşılaştır
              $satir=$sonuc->fetch_assoc();      
              if(password_verify($sifre,$satir["sifre"])){ //Giriş doğruysa
                  header('Location:liste.php');
                  $_SESSION["adsoyad"] = $satir["ad"]." ".$satir["soyad"];
                  $_SESSION["eposta"] = $satir["eposta"];
                  
              }  
             else{ //Şifre Yanlışsa
                  
                 header('Location:giris.php?hata=1');
                exit;
              }
         
        }
        else{ //Böyle bir eposta yoksa
          header('Location:giris.php?hata=1');
           exit;

        }
      
         
        ?>
