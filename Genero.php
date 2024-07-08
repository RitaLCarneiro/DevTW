<!doctype html>
<html lang="en">
<head>
       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
    
       <!-- Bootstrap CSS -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
       <link rel="stylesheet" href="Livraria.css">
       <title>Livraria On-Line</title>
       <script src="genero.js"></script>
</head>

<style>
    .navbar-custom {
    background-color: #CC9A06; /* Replace with your desired background color */
    }

    .navbar-custom 
    .navbar-brand,
    .navbar-custom 
    .navbar-nav 
    .nav-link {
        color: #653208; /* Replace with your desired text color */
        padding-top:0px;
        padding-bottom: 0px;
    }

    .navbar-custom 
    .navbar-toggler-icon {
        background-color: #653208; /* Replace with your desired color for the toggler icon */
    }

    .navbar-custom 
    .navbar-toggler {
    border-color: #653208; /* Replace with your desired border color for the toggler button */
    }

    .icon-big {
        font-size: 150%;
    }

    .icon-text {
        display: flex; 
        flex-direction: column; 
        text-align: center;
        font-size: 60%;
    }

    .title{
        text-align: left;
        margin-left: -200px;
        font-weight: bold;
        font-size: 60px;
        color: #7C4D29;
    }

    .nav-link{
    margin-bottom: 20px;
    font-weight: bold;
    font-size: 20px;
    color: #996B41;
    }

    .row {
        display: flex;
        justify-content: center; 
        align-items: center;     
        flex-wrap: wrap;     
        padding: 20px;
    }
    

</style>

</head>
<body>

    <?php
        session_start();
        require("./connection.php");
    
        $connGeneros = ladybook::connect()->prepare("SELECT * FROM generos;");
        $connGeneros->execute();
        $generos=$connGeneros->fetchAll(PDO::FETCH_ASSOC);
        $jsonLivros=json_encode($generos,JSON_PRETTY_PRINT);
        file_put_contents('generos.json', $jsonLivros);

        if (isset($_POST['Perfil_btn'])){
          if(empty($_SESSION['email'])){
            header("Location: login.php");
            exit();
          }else{
            header("Location: Perfil.php");
            exit();
          }
        }
        if (isset($_POST['Livraria_btn'])){
            header("Location: Livraria.php");
            exit();
        }
        if (isset($_POST['Genres_btn'])){
            header("Location: Genero.php");
            exit();
        }
        if (isset($_POST['MyBooks_btn'])){
            header("Location: ListaUtilizador.php");
            exit();
        }
    ?>

    <div class="container-fluid" id="headerbackground">
        <nav class="navbar navbar-expand-md navbar-custom" id="nav1" >
        <div class="container-fluid">
          <form class="justify-content-left" action="" method="post">
          <button class="navbar-brand" name="Livraria_btn" style="width: 7%; height: 7%;">
            <img class="img-fluid" src="assets/imgs/Logotipo.png" >
          </button>
          </form>
          
          <form class="d-flex justify-content-right" method="post">
            <ul class="navbar-nav">
              <li class="nav-item p-1">
                <div class="icon-text">
                  <button class="btn btn-icons btn-outline-dark" name="Genres_btn" role="button">
                    <i class="bi bi-archive icon-big"></i>
                  </button>
                  Genres
                </div>
                
              </li>
              <li class="nav-item p-1">
                <div class="icon-text">
                  <button class="btn btn-icons btn-outline-dark" name="MyBooks_btn" role="button">
                    <i class="bi bi-bookmarks icon-big"></i>
                  </button>
                  My Books
                </div>
                
              </li>
              <li class="nav-item p-1">
              <div class="icon-text">
                  <button class="btn btn-icons btn-outline-dark" name="Perfil_btn" role="button">
                    <i class="bi bi-person icon-big"></i>
                  </button>
                  My Account
                </div>
                
              </li>
            </ul>
            
          </form>
        </div>
      </nav>
        <div class="container">
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-1">
                    <img src="assets/icons/genres_branco.svg" style="width: 40px;height: 40px; margin-top: 5px;">
                </div>
                <div class="col-md-3">
                    <h1 style="color:white;margin-left: -60px;">Genres</h1>
                </div>
            </div>
      </div>
    </div>
    <div class="container text-center">
    <div class="row">
      <div class="col-md-12 books">
        <div class="row" id="generos">
          
          
        </div>
      </div>
    </div>
    </div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>

</html>