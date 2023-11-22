<?php

require 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resv_no = htmlspecialchars($_POST['resv_no']);
    $date = htmlspecialchars($_POST['date']);
    $name = htmlspecialchars($_POST['name']);
    $phn_no = htmlspecialchars($_POST['phn_no']);
    $email = htmlspecialchars($_POST['email']);
    $num_days = htmlspecialchars($_POST['num_days']);

    $currentDateTime = new DateTime('now');
    $currentDate = $currentDateTime->format('l, F j, Y');


    // $timezone = date_default_timezone_get();
    date_default_timezone_set('Africa/Nairobi');
    $current_time = date('h:i:s A');

    require 'config.php';
    $sql1 = "INSERT INTO test_automations (resv_no, date, name, phn_no, email, num_days) VALUES ('$resv_no', '$date', '$name', '$phn_no', '$email', '$num_days')";
    $result1=mysqli_query($conn1,$sql1);
    /* if ($result1) {
        echo "Successfully Created this Record!";
        // exit();
    }
    else{
        echo "Failed to create this record!";
    }
 */
    // Generate HTML content
    $html_content = "
        <!DOCTYPE html>
        <html>
        <head>
            <title>Invoice$resv_no</title>
            <style>
                body {
                    font-family: 'Helvetica', sans-serif;
                }
                .invoice-header {
                    text-align: left;
                    padding-left: 55px;
                }
                #invoice-details {
                    padding-top: 10px;
                    padding-bottom: 10px;
                    padding-left: 25px;
                }
                .invoice-details {
                    margin-top: 20px;
                    margin-left: 50px;
                }
                .invoice-description {
                    margin-top: 20px;
                    margin-left: 50px;
                    text-align: right;
                    padding-right: 50px;
                }
                .invoice-details div {
                    margin-bottom: 10px;
                }
                .footer {
                    color: grey;
                }
            </style>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link href='/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body>
            <div class='invoice-header'>
                <img src='marley.png' alt='Logo' width='100' height='100'>
                <h3 style='text-align: left;'>VIMAK INFOTECH LABS</h3>
                <h4>Nairobi, Kenya.</h4>
                
            </div>
            <div>
                <div style='text-align: center; margin: right 50px; font-size: 20px;'><b>#Invoice</b></div>
                <div style='text-align: right; margin: right 50px;'><b>Invoice Date:</b> $currentDate</div>
                <div style='text-align: right; margin: right 50px;'><b>$current_time (GMT+3)</b></div>
                <div style='text-align: right; margin: right 50px;'><b>Invoice No: $resv_no</b></div>
            </div>
            <div class='invoice-details'>
                <div><b>Mr / Mrs: $name</b></div>
                <div><hr/></div>
                <div id='invoice-details' style='background-color:rgb(88, 88, 88);'><b># Reservation Description</b></div>
                <div><hr/></div>
                <div>
                    <div><b>Reservation No:</b> $resv_no</div>
                    <div><b>Booking Date:</b> $date</div>
                    <div><b>Guest Name:</b> $name</div>
                    <div><b>Contact:</b> $phn_no</div>
                </div>
                <div><br></div>
                <div><hr/></div>
                <div id='invoice-details' style='background-color:rgb(88, 88, 88);'><b># Contact information</b></div>
                <div><hr/></div>
                <div>
                    <div><b>Guest Name:</b> $name</div>
                    <div><b>Contact:</b> $phn_no</div>
                    <div><b>Email:</b> $email</div>
                    <div><b>No. of days:</b> $num_days</div>
                </div>
                <div><br></div>
                <div><hr/></div>
                <div id='invoice-details' style='background-color:rgb(88, 88, 88);'><b># VAT Details</b></div>
                <div><hr/></div>
                <div><br></div>
                <div><hr/></div>
                <div><div class='footer' style='color: grey;'><b>NB: Booking rates/fees and reservations availability are subject to change. Contact Us for more information.</b></div></div>
            </div>
        </body>
        </html>
    ";

    // Output HTML to a file
    $html_filename = "invoicegenHTMLPDF2.html";
    file_put_contents($html_filename, $html_content);

    // HTML to PDF
    $pdf_filename = "invoice" . $resv_no . ".pdf";
    $html2pdf = new Html2Pdf();
    $html2pdf->writeHTML($html_content);
    $html2pdf->output($pdf_filename);

    echo "PDF generated successfully: $pdf_filename";
} else {
    echo "Invalid request method";
}
?>
