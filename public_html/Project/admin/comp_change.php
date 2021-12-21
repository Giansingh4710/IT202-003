<?php

require(__DIR__ . "/../../../partials/nav.php"); 
if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location:" . "home.php"));
}

if (!isset($_GET["comp"])){
    echo "no comp";
    return;
}
else{
    $comp=$_GET["comp"];
}
$data=$_SESSION[$comp];
// echo "<pre>".var_export($data,true)."</pre>";
// echo "<pre>".var_export($_POST,true)."</pre>";

if (isset($_POST["comp_name"]) && !empty($_POST["comp_name"])) {
    $comp_name=$_POST['comp_name'];

    $db=getDB();
    $check=$db->prepare("SELECT comp_name FROM Competitions WHERE comp_name=:cnm");
    $check->execute([":cnm"=>$comp_name]);
    $check=$check->rowCount();
    if ($check>0 && $comp_name!=$data['comp_name']){
        flash("Already have a competition with name: ".$comp_name,"warning");
    }
    else{
        $params=array ( 
            ':comp_name' =>$_POST['comp_name'],
            ':expires'=>$_POST["expireDate"],
            ':min_score' =>$_POST['min_score'],
            ':min_participants' =>$_POST['min_participants'],
            ':join_fee' =>$_POST['join_fee'],
            ':oldName' =>$data['comp_name']
        );
        $update=$db->prepare("UPDATE Competitions SET comp_name=:comp_name,expires=:expires,duration=ROUND((expires-created)/1000000),min_score=:min_score,min_participants=:min_participants,join_fee=:join_fee WHERE comp_name=:oldName");
        try{

            $update->execute($params);  
            flash("Updated Succesfully","success"); 
            die(header("Location: change_comps.php"));
        } catch (PDOException $e) {
            echo "<pre>".var_export($e,true)."</pre>";
        }
    }
}

function onlyDate($dateStr){
    $datePart=explode(" ",$dateStr)[0];
    return $datePart;
}
?>

<div class="container-fluid">
    <h1>Change Competition: <?php echo $comp ?> </h1>
    <form method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input value="<?php echo $data["comp_name"] ?>" id="title" name="comp_name" class="form-control" />
        </div>
        <div class="mb-3">
            <label for="ms" class="form-label">Min. Score</label>
            <input value="<?php echo $data["min_score"] ?>" id="ms" name="min_score" type="number" class="form-control" placeholder=">= 1" min="1" />
        </div>
        <div class="mb-3">
            <label for="mp" class="form-label">Min. Participants</label>
            <input value="<?php echo $data["min_participants"] ?>" id="mp" name="min_participants" type="number" class="form-control" placeholder=">= 3" min="3" />
        </div>
        <div class="mb-3">
            <label for="jc" class="form-label">Join Cost</label>
            <input value="<?php echo $data["join_fee"] ?>" id="jc" name="join_fee" type="number" class="form-control" onchange="updateCost()" placeholder=">= 0" min="0" />
        </div>
        <div class="mb-3">
            <label for="expires" class="form-label">Expires</label>
            <input value="<?php echo onlyDate($data["expires"]) ?>" id="duration" name="expireDate" type="date" class="form-control" placeholder=">= 3" min="3" />
            <!-- <input value="" id="expires" name="expireDate" type="date" class="form-control" /> -->
        </div>
        <div class="mb-3">
            <input type="submit" value="Update" class="btn btn-primary" />
        </div>
    </form>
    <script>
        const dateInput=document.getElementById("expires");
        const ans=Date.parse('<?php echo $data["expires"] ?>');
        console.log(ans);
        dateInput.value=ans;
    </script>
</div>
<?php
require(__DIR__ . "/../../../partials/flash.php");
?>