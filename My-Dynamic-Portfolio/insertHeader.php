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

    <title>New Portfolio Header</title>
</head>
<body style="background:#e4e4e4">
<center>
    <nav class="navbar navbar-fixed-top"  style="background-color:#e5f0fe;">
            <h2><strong>CREATE PORTFOLIO HEADER</strong></h2>
        </nav>
    <div class="container-fluid" style="background-color:#2f8379;">
        <h2><strong>Create Portfolio Header</strong></h2>
    </div>
    <br><br>
    <div class="container">
        <form action="controller.php" method="POST" enctype="multipart/form-data">
        <div class='row'>
            <div class='col-md-8 col-md-offset-2'>
                <table  class='table table-bordered'>
                    <thead>
                    <tr>
                        <th colspan='2' style='background-color:#c8e0fe;'>
                            <h4 class='text-center'><strong>HEADER ELEMENTS</strong></h4>
                        </th>
                    </tr>
                    </thead>
                    <tbody style='background-color:#e5f0fe;'>
                    <tr>
                        <th class='lead text-center col-md-4'><strong>SITE TITLE</strong></th>
                        <td>
                            <input class="form-control" type="text" name="siteTitle" placeholder="My Portfolio" required="true"
                                    style="text-transform:uppercase;"/>
                        </td>
                    </tr>
                    <tr>
                        <th class='lead text-center col-md-4'><strong>MENU 1</strong></th>                        
                        <td>
                            <input class="form-control" type="text" name="menu1" placeholder="Home" required="true"
                                    style="text-transform:uppercase;"/>
                        </td>
                    </tr>
                    <tr>
                        <th class='lead text-center col-md-4'><strong>MENU 2</strong></th>
                        <td>
                            <input class="form-control" type="text" name="menu2" placeholder="About Me" required="true"
                                    style="text-transform:uppercase;"/>
                        </td>
                    </tr>
                    <tr>
                        <th class='lead text-center col-md-4'><strong>MENU 3</strong></th>
                        <td>
                            <input class="form-control" type="text" name="menu3" placeholder="My Projects" required="true"
                                    style="text-transform:uppercase;"/>
                        </td>
                    </tr>
                    <tr>
                        <th class='lead text-center col-md-4'><strong>MENU 4</strong></th>
                        <td>
                            <input class="form-control" type="text" name="menu4" placeholder="Contact Me" required="true"
                                    style="text-transform:uppercase;"/>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
                    <br>
  
            <button class="btn btn-primary btn-md" type="submit" name="save_header">Save Elements</button>
            <a href="admin.php" class="btn btn-warning">Cancel</a>
        </form>
    </div>
</center>
</body>
</html>