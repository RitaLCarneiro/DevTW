<?php 
    class ladybook{
        public static function connect(){
            try{
                $con = new PDO('mysql:localhost=host;dbname=ladybook','root','');
                return $con;
            }catch(PDOException $e){
                echo $e->getMessage();
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }
?>