<?php
    require 'vendor/autoload.php';

    use Endroid\QrCode\QrCode;
    use Endroid\QrCode\Writer\PngWriter;

    function displayQRcode($data){

        try {
        
            $qr_code = QrCode::create($data);
        
            $writer = new PngWriter;
        
            $result = $writer->write($qr_code);
        
            $imageData = $result->getString();
            $imageBase64 = base64_encode($imageData);
            $imageSrc = 'data:image/png;base64,' . $imageBase64;
        
            // Output the QR code image as a data URI
            return '<img width="100px" src="' . $imageSrc . '" alt="QR Code">';
        } catch (\Exception $e) {
            return "Error generating QR code: " . $e->getMessage();
        }
    }

?>
