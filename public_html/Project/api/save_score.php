<?php
require(__DIR__ . "/../../../lib/db.php");
require(__DIR__ . "/../../../lib/functions.php");
?>
<?php
    try {
        $db = getDB();
        session_start();
        $userId= get_user_id();
        
        $getScore = $db->prepare("SELECT score from Scores where user_id = :userId");
        $getScore->execute([":userId" => $userId]);
        $theFetch=$getScore->fetch();
        $theScore=$theFetch===false?"0":$theFetch["score"];

        if ($theFetch===false){
            $putScore = $db->prepare("INSERT INTO Scores (score,user_id) VALUES (:newScore,:userId)");
        }
        else{
            $putScore = $db->prepare("UPDATE Scores SET score=:newScore where user_id = :userId");
        }
        $putScore->execute([":newScore"=>$theScore+1,":userId" => $userId]);

    } catch (Exception $e) {
        // flash("<pre>" . var_export($e, true) . "</pre>");
         echo var_export($e, true);
    }
    // echo "85";
?>