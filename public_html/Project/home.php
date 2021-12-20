<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<?php
if (!is_logged_in(true)) {
    die(header("Location: login.php"));
}
// echo "Weekly <br>";
// echo "<pre>".var_export(get_top10_weekly())."</pre>";
// echo "Monthly <br>";
// echo "<pre>".var_export(get_top10_monthly())."</pre>";
// echo "Lifetime <br>";
// echo "<pre>".var_export(get_top10_lifetime(),true)."</pre>";
$weekly=get_top10_weekly();
$monthly=get_top10_monthly();
$lifetime=get_top10_lifetime();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <div class="container-fluid">
        <h1>Home</h1>

        <h3>This Weeks Top Players</h3>
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Score</th>
            </thead>
            <tbody>
                <?php if (count($weekly) > 0) : ?>
                    <?php foreach ($weekly as $row) : ?>
                        <tr>
                            <td>
                                <a href="others_profile.php?player=<?php se($row, "username"); ?>">
                                    <?php se($row, "username"); ?>
                                </a>
                            </td>
                            <td><?php se($row, "score"); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="100%">No Competition History</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        
        <h3>This Months Top Players</h3>
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Score</th>
            </thead>
            <tbody>
                <?php if (count($monthly) > 0) : ?>
                    <?php foreach ($monthly as $row) : ?>
                        <tr>
                            <td>
                                <a href="others_profile.php?player=<?php se($row, "username"); ?>">
                                    <?php se($row, "username"); ?>
                                </a>
                            </td>
                            <td><?php se($row, "score"); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="100%">No Competition History</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <h3>Top Players Lifetime</h3>
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Score</th>
            </thead>
            <tbody>
                <?php if (count($lifetime) > 0) : ?>
                    <?php foreach ($lifetime as $row) : ?>
                        <tr>
                            <td>
                                <a href="others_profile.php?player=<?php se($row, "username"); ?>">
                                    <?php se($row, "username"); ?>
                                </a>
                            </td>
                            <td><?php se($row, "score"); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="100%">No Competition History</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <form action="game.php">
        <button type="submit" class="btn btn-primary">Play Suduko</button>
    </form>
</body>
</html>



<?php
require(__DIR__ . "/../../partials/flash.php");
?>