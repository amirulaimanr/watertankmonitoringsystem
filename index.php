<!DOCTYPE html>
<html>
<title>Water Tank Monitoring System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- css -->
<link rel="stylesheet" href="css/style.css">
<!-- unicorns -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/dashboard.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

$(function() {

  var targetUrl;

  $("#datepicker")
    .datepicker({
      dateFormat: "yy-mm-dd",
      onSelect: function(dateText) {
        var datePicked = $.datepicker.parseDate("yy-mm-dd", dateText);
        targetUrl = "https://watertankmonitoringsystem.000webhostapp.com/index.php?page=realtime&date=" + dateText;

        $(this).change();
        
        
      }


    })
    .change(function() {
      window.location.href = targetUrl;
      event.preventDefault();
      
    });
});

</script>

<?php
  error_reporting(-1);//report all errors during execution
  global $host;
  $host="https://watertankmonitoringsystem.000webhostapp.com/";
  global $realtime_path,$simulation_path;
  $realtime_path = "$host/watertank";
  $simulation_path = "$host/watertank_simulation";

  date_default_timezone_set('Asia/Kuala_Lumpur');

?>


<style>
body,h1 {font-family: "Raleway", Arial, sans-serif;}
h1 {letter-spacing: 6px}
.w3-row-padding img {margin-bottom: 12px}

.grid-container{
    display: grid;
    gap: 1.5rem;
    grid-template-columns: 1fr 1fr;
    justify-content: center;
    align-content: center;
    margin-top: 20px;
}

</style>



<body>

<!-- !PAGE CONTENT! -->
<!-- <div class="w3-content h-screen" style="max-width:100%"> -->

<!-- Header --------------------------------------------------------------------->

  <header class="w3-panel w3-center w3-opacity" style="padding:50px 16px 10px" id="home" >
    <h1 class="w3-xlarge">SMART WATER TANK SYSTEM</h1>
    <h1>REMOTE MONITORING DASHBOARD</h1>
  
    <div class="w3-padding-32">
      <div class="w3-bar w3-border">
        
        <a href="#level" class="w3-bar-item w3-button">Water Level</a>
        <a href="#statistics" class="w3-bar-item w3-button ">Statistics</a>
        <a href="#usage" class="w3-bar-item w3-button">Usage</a>
        <a href="#gallery" class="w3-bar-item w3-button">Gallery</a>
      </div>
    </div>
  </header>
<!-- end header ------------------------------------------------------------------>

  <!-- main -->
  <!-- home -->
  <section class="home section" id="home">
  
      <div class="home_container container grid">
            <div class="about_content grid ">
                
              <!-- <div class="about_content grid"> -->
                <div class="tank_img">
                  <img class="water-tank" src="img/watertank.png" alt="">
                </div>
                
                <div class="home_data">
                  <p class="home_p">A web application was developed for an IoT-based smart water tank system project, which was part of one of my degree courses. Currently, data from the sensor cannot be obtained as the hardware has stopped working. The web application was created using HTML, CSS, and JavaScript for the frontend, and PHP and MySQL for the backend.

The "Water Tank Monitoring System" is introduced to overcome the drawbacks of the existing system. In this system, an Arduino Uno microcontroller sends data to the database, and the data is then displayed through a live server on this web application.

