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

/*
$input = '1,2,3
4,5,,,,
,6,
7
,8,9
';

$data = str_replace(array("\r", "\n"), ',', $input);
$data = array_filter(explode(',', $data));

var_dump(array_values($data));
*/

$word_array = preg_replace('/\h+/', '', $_POST['inputTextArea']);
$word_array = preg_split("/\R|,/", $word_array);
try{
    $conjugations = @$_POST['conjugations'];
}catch (NoticeException $e){
    $conjugations = "";
}

if(empty($_POST['inputTextArea'])){
    echo "<br><table class=\"tg\"><tr><td><br><h3>Don't forget to enter verbs to conjugate!</h3><br></td></tr></table><br>";
}else if(empty($conjugations)){
    echo "<br><table class=\"tg\"><tr><td><br><h3>Don't forget to select conjugation tenses!</h3><br></td></tr></table><br>";
}else{
    foreach ($word_array as $current_word) {
        // start table
        echo "<table class=\"tg\">";
        echo "<tr><td><b>" . $current_word . "</b></td></tr>";

        foreach ($conjugations as $conjugation){
            switch ($conjugation) {
                // Participle vv
                case "gerund":
                case "pastparticiple":
                    $result = $conn->query("SELECT $conjugation FROM $conjugation WHERE infinitive='$current_word' limit 1");
                    break;
                    //$individual_array["gerund"][] = $result->fetch_assoc()["gerund"];
                
                // Indicative vvvvv
                case "present":
                    $result = $conn->query("SELECT form_1s, form_2s, form_3s, form_1p, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Indicativo' AND tense='Presente' limit 1");
                    break;    
                case "preterite":
                    $result = $conn->query("SELECT form_1s, form_2s, form_3s, form_1p, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Indicativo' AND tense='Preterito' limit 1");
                    break;
                case "imperfect":
                    $result = $conn->query("SELECT form_1s, form_2s, form_3s, form_1p, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Indicativo' AND tense='Imperfecto' limit 1");
                    break;
                case "conditional":
                    $result = $conn->query("SELECT form_1s, form_2s, form_3s, form_1p, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Indicativo' AND tense='Condicional' limit 1");
                    break;
                case "future":
                    $result = $conn->query("SELECT form_1s, form_2s, form_3s, form_1p, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Indicativo' AND tense='Futuro' limit 1");
                    break;
                
                // Perfect Indicative vvvvv
                case "perfect_present":
                    $result = $conn->query("SELECT form_1s, form_2s, form_3s, form_1p, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Indicativo' AND tense='Presente perfecto' limit 1");
                    break;
                case "perfect_preterite":
                    $result = $conn->query("SELECT form_1s, form_2s, form_3s, form_1p, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Indicativo' AND tense='Preterito anterior' limit 1");
                    break;
                case "perfect_past":
                    $result = $conn->query("SELECT form_1s, form_2s, form_3s, form_1p, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Indicativo' AND tense='Pluscuamperfecto' limit 1");
                    break;
                case "perfect_conditional":
                    $result = $conn->query("SELECT form_1s, form_2s, form_3s, form_1p, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Indicativo' AND tense='Condicional perfecto' limit 1");
                    break;
                case "perfect_future":
                    $result = $conn->query("SELECT form_1s, form_2s, form_3s, form_1p, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Indicativo' AND tense='Futuro perfecto' limit 1");
                    break;

                // Subjunctive vvv
                case "subj_present":
                    $result = $conn->query("SELECT form_1s, form_2s, form_3s, form_1p, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Subjuntivo' AND tense='Presente' limit 1");
                    break;
                case "subj_imperfect":
                    $result = $conn->query("SELECT form_1s, form_2s, form_3s, form_1p, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Subjuntivo' AND tense='Imperfecto' limit 1");
                    break;
                case "subj_future":
                    $result = $conn->query("SELECT form_1s, form_2s, form_3s, form_1p, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Subjuntivo' AND tense='Futuro' limit 1");
                    break;
                
                // Perfect Subjunctive vvv
                case "subj_perfect_present":
                    $result = $conn->query("SELECT form_1s, form_2s, form_3s, form_1p, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Subjuntivo' AND tense='Presente perfecto' limit 1");
                    break;
                case "subj_perfect_past":
                    $result = $conn->query("SELECT form_1s, form_2s, form_3s, form_1p, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Subjuntivo' AND tense='Pluscuamperfecto' limit 1");
                    break;
                case "subj_perfect_future":
                    $result = $conn->query("SELECT form_1s, form_2s, form_3s, form_1p, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Subjuntivo' AND tense='Futuro perfecto' limit 1");
                    break;
                
                // Imperative vv
                case "imperative_affirmative":
                    $result = $conn->query("SELECT form_2s, form_3s, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Imperativo Afirmativo' limit 1");
                    break;
                case "imperative_negative":
                    $result = $conn->query("SELECT form_2s, form_3s, form_2p, form_3p FROM verbs WHERE infinitive='$current_word' AND mood='Imperativo Negativo' limit 1");
                    break;

                default:
                    break;
            }

            if ($conjugation == "gerund" || $conjugation == "pastparticiple"){
                echo "<tr><td class=\"tg-0pky\">" . $result->fetch_assoc()[$conjugation] . "</td></tr>";
            }else if($conjugation == "imperative_affirmative" || $conjugation == "imperative_negative"){
                $row = $result->fetch_assoc();
                $temp_array = array("___", $row["form_2s"], $row["form_3s"], "___", $row["form_2p"], $row["form_3p"]);
                echo "<tr><td class=\"tg-0pky\">";
                $i = 0;
                if(mysqli_num_rows($result) != 0){
                    foreach ($temp_array as $current_conj){
                        $i++;
                        echo $current_conj;
                        if ($i != count($temp_array)) echo ", ";
                    }
                }else{
                    echo "~Not Found~";
                }
                echo "</td></tr>";
            }else{
                $row = $result->fetch_assoc();
                $temp_array = array($row["form_1s"], $row["form_2s"], $row["form_3s"], $row["form_1p"], $row["form_2p"], $row["form_3p"]);
                echo "<tr><td class=\"tg-0pky\">";
                $i = 0;
                if(mysqli_num_rows($result) != 0){
                    foreach ($temp_array as $current_conj){
                        $i++;
                        echo $current_conj;
                        if ($i != count($temp_array)) echo ", ";
                    }
                }else{
                    echo "~Not Found~";
                }
                echo "</td></tr>";
            }
        }
        echo "</table><br>";
    }
}

?>

</body>
</html>