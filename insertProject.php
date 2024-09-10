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

    <title>New Project Elements</title>
</head>
<body style="background:#e4e4e4">
<center>
    <nav class="navbar navbar-fixed-top"  style="background-color:#e5f0fe;">
            <h2><strong>CREATE PORTFOLIO PROJECT PAGE</strong></h2>
        </nav>
    <div class="container-fluid" style="background-color:#2f8379;">
        <h2><strong>Create Portfolio Project Page</strong></h2>
    </div>
    <br><br>
    <div class="container">
        <form action="controller.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <table  class="table table-bordered" style='background-color:#e5f0fe;'>
                        <tr>
                            <th colspan="6" style='background-color:#c8e0fe;'>
                                <h4 class="text-center"><strong>PROJECT ELEMENTS</strong></h4>
                            </th>
                        </tr>
                        <tr>
                            <th>Project Title</th>
                            <td colspan="3"><input class="form-control" type="text" name="projectTitle" required="true"
                                        style="text-transform:uppercase;"/>
                            </td>
                        </tr>
                        <tr>
                            <th>Short Description</th>
                            <td  colspan="3">
                            <textarea class="form-control" name="projectDesc" required="true" placeholder="Anthing about your project"
                                        style="height: 100px;"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Project Link</th>
                            <td colspan="3"><input class="form-control" type="url" name="projectLink" required="true"/>
                            </td>
                        </tr>
                        <tr>
                            <th>Project Image</th>
                            <td colspan="3"><input class="form-control" type="file" name="projectImg" required="true">
                            </td>
                        </tr>
                    </table>
                    <br>
                </div>
            </div>
            <button class="btn btn-primary btn-md" type="submit" name="save_project">Save Record</button>
            <a href="project.php" class="btn btn-warning">Cancel</a>
        </form>
    </div>
</center>
</body>
</html>