<?php

// connect to database
$conn = mysqli_connect("localhost","root","root","company");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
// get data from form name,emploeeid, gender, dateofbirth.
$Db_employeeid=$_POST['Db_employeeid'];
$Db_ename = $_POST['Db_ename'];
$Db_name = $_POST['Db_name'];
$Db_gender = $_POST['Db_gender'];
$Db_dateofbirth = $_POST['Db_DOB'];
$Db_relation= $_POST['Db_relation'];

echo $Db_employeeid;
echo $Db_ename;
echo $Db_name;
echo $Db_gender;
echo $Db_dateofbirth;
echo $Db_relation; 

// check if employeeid exists
$sql = "SELECT * FROM employee WHERE SSN = '$Db_employeeid'";
$rs = mysqli_query($conn, $sql);
$num=mysqli_num_rows($rs);
if($num){
//check if Name is belongs to the employeeid
$row=mysqli_fetch_assoc($rs);
if($row['E_name'] == $Db_ename){
    echo "true";
// inser dependent data into database
$sql2 = "INSERT INTO dependent(SSN, Employee, Dependent_Name, D_Sex, D_Birth_Date, Relationship) VALUES ('$Db_employeeid', '$Db_ename', '$Db_name','$Db_gender','$Db_dateofbirth','$Db_relation') ";
$rs2=mysqli_query($conn, $sql2);
if($rs2){
echo "<center><h1>Dependent Added Succesfully.</h1><hr><h2>Click <a href='DependentLogin.html'>here</a> to login</h2></center>";
}
else{
echo "<center><h1>Dependent could not be added.</h1><hr><h2>Click <a href='DependentSignup.html'>here</a> to try again</h2></center>";
}
}
else{
echo "<center><h1>Employee ID and Name does not match.</h1><hr><h2>Click <a href='DependentSignup.html'>here</a> to try again</h2></center> ";
}
}
else
{
echo "<center><h1>Employee ID does not exist.</h1><hr> <h2>Click <a href='DependentSignup.html'>here</a> to try again</h2></center>";
}

?>