<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" type = "text/css" href = "global.css" />
    <style>
        body{
            background-image: url("https://cdn.wallpapersafari.com/69/85/HpIYfJ.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>

            <?php
                // connect to database
                $conn = mysqli_connect("localhost","root","root","company");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // get data from form
                $Da_name=$_POST['Da_name'] ?? 'default value';
                $Da_number=$_POST['Da_number'] ?? 'default value';

                // check if department number already exists
                $sql = "SELECT * FROM department WHERE Number = '$Da_number'";
                $rs = mysqli_query($conn, $sql);
                $num=mysqli_num_rows($rs);

                if($num){
                //check if Name is belongs to the department number
                $row=mysqli_fetch_assoc($rs);
                if($row['Name'] == $Da_name){
                    echo "
                <center>
                         <h2>Logged in Succesfully.</h2></center> 
                         <h3>Department Name: " . $row["Name"]. "</h3>" .
                        "<h3>Department Number: " . $row["Number"]. "</h3>" .
                        "<h3>Department Location: " . $row["Location"]. "</h3>" .
                        "<h3>Department Manager: " . $row["Manager"]. "</h3>" .
                        "<h3>Manager Start Date: " . $row["Manager_start_date"]. "</h3>";
                    echo "<center><h3> We missed you. Welcome back !</h3>
                </center>";
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
        <center>
            <form id="employee" method = "post">
                <input type = "text" name = "Em_name" placeholder = " Name"/>
                <input type = "text" name = "SSN" placeholder = " SSN"/>
                <select name="Db_gender">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="O">Other</option>
                </select>
                <input type = "text" name = "Address" placeholder = " Address"/>
                <input type = "Number" name = "Salary" placeholder = " Salary"/>
                <input type = "date" name = "DOB" placeholder = " DOB"/>
                <input type = "text" name = "Department" style="display:none;" value = "<?php echo $Da_name; ?>" />
                <input type = "text" name = "Supervisor" style="display:none;" value = "<?php echo $row["Manager"]; ?>" />
                <input type = "text" name = "Project" placeholder = " Project"/>
                <input type = "text" name = "Hours" placeholder = " Hours of work pw"/>
                <button type = submit> submit </button>
            </form>
        </center>
        <script>
           const form = document.getElementById('employee');
            form.addEventListener('submit', (event) => {
                event.preventDefault(); // prevent default form submission behavior
                const formData = new FormData(form); // create a new FormData object from the form
                fetch('EmployeeAdd.php', {
                method: 'POST',
                body: formData
                })
                .then(response => {
                alert("Form Submitted Successfully")
                })
                .catch(error => {
                alert("Form Submission Failed\nEnter valid Data")
                });
            });
        </script>
</body>
</html>
