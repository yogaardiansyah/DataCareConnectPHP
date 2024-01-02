<?php
include '../config/koneksi.php';

// Fetch data from database
$query = mysqli_query($conn, "SELECT * FROM obat");
$data = array();

while ($row = mysqli_fetch_array($query)) {
    $data[] = $row;
}

// Function to generate PDF
function generatePDF($data) {
    require_once('../tcpdf/tcpdf.php'); // Sesuaikan path sesuai dengan struktur proyek Anda

    // Create new PDF document (format lanskap)
    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Data Stock Obat Klinik');
    $pdf->SetAutoPageBreak(TRUE, 15); // Set margin bottom to 15mm

    // Set margins
    $pdf->SetMargins(15, 15, 15); // Left, Top, Right

    // Add a page
    $pdf->AddPage();

    // Add content to PDF
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 10, 'Data Stock Obat Klinik', 0, 1, 'C');
    $pdf->SetFont('helvetica', '', 10);

    // Table header
    $pdf->Cell(25, 10, 'No', 1);
    $pdf->Cell(70, 10, 'Nama', 1); // Adjust width according to your layout
    $pdf->Cell(70, 10, 'Keterangan', 1); // Adjust width according to your layout
    $pdf->Cell(30, 10, 'Jumlah', 1); // Adjust width according to your layout
    $pdf->Ln();

    // Add data to PDF
    $no = 1;
    foreach ($data as $row) {
        $pdf->Cell(25, 10, $no++, 1);
        $pdf->Cell(70, 10, $row['nama'], 1);
        $pdf->Cell(70, 10, $row['keterangan'], 1);
        $pdf->Cell(30, 10, $row['jumlah'], 1);
        $pdf->Ln();
    }

    // Save PDF to a file
    $pdf->Output('Data_obat_klinik.pdf', 'D');
}

// Generate PDF when the HTML page is loaded
generatePDF($data);
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!--ini awal content-->
<body>
    <h3><p class="text-center mt-4">Data Stock Obat Klinik</p></h3>

    <center>
        <table class=" mt-4" width="1000px" border="1">
            <tr>
                <td><center>No</td>
                <td><center>Nama</td>
                <td><center>Keterangan</td>
                <td><center>Jumlah</td>
            </tr>

            <?php foreach ($data as $row) { ?>
                <tr>
                    <td><center><?php echo $row['id'] ?></td>
                    <td><center><?php echo $row['nama'] ?></td>
                    <td><center><?php echo $row['keterangan'] ?></td>
                    <td><center><?php echo $row['jumlah'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </center>
</body>
</html>
