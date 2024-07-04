<!doctype html>
<html lang="en">
  <head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="Registo.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <title>Livraria On-Line</title>

  </head>
  <body>
    <?php
        /*require("./connection.php");
        if (isset($_POST['Registo_btn'])){
            $nome=$_POST['nome'];
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $confPass=$_POST['confPass'];
            if (empty($_POST['nome']){
                
            }
        }*/
    ?>
    <div class="container">
        <div class="row"><img src="assets/imgs/LogoBranco.png" style="max-width: 600px;margin-left: 270px;"></div>
        <br>

        <div class="row"><h3 class="label" style="color: white;margin-left: 270px;margin-top: 200;">Registar</h3></div>
        <div class="row">
            <div style="max-width: 800px;margin-top: 0px;margin-left: 270px;">
                <form>
                    <div class="mb-3 justify-content-center">
                        <label for="exampleInputName" class="form-label" style="color: white;">Nome Utilizador</label>
                        <input type="name" class="form-control" id="exampleInputName">
                        <label class="form-warning" id="nomeAviso">aaaaaaaa</label>
                    </div>  
                    <div class="mb-3 justify-content-center">
                        <label for="exampleInputEmail1" class="form-label" style="color: white;">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 justify-content-center">
                        <label for="exampleInputPassword1" class="form-label" style="color: white;">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 justify-content-center">
                        <label for="exampleInputPassword1" class="form-label" style="color: white;">Confirmar Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <a href="Livraria.html" class="btn btn-warning btn-lg active" role="button" aria-pressed="true" style="margin-left: 35%;">Entrar</a>
                    <a href="login.html" class="btn btn-warning btn-lg active" role="button" aria-pressed="true" style="margin-left: 10px;" >Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>