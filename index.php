<?php 
	require 'config.php';
    require 'generateNextEntryNo.php';
if(isset($_POST['submit'])){
    $nextResvNo = generateNextEntry();
		
    $r_resvno= $nextResvNo;
	$r_date=$_POST['date'];
	$r_name=$_POST['name'];
	$r_phno=$_POST['phn_no'];
	$r_email=$_POST['email'];
	$r_numdays=$_POST['num_days'];
}
$nextResvNo=generateNextEntry();
$r_resvno=$nextResvNo;

if (!$conn1) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoicing System</title>
    <style>
        body{
            background-color:  lightgray;
            text-align:center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h1{
            text-decoration:underline;
            color: rgb(80, 80, 80);
        }
        form{
            width: 500px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
        }
        input{
            border: 2px solid #ccc;
            padding: 2px;
            margin: 10px auto;
            border-radius: 5px;
        }
        button{
            border: 2px solid #ccc;
            padding: 2px;
            margin: 10px auto;
            border-radius: 5px;
        }
        label{
            color: #000000;
            font-size: 18px;
            padding: 5px;
        }
        .error{
            background: #F2DEDE;
            color: #A94442;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
        }
        .success {
            background: #D4EDDA;
            color: #40754C;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <div>
        <form action="generate_pdf.php" method="post">
            <h1>Invoice Generator</h1>
            <img src="marley.png" alt="logo" style="width: 50px;height: 50px;"> <br>
            <label for="resv_no" >Reservation No:</label>
            <input type="text" name="resv_no" placeholder="<?php echo  $r_resvno?>"><br><br> <!-- required -->

            <label for="date">Booking Date:</label>
            <input type="text" name="date" placeholder="YYYY-MM-DD" required><br><br>

            <label for="name">Guest Name:</label>
            <input type="text" name="name" placeholder="Name" required><br><br>

            <label for="phn_no">Contact:</label>
            <input type="text" name="phn_no" placeholder="07********/01********" required><br><br>

            <label for="email">Email:</label>
            <input type="text" name="email" placeholder="example@gmail.com" required><br><br>

            <label for="num_days">Number of Days:</label>
            <input type="text" name="num_days" placeholder="0-100" required><br><br><br>

            <!-- <input type="submit" value="Generate PDF"> -->
            <button type="submit" name="submit">Generate PDF</button>
        </form>
    </div>
</body>
</html>