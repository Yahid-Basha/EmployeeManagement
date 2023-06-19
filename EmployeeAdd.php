<?php
// connect to database
$conn = mysqli_connect("localhost","root","root","company");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // get data from form Em_name, SSN, Db_gender, Address, Salary, DOB, Department, Supervisor, Project, Hours, 
        $Em_name=$_POST['Em_name'];
        $SSN = $_POST['SSN'];
        $Db_gender = $_POST['Db_gender'];
        $Address = $_POST['Address'];
        $Salary = $_POST['Salary'];
        $DOB = $_POST['DOB'];
        $Department = $_POST['Department'];
        $Supervisor = $_POST['Supervisor'];
        $Project = $_POST['Project'];
        $Hours = $_POST['Hours'];
        $Password = $_POST['SSN'];


// query to database company and table employee
$sql = "INSERT INTO employee (E_name, SSN, Sex, Address, Salary, Birth_date, Department, Supervisor, works_on_project, works_on_hours, Password ) VALUES ('$Em_name', '$SSN', '$Db_gender', '$Address', '$Salary', '$DOB', '$Department', '$Supervisor', '$Project', '$Hours', '$Password')";

// check if query is successful
$rs2 = mysqli_query($conn, $sql);
  }
if($rs2){
    echo "Form submitted successfully";
}
else{
    echo "Form could not be submitted";
}
?>