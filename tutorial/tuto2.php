<?php
require('../fpdf.php');

//$mysqli = new mysqli('localhost', 'root', '', 'test');
//$query = mysqli_query($mysqli,"select * from table1	where candidatename = '".$_POST['txtCountry']."'");
//$invoice = mysqli_fetch_array($query)
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'test');

//get invoices data
$query = mysqli_query($con,"select * from table1 where candidatename = '".$_POST['txtCountry']."'");

$invoice = mysqli_fetch_array($query);
$query2 = mysqli_query($con,"select * from table2 where cliname = '".$_POST['leshope']."'");

$invoice2 = mysqli_fetch_array($query2);
$query3 = mysqli_query($con,"select * from table3 where companyname = '".$_POST['companyname']."'");

$invoice3 = mysqli_fetch_array($query3);
class PDF extends FPDF
{
// Page header
function Header()
{
	// Logo
	$this->Image('logo-example.png',10,6,30);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Cell(80);
	// Title	
	$this->Cell(30,10,'Invoice',1,0,'C');
	// Line break
	$this->Ln(20);
}

// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(130,5,"",0,1);
$pdf->Cell(130,5,"",0,1);
$pdf->SetFont('Times','B',18);
$pdf->Cell(130,5,$invoice3['companyname'],0,1);
$pdf->SetFont('Times','',12);
$str=$invoice3['companyaddress'];
$res = explode(',',$str);
$j=0;
for($i=0;$i<sizeof($res);$i+=2)
{
	if(array_key_exists($i,$res))
	{
		if(array_key_exists($i+1,$res))
			$arr_of_addr[$j]=$res[$i].",".$res[$i+1]".";
		else
			$arr_of_addr[$j]=$res[$i]".";
	
	$j++;
	}
}
for($i=0;$i<sizeof($arr_of_addr);$i++)
{
	$pdf->Cell(130,5,$arr_of_addr[$i],0,1);
}
$pdf->Cell(130,5," ",0,1);
$pdf->Cell(34	,5,'',0,0);
$pdf->Cell(25	,5,'Date: 09/01/2018',0,0);
$pdf->Cell(189	,10,'',0,1);//end of line


//invoice contents
$pdf->Cell(189	,10,'',0,1);
$pdf->Cell(130	,5,'Client:',0,1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(130	,5,$invoice2['cliname'],0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(130	,5,'Mahadevpura, Doddanekundi Village Krishnarajpuram Hobli,',0,1);
$pdf->Cell(130	,5,'Bangalore East Taluk, Laxmi Sagar Layout,',0,1);
$pdf->Cell(130	,5,'Mahadevapura, Bengaluru, Karnataka 560048',0,1);
$pdf->Cell(189	,10,'',0,1);
$pdf->Cell(189	,10,'',0,1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(189	,5,'Candidate Details',1,1);
$pdf->Cell(189	,5,'',0,1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(130	,5,$invoice['candidatename'],0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(130	,5,$invoice['designation'],0,1);
$pdf->Cell(130	,5,$invoice['yearsofexp'].'years of experience',0,1);
$pdf->Cell(130	,5,'Skill - '.$invoice['skill'],0,1);
$pdf->Cell(130	,5,'Reference Number -',0,1);
$pdf->Cell(189	,10,'',0,1);
$pdf->Cell(130	,5,'Billing @ 12% --',0,0);//create billing @ textfield
$pdf->Cell(23	,5,'',0,0);
$pdf->Cell(16	,5,'Amount : ',0,0);//create amount textfield
$pdf->Cell(20	,5,"1000.00",0,1);//$_POST['amount'].'00'
$pdf->Cell(189	,10,'',0,1);
$pdf->Cell(130	,5,'GST @ 18% --',0,0);
$pdf->Cell(23	,5,'',0,0);
$pdf->Cell(16	,5,'Amount : ',0,0);
$pdf->Cell(20	,5,'1800.00',0,1);





 


$pdf->Output();
?>
