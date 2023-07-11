<!DOCTYPE html>
<?php
include_once "database_connection.php";


try {
           
    $database = new Database();
    $connection = $database->openConnection();
}

catch(PDOException $e) {
    
    echo "Error" . $e->getMessage();
}
?>
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
    <!--navbar css-->
        <script>
            function offlogId(){
            var form = document.officer_loginform;


            var mailreg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var mail = form.officer_email.value;
            if(mailreg.test(mail) == false){
                alert("Please Enter Email"); 
                return false;
            }
            
            
            if(form.officer_password.value == ""){
                alert("Please Enter Password");
                return false;
            }
        }


         function RegOfficer(){
            var form = document.officer_regform;
            //officer_name
          if(form.officer_name.value == ""){
              alert("Please Enter officer name"); 
              return false;
          }

          //officer_email
          var mailreg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          var mail = form.officer_email.value;
          if(mailreg.test(mail) == false){
              alert("Please Enter Email Address"); 
              return false;
          }

          //officer_gender
          if(form.officer_gender.value == ""){
              alert("Select gender"); 
              return false;
          }

          //officer_address
          if(form.officer_address.value == ""){
              alert("Please Enter Address"); 
              return false;
          }
          //officer_phone_no
          if(form.officer_phone_no.value == ""){
              alert("Please Enter phone #"); 
              return false;
          }
          //officer_date_of_joining
          if(form.officer_date_of_joining.value == ""){
              alert("Please Enter DOJ"); 
              return false;
          }
          //station_id
          if(form.station_id.value == ""){
              alert("Please Enter stationid"); 
              return false;
          }
          //officer_type_id
          if(form.officer_type_id.value == ""){
              alert("Please Enter officer type id"); 
              return false;
          }
          //case_in_hand
          if(form.case_in_hand.value == ""){
              alert("Please Enter open case"); 
              return false;
          }
          //solved_case
          if(form.solved_case.value == ""){
              alert("Please Enter solved case"); 
              return false;
          }
          //password
          if((form.officer_password.value == "")&&(form.repassword.value == "")){
                alert("Enter Password");
                return false;
            }
            
            if((form.officer_name.value == "")||
            ((form.officer_password.value == "")&&(form.repassword.value == ""))||
            (form.officer_password.value != form.repassword.value)){
                alert("Enter correct Password");
                return false;
            }
            
         }
    
        </script>
        <script>

        $(document).ready(function(){
            $("#officer_regform").hide();
            $("#frm").click(function(){
                $("#officer_loginform").hide(1000,function(){
                    $("#officer_regform").show(1000);    
                });

            });
            $("#frm1").click(function(){
                $("#officer_loginform").hide(1000,function(){
                    $("#officer_regform").show(1000);    
                });

            });

            $("#frm2").click(function(){
                $("#officer_regform").hide(1000,function(){
                    $("#officer_loginform").show(1000);    
                });
            });
            $("#frm3").click(function(){
                $("#officer_regform").hide(1000,function(){
                    $("#officer_loginform").show(1000);    
                });
            });
            })
        </script>
</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>

    <a data-aos="zoom-in-left" data-aos-delay="150" href="index.html" class="logo"> <i class="fa-solid fa-handcuffs"></i>POLICE </a>

    <nav class="navbar">
        <a data-aos="zoom-in-left" data-aos-delay="300" href="index.html">home</a>
        <a data-aos="zoom-in-left" data-aos-delay="600" href="index.html">USER</a>
        <a data-aos="zoom-in-left" data-aos-delay="750" href="officer.php">OFFICER</a>
        <a data-aos="zoom-in-left" data-aos-delay="900" href="Adminlogin.html">ADMIN</a>
    </nav>

    <a data-aos="zoom-in-left" data-aos-delay="1300" href="#SignUp" id="frm" class="btn">Sign Up</a>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <span data-aos="fade-up" data-aos-delay="150">OFFICER</span>
        <h3 data-aos="fade-up" data-aos-delay="300">POLICE STATION</h3>
        <a data-aos="fade-up" data-aos-delay="600" id="frm3" href="#book-form" class="btn">LOG-IN</a>
    </div>

