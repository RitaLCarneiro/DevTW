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
        $nomeAviso=""; $emailAviso=""; $passAviso=""; $confPassAviso="";
        require("./connection.php");
        if (isset($_POST['Registo_btn'])){
            $nome=$_POST['nome'];
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $confPass=$_POST['confPass'];
            $tipo=0;
            $aboutMe="";
            $existe=false;

            if (empty($_POST['nome'])){
                $nomeAviso="Este campo não pode ser vazio!";
            }
            if (empty($_POST['email'])){
                $emailAviso="Este campo não pode ser vazio!";
            }
            if (empty($_POST['pass'])){
                $passAviso="Este campo não pode ser vazio!";
            }
            if (empty($_POST['confPass'])){
                $confPassAviso="Este campo não pode ser vazio!";
            }

            if (!empty($_POST['nome'])&&!empty($_POST['email'])&&!empty($_POST['pass'])&&!empty($_POST['confPass'])){
                $conn=ladybook::connect()->prepare("SELECT * FROM users");
                $conn->execute();
                $users=$conn->fetchAll(PDO::FETCH_ASSOC);
                $colNum=$conn->columnCount();
                foreach($users as $user){
                    for($i=0;$i<$colNum;$i++){
                        if($i==1){
                            $colMeta = $conn->getColumnMeta($i);
                            $colNome = $colMeta['name'];
                            if($user[$colNome]==$nome){
                                $existe=true;
                                $nomeAviso="Este nome já está em uso. Por favor escolha outro!";
                            }
                        }
                        if($i==2){
                            $colMeta = $conn->getColumnMeta($i);
                            $colNome = $colMeta['name'];
                            if($user[$colNome]==$email){
                                $existe=true;
                                $emailAviso="Este e-mail já está em uso. Por favor escolha outro!";
                            }
                        }
                    }
                }

                if($existe==true){
                }else if($pass==$confPass && $existe==false){
                    $stmt=ladybook::connect()->query("SELECT COUNT(*) AS count FROM users");
                    $row=$stmt->fetch(PDO::FETCH_ASSOC);
                    $new=ladybook::connect()->prepare('INSERT INTO users(idUser,name,email,tipo,passwords,aboutMe) VALUES(:i,:n,:e,:t,:p,:a)');
                    $new->bindValue(':i',$row['count']);
                    $new->bindValue(':n',$nome);
                    $new->bindValue(':e',$email);
                    $new->bindValue(':t',$tipo);
                    $new->bindValue(':p',$pass);
                    $new->bindValue(':a',$aboutMe);
                    $new->execute();
                    $_SESSION['email'] = $email;
                    header("Location: Livraria.php");
                    exit();
                }else{
                    $passAviso="As palavras passes não são iguais!";
                    $confPassAviso="As palavras passes não são iguais!";
                }
            }
        }

        if (isset($_POST['Cancelar_btn'])){
            header("Location: Livraria.php");
            exit();
        }
    ?>
    <div class="container">
        <div class="row"><img src="assets/imgs/LogoBranco.png" style="max-width: 600px;margin-left: 270px;"></div>
        <br>

        <div class="row"><h3 class="up-label" style="color: white;margin-left: 270px;margin-top: 200;">Registar</h3></div>
        <div class="row">
            <div style="max-width: 800px;margin-top: 0px;margin-left: 270px;">
                <form action="" method="post">
                    <div class="mb-3 justify-content-center">
                        <label for="exampleInputName" class="form-label" style="color: white;">Nome Utilizador</label>
                        <label class="form-warning"><?php echo $nomeAviso; ?></label>
                        <input type="name" class="form-control" name="nome">
                    </div>  
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
                    <div class="mb-3 justify-content-center">
                        <label for="exampleInputPassword1" class="form-label" style="color: white;">Confirmar Password</label>
                        <label class="form-warning"><?php echo $confPassAviso; ?></label>
                        <input type="password" class="form-control" name="confPass">
                    </div>

                    <input type="submit" name="Registo_btn" value="Entrar" class="btn btn-warning btn-lg active" aria-pressed="true" style="margin-left: 35%;">
                    <input type="submit" name="Cancelar_btn" value="Cancelar" class="btn btn-warning btn-lg active" aria-pressed="true" style="margin-left: 10px;">
                    <!--<a name="Registo_btn" class="btn btn-warning btn-lg active" role="button" aria-pressed="true" style="margin-left: 35%;">Entrar</a>
                    <a href="login.html" class="btn btn-warning btn-lg active" role="button" aria-pressed="true" style="margin-left: 10px;" >Cancelar</a>-->
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>