Water tank users can view the real-time status and measurements of their water tanks. Users can observe data changes in real time based on the sensor that has been set up in the water tank prototype system. One of the most important features is the automatic generation of data graphs by this web application. For further information, please refer to the project report by clicking on this <a href="https://drive.google.com/file/d/19esrpKgDccK4z_4oQX7IxlaaDTWvjPK4/view?usp=sharing" class="report-link" target="_blank" > project report</a>.

                  </p>
                </div>
                    
                
              </div>

              <div class="first_wave">
                <div class="waveWrapper waveAnimation">
                  <div class="waveWrapperInner bgMiddle">
                    <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png' )"></div>
                  </div>
                </div>
              </div>

              <!-- <div class="home_scroll">
                <a href="#level" class="home_scroll-button button--flex">
                  <i class="uil uil-arrow-down home_scroll-arrow"></i>
                    <span class="home_scroll-name">click to scroll</span>
                    <i class="uil uil-arrow-down home_scroll-arrow"></i>
                </a>
              </div>   -->
            </div>
        </div>
    </section>  

  <!-- realtime tank level -->
  <!-- <div class="w3-content h-screen" style="max-width:100%"> -->

  <section class="realtime section" style="max-width:100%" id="level">
    <div class="realtime_container container grid ">
      <div class="realtime_content grid">
          <div class="realtime_data">
            <h1><span class="realtime_title">Real-time Water Level</span></h1>
            <p class="realtime_p">
            The dashboard shown below display real time water level of Kolej Kediaman Tuanku Tengku Fauziah Hostel overhead tank. Tank level is updated every minute on arrival of sensor data. 

            Since the real-time data changes marginally in a minute, you may find no change in the tank level.
            </p>
          </div>
        
        <?php

        display_data(); 
        
        function display_data(){
          $uri= $_SERVER['REQUEST_URI'];    
         // echo"uri: $uri<br>";
          
          $xx=@explode('?',$uri);
          $params=@$xx[1];
          
         // echo"param: $params<br>";
          
          $yy=@explode('&',$params);
          
          $zz1=@explode('=',$yy[0]);$page=@$zz1[1];
          $zz2=@explode('=',$yy[1]);$date=@$zz2[1];
          
          //echo"page: $page<br>";
          //echo"date: $date<br>";
          
          
          if ($page=="realtime" or $page==""){
              display_real_time($date);
          }
          
          if ($page=="simulation"){
              display_simulation();
          }
          
      }?>

      <?php

        function display_real_time($date){
        global $host;

        $currentDate = date('d M Y');
        $currentMonth = date('M');


      ?>  
        
        
        <p class="realtime_dashboard"><iframe src="https://watertankmonitoringsystem.000webhostapp.com/watertank/dashboard.php" frameborder="0" height='480px' width='1207px' scrolling="no"></iframe></p>

      <?php

      ?>

        </div>
      </div>
      
      <div class="second_wave">
        <div class="waveWrapper waveAnimation">
          <div class="waveWrapperInner bgMiddle">
            <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png' )"></div>
          </div>
        </div>
      </div>
    
    
        <!-- <div class="home_scroll2">
            <a href="#statistics" class="home_scroll-button button--flex">
              <i class="uil uil-arrow-down home_scroll-arrow"></i>
                <span class="home_scroll-name">click to scroll</span>
                <i class="uil uil-arrow-down home_scroll-arrow"></i>
            </a>
        </div>   -->
    </div>  
    
  </div>
  
  </section>

  </div>


  <!-- statistics -->
  <!-- <div class="w3-content h-screen" style="max-width:100%"> -->

  <section class="statistic section" id="statistics">
    <div class="statistic_container container grid">
      <div class="statistic_content grid">
        <div class="statistic_data">
            <h1><span class="realtime_title">Statistics</span></h1>
            <p class="statistic_p">
            The graph (shown below the tank animation) displays the water level readings for a selected date. Y-axis indicates the volume of water left in the tank and X-axis denotes hours in a day. Since the hardware system has stopped working you cannot see the graph data currently. 
            <h5 style=" font-weight: 600; color: blue;">Select date ( 19 June 2021 - 20 June 2021 ) for last data recorded.</h5> 
            </p>

            <div class="datepicker_box">
              <div class="wrapper">
                <label for="datepicker">Pick a Date
                  <input type="text" id="datepicker" autocomplete="off">
                </label>	
              </div>
            </div>
                
            <?php
              
              include("db_connect.php");  

              $result = mysqli_query($conn,"select ROUND(sum(sensor5),3) as total
              from logs1 WHERE date(date_time)=current_date");
              $row = mysqli_fetch_array($result);
              $totalus = $row["total"];
            ?>

            <div class="total_water">
              <h4>Total water usage <?php echo" <b>( $currentDate )</b>" ?> :
              <?php echo"<b style='color:blue'> $totalus </b>"?> ltrs </h4>
            </div>
            <?php
              show_graph($date);
            };

            ?>
            
            <?php
            function show_graph($date){
              
              if($date==""){
              $date = date('Y-m-d', time());
              }
              
              global $realtime_path;
              $path=$realtime_path.'/phplot/graph.php?date='.$date;
              $path=$realtime_path.'/phplot/graph2.php?date='.$date;
              $path=$realtime_path.'/phplot/graph3.php?date='.$date;
              
            
            
            ?>

              <div class="statistic_graph">
                <div class="grid-container">
                    <div class="container1">
                      <iframe src= 'https://watertankmonitoringsystem.000webhostapp.com/watertank/phplot/graph.php?date=<?php echo"$date"?>' frameborder="0" height='550px' width='810px'  name='iframe_b'></iframe>
                    </div>
                    <div class="container3">
                      <iframe src='https://watertankmonitoringsystem.000webhostapp.com/watertank/phplot/graph3.php?date=<?php echo"$date"?>' height='550px' width='810px' frameborder="0" name='iframe_b'></iframe>
                    </div>
                </div>
                <!-- <div class="container2">
                  <iframe src='http://localhost/WaterTank/public_html/watertank/phplot/graph2.php?date=<?php echo"$date"?>' height='550px' width='810px' frameborder="0" name='iframe_b'></iframe>
                </div> -->

                
              </div>
              <?php 
            }
            ?>
        </div>
        
        <!-- <div class="home_scroll3">
            <a href="#usage" class="home_scroll-button button--flex">
              <i class="uil uil-arrow-down home_scroll-arrow"></i>
                <span class="home_scroll-name">click to scroll</span>
                <i class="uil uil-arrow-down home_scroll-arrow"></i>
            </a>
        </div>   -->
        <div class="third_wave">
          <div class="waveWrapper waveAnimation">
            <div class="waveWrapperInner bgMiddle">
              <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png' )"></div>
            </div>
          </div>
        </div>

      </div>
    </div>
    
    
  </section>
  </div>
  

  <!-- Water Usage -->
  <!-- <div class="w3-content h-screen" style="max-width:100%"> -->

  <section class="usage section" id="usage">
    <div class="usage_container container grid">
      <div class="usage_content grid">
        <div class="usage_data">
          <h1 class="usage_title">Water Usage</h1>
          <p class="usage_p">
            When looking to install water storage it pays to know how much water you're consume. Therefore table below provides data of total water that has been used by year and month. It makes it easy for users to check when the most water is used. 
          </p>
        </div>

        <?php
        global $realtime_path;
        $path=$realtime_path."/usage.php";
        echo"<br>";echo"<br>";
        echo"<iframe height='580px' width='100%' src='$path' name='iframe_a' allowtransparency='true' frameborder='0' ></iframe>";
        echo"<br>";
        ?>

        <div class="home_scroll4">
        </div>
        <div class="fourth_wave">
          <div class="waveWrapper waveAnimation">
            <div class="waveWrapperInner bgMiddle">
              <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png' )"></div>
            </div>
          </div>
        </div>

        
        </div>  


      </div>
    </div>
  </section>
</div>


<!-- gallery -->
<!-- <div class="w3-content h-screen" style="max-width:100%"> -->
  <section class="gallery section" id="gallery">
    <div class="gallery_container container grid">
      <div class="gallery_content grid">
        <div class="gallery_data">
          <h1 class="gallery_title">Gallery</h1>
          <p class="gallery_p">
          Check out our complete range of pictures gallery! These provide in-depth detail on how the system works, we mount the ultrasonic level sensor in your tanks. The sensor senses the distance between the fluid and itself and sends the distance data to a cellular/satellite gateway. The data is further transmitted to our database, where we convert the raw data into meaningful information (fluid quantity in the tanks) and display it on IoT dashboard.
          </p>

          
          
        </div>
        
        <div class="img_container">
          <div class="gallery_img">
            <img class="photo" src="img/a.gif" alt="">
            <div class="caption">
            <h3>System Architecture</h3>
            <p>In this project, the IoT-based smart water tank system consists of the four major parts which are the hardware, software, networking and mobile communication</p>	
            </div>		
          </div>
          <div class="gallery_img">
            <img class="photo" src="img/tank.jpg" alt="">
            <div class="caption">
            <h3>Water Tank Prototype</h3>
            <p> Prototype of the Water Tank and the placement of the sensors. The water tank was marked with an indicator and the water level can be observed from the outside of the water tank.</p>	
            </div>		
          </div>
          <div class="gallery_img">
            <img class="photo" src="img/connection.jpg" alt="">
            <div class="caption">
            <h3>Hardware Connection</h3>
            <p>The connection between the WeMos D1R2 and all the modules. All the sensors were connected to the IO pin of the WeMos D1R2.</p>	
            </div>		
          </div>
        </div>
        

        <!-- <div class="home_scroll5">
            <a href="#gallery" class="home_scroll-button button--flex">
              <i class="uil uil-arrow-down home_scroll-arrow"></i>
                <span class="home_scroll-name">click to scroll</span>
                <i class="uil uil-arrow-down home_scroll-arrow"></i>
            </a>
        </div> -->

        
      </div>
    </div>
    <div class="fifth_wave">
      <div class="waveWrapper waveAnimation">
        <div class="waveWrapperInner bgMiddle">
          <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png' )"></div>
        </div>
      </div>
    </div>
  </section>
</div>


<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-white w3-center w3-large"> 
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <h4>© amirulaimanr. All right reserved</h4>
</footer>

<!-- scroll top -->

<a href="#" class="scrollup" id="scroll-up">
        <i class="uil uil-angle-up scrollup__icon"></i>
    </a>
    

<script src="js/main.js"></script>
</body>
</html>
