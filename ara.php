<?php
session_start();
//Eğer dosyayı bulamassa sonlandırcak require
require "fonksiyonlar.php";
sayfaUN("ara");
?>




  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/brownie.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Ne yapmak istersiniz?</h1>
            <span class="subheading">Hemen yapmak istediğin yemeği ara tarifi anında karşında...</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
         <form class="form-inline my-2 my-lg-0" action="liste.php" method="get">
           <input class="form-control form-control-lg mr-sm-2 " name="araifade" type="tect" placeholder="Yemek Ara" aria-label="Search" size="50">
          <button class="btn btn-sm btn-info my-2 my-sm-0" type="submit">Arama</button>
          </form>
         
      </div>
    </div>
  </div>

  <hr>



 
<?php
Footer();
 sayfaAlt();
 ?>