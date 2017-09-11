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
//  $con = mysql_connect($host,$user,$pass);
//  $dbs = mysql_select_db($databaseName, $con);
    // Create connection
    $conn = new mysqli($servername, $username, $password, $Database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return false;
    }
//  //--------------------------------------------------------------------------
//  // 2) Query database for data
//  //--------------------------------------------------------------------------
//  $result = mysql_query("SELECT * FROM $tableName");          //query
//  $array = mysql_fetch_row($result);                          //fetch result    
//
    $sql = "SELECT * FROM `components` WHERE componentName='IO'";
    $array = $conn->query($sql);

    if ( $array === TRUE) {
        echo "Table Projects created successfully <br>";
    } else {
        echo $sql;
    }

  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------
  echo json_encode($array);

?>