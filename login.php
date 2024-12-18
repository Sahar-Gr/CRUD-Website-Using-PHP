<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>page d'acceuil smart nurse</title>
    <link rel="stylesheet" href="style.css">
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
                    </ul>
                </nav>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-box1">
                    <?php
            require('./conection.php');
            if (isset($_POST['login_button'])) {
                $_SESSION['validate']=false;
                $name=$_POST['name'];
                $password=$_POST['password'];
                $p=crud::conect()->prepare('SELECT * FROM crudtable WHERE name=:n and pass=:p');
                $p->bindValue(':n',$name);
                $p->bindValue(':p',$password);
                $p->execute();
                $d=$p->fetchAll(PDO::FETCH_ASSOC);
                if ($p->rowCount()>0) {
                    $_SESSION['name']=$name;
                    $_SESSION['pass']=$password;
                    $_SESSION['validate']=true;
                    header('location:data1.php');
                }else {
                    echo' Assurez vous que vous etes inscrit!';
                }

        }
        ?>
    <div class="form">
    <center><h1 class="main-heading">Connexion</h1></center>

        <form action="" method="post">
            <input type="text" name="name" placeholder="Nom">
            <input type="text" name="password" placeholder="Mot de passe">
            <input type="submit" value="Connexion" name="login_button"> 
            <a href="./index.php" style="position:relative; left:50px;top:-8px; font-size:14px">Cliquer içi pour s'inscrire</a>
        </form>
			             </div>
	                </div>
                </div>
                <div class="col-1">
                    <p class='defination'>Smart Nurse...<br> Pour le bien etre des patients<br>et du personnels<br></p>
                </div>
            </div>
        </div>
    </div>
    <script src='https://code.jquery.com/jquery-3.2.1.min.js'>
    </script>
    <script>
        $('.message a').click(function(){$('form').animate({height: "toggle",opacity: "toggle"},"slow");});
    </script>
</body>
</html>