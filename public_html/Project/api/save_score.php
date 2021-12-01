<?php
require(__DIR__ . "/../../../lib/db.php");
require(__DIR__ . "/../../../lib/functions.php");
?>
<?php
    try {
        $db = getDB();
        session_start();
        $userId= get_user_id();
        
        $saveScore = $db->prepare("INSERT INTO Scores (score,user_id) VALUES (1,:userId) ON DUPLICATE UPDATE score=score+1");
        $saveScore->execute([":userId" => $userId]);
        $theFetch=$saveScore->fetch();
        // $theScore=$theFetch===false?"0":$theFetch;
        echo var_export($theFetch);
    } catch (Exception $e) {
        // flash("<pre>" . var_export($e, true) . "</pre>");
         echo var_export($e, true);
    }
    // echo "85";
?>