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
    $sql = "SELECT * FROM components";
    $array = $conn->query($sql);

//    echo $array->num_rows . "<\br>";
//    echo $array->lengths . "<\br>";
//    echo $array->current_field . "<\br>";
//    echo $array->field_count . "<\br>";
//    echo $array->type . "<\br>";
    $result_array = array();
    if ($array->num_rows > 0) {

    //    while($row = $array->fetch_assoc()) {
          while($row = $array->fetch_row()) {  
//            printf ("%s (%s)\n", $row[0], $row[1]);
            $result = array('name'=>$row[1]);
            array_push($result_array, $row[1]);

        }

    }

    //--------------------------------------------------------------------------
    // 3) echo result as json 
    //--------------------------------------------------------------------------
    echo json_encode($result_array);
//    $array->close();
//    $conn->close();

?>