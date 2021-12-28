<?php

require(__DIR__ . "/../../../partials/nav.php"); 
if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location:" . "home.php"));
}

$db = getDB();
$stmt = $db->prepare("SELECT * FROM Users");
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

// function setSession($name,$data){
//     $_SESSION[$name]=$data;
// }

?>
<div class="container-fluid">
    <h1>Not Paid Out Competitions</h1>
    <table class="table">
        <thead>
            <th>Username</th>
            <th>Id</th>
            <th>email</th>
            <th>created</th>
            <th>modified</th>
            <th>points</th>
            <th>visibility</th>
        </thead>
        <tbody>
            <?php if (count($results) > 0) : ?>
                <?php foreach ($results as $row) : ?>
                    <tr>
                        <td>
                            <a href="../others_profile.php?player=<?php se($row, "username"); ?>">
                                <?php se($row, "username"); ?>
                            </a>
                        </td>
                        <td><?php se($row, "id"); ?></td>
                        <td><?php se($row, "email"); ?></td>
                        <td><?php se($row, "created"); ?></td>
                        <td><?php se($row, "modified"); ?></td>
                        <td><?php se($row, "points"); ?></td>
                        <td><?php se($row, "visibility"); ?></td>
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