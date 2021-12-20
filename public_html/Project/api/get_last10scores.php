<?php
require(__DIR__ . "/../../../lib/db.php");
require(__DIR__ . "/../../../lib/functions.php");
?>
<?php
    try {
        $db = getDB();
        session_start();
        $userId= get_user_id();

        $start=$_POST["start"];
        $resultnum=$_POST["resultnum"];

        $query="SELECT * FROM ScoreHistory WHERE user_id = :userId ORDER BY created DESC LIMIT ".$start.",".$resultnum;
        $getScores = $db->prepare($query);
        $getScores->execute([":userId" => $userId]);
        $theFetch=$getScores->fetchAll();
        $json= json_encode($theFetch);
        echo $json;
    } catch (Exception $e) {
         echo var_export($e, true);
         echo "\nDatabase not updated";
    }
?>