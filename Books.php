<!DOCTYPE html> 
 <html lang="en"> 
 <head> <meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags --> 
<title>Books</title> 
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
<h1>Books</h1> 

<?php if( !isset($_POST['onlineAvailable']) ){?> 

<form name="frmBooks" action="Books.php" method = "POST">
<div class="form-group"><label>Available Online</label><Select class="form-control" name = "onlineAvailable">
<option value="Yes">Yes</option>
<option value="No">No</option>
</select></label></div><br>

<div class="form-group"><label>Book title<input type="text" class="form-control" name = "bookTitle"></input></label></div><br>

<div class="form-group"><label>Book description<textarea rows="4" cols="50" class="form-control" name = "bookDesc"></textarea></label></div><br>

<div class="form-group"><label>Similar book</label><Select class="form-control" name = "simBooks"multiple>
<?php
 $servername = "servername"; 
 $username = "username";
 $password = "password@123";
 $dbname = "yourdbname";
// Create connection 
 $conn = new mysqli($servername, $username, $password, $dbname); 
 // Check connection 
 if ($conn->connect_error) { 
     die("Connection failed: " . $conn->connect_error);}
$sqlQuery = "SELECT bookTitle FROM Books"; 
$result = $conn->query($sqlQuery); 
if ($result->num_rows > 0) { 
// output data of each row 
while($row = $result->fetch_assoc()) { 
echo "<option value='".$row['bookTitle']."'>".$row['bookTitle']."</option>"; 
} 
} else { 
    echo "<option value='None'> No Value selected </option>";
} 
$conn->close(); 
?> 
</select></div><br>

<div class="form-group"><label>Publisher</label><Select class="form-control" name = "publisher">
<?php
 $servername = "servername"; 
 $username = "username";
 $password = "password@123";
 $dbname = "yourdbname";
// Create connection 
 $conn = new mysqli($servername, $username, $password, $dbname); 
 // Check connection 
 if ($conn->connect_error) { 
     die("Connection failed: " . $conn->connect_error);}
$sqlQuery = "SELECT PublisherName FROM Publishers"; 
$result = $conn->query($sqlQuery); 
if ($result->num_rows > 0) { 
// output data of each row 
while($row = $result->fetch_assoc()) { 
echo "<option value='".$row['PublisherName']."'>".$row['PublisherName']."</option>"; 
} 
} else { 
    echo "<option value='None'> No Value selected </option>";
} 
$conn->close(); 
?> 
</select></div><br>

<div class="form-group"><label>Date of publishing<input type="datetime-local" class="form-control" name = "pubDate"></input></label></div><br>

<div class="form-group"><label>Book front image<input type="file" class="form-control" name = "frontImage"></input></label></div><br>


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

$php_onlineAvailable = $_POST["onlineAvailable"];
$php_bookTitle = $_POST["bookTitle"];
$php_bookDesc = $_POST["bookDesc"];
$php_simBooks = $_POST["simBooks"];
$php_publisher = $_POST["publisher"];
$php_pubDate = $_POST["pubDate"];
$php_frontImage = $_POST["frontImage"];


$sqlQuery = "INSERT INTO Books(onlineAvailable,bookTitle,bookDesc,simBooks,publisher,pubDate,frontImage) VALUES ('".$php_onlineAvailable."','".$php_bookTitle."','".$php_bookDesc."','".$php_simBooks."','".$php_publisher."','".$php_pubDate."','".$php_frontImage."');";

if ($conn->query($sqlQuery) == TRUE) { 
 echo "New record created successfully"; 
 echo "<br><a href='http://".$_SERVER[HTTP_HOST]."/test/'>Back to main page!</a>";} 
 else { echo "Error: " . $sqlQuery . "<br>" . $conn->error;}
$conn->close(); 
 } 
?>
</body>
</html>