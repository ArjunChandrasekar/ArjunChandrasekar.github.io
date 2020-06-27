<!DOCTYPE html>
<html>
    <head>
        <title>MovieFlix</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <style>
            body{
                font-family: 'Graffiti';
                background-color: black ;
            }

            #create-form, #update-form, #delete-form{
                display: none;
            }

            .main-div {
                width: 80vw;
                margin: 0 auto;
                color: beige;
            }

            h2{
                text-align: center;
                font-weight: bold;
                color: red;
            }

            table{
                margin: 15px auto;
                width: 50vw;
                text-align: center;
                color: green;
            }

            table tr td{
                padding: 12px;
            }

            .content-wrapper{
                width: 100%;
                margin: 0 auto;
                text-align: center;
            }

            #create-button, #update-button, #delete-button{
                width: 140px;
                height: 37.5px;
                background-color: blue;
                color: white;
                border-radius: 4px;
                border: 1.5px solid black;
                letter-spacing: 1.5px;
                cursor: pointer;
            }

            .small-button{
                width: 76px;
                height: 28px;
                background-color: blue;
                color: white;
                border-radius: 2px;
                border: none;
                cursor: pointer;
            }

            input[type="text"]{
                margin: 10px;
                width: 260px;
                height: 32px;
                padding: 3px;
                background-color: beige ;
            }
        </style>

    </head>

    <body>
        <div class="main-div">
            <?php require_once "create.php" ;?>

            <div>
                <h2>Movie List</h2>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $databasename = "movieflix_database";
            
                    $connection = mysqli_connect($servername, $username, $password, $databasename);

                    if(!$connection){
                        die("Connection unsuccessful : ".mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM movieflix_table";
                    $result = mysqli_query($connection, $sql);
                    $rowCount = mysqli_num_rows($result);

                    if($rowCount > 0){
                        echo "
                            <table>
                                <thead>
                                    <tr>
                                    <br>
                                        <th>Record ID</th>
                                        <th>Title</th>
                                        <th>Genre</th>
                                        <th>Director</th>
                                    </tr>
                                </thead>
                        ";
                    }
                ?>
                <?php
                    while($row = $result ->fetch_assoc()): ?>
                    <tr>   
                        <td> <?php echo $row["id"] ?> </td>
                        <td> <?php echo $row["title"] ?> </td>
                        <td> <?php echo $row["genre"] ?> </td>
                        <td> <?php echo $row["director"] ?> </td>
                    </tr>
                    <?php endwhile ?>
                </table>

            </div>

            <div class="content-wrapper">
                <button id="create-button">Create Record </button>
                <button id="update-button">Edit Record </button>
                <button id="delete-button">Delete Record </button>

                <form action="create.php" method="POST" id="create-form">
                    <input type ="text" placeholder="Enter movie title" name="create-title"/>
                    <br>
                    <input type ="text" placeholder="Enter movie genre" name="create-genre"/>
                    <br>
                    <input type ="text" placeholder="Enter movie director" name="create-director"/>
                    <br>
                    <input type ="submit" value="Save" name="create-button" class="small-button"/>

                </form>

                <form action="update.php" method="POST" id="update-form">
                    <input type ="text" placeholder="Enter Record ID" name="update-ID"/>
                    <br>
                    <input type ="text" placeholder="Enter movie title" name="update-title"/>
                    <br>
                    <input type ="text" placeholder="Enter movie genre" name="update-genre"/>
                    <br>
                    <input type ="text" placeholder="Enter movie director" name="update-director"/>
                    <br>
                    <input type ="submit" value="Save" name="submit-update" class="small-button"/>

                </form>

                <form action="delete.php" method="POST" id="delete-form">
                    
                    <input type="text" placeholder="Enter Record ID" name="delete-ID"/>
                    <br>
                    <input type="submit" placeholder="Save" name="submit-delete" class="small-button"/>
                        
                </form>

            </div>
        </div>
        <script src="script.js"></script>

    </body>

</html>