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

    //    while($row = $array->fetch_assoc()) {
          while($row = $array->fetch_row()) {  
//            printf ("%s (%s)\n", $row[0], $row[1]);
            $result = array('name'=>$row[1]);
            array_push($result_array, $row[1]);
        }
        //--------------------------------------------------------------------------
        // 3) echo result as json 
        //--------------------------------------------------------------------------
        echo json_encode($result_array);
    }


    // handle the form tag action!!
    if (isset($_POST['comp_submit'])) { // use the "name"
        $comp_action = $_POST['comp_action'];
        $comp_name = $_POST['comp_name'];
//        printf("%s --- %s\n",$comp_action,$comp_name);
/*
        if ($component != null && !DBexist_component($conn,"projects",$component))
        {
            $sql = "INSERT INTO projects (componentName) VALUES ('$component')";
            
            if ($conn->query($sql) === false) {
                echo "Insert Error: " . $sql . "<br>" . $conn->error . " <br>";
            }else{
                echo "insert success <br>";
            }
        }
        else{
            echo "not insert";
        }
 */           
 //       echo "<p>提交成功</p>", $component;
    }
    
    
    
    $array->close();
    $conn->close();

?>