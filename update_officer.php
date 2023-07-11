<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</head>
<body>
<?php
    session_start();
    include_once "database_connection.php";
    try {
        $database = new Database();
        $con = $database->openConnection();
    }
    catch (PDOException $e) 
    {
        $e->getMessage();
    }
?>


<div class="container-fluid">
<div class="card">
<div class="card-header">
    Edit Data
  </div>
  <div class="card-body">
    <?php
        if (isset($_POST['edit']))
        {
            $id=$_POST['editid'];
            
            $stmt = $con->prepare("SELECT * FROM officer where officer_id='$id'");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);      
                      
            if($stmt->rowCount()>0)
            {
            foreach ($result as $row) 
            {                
            ?>
             <form action="admin_officer_handler.php"  name="officer_regform" id="officer_regform" method="POST" enctype="multipart/form-data" onsubmit="return RegOfficer()">
                <input type="hidden" name="editid" value="<?php echo  $row['officer_id'] ?>"/>
            <div lass="from-group">
                <label>Officer Name:</label>
                <input type="text" name="officer_name" class="form-control" value="<?php echo $row['officer_name'] ?>" required>
            </div>
            <div lass="from-group">
                <label>Email:</label>
                <input type="text" name="officer_email" class="form-control" value="<?php echo $row['officer_email'] ?>" required>
            </div>
            <div lass="from-group">
                <label>DOB:</label>
                <input type="date" name="officer_dob" class="form-control" value="<?php echo $row['officer_dob'] ?>" required>
            </div>
            <div lass="from-group">
                <label>DOJ:</label>
                <input type="date" name="officer_date_of_joining" class="form-control" value="<?php echo $row['officer_date_of_joining'] ?>" required>
            </div>
            <div lass="from-group">
                <label>Address:</label>
                <input type="text" name="officer_address" class="form-control" value="<?php echo $row['officer_address'] ?>" required>
            </div>
            <div lass="from-group">
                <label>Phone #:</label>
                <input type="text" name="officer_phone_no" class="form-control" value="<?php echo $row['officer_phone_no'] ?>" required>
            </div>
            <div lass="from-group">
                <label>GENDER:</label>
                <input type="radio" name="officer_gender" id="officer_gender" value="0" required>Male &nbsp;&nbsp;
                <input type="radio" name="officer_gender" id="officer_gender" value="1">&nbsp;&nbsp;Female
            </div>
            <div lass="from-group">
                <label>Station:</label>
                <select class="btn" name="station_id" id="station_id" required>
                    <option value="">Select station id</option>

                    <?php
                    $stmt = $con->prepare('SELECT * FROM station_master');
                    $stmt->execute();
                    $stations  = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($stations as $station)
                    {?>                                    
                        <option value="<?php echo $station['station_id'];?>">
                        <?php echo $station['station_name'];?></option>  
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div lass="from-group">
                <label>PASSWORD:</label>
                <input type="text" name="officer_password" id="officer_password" placeholder="password" value="<?php echo $row['officer_password'] ?>">
                <input type="password" name="repassword" id="repassword" placeholder="re-password" required>
            </div>
            
            <div class="modal-footer">
            <a href="allofficer.php"><button type="button" class="btn btn-secondary">Close</button> </a>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
      </div>
            </form>
      </div>
        <?php    
        }
        } 
        }
        ?>

  </div>
</div>
</div>
</body>
</html>