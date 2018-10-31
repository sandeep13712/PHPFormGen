<!DOCTYPE html> 
 <html lang="en"> 
 <head> <meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags --> 
<title>Publishers</title> 
<!-- Bootstrap --> 
<link href="css/bootstrap.min.css" rel="stylesheet"> 
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --> 
<!-- WARNING: Respond.js doesn't work if you view the page via file:// --> 
<!--[if lt IE 9]> 
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script> 
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> 
<![endif]--> 
</head> 

<body>
<div class="container"> 
<div class="row"> 
<div class="col-md-6"> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script>
<h1>Publishers</h1> 

<?php if( !isset($_POST['pubName']) ){?> 

<form name="frmPublishers" action="Publishers.php" method = "POST">
<div class="form-group"><label>Publisher Name<input type="text" class="form-control" name = "pubName"></input></label></div><br>

<div class="form-group"><label>Publisher Address<textarea rows="4" cols="50" class="form-control" name = "pubAdd"></textarea></label></div><br>


 <button type="submit" class="btn btn-default">Submit</button> 
</form></div></div>

<?php } else {
 $servername = "servername"; 
 $username = "username";
 $password = "password@123";
 $dbname = "yourdbname";
// Create connection 
 $conn = new mysqli($servername, $username, $password, $dbname); 
 // Check connection 
 if ($conn->connect_error) { 
     die("Connection failed: " . $conn->connect_error);}

$php_pubName = $_POST["pubName"];
$php_pubAdd = $_POST["pubAdd"];


$sqlQuery = "INSERT INTO Publishers(pubName,pubAdd) VALUES ('".$php_pubName."','".$php_pubAdd."');";

if ($conn->query($sqlQuery) == TRUE) { 
 echo "New record created successfully"; 
 echo "<br><a href='http://".$_SERVER[HTTP_HOST]."/test/'>Back to main page!</a>";} 
 else { echo "Error: " . $sqlQuery . "<br>" . $conn->error;}
$conn->close(); 
 } 
?>
</body>
</html>