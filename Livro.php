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
    <script src="perfil.js"></script>

  </head>
  <body>

    <?php
        session_start();
        require("./connection.php");
        //Receber AJAX Livro (pls work ja vao 4 horas)
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['isbn'])) {
          $data = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING);
          $_SESSION['isbn'] = $data;
        }

        $connLivros = ladybook::connect()->prepare("SELECT * FROM livros WHERE isbn = :isbn");
        $connLivros->bindValue(':isbn', $_SESSION['isbn']);
        $connLivros->execute();
        $livros = $connLivros->fetch(PDO::FETCH_ASSOC);

        $connSugestoes = ladybook::connect()->prepare("SELECT livros.nome, livros.isbn FROM livros WHERE livros.idGenero = :idGenero;");
        $connSugestoes->bindValue(':idGenero',$livros['idGenero']);
        $connSugestoes->execute();
        $sugestoes=$connSugestoes->fetchAll(PDO::FETCH_ASSOC);
        $jsonLivros=json_encode($sugestoes,JSON_PRETTY_PRINT);
        file_put_contents('sugestoes.json', $jsonLivros);
    ?>

    <div class="container-fluid" id="headerbackground">
      <nav class="navbar navbar-expand-md navbar-custom" id="nav1">
        <div class="container-fluid">
          <a class="navbar-brand" href="Livraria.html" style="width: 5%; height: 5%;">
            <img class="img-fluid" src="assets/imgs/Logotipo.png" >
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <form class="d-flex justify-content-center">
            <input class="form-control me-2" type="text" placeholder="Search">
            <button class="btn btn-icons btn-outline-dark" type="button">
              <i class="bi-search"></i>
            </button>
          </form>
  
          <form class="d-flex justify-content-right">
            <ul class="navbar-nav">
              <li class="nav-item p-1">
                <div class="icon-text">
                  <a class="btn btn-icons btn-outline-dark" href="Género.html" role="button">
                    <i class="bi bi-archive icon-big"></i>
                  </a>
                  Genres
                </div>
                
              </li>
              <li class="nav-item p-1">
                <div class="icon-text">
                  <a class="btn btn-icons btn-outline-dark" href="ListaUtilizador.html" role="button">
                    <i class="bi bi-bookmarks icon-big"></i>
                  </a>
                  My Books
                </div>
                
              </li>
              <li class="nav-item p-1">
                <div class="icon-text">
                  <a class="btn btn-icons btn-outline-dark" href="Perfil.html" role="button">
                    <i class="bi bi-person icon-big"></i>
                  </a>
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
                <img src="assets/icons/livro_branco.svg" style="width: 40px;height: 40px; margin-top: 5px;">
            </div>
            <div class="col-md-3">
                <h1 style="color:white;margin-left: -60px;">Book</h1>
            </div>
        </div>
  </div>
    </div>

    <!--Conteúdo da página em si-->
    <div class="container">
      <br>
        <div class="row">
          <div class="col">
              
          <!-- Card para as informacoes do livro-->
            <div class="card mb-3" style="max-width: 540px; height: 300px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="<?php echo $livros['capa'];?>" class="img-thumbnail" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h3 class=""><?php echo $livros['nome'];?></h3>
                    <h4 class=""><?php echo $livros['autor'];?></h4>
                    <h6 class=""><?php echo $livros['editora'];?></h6>
                    <br>
                    <br>
                    <br>
                    <div class="row g-0">
                      <div class="col-md-4">
                          <button type="button" class="btn btn-warning" >Favorito</button>
                      </div>
                      <div class="col-md-4">  </div>
                    <div class="col-md-4">
                      <h5 class="card-text">Preço</h5>
                      <h5 class="card-text"><?php echo $livros['preco'];?> €</h5>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col">
              <h3>Synopsis</h3>
              <p><?php echo $livros['sinopse'];?></p>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-1">
            <img style="width:60px ;height:60px ;" src="assets/icons/hand-heart-svgrepo-com.svg" alt="">
          </div>
          <div class="col-md-2">
           <h3>Mais sugestões:</h3>
         </div>
        </div>
        <br>
        <!--Lista dos livros de sugestões, sugeridos por categoria-->
        <div style="background-color: #f5e8aa;border: none;border-radius: 10px;">
          <div class="row" id="sugestions">

          </div>    
        </div>
    <br>
    <br>
    <!--Início do footer-->
    <!--<footer class="footer p-5" style="background-color: #f5e8aa;">
      <div class="container" >
        <div class="row">
            <div class="col-md-3">
              <img style="width: 90px;" src="assets/imgs/logo.png" alt="">
            </div>
            <div class="col-md-8">
                <form class="d-flex justify-content-right">
                  <ul class="navbar-nav">

                    <li class="nav-item p-1">
                      <div class="icon-text">
                        <button class="btn btn-icons btn-outline-dark" type="button">
                          <i class="bi bi-house icon-big"></i>
                        </button>
                        Home
                      </div>
                      
                    </li>
              
                    <li class="nav-item p-1">
                      <div class="icon-text">
                        <button class="btn btn-icons btn-outline-dark" type="button">
                          <i class="bi bi-archive icon-big"></i>
                        </button>
                        Genres
                      </div>
                      
                    </li>
                    <li class="nav-item p-1">
                      <div class="icon-text">
                        <button class="btn btn-icons btn-outline-dark" type="button">
                          <i class="bi bi-bookmarks icon-big"></i>
                        </button>
                        My Books
                      </div>
                      
                    </li>
                    <li class="nav-item p-1">
                      <div class="icon-text">
                        <button class="btn btn-icons btn-outline-dark" type="button">
                          <i class="bi bi-person icon-big"></i>
                        </button>
                        My Account
                      </div>
                      
                    </li>
              
                  </ul>
                
              </form>
            </div>
    
        </div>
      </div>
    </footer>-->
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