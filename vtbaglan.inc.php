 <?php
        $vt = new mysqli("localhost", "root", "", "kitapproje");

        if ($vt->connect_errno) {
            printf("Bağlantı kurulamadı: %s\n", $vt->connect_error);
            exit;
        }
    
        $vt->set_charset('utf8');
        if($vt->error){
            die("karakter kodlaması düzgün olarak yapılamıyor.!");
            
        }
?>