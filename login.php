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
        session_start();
        $emailAviso=""; $passAviso="";
        require("./connection.php");
        if (isset($_POST['Entrar_btn'])){
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            if (empty($_POST['email'])){
                $emailAviso="Este campo não pode ser vazio!";
            }
            if (empty($_POST['pass'])){
                $passAviso="Este campo não pode ser vazio!";
            }
            if (!empty($_POST['email'])&&!empty($_POST['pass'])){
                $stmt = ladybook::connect()->prepare("SELECT * FROM users WHERE email = :email AND passwords = :pass");
                $stmt->execute(array(':email' => $email, ':pass' => $pass));
                $count = $stmt->rowCount();
                if($count > 0){
                    $_SESSION['email'] = $email;
                    header("Location: Perfil.php");
                    exit();
                }else{
                    $emailAviso = "Email ou password incorrectos.";
                    $passAviso = "Email ou password incorrectos.";
                }
            }
        }
        if (isset($_POST['Cancelar_btn'])){
            header("Location: Livraria.php");
            exit();
        }
        if (isset($_POST['Registar_btn'])){
            header("Location: Registo.php");
            exit();
        }
    ?>
    <div class="container">
        <div class="row"><img src="assets/imgs/LogoBranco.png" style="max-width: 600px;margin-left: 270px;"></div>
        <br>
        <div class="row"><h3 class="up-label" style="color: white;margin-left: 270px;margin-top: 200;">Login</h3></div>
        <div class="row">
            <div style="max-width: 800px;max-height: 500px;margin-top: 0px;margin-left: 270px;">
                <form action="" method="post">
                <div class="mb-3 justify-content-center">
                    <label for="exampleInputEmail1" class="form-label" style="color: white;">E-mail</label>
                    <label class="form-warning"><?php echo $emailAviso; ?></label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 justify-content-center">
                    <label for="exampleInputPassword1" class="form-label" style="color: white;">Password</label>
                    <label class="form-warning"><?php echo $passAviso; ?></label>
                    <input type="password" class="form-control" name="pass">
                </div>

                <input type="submit" name="Entrar_btn" value="Entrar" class="btn btn-warning btn-lg active" aria-pressed="true" style="margin-left: 35%;">
                <input type="submit" name="Cancelar_btn" value="Cancelar" class="btn btn-warning btn-lg active" aria-pressed="true" style="margin-left: 10px;">
                    
                <label class="form-label">Gostaria de criar uma conta nova no nosso website?</label>
                <input type="submit" name="Registar_btn" value="Registar" class="btn btn-warning btn-lg active" aria-pressed="true" style="margin-left: 40%;">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>