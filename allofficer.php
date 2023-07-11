<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive travel website design tutorial</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js" defer></script>
    <!--navbar css-->
    <script src="https://kit.fontawesome.com/d40481c340.js" crossorigin="anonymous"></script>
    <script>
        function type(){
            var form = document.officer_type_master;
            if(form.officer_type.value == ""){
                alert("Please Enter officer type"); 
                // $("#officer_type").removeClass("greenclass").addClass("redclass");
                return false;
            }
        }
    </script>
	 <style>	
       .dropdown {
              float: left;
              overflow: hidden;
        }
    
        .dropdown-content {
              display: none;
              position: absolute;
              background-color: #2f2d2d;
              min-width: 160px;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              z-index: 1;
        }
    
        .dropdown-content a {
              float: none;
              color: black;
              padding: 12px 16px;
              text-decoration: none;
              display: block;
              text-align: left;
        }
    
        .dropdown:hover .dropdown-content {
              display: block;
        }
    
        .dropdown .dropbtn {
              font-size: 16px;  
              border: none;
              outline: none;
              color: rgb(46, 92, 177);
              padding: 14px 16px;
              background-color: inherit;
              font-family: inherit;
              margin: 0;
        }
        </style>
        <!--navbar css-->
        <script>
      function openForm() {
        document.getElementById("popupForm").style.display = "block";
      }
      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }
    </script>
    <style>
      * {
        box-sizing: border-box;
      }
      .openBtn {
        display: flex;
        justify-content: left;
      }
      .openButton {
        border: none;
        border-radius: 5px;
        background-color: #1c87c9;
        color: white;
        padding: 14px 20px;
        cursor: pointer;
        position: fixed;
      }
      .loginPopup {
        position: relative;
        text-align: center;
        width: 100%;
      }
      .formPopup {
        display: none;
        position: fixed;
        left: 45%;
        top: 5%;
        transform: translate(-50%, 5%);
        border: 3px solid #999999;
        z-index: 9;
      }
      .formContainer {
        max-width: 300px;
        padding: 20px;
        background-color: #fff;
      }
      .formContainer input[type=text],
      .formContainer input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 20px 0;
        border: none;
        background: #eee;
      }
      .formContainer input[type=text]:focus,
      .formContainer input[type=password]:focus {
        background-color: #ddd;
        outline: none;
      }
      .formContainer .btn {
        padding: 12px 20px;
        border: none;
        background-color: #8ebf42;
        color: #fff;
        cursor: pointer;
        width: 100%;
        margin-bottom: 15px;
        opacity: 0.8;
      }
      .formContainer .cancel {
        background-color: #cc0000;
      }
      .formContainer .btn:hover,
      .openButton:hover {
        opacity: 1;
      }
    </style>
</head>
<body style="color:white;">
<?php

include_once "database_connection.php";


try {
    session_start();  
    
    $database = new Database();
    $con = $database->openConnection();

    ?>
<!-- header section starts  -->

<header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>

    <a data-aos="zoom-in-left" data-aos-delay="150" href="index.html" class="logo"> <i class="fa-solid fa-handcuffs"></i>POLICE </a>

    <nav class="navbar">
        <a data-aos="zoom-in-left" data-aos-delay="300" href="index.html">home</a>
        <!-- <a data-aos="zoom-in-left" data-aos-delay="600" href="index.html">USER</a>
        <a data-aos="zoom-in-left" data-aos-delay="750" href="#">OFFICER</a> -->
        <a data-aos="zoom-in-left" data-aos-delay="900" href="Adminside.html">ADMIN</a>
    </nav>
    <form action="allofficer.php" method="post">
        <span style="font-size:12px"><b>Show all officer. Press -></b></span>
        <input data-aos="fade-up" data-aos-delay="600" class="btn" type="submit" name="view" id="view">
        <a data-aos="zoom-in-left" data-aos-delay="1300" href="Adminside.html" id="" class="btn">Back</a>
    </form>

</header>
<br><br><br><br><br>
<!-- header section ends -->

<!-- review section starts  -->

<section class="review">
<?php
        if(isset($_POST['view'])) {
            $stmt = $con->prepare('SELECT * FROM officer');
            $stmt->execute();
            $officers  = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

        <div class="box-container" data-aos="fade-left" data-aos-delay="600">
        <?php foreach($officers as $officer){?>
            <div class="box">
                <p><?php echo "OFFICER Id : ".$officer['officer_id']; ?></p>
                <div class="user">
                    <img src="<?php echo $officer['image_url'];?>" alt="<?php echo $officer['image_url'];?>">
                    <div class="info">
                        <h3><?php echo "OFFICER NAME : ".$officer['officer_name']; ?></h3>
                        <span><?php echo "EMAIL : ".$officer['officer_email']; ?></span><br>
                        <span><?php echo "PASSWORD : ".$officer['officer_password']; ?></span><br>
                        <span><?php echo "DOB : ".$officer['officer_dob']; ?></span><br>
                        <span><?php if($officer['officer_gender'] == "0")
                                    { echo "GENDER[M\F]: M"; }
                                    else{ echo "GENDER[M\F]: F"; }?></span><br>
                        <span><?php echo "ADDRESS : ".$officer['officer_address']; ?></span><br>
                        <span><?php echo "PHONE # : ".$officer['officer_phone_no']; ?></span><br>
                        <span><?php echo "DOJ : ".$officer['officer_date_of_joining']; ?></span><br>
                        <span><?php echo "STATION ID : ".$officer['station_id']; ?></span><br>
                        <form action="update_officer.php" method="POST">
                            <input type="hidden" name="editid" value="<?php echo  $officer['officer_id'] ?>"/>
                            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                        </form>
                        <form action="admin_officer_handler.php" method="POST">
                            <input type="hidden" name="deleteid" value="<?php echo  $officer['officer_id'] ?>"/>
                            <button type="submit" name="delete" class="btn btn-success">Delete</button>
                        </form>
                        
                    </div>
                </div>
            </div>
            <?php
            } 
            ?>
        </div>

    </section>
               <?php
        }
        }
    
    catch(PDOException $e) {
            echo "Error" . $e->getMessage();
    }      
?>
    </div>

    </section>
    
<!-- review section ends -->



<br>
<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">

        <div class="box" data-aos="fade-up" data-aos-delay="150">
            <a href="#" class="logo"> <i class="fa-solid fa-handcuffs"></i>POLICE </a>
            <p>This Web Is Use For Study Purpose. Contact Us!</p>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="300">
            <!-- <h3>quick links</h3>
            <a href="#home" class="links"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#about" class="links"> <i class="fas fa-arrow-right"></i> about </a>
            <a href="#destination" class="links"> <i class="fas fa-arrow-right"></i> staff </a>
            <a href="#services" class="links"> <i class="fas fa-arrow-right"></i> services </a>
            <a href="#gallery" class="links"> <i class="fas fa-arrow-right"></i> gallery </a>
            <a href="#blogs" class="links"> <i class="fas fa-arrow-right"></i> news </a> -->
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="450">
            <h3>contact info</h3>
            <p> <i class="fas fa-map"></i> ahmedabad, india </p>
            <a href="tel:+918140801537"><p> <i class="fas fa-phone"></i> +91 81408 01537 </p></a>
            <a href="mailto:manavmeghani15@gmail.com"><p> <i class="fas fa-envelope"></i> manavmeghani15@gmail.com </p></a>
            <p> <i class="fas fa-clock"></i> 7:00am - 09:00pm </p>
        </div>

    </div>

</section>



<!-- footer section ends -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>

    AOS.init({
        duration: 800,
        offset:150,
    });

</script>

</body>
</html>