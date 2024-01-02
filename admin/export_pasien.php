<?php
include '../config/koneksi.php';

// Fetch data from database
$query = mysqli_query($conn, "SELECT * FROM pasien");
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
    $pdf->SetTitle('Data Pasien Klinik');
    $pdf->SetAutoPageBreak(TRUE, 15); // Set margin bottom to 15mm

    // Set margins
    $pdf->SetMargins(15, 15, 15); // Left, Top, Right

    // Add a page
    $pdf->AddPage();

    // Add content to PDF
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 10, 'Data Pasien Klinik', 0, 1, 'C');
    $pdf->SetFont('helvetica', '', 10);

    // Table header
    $pdf->Cell(15, 10, 'No', 1);
    $pdf->Cell(60, 10, 'Nama', 1); // Adjust width according to your layout
    $pdf->Cell(40, 10, 'NIK', 1); // Adjust width according to your layout
    $pdf->Cell(40, 10, 'Jenis Kelamin', 1); // Adjust width according to your layout
    $pdf->Cell(85, 10, 'Alamat', 1); // Adjust width according to your layout
    $pdf->Cell(40, 10, 'Nomor', 1); // Adjust width according to your layout
    $pdf->Ln();

    // Add data to PDF
    $no = 1;
    foreach ($data as $row) {
        $pdf->Cell(15, 10, $no++, 1);
        $pdf->Cell(60, 10, $row['nama'], 1);
        $pdf->Cell(40, 10, $row['nik'], 1);
        $pdf->Cell(40, 10, $row['kelamin'], 1);
        $pdf->Cell(85, 10, $row['alamat'], 1);
        $pdf->Cell(40, 10, $row['nomor'], 1);
        $pdf->Ln();
    }

    // Save PDF to a file
    $pdf->Output('Data_pasien_klinik.pdf', 'D');
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
    <h3><p class="text-center mt-4">Data Pasien Klinik</p></h3>

    <center>
        <table class=" mt-4" width="1000px" border="1">
            <tr>
                <td><center>No</td>
                <td><center>Nama</td>
                <td><center>NIK</td>
                <td><center>Jenis Kelamin</td>
                <td><center>Alamat</td>
                <td><center>Nomor</td>
            </tr>

            <?php foreach ($data as $row) { ?>
                <tr>
                    <td><center><?php echo $row['id'] ?></td>
                    <td><center><?php echo $row['nama'] ?></td>
                    <td><center><?php echo $row['nik'] ?></td>
                    <td><center><?php echo $row['kelamin'] ?></td>
                    <td><center><?php echo $row['alamat'] ?></td>
                    <td><center><?php echo $row['nomor'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </center>
</body>
</html>
