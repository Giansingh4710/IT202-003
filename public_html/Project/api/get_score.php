<?php
require(__DIR__ . "/../../../lib/db.php");
require(__DIR__ . "/../../../lib/functions.php");
?>
<?php
    $theScore="test";
    try {
        $email="giansingh4710@gmail.com";
        $email="bob";
        $db = getDB();
        // $getId = $db->prepare("SELECT id from Users where email = :email OR username = :email");
        // $getId->execute([":email" => $email]);
        // $theFetch= $getId->fetch();
        // $userId= $theFetch['id'];
        session_start();
        $userId= get_user_id();

        $getScore = $db->prepare("SELECT score from Scores where user_id = :userId");
        $getScore->execute([":userId" => $userId]);
        $theFetch=$getScore->fetch();
        $theScore=$theFetch===false?"0":$theFetch["score"];
        echo $theScore;
    } catch (Exception $e) {
        // flash("<pre>" . var_export($e, true) . "</pre>");
         echo var_export($e, true);
    }
    // echo "85";
?>