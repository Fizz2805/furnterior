<?php
// Include the autoload file
require_once __DIR__ . '/assets/vendors/mpdf/autoload.php';

// Create a new instance of Mpdf
$mpdf = new \Mpdf\Mpdf();

// Write HTML content to the PDF
$mpdf->WriteHTML('<h1>Hello World!</h1>');

// Output the PDF as a download
$mpdf->Output('invoice.pdf', \Mpdf\Output\Destination::DOWNLOAD);


?>
