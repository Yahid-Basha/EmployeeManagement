<?php
// connext to database
$conn = mysqli_connect("localhost","root","root","company");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
// get data from form
$employeeid = $_POST['employeeid'];

// query to database
$sql = "SELECT * FROM employee WHERE SSN = '$employeeid' ";

$rs = mysqli_query($conn, $sql);
if (mysqli_num_rows($rs) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($rs)) {
        echo "<h2>You are Logged in Succcesfully. Welcome Back!</h2>";
        echo "Employee ID: " . $row["SSN"]. "<br>" ."Name: " . $row["E_name"]."<br>" .
             "Address " . $row["Address"]. "<br>" ;
    }
} else {
    echo "0 results";
}
?>