<?php
require("conn.php");
if ($_SERVER['REQUEST_METHOD']==='POST'){

    //Get data from the form
    $p_id = $_POST["p_id"];
    $name = $_POST['name'];
  

    //Prepare and execute the SQL query
    $sql = "INSERT INTO tree (P_id,Name)
    VALUES
    ('$p_id','$name')";


    //Execute sql statemnet using query
    if ($conn->query($sql) === TRUE){
        echo "Data added successfully";
    }
    else {
        echo "Error: ".$sql."<br>".$conn->error;
        }



}
?>

<form method="POST">
    <h1>Add Data Form</h1>
    Parent_ID:<input type="text" name="p_id" placeholder="Enter P_id" required/><br/><br/>
    Name:<input type="text" name="name" placeholder="Enter Name" required/><br/><br/>
    <button type="submit">Save</button>
</form>

*Parent_ID : That person's Id in whose downline we want to add the child<br/>

<a href="index.php">Back to home</a>
<a href="index.php">DATA</a>