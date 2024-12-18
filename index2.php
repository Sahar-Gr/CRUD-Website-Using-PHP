<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un patient</title>
    <link rel="stylesheet" href="style5.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
</head>
<body>
    <div class="full-page">
        <div class="sub-page">
            <div class="navigation-bar">
                <nav>
                    <ul id='MenuItems'>
                        <li><a href='index.php'>Page d'acceuil</a></li>
                        <li><a href='contact.php'>Contactez-nous</a></li>
                        <li><a href='data1.php'>Tableau de patients</a></li>
                        <li><a href='login.php'>Deconnexion</a></li>


                    </ul>
                </nav>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-box">
                        
        
    
                        <div class="form">
                            <form action="" method="post" enctype="multipart/form-data" class="login-form">
                                <center><h1 class="main-heading">Ajouter un patient</h1></center>
				                 <p>Nom et Prenom</p><input type="text" name="name" placeholder="Nom et Prenom"/>
                                 <p>Date entrée</p><input type="date" name="datee" placeholder="Date entrée"/>
                                 <p>Medecin</p><input type="text" name="medecin" placeholder="medecin"/>
                                 <p>Pilules</p><input type="text" name="pilules" placeholder="pilules"/>
                                 <p>Numero de la chambre</p><input type="text" name="numero" placeholder="Numero chambre"/>
                                <p>Bilan de santé :<br>
                                    <label >Temperature  <input type="checkbox" value="Temperature" name="chk[]"/></label> 
                                            
                                            <label >Rythme cardiaque</label> 
                                            <input type="checkbox" value="Rythme" name="chk[]"/>
                                </p>
                                <label for="image">Image : </label>
      <input type="file" name="profile" > <br>
      

  
                                                                
                                 <input type ="submit" value="Ajouter" name="ajout_button"><br>                            
				            </form>

			             </div>
	                </div>
                </div>

            </div>
        </div>
    </div>
    <script src='https://code.jquery.com/jquery-3.2.1.min.js'>
    </script>
    <script>
        $('.message a').click(function(){$('form').animate({height: "toggle",opacity: "toggle"},"slow");});
    </script>

<?php
session_start();
$con = mysqli_connect("localhost","root","","data");
if (isset($_POST["ajout_button"])){
    $img_loc=$_FILES['profile']['tmp_name'];
    $img_name=$_FILES['profile']['name'];
    $nometprenon=$_POST['name'];
    $datee=$_POST['datee'];
    $medecin=$_POST['medecin'];
    $pilules=$_POST['pilules'];
    $numchambre=$_POST['numero'];
    $mesures=$_POST['chk'];

    $img_ext=pathinfo($img_name,PATHINFO_EXTENSION);


    $img_size=$_FILES['profile']['size']/(1024*1024);
    
    $img_des="Uploaded Images/".$nometprenon. "_".$img_ext ;
    if(($img_ext!='jpg')&& ($img_ext!='png')&& ($img_ext!='jpeg')&& ($img_ext!='webp')){
        echo"<script>alert('error: invalid extension');</script>";
        exit();
    }
    
    if($img_size>4){
        echo"<script>alert('Image is greater tan 4MB');</script>";
    }
    
    

    foreach($mesures as $me){
        echo "mesures: $me ; $me";
    }
    
    $query = "INSERT INTO tb_data (NomPrenon,Date_entree,Medecin,Pilules,Num_chambre,Mesures,profile) VALUES ('$nometprenon','$datee','$medecin','$pilules','$numchambre','$me','$img_des')";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        move_uploaded_file($img_loc,$img_des );
        echo"<script>alert('Successful');</script>";
    }
    else{
        echo"<script>alert('Unsuccessful');</script>";
    }


}//fin 1er if



?>





</body>
</html>