</section>

<!-- home section ends -->

<!-- login form section starts  -->

<section class="book-form" id="book-form">

    <form id="officer_loginform" name="officer_loginform"  method="post" action="login_officer_form_handler.php">
        <div data-aos="zoom-in" data-aos-delay="150" class="inputBox">
            <span>Officer Log-In</span>
            <input type="text" name="officer_email" id="officer_email" placeholder="officer Email Id">
            <input data-aos="zoom-in" data-aos-delay="600" type="submit" name="btn_login" class="btn" onclick="return offlogId()">
        </div>
        <div data-aos="zoom-in" data-aos-delay="300" class="inputBox">
            <input type="password" placeholder="Officer Password" name="officer_password" id="officer_password">
            <input data-aos="zoom-in" data-aos-delay="600" type="reset" name="reset" class="btn">
        </div>
        <div data-aos="zoom-in" data-aos-delay="450" class="inputBox">
            <span>NOT Registered ?</span>
            <input type="button" data-aos-delay="600" value="Register" id="frm1" class="btn">
        </div>
    </form>
    <!--Login Form section End-->


    <!--Registration Form Start-->
    <form  name="officer_regform" id="officer_regform"  method="post"  action="officer_registration.php" onsubmit="return RegOfficer()"  enctype="multipart/form-data">
        <div data-aos="zoom-in" data-aos-delay="150" class="inputBox">
            <span>officer Registration</span>
            <div class="radio">
                <input type="text" name="officer_name" id="officer_name" placeholder="officername">
                <input type="password" name="officer_password" id="officer_password" placeholder="password">
                <input type="password" name="repassword" id="repassword" placeholder="re-password">
                <input type="text" name="officer_email" id="officer_email" placeholder="Email">
                <input type="text" name="officer_phone_no" id="officer_phone_no" placeholder="Phone #">
            </div>
            <input type="submit" id="submit" name="btn_register" class="btn">
            
        </div>
        <div data-aos="zoom-in" data-aos-delay="300" class="inputBox">
            <div class="radio">
                <input type="file" name="file">
                <input type="text" name="officer_address" id="officer_address" placeholder="Address">
                <span>Date of Birth</span>
                <input type="date" name="officer_dob" id="officer_dob" placeholder="Dob">
                <table>
                    <tr>
                        <td>Gender</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="officer_gender" id="officer_gender" value="0"></td><td>Male &nbsp;&nbsp;</td>
                        <td><input type="radio" name="officer_gender" id="officer_gender" value="1"></td><td>&nbsp;&nbsp;Female</td>
                    </tr>
                </table>
            </div>
            <input type="reset" name="reset" class="btn">
            
        </div>
        <div data-aos="zoom-in" data-aos-delay="450" class="inputBox">
            <div class="radio">
               
                <!-- <input type="text" name="station_id" id="station_id" placeholder="Enter Station id"> -->
                <td><select class="btn" style=width:200px;  name="station_id" id="station_id" required>
                    <option value="">Select station id</option>

                    <?php
                    $stmt = $connection->prepare('SELECT * FROM station_master');
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
                
                <span id="err7"></span>
                </td>



                <!-- <input type="text" name="officer_type_id" id="officer_type_id" placeholder="Enter officer type id"> -->
                <td><select class="btn" name="officer_type_id" id="officer_type_id" required>
                    <option value="" >Select Officer Type</option>

                    <?php
                    $stmt = $connection->prepare('SELECT * FROM officer_type_master');
                    $stmt->execute();
                    $officers  = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($officers as $officer)
                    {?>                                    
                        <option value="<?php echo $officer['officer_type_id'];?>">
                        <?php echo $officer['officer_type'];?></option>  
                    <?php
                    }
                    ?>
                </select>
                
                <span id="err7"></span>
                </td><br>

                <span>Date Of Joining</span>
                <input type="date" name="officer_date_of_joining" id="officer_doj" placeholder="Doj">
            </div>
            <span></span>
            <input type="button" data-aos-delay="600" value="Already Registered ? Log-In" id="frm2" class="btn">

              </div>
    </form>

</section>

<!-- login form section ends -->

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