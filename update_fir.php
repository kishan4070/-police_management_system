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
            
            $stmt = $con->prepare("SELECT * FROM fir where fir_no='$id'");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);      
                      
            if($stmt->rowCount()>0)
            {
            foreach ($result as $row) 
            {                
            ?>
             <form action="admin_fir_handler.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="editid" value="<?php echo  $row['fir_no'] ?>"/>
            <div lass="from-group">
                <label>User id:</label>
                <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id'] ?>" required>
            </div>
            <div lass="from-group">
                <label>Status:</label>
                <input type="text" name="fir_status" class="form-control" placeholder="[PENDING: 0/SUCCESS: 1]" value="<?php echo $row['fir_status'] ?>" required>
            </div>
            <div class="modal-footer">
            <a href="ADMIN_FIR_DETAILS.php"><button type="button" class="btn btn-secondary">Close</button> </a>
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