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

    <title>Edit About Elements</title>
</head>
<body style="background:#e4e4e4">
<center>
    <nav class="navbar navbar-fixed-top"  style="background-color:#e5f0fe;">
            <h2><strong>EDIT PORTFOLIO ABOUT PAGE</strong></h2>
        </nav>
    <div class="container-fluid" style="background-color:#2f8379;">
        <h2><strong>Edit Portfolio About Page</strong></h2>
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
        <button class="btn btn-primary btn-md" type="submit" name="update_about">Update Record</button>
        <a href="about.php" class="btn btn-warning">Cancel</a>
    </div>
    </form>
</center>
</body>
</html>


<?php
    function getRecord($recno){
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM tbl_about WHERE aboutID='$recno'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            While($row = $result->fetch_assoc()){

           
            echo "
                    <input type='hidden' name='txtid' value='".$row['aboutID']."'>
                    <div class='row'>
                        <div class='col-md-6 col-md-offset-3'>
                            <table  class='table table-bordered'>
                                <tr>
                                    <th colspan='6' style='background-color:#c8e0fe;'>
                                        <h4 class='text-center'><strong>INFORMATION ABOUT YOU</strong></h4>
                                    </th>
                                </tr>
                                <tr>
                                    <td colspan='3' style='background-color:#e5f0fe;'><textarea class='form-control' type='text' name='aboutContent' placeholder='Anthing about your self' style='height: 100px;' required='true'
                                                style='background:#fff2df;'/>".$row['content']."</textarea>
                                    </td>
                                </tr>
                            </table>
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