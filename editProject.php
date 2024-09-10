<!DOCTYPE html>
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

    <title>Edit Project Elements</title>
</head>
<body style="background:#e4e4e4">
<center>
    <nav class="navbar navbar-fixed-top"  style="background-color:#e5f0fe;">
            <h2><strong>EDIT PORTFOLIO PROJECT PAGE</strong></h2>
        </nav>
    <div class="container-fluid" style="background-color:#2f8379;">
        <h2><strong>Edit Portfolio Project Page</strong></h2>
    </div>
    <br><br>
    <form action="controller.php" method="POST" enctype="multipart/form-data">
    <div class="container">
        <?php
            getRecord($_GET['id']);
        ?>
        </table>
    </div>
    <div class="container">
        <button class="btn btn-primary btn-md" type="submit" name="update_project">Update Record</button>
        <a href="project.php" class="btn btn-warning">Cancel</a>
    </div>
    </form>
</center>
</body>
</html>


<?php
    function getRecord($recno){
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM tbl_projects WHERE projectID='$recno'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
            echo "
                    <input type='hidden' name='txtid' value='".$row['projectID']."'>
                    <div class='row'>
                        <div class='col-md-6'>
                            <table  class='table table-bordered' style='background-color:#e5f0fe;'>
                                <tr>
                                    <th colspan='6' style='background-color:#c8e0fe;'>
                                        <h4 class='text-center'><strong>PROJECT INFORMATION</strong></h4>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Project Title</th>
                                    <td colspan='3'><input class='form-control' type='text' name='projectTitle' required='true'
                                                style='text-transform:uppercase;'  value='".$row['projectTitle']."'/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Short Description</th>
                                    <td colspan='3'><textarea class='form-control' type='text' name='projectDesc'  style='height: 100px;' required='true'
                                                style='text-transform:uppercase;'/>".$row['projectDesc']."</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Project Link</th>
                                    <td colspan='3'><input class='form-control' type='url' name='projectLink' required='true' value='".$row['projectLink']."'/>
                                    </td>
                                </tr>
                                <tr>
                                    <th>New Project Image</th>
                                    <td colspan='3'><input class='form-control' type='file' name='projectImg'>
                                    <input type='hidden' name='txtpic_old' value='".$row['projectImg']."'>
                                    </td>
                                    
                                </tr>
                            </table>
                        </div>
                        <div class='col-md-6'>
                            <a href='projectUploads/$row[projectImg]'>
                                <img src='projectUploads/$row[projectImg]' width='300' height=300' alt='$row[projectImg]'>
                                <p><strong>Old Project Image</strong></p>
                            </a>
                        </div> 
                    </div>
                ";
            }
                 
        }else{
            echo "no record found";
        }
        $conn->close();
    }
?>