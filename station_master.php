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
            function stationtype(){
                var form = document.station_master;
            
                if(form.station_name.value == ""){
                alert("Please Enter station name"); 
                return false;
                }
            }

            function getarea(val) {
            $.ajax({
            type: "POST",
            url: "get_district.php",
            data:'city_id='+val,
            success: function(data){
                $("#select_area").html(data);
            },

        error: function () {
            event.preventDefault();
        }

        });
        }

        function chk6(input) {
            if(form.select_state.value==""){
                document.querySelector('#select_state').classList.add('errorpop');
                document.getElementById("err7").innerHTML = "Please select City";
                document.getElementById("err7").style.color = "red";
            }
            else {
                document.querySelector('#select_state').classList.add('okpop');
                document.getElementById("err7").innerHTML = "";


            }
        }
        </script>
</head>
<body>
     
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

<a data-aos="zoom-in-left" data-aos-delay="1300" href="Adminside.html" id="" class="btn">Back</a>

</header>
<br><br><br><br><br>
<!-- header section ends -->
<!-- banner section starts  -->

<div class="banner">

    <div class="content" data-aos="zoom-in-up" data-aos-delay="300">
        <br><br><br>
     <center>   <table>
         
        <form action="station_handler.php" id="station_master" name="station_master"  method="post" onsubmit="return stationtype()">
        <tr>
            <th class="fff0"><h3>Station Type</h3></th>
        </tr>    
        <tr>
            <td><span class="name13">Enter Station Name</span></td>
            <td><input type="text" class="name03" name="station_name" id="station_name" placeholder="Enter station name">
        </tr>
        <br>
        <tr>
        <td> 
            <label for="select_city" class="name999" class="col-sm-2 control-label" style="font-size:15px;">
            <span> city:</span></label></td>
            <div class="col-sm-10">
                   
                <td><select onChange="getarea(this.value);" class="btn0" name="select_city" id="select_city" onblur="chk6(this.value);" required>
                    <option value="">Select city</option>

                    <?php
                    $stmt = $connection->prepare('SELECT * FROM city');
                    $stmt->execute();
                    $citys  = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($citys as $city)
                    {?>                                    
                        <option value="<?php echo $city['CtCode'];?>">
                        <?php echo $city['CityName'];?></option>  
                    <?php
                    }
                    ?>
                </select>
                
                <span id="err7"></span>
                </td>
            </div>
            </div>


            <div class="form-group">
        </tr>
        
        <tr>
            <td><label for="select_area" class="name9999" class="col-sm-2 control-label" style="font-size:15px;">
            <span>area:</span></label></td>
            <td>
            <div class="col-sm-10">
                <select name="select_area" class="btn1" id="select_area" onblur="chk7(this.value);" required>
                    <option value="">Select area</option>
                </select>
                <span id="err8"></span>
            </div>
            </div>
        </td>
        </tr>
                 
    </table></center>
    
    &nbsp;
  <br>  <input data-aos="fade-up" data-aos-delay="600" class="btn1" type="submit" name="submit_data" id="submit">
        <input data-aos="fade-up" data-aos-delay="600" class="btn1" type="reset" name="reset" id="reset"> <br>
</form>
    </div>

</div>

<!-- banner section ends -->
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





