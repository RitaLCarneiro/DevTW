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
   <script src="novoLivro.js"></script>
  </head>
  <body>

  <?php
        session_start();
        require("./connection.php");
        
    /*if (isset($_POST['Envio_btn'])){

    }*/

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
                    <img src="assets/icons/user_branco.svg" style="width: 40px;height: 40px; margin-top: 5px;">
                </div>
                <div class="col-md-3">
                  <h1 class="PageTitle" style="color:white;margin-left: -60px;"></h1>
                </div>
            </div>
      </div>
      
    </div>
    <!--Conteúdo da página em si-->
    <div class="container">
        <div class="row">
        <div style="max-width: 800px;margin-top: 0px;margin-left: 270px;">
                <form action="" method="post">
                    <div class="mb-3 justify-content-center">
                        <label class="form-label" style="color: black;">Insira o ISBN do livro que deseja adicionar.</label>
                        
                        <input type="number" min="9780000000000" max="9789999999999" class="form-control" id="isbn" name="isbn">
                    </div>  
                    <!--<a name="Registo_btn" class="btn btn-warning btn-lg active" role="button" aria-pressed="true" style="margin-left: 35%;">Entrar</a>
                    <a href="login.html" class="btn btn-warning btn-lg active" role="button" aria-pressed="true" style="margin-left: 10px;" >Cancelar</a>-->
                </form>
                <button onclick="AddBook()" name="Envio_btn" class="btn btn-warning btn-lg active" aria-pressed="true" style="margin-left: 40%;">
                    Adicionar
                </button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    
  
  </body>
</html>