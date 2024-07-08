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
   <script src="lista.js"></script>
   <title>Livraria On-Line</title>
   
  </head>
  <body>

    <?php
        session_start();
        require("./connection.php");
    
        $connUsers = ladybook::connect()->prepare("SELECT * FROM users WHERE email = :email");
        $email=$_SESSION['email'];
        $connUsers->bindValue(':email',$email);
        $connUsers->execute();
        $users=$connUsers->fetchAll(PDO::FETCH_ASSOC);
        $user=$users[0];

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
                    <img src="assets/icons/tab_branco.svg" style="width: 40px;height: 40px; margin-top: 5px;">
                </div>
                <div class="col-md-3">
                    <h1 style="color:white;margin-left: -60px;">My Collection</h1>
                </div>
            </div>
      </div>
    </div>
      <!--Conteúdo da página em si-->
      <br>
      <div class="container">
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-1">
                <br>
                <img style="width:50px ;height:50px ;margin-left: 50px;" src="assets/icons/wishlist.svg" alt="">
            </div>
            <div class="col-md-4">
                <h3 style="margin-top: 33px;">Favoritos:</h3>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md">
                <div class="row" id="livros">

                </div>
            </div>
            <div class="col-md">
                <div class="row justify-content-right" id="favoritos">
                    
                </div>
            </div>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>