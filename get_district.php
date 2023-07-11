<?php
include_once "database_connection.php";

try {
    $database = new Database();
    $con = $database->openConnection();
    if(!empty($_POST["city_id"])) 
    {
    //$query =mysqli_query($con,"SELECT * FROM area WHERE CtCode = '" . $_POST["city_id"] . "'");
        $stmt = $con->prepare("SELECT * FROM area WHERE CtCode= '" . $_POST["city_id"] ."'");
        $stmt->execute();
        $areas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
        <option value="">Select area</option>
        <?php
        foreach ($areas as $area) 
        {  
        ?>
        <option value="<?php echo $area["AreaCode"]; ?>">
        <?php echo $area["AreaName"]; ?></option>
        <?php
        }
    }
    }
    catch (PDOException $e) 
    {
        $e->getMessage();
	} 
?>
