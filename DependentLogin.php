<?php
// connect to database
$conn = mysqli_connect("localhost","root","root","company");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

// get data from form
$Db_name=$_POST['Db_name'];
$Db_employee=$_POST['Db_employeename'];

// check if employee already exists in table dependent
$sql = "SELECT * FROM dependent WHERE Dependent_Name = '$Db_name'";
$rs = mysqli_query($conn, $sql);
$num=mysqli_num_rows($rs);

if($num){
//check if Name is belongs to the employee
$row=mysqli_fetch_assoc($rs);
if($row['Employee'] == $Db_employee){
    echo "<center><h1>Logged in Succesfully.</h1><hr> 
    </center>";
    echo "<h2>Name: " . $row["Dependent_Name"]. "</h2>" .
         "<h2>Employee: " . $row["Employee"]. "</h2>" ."<h2> Gender: ". $row["D_Sex"]. "</h2>"."<h2> Birth Date: ". $row["D_Birth_Date"]. "</h2>"."<h2> Relationship: ". $row["Relationship"]. "</h2>";
         $check=1;

}
else{
    echo "<center><h1>Dependent does not match Employee.</h1><hr> <h2>Click <a href='DependentLogin.html'>here</a> to try again</h2></center>";
}
}
else
{ echo "<center><h1>Dependent does not exist.</h1><hr> <h2>Click <a href='DependentLogin.html'>here</a> to try again</h2></center>";
}
?>
