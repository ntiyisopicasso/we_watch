<?php
    /* 
        function to open the connection
        running on port 8080
    */
    function OpenConnection(){ 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database_name = "movies";

        /*
        start new connection and
        check for errors -> Connection failed
        */
        $conn = new mysqli($servername, $username, $password,$database_name) or die("Connection failed". $conn -> error);
        return $conn;
    }

    // function to close the connection
    function CloseConnection($conn){
        $conn -> close();
    }
?>