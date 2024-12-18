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
                <div class="logo">
                <p><img src="img/317211660_1202032917065995_602281709439136149_n (1).png" alt="Logo SmartNurse" id="logoImg" />SMART NURSE</p>                   
                </div>
                <nav>
                    <ul id='MenuItems'>
                        <li><a href='index.php'>Page d'acceuil</a></li>
                        <li><a href='contact.php'>Contactez-nous</a></li>
                        <li><a href='data1.php'>Tableau de patients</a></li>
                        <li><a href='data1.php'>Deconnexion</a></li>


                    </ul>
                </nav>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-box">
                        
        
    
                        <div class="form">
                            <form action="" method="post" enctype="multipart/form-data" class="login-form">
                                <center><h1 class="main-heading1">Modifier un patient</h1></center>
				                 <p>Nom et Prenom</p><input type="text" name="nometprenon" />
                                 <p>Date entrée</p><input type="date" name="datee"/>
                                 <p>Medecin</p><input type="text" name="medecin"/>
                                 <p>Pilules</p><input type="text" name="pilules"/>
                                 <p>Numero de la chambre</p><input type="text" name="numero" />
                                <p>Bilan de santé 
                                   <table>
                                    <tr>
                                        <td>Mesures necessaires</td> 
                                        <td>
                                            <input type="checkbox" value="T" name="chk[]"/>Temperature
                                            <input type="checkbox" value="R" name="chk[]"/>Rythme <br>
                                        </td>
</tr>
</table>
                                </p>
                                <label for="image">Image : </label>
      <input type="file" name="profile" > <br>
      

  
                                                                
                                 <input type ="submit" value="Modifier" name="ajout_button"><br>                            
				            </form>
                  <button>          <a href="data1.php">Voir le Tableau des patient</a> </button>

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
$id=$_GET['updateid'];
$sql="SELECT `id`, `NomPrenon`, `Date_entree`, `Medecin`, `Pilules`, `Num_chambre`, `Mesures`, `profile` FROM `tb_data` WHERE id=$id ";
$result=mysqli_query($con,$sql);
$row_fetch=mysqli_fetch_assoc($result);
$nometprenon=$row_fetch['NomPrenon'];
$datee=$row_fetch['Date_entree'];
$medecin=$row_fetch['Medecin'];
$pilules=$row_fetch['Pilules'];
$numchambre=$row_fetch['Num_chambre'];
$mesures=$row_fetch['Mesures'];
$img_des=$row_fetch['profile'] ;

if (isset($_POST["ajout_button"])){


    $img_loc=$_FILES['profile']['tmp_name'];
    $img_name=$_FILES['profile']['name'];
    $nometprenon=$_POST['nometprenon'];
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
        echo "mesures:$me;";
    }
    
    $sql="UPDATE `tb_data` SET `id`=$id,`NomPrenon`='$nometprenon',`Date_entree`='$datee',`Medecin`=' $medecin',`Pilules`=' $pilules',`Num_chambre`='$numchambre',`Mesures`=' $me',`profile`='$img_des' WHERE id=$id";
    $query_run = mysqli_query($con, $sql);
    if($query_run){
        move_uploaded_file($img_loc,$img_des );
        echo"<script>alert('Updated Successful');</script>";
    }
    else{
        echo"<script>alert('Unsuccessful');</script>";
    }


}//fin 1er if



?>





</body>
</html>