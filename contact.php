<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'accueil Smart Nurse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style2.css">
    <style>
        /* Ajout du background dans le CSS */
        .full-page {
            height: 100vh;
            width: 100%;
            background-image: url("img//contact.jpg"); /* Assurez-vous que l'image existe à ce chemin */
            background-position: center;
            background-size: cover;
            position: absolute;
        }
    </style>
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
                    <li><a href='index.php'>Page d'accueil</a></li>
                    <li><a href='contact.php'>Contactez-nous</a></li>
                </ul>
            </nav>
        </div>
        <section id="pageContent" class="text contact">
            <main>
                <form id="frmContact" action="">
                    <h1>Contactez-nous</h1>
                    <div class="separation"></div>
                    <div class="corps-formulaire">
                        <div class="gauche">
                            <div class="groupe">
                                <div class="groupe">
                                    <label class="nom">Votre prénom</label>
                                    <input type="text">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class="groupe">
                                    <label class="nom">Votre Nom</label>
                                    <input type="text">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <div class="groupe">
                                    <label class="nom">Votre email</label>
                                    <input type="email" name="email" id="email" />
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="groupe">
                                    <label class="nom">Votre message</label>
                                    <textarea placeholder="Saisissez ici..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pied-formulaire" align="center">
                        <button type="submit"><a href="merci.php">Envoyer</a></button>
                    </div>
                </form>
            </main>
        </section>
       </div> 
    </div>
    <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
    <script>
        $('.message a').click(function(){$('form').animate({height: "toggle", opacity: "toggle"},"slow");});
    </script>
</body>
</html>
