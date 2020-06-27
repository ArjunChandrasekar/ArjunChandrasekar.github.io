<?php
    function createRecord(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $databasename = "movieflix_database";

        $connection = mysqli_connect($servername, $username, $password, $databasename);

        if(!$connection){
            die("Connection unsuccessful : ".mysqli_connect_error());
        }else{
            echo "Connection success!";
        }

        $movieTitle = $_POST["create-title"];
        $movieGenre = $_POST["create-genre"];
        $movieDirector = $_POST["create-director"];

        $sql = "INSERT INTO movieflix_table (title, genre, director) 
        VALUES ('$movieTitle', '$movieGenre', '$movieDirector')";

        if(mysqli_query($connection, $sql)){
            echo "";
        }else{
            echo "Error: ".$sql.mysqli_error($connection);
        }

        mysqli_close($connection);

        header("location: index.php");
    }

    if(isset($_POST["create-button"])){
        createRecord();
    }
?>