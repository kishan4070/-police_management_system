<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive travel website design tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
    <!--navbar css-->
    <link
      href="https://getbootstrap.com/docs/5.2/assets/css/docs.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        a{
            text-decoration: none;
        }
        h2{
            color:white;
        }
    </style>
</head>
<body style="color:white">
<?php

include_once "database_connection.php";


try {
    session_start();
    $user_id = $_SESSION['userid'];

    $database = new Database();
    $con = $database->openConnection();

    ?>
<!-- header section starts  -->

<header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>

    <a data-aos="zoom-in-left" data-aos-delay="150" href="index.html" class="logo"> <i class="fa-solid fa-handcuffs"></i>POLICE </a>

    <nav class="navbar">
        <a data-aos="zoom-in-left" data-aos-delay="300" href="index.html">home</a>
        <a data-aos="zoom-in-left" data-aos-delay="600" href="USER_FORMS.php">USER</a>
        <!-- <a data-aos="zoom-in-left" data-aos-delay="750" href="#">OFFICER</a>
        <a data-aos="zoom-in-left" data-aos-delay="900" href="#">ADMIN</a> -->
    </nav>

    <a data-aos="zoom-in-left" data-aos-delay="1300" href="logout.php" id="" class="btn">Log-OFF</a>

</header>
<br><br><br>
<!-- header section ends -->

<!--Tab Bar start-->
<div class="banner">

    <div class="content" data-aos="zoom-in-up" data-aos-delay="300">


    <div class="navbar" style="margin-left: 40%;font-size:3ex">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <!-- <li class="nav-item" role="presentation">
        <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">USER DETAILS</button>
        </li>
        <li class="nav-item" role="presentation">
        <a href="index.html"><button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">FIR</button></a>
        </li> -->
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">FIR DETAILS</button>
        </li>
    </ul>
    </div>
    <br><br><br>
    <div class="tab-content" id="myTabContent" class="navbar">
    <!--Third Tab For Fir Details-->
    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
<!-- Fir Details start -->
    <center>
        <?php 
        if(isset($_POST['btn_submit']) ) {
            $insert_query = "INSERT INTO fir(user_id, date_time, particulars,
            suspect_name,suspect_phone_no, suspect_address) 
                    VALUES 
                    (:user_id, :date_time, :particulars,
                    :suspect_name,:suspect_phone_no, :suspect_address)";
            $query_prepare = $con->prepare($insert_query);
            
            $data =  [
            ':user_id'=>$user_id,
            ':date_time'=>$_POST['date_time'],
            ':particulars'=>$_POST['particulars'],
            ':suspect_name'=>$_POST['suspect_name'],
            ':suspect_phone_no'=>$_POST['suspect_phone_no'],
            ':suspect_address'=>$_POST['suspect_address'],
            ];
            $query_run = $query_prepare->execute($data);
            if($query_run) {				
                		


            $query_select = "SELECT  * FROM fir WHERE user_id=:user_id";
            $prepare_query = $con->prepare($query_select);
            $data= [
                ':user_id'=> $_SESSION['userid']
            ];
            $run_query = $prepare_query->execute($data);

            
            if($run_query)
            {
                $details = $prepare_query->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($details as $detail){
            ?>
            <!-- <section class="about" id="about">

                
                <div class="content" data-aos="fade-left" data-aos-delay="600">-->
            
                        <div style="width:fit-content; box-shadow:0px 8px 16px 0px rgba(0,0,0,2); border-radius:15px">
                        <span><?php echo "USER ID: ".$_SESSION['userid']; ?></span>
                        <h2><?php echo "DATE & TIME :       ".$detail['date_time']; ?></h2>
                        <h2><?php echo "PARTICULARS :            ".$detail['particulars']; ?></h2>
                        <h3>SUSPECT DETAILS</h3>
                        <h2><?php echo "SUSPECT :         ".$detail['suspect_name']; ?></h2>
                        <h2><?php echo "PHONE # :           ".$detail['suspect_phone_no']; ?></h2>
                        <h2><?php echo "ADDRESS :    ".$detail['suspect_address']; ?></h2>
                        <?php if($detail['fir_status']==0){?>
                            <h2><?php echo "STATUS : PENDING"; }
                                else{
                                    echo "STATUS : SUCCESS";
                                } ?></h2>
                        </div>
                        <?php
                    } 
                    }
                    else{
                        header('location:USER_FORMS.php');
                    }
                }
            }



            if(isset($_POST['details']) ) {
                $query_select = "SELECT  * FROM fir WHERE user_id=:user_id";
                $prepare_query = $con->prepare($query_select);
                $data= [
                    ':user_id'=> $_SESSION['userid']
                ];
                $run_query = $prepare_query->execute($data);
    
                
                if($run_query)
                {
                    $details = $prepare_query->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach($details as $detail){
                ?>
                <!-- <section class="about" id="about">
    
                    
                    <div class="content" data-aos="fade-left" data-aos-delay="600">
                
                            <h1 style="color:white;"> <?php echo "<br>YOUR DETAILS<br>"; ?> </h1> -->
                            <div style="width:fit-content; box-shadow:0px 8px 16px 0px rgba(0,0,0,2); border-radius:15px">
                            <span><?php echo "USER ID: ".$_SESSION['userid']; ?></span>
                            <h2><?php echo "DATE & TIME :       ".$detail['date_time']; ?></h2>
                            <h2><?php echo "PARTICULARS :            ".$detail['particulars']; ?></h2>
                            <h3 style="color:cyan;">SUSPECT DETAILS</h3>
                            <h2><?php echo "SUSPECT :         ".$detail['suspect_name']; ?></h2>
                            <h2><?php echo "PHONE # :           ".$detail['suspect_phone_no']; ?></h2>
                            <h2><?php echo "ADDRESS :    ".$detail['suspect_address']; ?></h2>
                            <?php if($detail['fir_status']==0){?>
                            <h2><?php echo "STATUS : PENDING"; }
                                else{
                                    echo "STATUS : SUCCESS";
                                } ?></h2>
                            </div>
                            
                            <?php
                        } 
                        }
                        else{
                            echo "No Data Found !!!";
                        }
                    }
                }
            catch(PDOException $e1) {
                    echo "Error" . $e1->getMessage();
            }      	
        ?>
    
    </div>
    </center>
    </section>
<!-- Fir Details end -->
    </div>
  </div>
<!--Tab Bar end-->
  </div>
  </div>
<!-- footer section starts  -->

<section class="footer" style="color: white;">

    <div class="box-container">

        <div class="box" >
            <a href="#" class="logo"> <i class="fa-solid fa-handcuffs"></i>POLICE </a>
            <p>This Web Is Use For Study Purpose. Contact Us!</p>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box" >
            <!-- <h3>quick links</h3>
            <a href="#home" class="links"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#about" class="links"> <i class="fas fa-arrow-right"></i> about </a>
            <a href="#destination" class="links"> <i class="fas fa-arrow-right"></i> staff </a>
            <a href="#services" class="links"> <i class="fas fa-arrow-right"></i> services </a>
            <a href="#gallery" class="links"> <i class="fas fa-arrow-right"></i> gallery </a>
            <a href="#blogs" class="links"> <i class="fas fa-arrow-right"></i> news </a> -->
        </div>

        <div class="box">
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