<?php
require(__DIR__ . "/../../../lib/db.php");
require(__DIR__ . "/../../../lib/functions.php");
?>
<?php
    try {
        $db = getDB();
        session_start();
        $userId= get_user_id();

        $boardSolved=$_POST['boardSolved'];
        $thePoints=$_POST['points'];
        if($boardSolved=="true" || $boardSolved=="false"){//is boardSolved is null, we dont want to update it
            $boardSolved=$boardSolved==="false"?0:1;
            if($boardSolved===1){
                //+1 to users score
                $getScore = $db->prepare("SELECT score from Scores where user_id = :userId");
                $getScore->execute([":userId" => $userId]);
                $theFetch=$getScore->fetch();
                
                if ($theFetch===false){
                    $putScore = $db->prepare("INSERT INTO Scores (score,user_id) VALUES (:newScore,:userId)");
                }
                else{
                    $putScore = $db->prepare("UPDATE Scores SET score=:newScore where user_id = :userId");
                }
                $theScore=$theFetch===false?"0":$theFetch["score"];
                $putScore->execute([":newScore"=>$theScore+1,":userId" => $userId]);
                echo "Correct Board\n";
            }
            $addAttempt = $db->prepare("INSERT INTO ScoreHistory (user_id,correct) VALUES (:userId,:correctBrd)");
            $addAttempt->execute([":userId" => $userId,":correctBrd" => $boardSolved]);
            echo "Databases Updated!!\n";
        }

        if ($thePoints!="0"){
            $getScore = $db->prepare("UPDATE Users SET points=points+ :thePoints WHERE id= :userId;");
            $getScore->execute([":thePoints" => $thePoints,":userId" => $userId]);
            echo "Points Updated!!";
        }
    } catch (Exception $e) {
         echo var_export($e, true);
         echo "\nDatabase not updated";
    }
    // echo "85";
?>