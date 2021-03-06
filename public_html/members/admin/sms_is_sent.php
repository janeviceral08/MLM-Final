
<?php
 
// Importing DBConfig.php file.
include 'DBConfig.php';
 
// Connecting to MySQL Database.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
 // Populate Student name from JSON $obj array and store into $S_Name.
 $ids = $obj['ids'];
 
 // Creating SQL query and insert the record into MySQL database table.
 $Sql_Query = "UPDATE user SET is_sent= '2' WHERE user.id = '$ids'";
 
 if(mysqli_query($con,$Sql_Query)){
 
    // If the record inserted successfully then show the message.
   $MSG = 'Record Successfully Inserted Into MySQL Database.' ;
    
   // Converting the message into JSON format.
   $json = json_encode($MSG);
    
   // Echo the message.
    echo $json ;
    
    }
    else{
    
    echo 'Try Again';
    
    }
    mysqli_close($con);
   ?>