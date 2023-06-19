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
$Da_Location=$_POST['Da_location'];
$Da_manager=$_POST['Da_manager'];
$Da_date = $_POST['Da_date'];

// query to database
$sql = "INSERT INTO department (Name, Number, Location, Manager, Manager_start_date) VALUES ('$Da_name', '$Da_number', '$Da_Location', '$Da_manager', '$Da_date')";

// check if query is successful
$rs=mysqli_query($conn, $sql);
if($rs)
{
    echo "<center><h1>Department Added Successfully</h1></center> <a href='DepartmentLogin.php'>Click here to login</a>";

}
else
{
    echo "Department Not Added";
}
?>

