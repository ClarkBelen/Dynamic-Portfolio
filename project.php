<!DOCTYPE html>
<?php session_start(); ?>

<html>
<head>
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

    <title>Portfolio Manager</title>

</head>
<body style="background:#e4e4e4">
    <center>
        <nav class="navbar navbar-fixed-top"  style="background-color:#e5f0fe;">
            <div class="col-md-6 col-md-offset-3">
                <h2><strong>PORTFOLIO ELEMENTS</strong></h2>
            </div>
        </nav>
    
        <div class="container-fluid">
            <h1>Portfolio Elements</h1>
        </div>
        <br>

        <div class="container-fluid">
            <?php
                if(isset($_SESSION['status']) && $_SESSION != ''){
                    $status = $_SESSION['status'];
                    echo "
                    
                        <div class='alert alert-info'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>
                            <p><strong>$status</strong></p>
                        </div>
                    
                    ";
                    echo "<br>";
                    unset ($_SESSION['status']);
                }
            ?>
           
            <ul class="container nav nav-pills" style="background: white;">
                
                <li><a href="admin.php">Header</a></li>
                <li><a href="home.php">Home Section</a></li>
                <li><a href="about.php">About Section</a></li>
                <li class="active"><a href="project.php">Project Section</a></li>                
                <li><a href="contact.php">Contact Section</a></li>
            </ul>
            <br>
            
            <div class="container">
                <table class="table table-condensed" style='background-color:#e5f0fe;'>
                    <!-- Add Backgroud option -->
                    <tr style="background-color:#c8e0fe;" >
                        <th class='text-center h4'><strong>PROJECT</strong></th>
                        <th class='text-center h4' colspan="2"><strong>DESCRIPTION</strong></th>
                        
                    </tr>
                    <!-- PROJECT IMAGE, PROJECT TITLE, SHORT DESCRIPTION, LINK-->
                    <?php
                        viewProjects();
                    ?>
                </table>
                <div class='container'>
                    <form action='insertProject.php' method='POST'>
                        <button class='btn btn-primary' type='submit' name='add_project'>Add Project Elements</button>
                    </form>
                    <br>
                </div>
            </div>
            
            
            <hr>
            <br>
            <br>
        </div>
    
</body>
</html>

<?php
    
    function viewProjects(){
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM tbl_projects";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "
            <tr>
                <td class='text-center col-md-5'>
                    <a href='projectUploads/$row[projectImg]'>
                        <img src='projectUploads/$row[projectImg]' width='350' alt='$row[projectImg]' class='img-thumbnail'>
                    </a>
                    <br>
                    <a href='$row[projectLink]'>
                        <p class='lead text-center'>Project #$row[projectID]</p>
                    </a>                        
                </td>
                <td class='text-center col-md-6'>
                    <h4 class='lead'><strong>$row[projectTitle]</strong></h4>
                    <br>
                    <p><strong>$row[projectDesc]</strong></p>
                    <br>
                    <a href='$row[projectLink]'>Project Link</a>   
                </td>
                <td>
                    <br>
                    <a href='editProject.php?id=$row[projectID]' class='btn btn-primary btn-md' data-toggle='tooltip' data-placement='bottom' title='Edit'><span class='glyphicon glyphicon-edit'></span></a>
                    <a href='controller.php?id=$row[projectID]&idName=projectID&tbl=tbl_projects&pic=$row[projectImg]&folder=projectUploads&section=project' class='btn btn-danger btn-md' data-toggle='tooltip' data-placement='bottom' title='Delete'><span class='glyphicon glyphicon-trash'></span></a>
                </td>
            </tr>
            ";
            }
        }
    }

    
?>