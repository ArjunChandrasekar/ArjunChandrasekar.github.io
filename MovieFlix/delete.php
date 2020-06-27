<?php
    function deleteRecord(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $databasename = "movieflix_database";

        $connection = mysqli_connect($servername, $username, $password, $databasename);

        $id = $_POST["delete-ID"];

        $sql = "DELETE FROM movieflix_table WHERE id='$id'";

        $deleteQuery = mysqli_query($connection, $sql);

        if(!$deleteQuery){
            echo "Error: ".$sql.mysqli_error($connection);
        }

        mysqli_close($connection);

        header('location: index.php');
    }

    if(isset($_POST["submit-delete"])){
        deleteRecord();
    }
?>