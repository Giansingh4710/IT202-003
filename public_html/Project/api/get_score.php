<?php
require(__DIR__ . "/../../../lib/db.php");
require(__DIR__ . "/../../../lib/functions.php");
?>
<?php
    $theScore="test";
    try {
        $db = getDB();
        session_start();
        $userId= get_user_id();

        $getScore = $db->prepare("SELECT score from Scores where user_id = :userId");
        $getScore->execute([":userId" => $userId]);
        $theFetch=$getScore->fetch();
        $theScore=$theFetch===false?"0":$theFetch["score"];
        echo $theScore;
    } catch (Exception $e) {
         echo var_export($e, true);
    }
?>