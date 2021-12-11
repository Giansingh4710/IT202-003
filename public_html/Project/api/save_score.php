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
            updateScore($boardSolved);
            echo "Databases Updated!!\n";
        }

        if ($thePoints!="0"){
            $reason=$_POST['reason'];
            updatePoints($thePoints,$reason);
            echo "Points Updated!!";
        }
    } catch (Exception $e) {
         echo var_export($e, true);
         echo "\nDatabase not updated";
    }
    // echo "85";
?>