<?php

require(__DIR__ . "/../../../partials/nav.php"); 
if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location:" . "home.php"));
}

$db = getDB();
$stmt = $db->prepare("SELECT * FROM Competitions WHERE paid_out=0");
$results = [];
try {
    $stmt->execute();
    $r = $stmt->fetchAll();
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    flash("There was a problem fetching competitions, please try again later", "danger");
    error_log("List competitions error: " . var_export($e, true));
}

function setSession($name,$data){
    $_SESSION[$name]=$data;
}

?>
<div class="container-fluid">
    <h1>Not Paid Out Competitions</h1>
    <table class="table">
        <thead>
            <th>Title</th>
            <th>Participants</th>
            <th>Reward</th>
            <th>Min Score</th>
            <th>Expires</th>
        </thead>
        <tbody>
            <?php if (count($results) > 0) : ?>
                <?php foreach ($results as $row) : ?>
                    <tr>
                        <td>
                            <a onclick="<?php setSession($row["comp_name"],$row) ?>" href="comp_change.php?comp=<?php se($row, "comp_name"); ?>">
                                <?php se($row, "comp_name"); ?>
                            </a>
                        </td>
                        <td><?php se($row, "current_participants"); ?>/<?php se($row, "min_participants"); ?></td>
                        <td><?php se($row, "current_reward"); ?><br>Payout: <?php  echo (se($row, "paid_out", "-",false))==="1"?'true':'false'; ?></td>
                        <td><?php se($row, "min_score"); ?></td>
                        <td><?php se($row, "expires", "-"); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="100%">No active competitions</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php
require(__DIR__ . "/../../../partials/flash.php");
?>