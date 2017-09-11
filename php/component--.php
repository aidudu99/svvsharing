<?php
    function DBconn($Database = "projectInfo"){
        $servername = "localhost";
        $username = "root";
        $password = "";        

        // Create connection
        $conn = new mysqli($servername, $username, $password, $Database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return false;
        } 
        echo "Connected successfully  <br>";
        return $conn;
    }
    function DBcreateTB_project($conn, $tableName){
        // sql to create table
//         
        $sql = "CREATE TABLE " . "$tableName (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        componentName VARCHAR(30) PRIMARY KEY
        )";
        
        if ($conn->query($sql) === TRUE) {
            echo "Table Projects created successfully <br>";
            return true;
        } else {
            echo "Error creating table: " . $conn->error . " <br>";
            return false;
        }       
    }

    function DBcreateTB_component($conn, $tableName){

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $firstname, $lastname, $email);

        // set parameters and execute
        $firstname = "John";
        $lastname = "Doe";
        $email = "john@example.com";
        $stmt->execute();         
        
        // sql to create table        
        $sql = "CREATE TABLE Components (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        componentName VARCHAR(30) NOT NULL
        )";
       
        if ($conn->query($sql) === TRUE) {
            echo "Table Projects created successfully <br>";
            return true;
        } else {
            echo "Error creating table: " . $conn->error . " <br>";
            return false;
        }       
    }
    function DBcreateTB_load($conn, $tableName){
        // sql to create table
        $sql = "CREATE TABLE Projects (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        projectname VARCHAR(30) NOT NULL
        )";     
        
        if ($conn->query($sql) === TRUE) {
            echo "Table Projects created successfully <br>";
            return true;
        } else {
            echo "Error creating table: " . $conn->error . " <br>";
            return false;
        }       
    }    
    function DBinsert($table, $sql){

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $firstname, $lastname, $email);

        // set parameters and execute
        $firstname = "John";
        $lastname = "Doe";
        $email = "john@example.com";
        $stmt->execute();        

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error . " <br>";
        }        
    }

    
    function DBclose($conn){
        $conn->close();
    }

    function DBexist_component($conn,$tablename,$component){
        $sql = "SELECT * FROM '$tablename' WHERE componentName='$component'";
        if ($conn->query($sql) != null) {
            echo "record existed in database" . $conn->error . " <br>";
            return true;
        } else {
            echo "record not existed in database <br>";
            return false;
        } 
    }

    
?>

<?php
    //connect to the Database the first time
    $conn = null;
    if ($conn == null){
        $conn = DBconn("projectInfo");
        echo "<p>projectInfo create success</p>";        
    }
    //create “projects” table the first time
    $projectsflag = false;
    if ($projectsflag == false){
        echo "create projects table";
        $projectsflag = DBcreateTB_project($conn, "projects");
    }   
        
    if (isset($_POST['submit'])) { // use the "name"
        $component = $_POST['component'];

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
            
        echo "<p>提交成功</p>", $component;
    }

//    mysqli_close($dbc);
    DBclose($conn);
?>