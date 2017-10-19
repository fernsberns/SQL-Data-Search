<!DOCTYPE html>
<html>
<head>
	<title>Merchant List Data</title>
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<style type="text/css" media="print">
.dontprint
{ display: none; }
</style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
</head>
<body style="overflow-x: hidden;">

<?php
error_reporting(0);
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "merchantlist";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

if(isset($_POST['stateinput'])){
  $stateinput = $_POST['stateinput'];
}
// Check connection
if ($conn->connect_error) {
    echo '<div class="container animated fadeInDown fixed-top">
      <div class="row">
  <div class="bg-danger col-12 text-white text-center animated fadeOutUp" style="animation-delay: 3s;font-size:75%;"> Connected Unsuccessful </div>
  </div></div>';
} 

echo '<div class="container animated fadeInDown fixed-top dontprint">
      <div class="row">
  <div class="bg-success col-12 text-white text-center animated fadeOutUp" style="animation-delay: 3s;font-size:75%;"> Connected successfully </div>
  </div></div>';
if ($stateinput) {
  $sql = "SELECT * FROM builtwithmagento WHERE State = '" . $stateinput . "' AND Company IS NOT NULL AND Telephones != 'ph:' AND People IS NOT NULL AND People NOT LIKE '%noemail%'";
}else{
  $sql = "SELECT * FROM builtwithmagento WHERE Company IS NOT NULL AND Telephones != 'ph:' AND People IS NOT NULL AND People NOT LIKE '%noemail%'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo '<table class="table text-info" style="font-size:60%;" <tr><th>Company</th><th>Location</th><th>Phone</th><th>Email</th></tr>';
    while($row = $result->fetch_assoc()) {
	echo ' 	<tr style="color:black;">
			         	<th style="width:0.1%;white-space: nowrap;">' . $row['Company'] . '</th> 
			         	<td style="width:0.1%;white-space: nowrap;">' . $row['City'] . ', ' .$row['State'] . ' ' . $row['Zip'] .  '</td>
                <td style="width:0.1%;white-space: nowrap;">' . $row['Telephones'] . '</td> 
                <td style="width:0.1%;white-space: nowrap;word-wrap:break-word">' . $row['People'] . '</td>

			    </tr>';
			       	

    }
    echo '</table>';

} else {
    echo "0 results";
}
$conn->close();
?>

    <footer class="container-fluid  w-100 fixed-bottom p-3 dontprint" style="background-color: #f1f1f1; max-height: 80px;">
<nav style="transform: translate(0px, 0px); font-size: 50%;">
  <ul class="pagination justify-content">

    <li class="page-item"><a class="page-link text-info" href="builtwithbigcommerce.php">Big Commerce</a></li>
    <li class="page-item"><a class="page-link bg-info text-white" href="builtwithmagento.php">Magento</a></li>
    <li class="page-item"><a class="page-link text-info" href="builtwithmagentoenterprise.php">Magento Enterprise</a></li>
    <li class="page-item"><a class="page-link text-info" href="builtwithshopify.php">Shopify</a></li>
    <li class="page-item"><a class="page-link text-info" href="builtwithwoocommerce.php">Woo Commerce</a></li>
  </ul>
</nav >
<div class="pagination">
    <ul style="transform: translate(0px,10px);">
        <li class="disabled"><a href="#">&laquo;</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">&raquo;</a></li>
    </ul>
</div>
      <center style="transform: translate(250px,-190px);" >
            <form action="builtwithmagento.php" method="post">


            <input disabled type="text" name="" placeholder="Company Name" class="text-center" style="height:40px;width: 200px;">
      <input disabled type="text" name="" placeholder="City" class="text-center" style="height:40px;width: 150px;">
        <input type="text" name="stateinput" placeholder="State" class="text-center" style="height:40px;width: 50px;">
        <button type="submit" style="transform: translate(0px, -2px);" class="btn btn-info">Search</button>
                <button class="btn bg-info text-white" onClick="window.print()" style="transform: translate(0px, -2px);">Print</button>
               
      </center>
    </footer>

</body>
</html>
<table style="width:100%">
  



