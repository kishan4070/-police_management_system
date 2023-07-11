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
    <script>
        function regFir(){
          var form = document.firform;
          //user id
        //   if(form.user_id.value == ""){
        //       alert("Please Enter UserId"); 
        //       return false;
        //   }

          //date & time
          if(form.date_time.value == ""){
              alert("Please select date_time"); 
              return false;
          }

          //particulars
          if(form.particulars.value == ""){
              alert("Please Enter Reason"); 
              return false;
          }

          //suspect_name
          //suspect_phone_no
          if((form.suspect_name.value != "")&&
              (form.suspect_phone_no.value == "")){
              alert("Please Enter Suspect Phone Number"); 
              return false;
          }

          //suspect_address
          if((form.suspect_name.value != "")&&
              (form.suspect_address.value == "")){
              alert("Please Enter Suspect Address"); 
              return false;
          }

      }
    </script>
</head>
<body style="color:white">
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
        <a data-aos="zoom-in-left" data-aos-delay="600" href="#">USER</a>
        <a data-aos="zoom-in-left" data-aos-delay="750" href="#">OFFICER</a>
        <a data-aos="zoom-in-left" data-aos-delay="900" href="#">ADMIN</a>
    </nav>

    <a data-aos="zoom-in-left" data-aos-delay="1300" href="#SignUp" id="frm1" class="btn">Sign Up</a>

</header>
<br><br><br>
<!-- header section ends -->

<!--Tab Bar start-->
<div class="banner">`

    <div class="content" data-aos="zoom-in-up" data-aos-delay="300">


    <div class="navbar" style="margin-left: 40%;font-size:3ex">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
        <a href="USER_FORMS.php"><button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">USER DETAILS</button></a>
        </li>
        <li class="nav-item active" role="presentation">
        <a href="FIR.php"><button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">FIR</button></a>
        </li>
        <li class="nav-item" role="presentation">
        <a href="FIR_DETAILS.php"><button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"> FIR DETAILS</button></a>
        </li>
    </ul>
    </div>
    <div class="tab-content" id="myTabContent" class="navbar">
    
    <!--First Tab for User Details-->
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
    <!-- User Details starts  -->
    <?php
        if(isset($_POST['btn_login'])) {
            $select_query = "SELECT  * FROM user WHERE user_email=:user_email AND user_password=:user_password";
            $query_prepare = $con->prepare($select_query);
            $data= [
                ':user_email'=> $_POST['user_email'],
                ':user_password'=> $_POST['user_password']
            ];
            $query_run = $query_prepare->execute($data);

            
            if($query_run)
            {
                $results = $query_prepare->fetchAll(PDO::FETCH_ASSOC);
                
            foreach($results as $result){
    ?>
    <section class="about" id="about">

        <div class="video-container" data-aos="fade-right" data-aos-delay="300">
            <img src="<?php echo $result['user_image'];?>" width="500px" muted autoplay loop class="video" alt="<?php echo $result['user_image'];?>">
        </div>

        <div class="content" data-aos="fade-left" data-aos-delay="600">
        
                <h1 style="color:white;"> <?php echo "<br>YOUR DETAILS<br>"; ?> </h1>
                <span><?php echo "USER ID: ".$result['user_id']; ?></span>
                <h3><?php echo "NAME :       ".$result['user_name']; ?></h3>
                <h2><?php echo "EMAIL :            ".$result['user_email']; ?></h2>
                <h2><?php echo "PASSWORD :         ".$result['user_password']; ?></h2>
                <h2><?php echo "GENDER :           ".$result['user_gender']; ?></h2>
                <h2><?php echo "DOB :    ".$result['user_dob']; ?></h2>
                <h2><?php echo "PHONE # :         ".$result['user_phone_no']; ?></h2>
                <h2><?php echo "ADDRESS :          ".$result['user_address']; ?></h2>
                
                <?php
                $_SESSION['userid'] = $result['user_id'];?>

                <?php
            } 
        }
        }
    }
    catch(PDOException $e) {
            echo "Error" . $e->getMessage();
    }      
?>
    </div>

    </section>
    <!-- User Details ends -->

    </div>

    <!--Second Tab For Fir Form-->
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
    
    <!-- Fir Form section starts  -->
    <div class="content" data-aos="zoom-in-up" data-aos-delay="300">
        <br><br><br>
    <center>
        <table>
        <tr>
            <th class="fff"><h3>FIR Registration Form</h3></th>
        </tr>
        <form action="fir_handler.php" id="firform" name="firform"  method="post" onsubmit="return regFir()">
            <div data-aos="zoom-in" data-aos-delay="150" class="inputBox1">
            
        <tr>
                <td><span class="form">User Id</span></td>
                <td><h2><?php echo $_SESSION['userid'];?></h2><input type="hidden" class="firstname" name="user_id" id="user_id" value="<?php echo $_SESSION['userid'];?>">

        </tr>
        <tr>
                <td><span class="date1">Date of complaint: </span></td>
                <td><input class="date" type="datetime-local" name="date_time" id="date_time"></td>  
        </tr>
        <tr>
            <td><span class="pare1">Enter particulars</span></td>
            <td> <input type="text" class="pare" name="particulars" id="particulars" placeholder="Enter Reason"></td>
        </tr>
            <tr>
            <td><span class="name1">Enter Suspect Name</span></td>
            <td><input class="name" type="text" name="suspect_name" id="suspect_name" placeholder="Enter suspect name"></td>
        
        </tr>
        <tr>
                <td><span class="phone1">Enter Suspect Phone #</span></td>
                <td><input class="phone" type="text" name="suspect_phone_no" id="suspect_phone_no" placeholder="Enter suspect phone number"></td>
        </tr>
            <tr>
                <td> <span class="adds1">Enter Suspect Address</span></td>
                <td><input class="adds" type="text" name="suspect_address" id="suspect_address" placeholder="Enter suspect address"></td>
            </tr>            
        </table>
    </center>
        <br><input data-aos="fade-up" data-aos-delay="600" class="btn1" type="submit" name="btn_submit" id="submit">
            <input data-aos="fade-up" data-aos-delay="600" class="btn1" type="reset" name="reset" id="reset"> 
    </form>
    </div>

<!-- Fir Form section ends -->
    </div>
    <!--Tab Bar end-->
    </div>

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