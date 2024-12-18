<?php
	function generateRow(){
		$contents = '';
        session_start();
        $con = mysqli_connect("localhost","root","","data");
		//use for MySQLi Procedural
        $sql="SELECT `id`, `NomPrenon`, `Date_entree`, `Medecin`, `Pilules`, `Num_chambre`, `Mesures`, `profile` FROM `tb_data`";
		$query = mysqli_query($con, $sql);
		 while($row_fetch = mysqli_fetch_assoc($query)){
		 	$contents .= "
		 	<tr>
             <td>".$row_fetch['id']."</td>
             <td>".$row_fetch['NomPrenon']."</td>
             <td>".$row_fetch['Date_entree']."</td>
             <td>".$row_fetch['Medecin']."</td>
             <td>".$row_fetch['Pilules']."</td>
             <td>".$row_fetch['Num_chambre']."</td>
             <td>".$row_fetch['Mesures']."</td>
             

             </tr>
	";
		// }

		}
		////////////////
 
		//use for MySQLi Procedural
		// $query = mysqli_query($conn, $sql);
		// while($row = mysqli_fetch_assoc($query)){
		// 	$contents .= "
		// 	<tr>
		// 		<td>".$row['id']."</td>
		// 		<td>".$row['firstname']."</td>
		// 		<td>".$row['lastname']."</td>
		// 		<td>".$row['address']."</td>
		// 	</tr>
		// 	";
		// }
		////////////////
 
		return $contents;
	}
 
	require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Generated PDF using TCPDF");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	<h2 align="center">Tableau des Patients</h2>
 
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="5%">ID</th>
				<th width="20%">NomPrenon</th>
				<th width="20%">Lastname</th>
				<th width="10%">Medecin</th> 
                <th width="20%">Pilules</th>
                <th width="10%">NumCH</th>
                <th width="10%">Mesures</th>

           
           </tr>  
      ';  
    $content .= generateRow();  
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('TableauDePatients.pdf', 'I');
 
 
?>
