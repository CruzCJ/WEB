<?php
require('fpdf/fpdf.php');


class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {

        // Arial bold 15
        $this->SetFont('Arial', 'B', 18);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(70, 10, 'Reporte de Propiedades', 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);

        $this->Cell(48, 10, 'Nombre', 1, 0, 'C,0');
        $this->Cell(48, 10, 'Disponibilidad', 1, 0, 'C,0');
        $this->Cell(48, 10, 'Provincia', 1, 0, 'C,0');
        $this->Cell(48, 10, 'Categoria', 1, 1, 'C,0');
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}


require 'admin/config.php';
$consulta = "select * FROM propiedades";
$resultado = $mysqli->query($consulta);


$pdf = new PDF();
$pdf->AliasNbpages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 7);

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(48, 10, $row['nom_inm'], 1, 0, 'C,0');
    $pdf->Cell(48, 10, $row['disponibilidad'], 1, 0, 'C,0');
    $pdf->Cell(48, 10, $row['provincia'], 1, 0, 'C,0');
    $pdf->Cell(48, 10, $row['categoria'], 1, 1, 'C,0');
}

$pdf->Output();
