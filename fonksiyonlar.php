<?php
function sayfaAlt(){
    echo <<<EOT
    <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
EOT;
}
function style(){
    echo <<<STYLE
    <style>
            #username{
                width: calc(100% - 5px);
                height: 40px;
            }
            #comment{
                width: calc(100% - 5px);
                height:150px;
            }
            #submit{
                height:10px;
                width:22%;
                background-color:tan;
                color:white;
                font-size:15px;
                display:block;
                align-content:center;
                margin-bottom: auto;
            }
            .comments{
                width: calc(100% - 5px);
                list-style:none;
                padding:0px;
                margin:0px;
                margin-top:10px;
            }
            
            .btn {
                  font-size: 14px;
                  font-weight: 800;
                  padding: 20px 25px;
                  letter-spacing: 1px;
                  text-transform:uppercase;
                  border-radius: 0;
                  font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
                margin-bottom: auto;
         }

                .btn-primary {
                  background-color: #0085A1;
                  border-color: #0085A1;
                }

                .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
                  color: #fff;
                  background-color: #00657b !important;
                  border-color: #00657b !important;
                }
            
        </style>   
STYLE;
}

function Footer(){
    echo  <<<FOTER
            <!-- Footer -->
              <footer>
                <div class="container">
                  <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                      <ul class="list-inline text-center">
                        <li class="list-inline-item">
                          <a href="https://twitter.com/">
                            <span class="fa-stack fa-lg">
                              <i class="fas fa-circle fa-stack-2x"></i>
                              <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="https://tr-tr.facebook.com/">
                            <span class="fa-stack fa-lg">
                              <i class="fas fa-circle fa-stack-2x"></i>
                              <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a href="https://github.com/">
                            <span class="fa-stack fa-lg">
                              <i class="fas fa-circle fa-stack-2x"></i>
                              <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
                        </li>
                      </ul>
                      <p class="copyright text-muted"> MakeFoods &copy; Your Website 2020</p>
                    </div>
                  </div>
                </div>
              </footer>
    FOTER;
}

function sayfaUN($sayfa="anasayfa"){
   echo <<<UST
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>MakeFoods</title>
   <!-- Bootstrap core CSS -->
   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <!-- Custom fonts for this template -->
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
   <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">
 </head>
 <body>
   <!-- Navigation -->
           <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
              <a class="navbar-brand" href="index.php">MakeFoods</a>
              <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
              </button>
               <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto"> 
 UST;
                
                
             echo "<li class='nav-item" ;
             if($sayfa=="anasayfa") echo "active";
             echo "'>
                  <a class='nav-link' href='index.php'>Anasayfa</a>
                  </li>
                  <li class='nav-item";
            if($sayfa=="liste") echo "active";
            echo "'>
                    <a class='nav-link' href='liste.php'>Tarif Listesi</a>
                  </li>
                  <li class='nav-item";
            if($sayfa=="ekle") echo "active";
            echo"'>
                    <a class='nav-link' href='ekle.php'>Tarif Ekle</a>
                  </li>
                  <li class='nav-item";
            if($sayfa=="ara") echo "active";
            echo "'>
                    <a class='nav-link' href='ara.php'>Yemek Ara</a>
                  </li>";
    
            if(!isset($_SESSION["adsoyad"])){
                
                 echo "<li class='nav-item";
                if($sayfa=="giris") echo "active";
                echo "'>
                        <a class='nav-link' href='giris.php'>Giriş</a>
                       </li>
                      <li class='nav-item";
                if($sayfa=="kayit") echo "active";
                echo"'>
                      <a class='nav-link' href='kayit.php'>Kayıt Ol</a>
                     </li>";
              }
              
              else{  

                   echo "<li class='nav-item'>
                        <a class='nav-link'>";
                   echo htmlspecialchars($_SESSION['adsoyad']);
                   echo "  </a>
                      </li>
                       <li class='nav-item'>
                         <a class='nav-link' href='cikis.php'>Çıkış</a>
                      </li>";
                  
                 }
                 echo "</ul>
              </div>
          </nav> ";
      
}

?>