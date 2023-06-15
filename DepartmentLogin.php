<?php
// connect to database
$conn = mysqli_connect("localhost","root","root","company");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
// get data from form
$Da_name=$_POST['Da_name'];
$Da_number=$_POST['Da_number'];

// check if department number already exists
$sql = "SELECT * FROM department WHERE Number = '$Da_number'";
$rs = mysqli_query($conn, $sql);
$num=mysqli_num_rows($rs);

if($num){
//check if Name is belongs to the department number
$row=mysqli_fetch_assoc($rs);
if($row['Name'] == $Da_name){
    echo "<center><h1>Logged in Succesfully.</h1><hr> 
    </center>";
    echo "<h2>Department Name: " . $row["Name"]. "</h2>" .
         "<h2>Department Number: " . $row["Number"]. "</h2>" .
         "<h2>Department Location: " . $row["Location"]. "</h2>" .
         "<h2>Department Manager: " . $row["Manager"]. "</h2>" .
         "<h2>Manager Start Date: " . $row["Manager_start_date"]. "</h2>";
    echo "<center><h2> We missed you. Welcome back !</h2></center>";
}
else{
    echo "<center><h1>Department Number and Name does not match.</h1><hr><h2><a href='DepartmentLogin.html'>Click here to login</a></h2></center> ";
}
}
else
{
    echo "<center><h1>Department Number does not exist.</h1><hr> <h2><a href='DepartmentLogin.html'>Click here to login</a></h2></center>";
}
?>