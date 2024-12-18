<?php
    class crud {
        public static function conect(){
            try{
                $con=new PDO('mysql:host=localhost;dbname=crudcdio;port=3306','root','') ;
            
                return $con;

            } catch(PDOException $error1){
            echo 'Erreur detecte,il n est pas possible de se connecter a la base de donnee! '.$error1->getMessage();
        }catch(Exception $error2){  
            echo 'Erreur generale! ' .$error2 ->getMessage();
            }





        }
    }

?>