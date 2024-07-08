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

  </head>
  <body onload="getBookMV('9780062059932'); getBookRA('9780062059932'); createCookie();">

  <?php
    session_start();
    require("./connection.php");

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
    <!--Componente do Header-->
    <div class="container-fluid" id="headerbackground" >
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
      <img src="assets/imgs/LogoBranco.png" id="mainLogo">
    </div>

    <!--Componente da Página Inicial-->

    <!--Livros mais vistos-->
    <div class="row">
      <div class="col-md-12 books">
        <div class="container-fluid">
          <i class="bi bi-star-fill letter-colors">Most Viewed</i>
          <div class="container-fluid" >
            <div class="row">
              <div class="col-md menu-padding-books menu-padding-buttons align-self-center">
                <button onclick="buttonBarMV()" class="btn btn-icons btn-outline-dark " type="button" >
                  <i class="bi bi-chevron-left icon-big" ></i>
                </button>
              </div>
              <div class="col-md menu-padding-books">
                <div class="card" style="width: 9rem;background-color: #f5e8aa; border: none;border-radius: 10px;margin-top: 10px;">
                  <img class="card-img-top" src="assets/imgs/testCovers.jpg" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title" >Título Livro</h4>
                    <p class="card-text" >Nome do Autor</p>
                  </div>
                </div>
              </div>
              <div class="col-md menu-padding-books">
                <div class="card" style="width: 9rem;background-color: #f5e8aa; border: none;border-radius: 10px;margin-top: 10px;">
                  <img class="card-img-top" src="assets/imgs/testCovers.jpg" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title" >Título Livro</h4>
                    <p class="card-text" >Nome do Autor</p>
                  </div>
                </div>
              </div>
              <div class="col-md menu-padding-books">
                <div class="card" style="width: 9rem;background-color: #f5e8aa; border: none;border-radius: 10px;margin-top: 10px;">
                  <img class="card-img-top" src="assets/imgs/testCovers.jpg" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title" >Título Livro</h4>
                    <p class="card-text" >Nome do Autor</p>
                  </div>
                </div>
              </div>
              <div class="col-md menu-padding-books">
                <div class="card" style="width: 9rem;background-color: #f5e8aa; border: none;border-radius: 10px;margin-top: 10px;">
                  <img class="card-img-top" src="assets/imgs/testCovers.jpg" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title" >Título Livro</h4>
                    <p class="card-text" >Nome do Autor</p>
                  </div>
                </div>
              </div>
              <div class="col-md menu-padding-books">
                <div class="card" style="width: 9rem;background-color: #f5e8aa; border: none;border-radius: 10px;margin-top: 10px;">
                  <img class="card-img-top" src="assets/imgs/testCovers.jpg" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title" >Título Livro</h4>
                    <p class="card-text" >Nome do Autor</p>
                  </div>
                </div>
              </div>
              <div class="col-md menu-padding-books menu-padding-buttons align-self-center">
                <button onclick="buttonBarMV()" class="btn btn-icons btn-outline-dark" type="button">
                  <i class="bi bi-chevron-right icon-big"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!--Adicionados recentemente-->
    <div class="row">
      <div class="col-md-12 books">
        <div class="container-fluid">
          <i class="bi bi-pencil-square letter-colors">Recently Added</i>
          <div class="container-fluid" >
            <div class="row">
              <div class="col-md menu-padding-books menu-padding-buttons align-self-center">
                <button onclick="buttonBarRA()" class="btn btn-icons btn-outline-dark " type="button" >
                  <i class="bi bi-chevron-left icon-big" ></i>
                </button>
              </div>
              <div class="col-md menu-padding-books">
                <div class="card" style="width: 9rem;background-color: #f5e8aa; border: none;border-radius: 10px;margin-top: 10px;">
                  <img class="card-img-top" src="assets/imgs/testCovers.jpg" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title" >Título Livro</h4>
                    <p class="card-text" >Nome do Autor</p>
                  </div>
                </div>
              </div><div class="col-md menu-padding-books">
                <div class="card" style="width: 9rem;background-color: #f5e8aa; border: none;border-radius: 10px;margin-top: 10px;">
                  <img class="card-img-top" src="assets/imgs/testCovers.jpg" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title" >Título Livro</h4>
                    <p class="card-text" >Nome do Autor</p>
                  </div>
                </div>
              </div><div class="col-md menu-padding-books">
                <div class="card"  style="width: 9rem;background-color: #f5e8aa; border: none;border-radius: 10px;margin-top: 10px;">
                  <img class="card-img-top" src="assets/imgs/testCovers.jpg" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title" >Título Livro</h4>
                    <p class="card-text" >Nome do Autor</p>
                  </div>
                </div>
              </div><div class="col-md menu-padding-books">
                <div class="card" style="width: 9rem;background-color: #f5e8aa; border: none;border-radius: 10px;margin-top: 10px;">
                  <img class="card-img-top" src="assets/imgs/testCovers.jpg" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title" >Título Livro</h4>
                    <p class="card-text" >Nome do Autor</p>
                  </div>
                </div>
              </div><div class="col-md menu-padding-books">
                <div class="card" style="width: 9rem;background-color: #f5e8aa; border: none;border-radius: 10px;margin-top: 10px;">
                  <img class="card-img-top" src="assets/imgs/testCovers.jpg" alt="Card image">
                  <div class="card-body">
                    <h4 class="card-title" >Título Livro</h4>
                    <p class="card-text" >Nome do Autor</p>
                  </div>
                </div>
              </div>
              <div class="col-md menu-padding-books menu-padding-buttons align-self-center">
                <button onclick="buttonBarRA()" class="btn btn-icons btn-outline-dark" type="button">
                  <i class="bi bi-chevron-right icon-big"></i>
                </button>
              </div>
            </div>
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

  <script src="livraria.js">
  </script>

</html>