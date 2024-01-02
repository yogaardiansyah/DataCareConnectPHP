<?php
include '../config/koneksi.php';

// Fetch data from database
$query = mysqli_query($conn, "SELECT * FROM rekammedis");
$data = array();

while ($row = mysqli_fetch_array($query)) {
    $data[] = $row;
}

// Function to generate PDF
function generatePDF($data) {
    require_once('../tcpdf/tcpdf.php'); // Sesuaikan path sesuai dengan struktur proyek Anda

    // Create new PDF document in landscape mode
    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Data Rekam Medis Klinik');
    $pdf->SetAutoPageBreak(TRUE, 15); // Set margin bottom to 15mm

    // Set margins
    $pdf->SetMargins(10, 10, 10); // Left, Top, Right

    // Add a page
    $pdf->AddPage();

    // Add content to PDF
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 10, 'Data Rekam Medis Klinik', 0, 1, 'C');
    $pdf->SetFont('helvetica', '', 8);

    // Table header
    $pdf->Cell(8, 7, 'No', 1);
    $pdf->Cell(30, 7, 'Nama', 1);
    $pdf->Cell(30, 7, 'Tenaga Medis', 1);
    $pdf->Cell(30, 7, 'Tanggal Berobat', 1);
    $pdf->Cell(50, 7, 'Keluhan', 1);
    $pdf->Cell(50, 7, 'Diagnosa', 1);
    $pdf->Cell(50, 7, 'Obat', 1);
    $pdf->Ln();

    // Add data to PDF
    $no = 1;
    foreach ($data as $row) {
        $pdf->Cell(8, 7, $no++, 1);
        $pdf->Cell(30, 7, $row['nama_pasien'], 1);
        $pdf->Cell(30, 7, $row['nama_tenaga'], 1);
        $pdf->Cell(30, 7, $row['tanggal'], 1);
        $pdf->Cell(50, 7, $row['keluhan'], 1);
        $pdf->Cell(50, 7, $row['diagnosa'], 1);
        $pdf->Cell(50, 7, $row['obat'], 1);
        $pdf->Ln();
    }

    // Save PDF to a file
    $pdf->Output('Data_Rekam_klinik.pdf', 'D');
}

// Generate PDF when the HTML page is loaded
generatePDF($data);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!--ini awal content-->
<body>
    <h3><p class="text-center mt-4">Data Rekam Medis Klinik</p></h3>

    <center>
        <table class=" mt-4" width="1000px" border="1">
            <tr>
                <td><center>No</td>
                <td><center>Nama</td>
                <td><center>Tenaga Medis</td>
                <td><center>Tanggal Berobat</td>
                <td><center>Keluhan</td>
                <td><center>Diagnosa</td>
                <td><center>Obat</td>
            </tr>

            <?php foreach ($data as $row) { ?>
                <tr>
                    <td><center><?php echo $row['id'] ?></td>
                    <td><center><?php echo $row['nama_pasien'] ?></td>
                    <td><center><?php echo $row['nama_tenaga'] ?></td>
                    <td><center><?php echo $row['tanggal'] ?></td>
                    <td><center><?php echo $row['keluhan'] ?></td>
                    <td><center><?php echo $row['diagnosa'] ?></td>
                    <td><center><?php echo $row['obat'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </center>
</body>
</html>
