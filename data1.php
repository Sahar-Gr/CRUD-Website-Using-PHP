
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">

    <title>Tableau de patients</title>
</head>
<body>
<div class="full-page">
        <div class="sub-page">
            <div class="navigation-bar">
                <div class="logo">
                <p><img src="img/317211660_1202032917065995_602281709439136149_n (1).png" alt="Logo SmartNurse" id="logoImg" />SMART NURSE                 <button><a href="print_pdf.php" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> PDF</a><br></button></p> 

              
                </div>
                <nav>
                    <ul id='MenuItems'>
                        <li><a href='index.php'>Page d'acceuil</a></li>
                        <li><a href='contact.php'>Contactez-nous</a></li>
                        <li><a href='index2.php'>Ajouter Un Patient</a></li>
                        <li><a href='login.php'>Deconnexion</a></li>


                    </ul>
                </nav>
            </div>
<div class="data">
        <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom et Prenon</th>
                <th>Date entree</th>
                <th>Medecin</th>
                <th>Pilules</th>
                <th>Numero de la chambre</th>
                <th>Mesures necessaires</th>
                <th>Photo</th>
                <th>Operations</th>

</tr>  
</thead>
<tbody>
    <?php
    session_start();
    $con = mysqli_connect("localhost","root","","data");
$query="SELECT `id`, `NomPrenon`, `Date_entree`, `Medecin`, `Pilules`, `Num_chambre`, `Mesures`, `profile` FROM `tb_data`";
$result=mysqli_query($con,$query);
   while ($row_fetch=mysqli_fetch_assoc($result)){
    echo"
    <tr>
    <td>".$row_fetch['id'],"</td>
    <td>".$row_fetch['NomPrenon'],"</td>
    <td>".$row_fetch['Date_entree'],"</td>
    <td>".$row_fetch['Medecin'],"</td>
    <td>".$row_fetch['Pilules'],"</td>
    <td>".$row_fetch['Num_chambre'],"</td>
    <td>".$row_fetch['Mesures'],"</td>
    <td><img src=' $row_fetch[profile]' width='80px'></td>
    <td>
    <button ><a href='Update.php?updateid=".$row_fetch['id']."' ><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
  </svg></a></button>
    <button class='btn btn_danger'><a href='Delete.php?deleteid=".$row_fetch['id']."'><svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
    <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
  </svg></a></button>
    </td>



    </tr>
    ";
   }

?>
</div>
</div>
</tbody>
</table>
</body>
</html>