<?php 

  //--------------------------------------------------------------------------
  // Example php script for fetching data from mysql database
  //--------------------------------------------------------------------------
  $servername = "localhost";
  $username = "root";
  $password = "";

  $Database = "projectinfo";
  $tableName = "components";

//  //--------------------------------------------------------------------------
//  // 1) Connect to mysql database
//  //--------------------------------------------------------------------------
//  //  include 'DB.php';
    // Create connection
    $conn = new mysqli($servername, $username, $password, $Database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return false;
    }
//  //--------------------------------------------------------------------------
//  // 2) Query database for data
//  //--------------------------------------------------------------------------
    $sql = "SELECT * FROM components";
    $array = $conn->query($sql);

    $result_array = array();
    if ($array->num_rows > 0) {
          while($row = $array->fetch_row()) {  
            $result = array('name'=>$row[1]);
            array_push($result_array, $row[1]);
        }
        //--------------------------------------------------------------------------
        // 3) echo result as json 
        //--------------------------------------------------------------------------
        echo json_encode($result_array);
    }

    
    $array->close();
    $conn->close();

?>