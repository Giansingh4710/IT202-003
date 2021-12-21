<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

$db = getDB();
$getScores = $db->prepare("SELECT * FROM CompetitionParticipants INNER JOIN Competitions ON Competitions.id=CompetitionParticipants.comp_id WHERE user_id= :uid");
$getScores->execute([":uid" => get_user_id()]);
$totalRows=$getScores->rowCount();
$resultsPerPage=10;
$numOfPages=ceil($totalRows/$resultsPerPage);

if (!isset($_GET["page"])){
    die(header("Location: my_comp_hist.php?page=1"));
}else if($_GET["page"]<1){
    die(header("Location: my_comp_hist.php?page=1"));
}else if($_GET["page"]>$numOfPages){
    die(header("Location: my_comp_hist.php?page=".$numOfPages));
}
else{
    $page=$_GET["page"];
}
$row=($page-1)*$resultsPerPage;
$userComps=get_user_comp_history($row,$resultsPerPage);

$results=$userComps;
?>
<style>
        .pagination {
          display: inline-block;
        }

        .pagination a {
          color: black;
          float: left;
          padding: 8px 16px;
          text-decoration: none;
          transition: background-color .3s;
          border: 1px solid #ddd;
        }

        .pagination a.active {
          background-color: #4CAF50;
          color: white;
          border: 1px solid #4CAF50;
        }

        .pagination a:hover:not(.active) {background-color: #ddd;}

</style>
<div class="container-fluid">
    <h1>My Competitions History</h1>
    <table class="table">
        <thead>
            <th>Competition Name</th>
            <th>Duration of Competition</th>
            <th>Expires/Expired</th>
            <th>Total Participants</th>
            <th>Paid Out</th>
            <!-- <thead>Actions</th> -->
        </thead>
        <tbody>
            <?php if (count($results) > 0) : ?>
                <?php foreach ($results as $row) : ?>
                    <tr>
                        <td>
                            <a href="comp_leaderboard.php?comp=<?php se($row, "comp_name"); ?>">
                                <?php se($row, "comp_name"); ?>
                            </a>
                        </td>
                        <td><?php se($row, "duration"); ?></td>
                        <td><?php se($row, "expires"); ?></td>
                        <td><?php se($row, "current_participants"); ?></td>
                        <td><?php echo se($row, "paid_out", "-",false)=="1"?"True":"False"; ?></td>
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
<?php
if ($page-1==0) $page=2;
if ($page+1==$numOfPages+1) $page=$numOfPages-1;
$j='<div class="pagination">
        <a href="my_comp_hist.php?page='.($page-1).'">❮</a>
        <a href="my_comp_hist.php?page='.($page+1).'">❯</a>
    </div>';
echo $j;
require(__DIR__ . "/../../partials/flash.php");
?>