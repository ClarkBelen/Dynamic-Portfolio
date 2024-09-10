<!DOCTYPE html>
<html lang="en">
<head>
    <link rel ="stylesheet" href="css/bootstrap.min.css">
    <link rel ="stylesheet" href="css/lightbox.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/lightbox.js"></script>

    <title>Clark's Portfolio</title>

    <style>
        h1{
            font-family: Serif; 
        }
        section {
            width: 100vw;
            padding: 50px;
        }

        .navbar {
            padding: 10px;
        }
        .nav{
            padding: 5px;
        }

    </style>
</head>
<body data-spy="scroll" data-target=".navbar">
    <center>
    <nav class="container-fluid navbar navbar-default navbar-fixed-top"  style="background: white;">
        <div class="container-fluid">
            <?php
                getHeaderContent();
            ?>
        </div>
    </nav>
    </center>

    <section id="menu1" style="background: #e5f0fe;">
        
        <div class="container text-center">
            <br><br><br><br>
            <?php
                getHomeContent();
            ?>
            <br>
        </div>
        
    </section>

    <hr>
    <section id="menu2" style="background: #ebebeb; padding-bottom: 290px;">
        <center>
        <div class="container">
            <br>
            <?php
            include("includes/sqlconnection.php");
            $sql = "SELECT * FROM tbl_header";
            $result = $conn->query($sql);
    
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                echo "<h1 class='text-uppercase' style='font-size:300%;'><b>$row[menu2]</b></h1>";
            }
            ?>
            
            <br>
            <div class="row">
                
                <?php
                    getAboutContent();
                    
                ?>
            </div>
        </div>
        </center>
    </section>

    <hr>
    <section id="menu3" style="background: #e5f0fe;">
    <div class="container">
        
        <div class="page-header text-center">
        <?php
            include("includes/sqlconnection.php");
            $sql = "SELECT * FROM tbl_header";
            $result = $conn->query($sql);
    
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                echo "<h1 class='text-uppercase' style='font-size:300%;'><b>$row[menu3]</b></h1>";
            }
        ?>
        </div>

        <div class="row">
        <?php
            include("includes/sqlconnection.php");
            $sql = "SELECT * FROM tbl_projects";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                $pTitle;
                $pDesc;
                $pLink;
                $id;
    
                    
                $folder =  'projectUploads/';		
                
                    while($row = $result->fetch_assoc()){
                        $pTitle = "$row[projectTitle]";
                        $pDesc = "$row[projectDesc]";
                        $pLink = "$row[projectLink]";
                        $id = "$row[projectID]";

                        echo"
                        <div class='col-md-4'>
                            <a href=$folder$row[projectImg] data-lightbox='gallery' data-title='$row[projectDesc]' class='thumbnail'>
                                <img src=$folder$row[projectImg]>
                            </a>
                            <p class='text-center'><a href=$pLink>$pTitle</a></p>
                            
                        </div>
                        ";
                }
                
            }

            ?>
        </div>
    </div>           
    </section>

    <hr>
    <section id="menu4" style="padding-bottom: 320px; background: #ebebeb">
        <div class="container">
            <br><br>
            <center>
            <?php
            include("includes/sqlconnection.php");
            $sql = "SELECT * FROM tbl_header";
            $result = $conn->query($sql);
    
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                echo "<h1 class='text-uppercase' style='font-size:300%;'><b>$row[menu4]</b></h1>";
            }
            ?>
                <br>
                <?php 
                    getContact();
                ?>
            </center>

            <div class="modal fade" id="submitform">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                                <h4>Form Submitted</h4>
                            </div>
                            <div class="modal-body">
                                <p class="text-center"><i>Thank you for submitting your concern!</i></p>
                            </div>
                            <div class="modal-footer"></div>
                        </div>
                    </div>
                </div>
            
        </div>
    
    </section>
</body>
</html>

<?php
    function getContact(){
        include("includes/sqlconnection.php");
            $sql = "SELECT * FROM tbl_contact";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<h4><b>$row[contactType]: <a href='$row[contactLink]'><i>$row[contact]</i></a></b></h4>";
                }
                echo "
                <br><br>
                <h4 class='text-center'>You can also contact me using this form:</h4>
            <div class='col-md-6 col-md-offset-3'>
                <form>
                    <div class='form-group'>
                        <label for='name'>Name</label>
                        <input type='text' class='form-control' id='name' placeholder='Your Name'>
                    </div>
                    <div class='form-group'>
                        <label for='email'>Email</label>
                        <input type='email' class='form-control' id='email' placeholder='Your Email'>
                    </div>
                    <div class='form-group'>
                        <label for='message'>Message</label>
                        <textarea class='form-control' id='message' placeholder='Your Message' style='height:150px'></textarea>
                    </div>
                    <center>
                    <a href='#submitform' data-toggle='modal' class='btn btn-info btn-block'>
                    Submit
                    </a>
                    
                    </center>
                </form>
            </div>
                ";
            }
            else {
                echo " 
                <div class='container'>
                    <h1 class='text-uppercase' style='font-size:300%;'><b>No Content Here</b></h1>
                    <p>(Menu 4)</p>
                </div>";
            }
    }

    function getHomeContent(){
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM tbl_home";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();

            echo "<img src='profileUploads/$row[profilePhoto]' alt='profileUploads/$row[profilePhoto]' width='400' height='400' class='img-circle'>
            <h1 style='font-size:350%;' class='text-uppercase'><b>$row[profileBanner]</b></h1>
            <p class='col-md-6 col-md-offset-3'>$row[profileBio]</p>";
        }
        else{
            echo " 
            <div class='container'>
                <h1 class='text-uppercase' style='font-size:300%;'><b>No Content Here</b></h1>
                <p>(Menu 1)</p>
            </div>";
        }   
    }

    function getHeaderContent(){
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM tbl_header";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            
            echo "
            <div class='navbar-header'>
                <a class='navbar-brand text-uppercase href='#menu1' style='color: black;'><b>$row[siteTitle]</b></a>
            </div>
            <ul class='nav nav-pills navbar-right'>
                <li><a href='#menu1'>$row[menu1]</a></li>
                <li><a href='#menu2'>$row[menu2]</a></li>
                <li><a href='#menu3'>$row[menu3]</a></li>
                <li><a href='#menu4'>$row[menu4]</a></li>
            </ul>
            ";
        }else{
            echo " 
            <div class='container'>
                <p><b>No Content Here (Header)</b></p>
               
            </div>";
        }
    }

    function getAboutContent() {
        include("includes/sqlconnection.php");
        $sql = "SELECT content FROM tbl_about";
        $result = $conn->query($sql);

        if ($result->num_rows === 1){
            $colmd=12;
        }else if($result->num_rows === 2){
            $colmd=6;
        }else{
            $colmd=4;
        }


        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='col-md-$colmd'><p class='lead text-center'>$row[content]</p></div>";
            }
        } else {
            echo " 
            <div class='container'>
                <h1 class='text-uppercase' style='font-size:300%;'><b>No Content Here</b></h1>
                <p>(Menu 2)</p>
            </div>";
        }
    }


?>