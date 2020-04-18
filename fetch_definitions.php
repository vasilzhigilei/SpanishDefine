<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "spanishdefine";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(empty($_POST['inputTextArea'])){
    echo "<br><table class=\"tg\"><tr><td><br><h3>Don't forget to enter words to define!</h3><br></td></tr></table><br>";
}else{
    $word_array = preg_replace('/\h+/', '', $_POST['inputTextArea']);
    $word_array = preg_split("/\R|,/", $word_array);

    foreach ($word_array as $current_word) {
        // start table
        echo "<table class=\"tg\">";
        echo "<tr><td><b>" . $current_word . "</b></td></tr>"; 
        $result = $conn->query("SELECT eword FROM dict WHERE sword='$current_word' limit 1");
        if(mysqli_num_rows($result) != 0){
            //$dict_array[$current_word] = $result->fetch_assoc()["eword"];
            echo "<tr><td class=\"tg-0pky\">" . $result->fetch_assoc()["eword"] . "</td></tr>";
        }else{
            echo "<tr><td class=\"tg-0pky\">~Not Found~</td></tr>";
            //$dict_array[$current_word] = "~Not Found~";
            // in future, have backup dictionary fetching, spanishdict/wordreference?
        }
        echo "</table><br>";
    }
}
?>