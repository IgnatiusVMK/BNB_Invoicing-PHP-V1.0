
        <!DOCTYPE html>
        <html>
        <head>
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
        <script>
        function displayDayTime(){
        var currentdate = new Date();

        var day = currentdate.toLocaleString('en-US', { weekday: 'short' });
        var date =currentdate.getDate();
        var month = currentdate.toLocaleString('default', { month: 'short' });
        var year = currentdate.getFullYear();
        var hours = currentdate.getHours();
        var minutes = currentdate.getMinutes();
        var seconds = currentdate.getSeconds();

        var formattedDate = 'Date:'  + day + ' ' + date + ' ' + month + ' ' + year + '<br>';
        var formattedTime = 'Time: ' + hours + ':' + minutes + ':' + seconds + '<br>';

        document.write(formattedDate + formattedTime);
        }
</script>
            <div class='invoice-header'>
                <img src='marley.png' alt='Logo' width='100' height='100'>
                <h1>Nairobi, Kenya.</h1>
                <h2 style='text-align: center;'>BNB Booking Invoice</h2>
                <h1 style='text-align: right;padding-right: 35px;'>Invoice</h1>
                <div style='text-align: right;padding-right: 35px;'><b>Reserv No: Nov2300008</b></div>
                <div style='text-align: right;padding-right: 35px;'><b><script>displayDayTime()</script></b></div>
            </div>
            <div class='invoice-details'>
                <div><hr/></div>
                <div id='invoice-details' style='background-color:rgb(88, 88, 88);'><b># Reservation Description</b></div>
                <div><hr/></div>
                <div>
                    <div><b>Reservation No:</b> Nov2300008</div>
                    <div><b>Booking Date:</b> 2023-11-18</div>
                    <div><b>Guest Name:</b> Marley</div>
                    <div><b>Contact:</b> +254790884584</div>
                </div>
                <div><br></div>
                <div><hr/></div>
                <div id='invoice-details' style='background-color:rgb(88, 88, 88);'><b># Contact information</b></div>
                <div><hr/></div>
                <div>
                    <div><b>Guest Name:</b> Marley</div>
                    <div><b>Contact:</b> +254790884584</div>
                    <div><b>Email:</b> ignatiusvmk@gmail.com</div>
                    <div><b>No. of days:</b> 15</div>
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
    # BNB_Invoicing-PHP-V1.0
