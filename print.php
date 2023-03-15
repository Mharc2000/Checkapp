<?php
require('fpdf/fpdf.php');
include('config.php');

$id = $_GET['id'];

$pdf = new FPDF();
///var_dump(get_class_methods($pdf));

$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Cell(100,12,'Date:'.date('d-m-Y').'',0,"R");
$pdf->Ln(14);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,'Product Receipt',1,0);

$query= "SELECT * FROM order_record WHERE Order_ID='$id'";
$result = mysqli_query($connect, $query);



while($row = mysqli_fetch_array($result)){
  
    $pdf->Ln(10);
    $pdf->SetFont('Arial','',12);

    $pdf->Cell(50,8,'Order ID',1,0);
    $pdf->Cell(140,8,$row['Order_ID'],1,1);
    
    $pdf->Cell(50,8,'Transaction ID',1,0);
    $pdf->Cell(140,8,$row['Transaction_ID'],1,1);
    
    $pdf->Cell(50,8,'Customer Name',1,0);
    $pdf->Cell(140,8,$row['Customer_Name'],1,1);
    
    $pdf->Cell(50,8,'Billing Address',1,0);
    $pdf->Cell(140,8,$row['Street_Address'],1,1);
    
    $pdf->Cell(50,8,'Contact Number',1,0);
    $pdf->Cell(140,8,$row['Contact'],1,1);
    
    $pdf->Cell(50,8,'Ordered Product',1,0);
    $pdf->Cell(140,8,$row['Product_Name'],1,1);
    
    $pdf->Cell(50,8,'Quantity',1,0);
    $pdf->Cell(140,8,$row['Quantity'],1,1);
    
    $pdf->Cell(50,8,'Total Price',1,0);
    $pdf->Cell(140,8,$row['Total_Price'],1,1);
    
    $pdf->Cell(50,8,'Payment Method',1,0);
    $pdf->Cell(140,8,$row['Payment_Method'],1,1);
    
  
    
    
}

$pdf->Output();
?>
