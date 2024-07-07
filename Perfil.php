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
        $connUsers = ladybook::connect()->prepare("SELECT * FROM users WHERE email = :email");
        $email=$_SESSION['email'];
        $connUsers->bindValue(':email',$email);
        $connUsers->execute();
        $users=$connUsers->fetchAll(PDO::FETCH_ASSOC);
        $user=$users[0];

        $nome=$user['name'];
        $aboutMe=$user['aboutMe'];
        $aboutMeJSON = ["aboutMe" => $aboutMe];
        file_put_contents('aboutMe.json', json_encode($aboutMeJSON));

        $connLivros = ladybook::connect()->prepare("SELECT livros.nome, livros.isbn FROM livros 
        INNER JOIN livrouser ON livros.idLivro = livrouser.idLivro
        INNER JOIN users ON livrouser.idUser = users.idUser
        WHERE users.idUser = :idUser;");
        $connLivros->bindValue(':idUser',$user['idUser']);
        $connLivros->execute();
        $livros=$connLivros->fetchAll(PDO::FETCH_ASSOC);
        $jsonLivros=json_encode($livros,JSON_PRETTY_PRINT);
        file_put_contents('livros.json', $jsonLivros);
        
        if (isset($_POST['Perfil_btn'])){
          if(empty($_SESSION['email'])){
            header("Location: login.php");
            exit();
          }else{
            header("Location: Perfil.php");
            exit();
          }
        }

        if (isset($_POST['aboutMe_conf'])){
          $novoAboutMe=$_POST['aboutMe_new'];
          $updateAboutMe = ladybook::connect()->prepare("UPDATE users SET aboutMe = :novo_aboutMe WHERE email = :email");
          $updateAboutMe->bindValue(':novo_aboutMe',$novoAboutMe);
          $updateAboutMe->bindValue(':email',$email);
          $updateAboutMe->execute();
          header("Location: Perfil.php");
          exit();
        }
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
  
          <form class="d-flex justify-content-right" method="post">
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
                    <h1 class="PageTitle" style="color:white;margin-left: -60px;">Profile</h1>
                </div>
            </div>
      </div>
      
    </div>
    <!--Conteúdo da página em si-->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3" style="max-width: 750px;height: 250px; margin-top: 70px;border: none;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="assets/imgs/user.png "style="max-width: 200px;" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                            <h3><?php echo $nome; ?></h3>
                            <h6>@<?php echo $nome; ?></h6>
                            <div class="row g-0">
                                <div class="col-md-1">
                                    <img style="width: 20px;height: 20px;margin-left: 10px;" src="assets/icons/email.svg" alt="">
                                </div>
                                <div class="col-md-2">
                                    <h6 style="margin-top: 5px;">Email:</h6>
                                </div>
                                <div class="col-md-6">
                                    <p style="margin-top: 5px;font-size:small;"><?php echo $email; ?></p>
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-md-1">
                                    <img style="width: 20px;height: 20px;margin-left: 10px;" src="assets/icons/settings.svg" alt="">
                                </div>
                                <div class="col-md-2">
                                    <h6 style="margin-top: 5px;">Settings </h6>
                                </div>
                              
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

            <!-- Setor do About Me do utilizador (verificar eficiência de JS) -->
            <div class="col-md-4" style="margin-top: 40px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <h3 style="margin-top: 5px;">About me: </h3>
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                    <button onclick="editAboutMe()" class="btn btn-sm btn-icons btn-outline-dark h6" name="AboutMe_btn" id="AboutMe_btn" role="button">
                      <i class="bi bi-pencil-square letter-colors">Editar</i>
                    </button>
                  </div>
                </div>
                <div class="row g-0">
                    <div class="aboutMeText" name="AboutMe_text" id="AboutMe_text">
                      <?php echo $aboutMe; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8" style="margin-top: 50px;">
                <div style="background-color: #f5e8aa; width: 800px;max-height: 380px;border-radius: 10px;">
                    <div class="row g-0">
                        <div class="col-md-1" style="margin-top: 30px;"><img src="assets/icons/favs.svg" style="width: 30px;height: 30px;margin-left: 20px;"></div>
                        <div class="col-md-3" style="margin-top: 30px;"><h5>My Books</h5></div>
                    </div>
                    <!--Lista de livros dentro da div My Books-->
                    <div class="row g-0" id="myBooks" style="justify-content:center">

                    </div>
                </div>
            </div>
            <!--Início da div que representa a parte My Genres-->
            <div class="col-md-4"style="margin-top: 50px;">
                <div style="background-color: #f5e8aa; width: 400px;height: 380px;border-radius: 10px;">
                    <div class="row g-0">
                        <div class="col-md-1" style="margin-top: 30px;"><img src="assets/icons/genres.svg" style="width: 30px;height: 30px;margin-left: 20px;"></div>
                        <div class="col-md-4" style="margin-top: 30px;margin-left: 35px;"><h5>My Genres:</h5></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    
  
  </body>
</html>