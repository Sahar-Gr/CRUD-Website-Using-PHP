<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <ul id="MenuItems">
                        <li><a href="index.php">Page d'acceuil</a></li>
                        <li><a href="contact.php">Contactez-nous</a></li>
                    </ul>
                </nav>
                <div id="hamburgerMenu" class="hamburger-menu">
                    <span>&#9776;</span>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-box">
                        <?php
                            require('./conection.php');
                            if (isset($_POST['signUP_button'])) {
                                $name = $_POST['name'];
                                $lastName = $_POST['lastName'];
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                $confPassword = $_POST['confiPassword'];
                                if (!empty($_POST['name']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                                    if ($password == $confPassword) {
                                        $p = crud::conect()->prepare('INSERT INTO crudtable(name,lastName,email,pass) VALUES(:n,:l,:e,:p)');
                                        $p->bindValue(':n', $name);
                                        $p->bindValue(':l', $lastName);
                                        $p->bindValue(':e', $email);
                                        $p->bindValue(':p', $password);
                                        $p->execute();
                                        echo 'Utilisateur ajoute avec succes!';
                                    } else {
                                        echo 'Mot de passe incorrect!';
                                    }
                                }
                            }
                        ?>
                        <div class="form">
                            <form action="" method="post" class="login-form">
                                <center><h1 class="main-heading">Inscription</h1></center>
                                <input type="text" name="name" placeholder="Nom"/>
                                <input type="text" name="lastName" placeholder="Nom de famille"/>
                                <input type="email" name="email" placeholder="Email"/>
                                <input type="password" name="password" placeholder="Mot de passe"/>
                                <input type="password" name="confiPassword" placeholder="Confirmer le mot de passe"/>
                                <input type="submit" value="Inscription" name="signUP_button">
                                <p class="parag">Avez-vous un compte ?<a href="./login.php"> S'identifier</a></p>
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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        $('.message a').click(function() {
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });

        // Toggle the menu for mobile view
        $('#hamburgerMenu').click(function() {
            $('#MenuItems').toggle();
        });
    </script>
</body>
</html>
