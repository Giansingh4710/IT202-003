<?php
require(__DIR__ . "/../../../lib/db.php");
require(__DIR__ . "/../../../lib/functions.php");
?>
<?php
    try {
        $db = getDB();
        session_start();
        $userId= get_user_id();

        $getPoints = $db->prepare("SELECT points from Users where id = :userId");
        $getPoints->execute([":userId" => $userId]);
        $theFetch=$getPoints->fetch();
        $thePoints=$theFetch["points"];
        echo $thePoints;
    } catch (Exception $e) {
        // flash("<pre>" . var_export($e, true) . "</pre>");
         echo var_export($e, true);
    }
    // echo "85";
?>