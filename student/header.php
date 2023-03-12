<?php session_start();
if (!isset($_SESSION["code"])) {
    ?>
    <!-- <script type="text/javascript">
        window.location="index.php";
    </script> -->
<?php
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="design/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg " ">
  
<div class="all-content-wrapper">

<div class="header-advance-area">
    <div class="header-top-area" style="background-color:#760a04;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header-top-wraper">
                        <div class="row">
                            
                                    
                                                    
                                                    <span class="admin-name" style="margin-right:50px;"><h4>Student Name:<?php echo $_SESSION["name"];?></h4></span>
                                            
                                                </a>
                                            
                                        </li>

                                            
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu start -->

    <!-- Mobile Menu end -->
    <div class="breadcome-area">
        <div class="container-fluid">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center" >
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            
                                
                                <ul class="breadcome-menu">
                                    <li><div id="countdowntimer" style="display: block; "></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  


 


<center><div class="timer text-center" id="countdowntimer"></div></center>




  

  </div>
</nav>






<!-- 
<script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script> -->






        <script type="text/javascript">
    setInterval(function(){
        timer();
    },1000);
    
    function timer()
    {
        var xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                if(xmlhttp.responseText=="00:00:01")
                {
                    window.location="result.php";
                }
                document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
            }

        };
        xmlhttp.open("GET", "forajax/load_timer.php",true);
        xmlhttp.send(null);
    }
</script>