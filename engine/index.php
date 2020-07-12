<?php
$servername = "localhost";
$sessionID = "session_id";

//Create connection
$conn = new mysqli($servername , $sessionID);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}
echo "Connected successfully";
