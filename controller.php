<?php

    session_start();
    include("includes/sqlconnection.php");

    if(isset($_POST['save_contact'])){
        //CONTACT elements
        $contactType = ucwords($_POST['contactType']);
        $contact = $_POST['contact'];
        $contactLink = $_POST['contactLink'];

        $sqlContact = "INSERT INTO tbl_contact(contactType, contact, contactLink)
            VALUES('$contactType', '$contact', '$contactLink')";

        if($conn->query($sqlContact)===TRUE){
            $_SESSION['status'] = "Record Inserted Successfully";
            header('location:contact.php');
        }else{
            $_SESSION['status'] = "Error: Insertion Failed.....";
            echo "<h1>error</h1>";
            header('location:contact.php');
        }
        $conn->close();

    }

    if(isset($_POST['save_project'])){
         //PROJECT elements
         $projectImg = $_FILES['projectImg']['name'];
         $projectTitle = $_POST['projectTitle'];
         $projectTitle = strtoupper($projectTitle);
         $projectDesc = $_POST['projectDesc'];
         $projectLink = $_POST['projectLink'];

         $sqlProject = "INSERT INTO tbl_projects(projectImg, projectTitle, projectDesc, projectLink)
            VALUES('$projectImg', '$projectTitle', '$projectDesc', '$projectLink')";

        if($conn->query($sqlProject)===TRUE){
            move_uploaded_file($_FILES["projectImg"]["tmp_name"],"projectUploads/".$_FILES["projectImg"]["name"]);
            $_SESSION['status'] = "Record Inserted Successfully";
            header('location:project.php');
        }else{
            $_SESSION['status'] = "Error: Insertion Failed.....";
            echo "<h1>error</h1>";
            header('location:project.php');
        }
        $conn->close();

    }

    if(isset($_POST['save_about'])){
        //ABOUT elements
        $content = $_POST['aboutContent'];

        $sqlAbout = "INSERT INTO tbl_about(content)
            VALUES('$content')";

        if($conn->query($sqlAbout)===TRUE){
            $_SESSION['status'] = "Record Inserted Successfully";
            header('location:about.php');
        }else{
            $_SESSION['status'] = "Error: Insertion Failed.....";
            echo "<h1>error</h1>";
            header('location:about.php');
        }
        $conn->close();

    }

    if(isset($_POST['save_home'])){
        //HOME elements
        $profilePhoto = $_FILES['profilePhoto']['name'];
        $profileBanner = $_POST['profileBanner'];
        $profileBio = strtoupper($_POST['profileBio']);
    
        $sqlHome = "INSERT INTO tbl_home(profilePhoto, profileBanner, profileBio)
            VALUES('$profilePhoto', '$profileBanner', '$profileBio')";

        if($conn->query($sqlHome)===TRUE){
            move_uploaded_file($_FILES["profilePhoto"]["tmp_name"],"profileUploads/".$_FILES["profilePhoto"]["name"]);
            $_SESSION['status'] = "Record Inserted Successfully";
            header('location:home.php');
        }else{
            $_SESSION['status'] = "Error: Insertion Failed.....";
            echo "<h1>error</h1>";
            header('location:home.php');
        }
        $conn->close();
    }


    if(isset($_POST['save_header'])){
        //HEADER elements
        $siteTitle = ucwords($_POST['siteTitle']);
        $menu1 = ucwords($_POST['menu1']);
        $menu2 = ucwords($_POST['menu2']);
        $menu3 = ucwords($_POST['menu3']);
        $menu4 = ucwords($_POST['menu4']);

        $sqlHeader = "INSERT INTO tbl_header(siteTitle, menu1, menu2, menu3, menu4)
                VALUES('$siteTitle', '$menu1', '$menu2', '$menu3', '$menu4')";


        if($conn->query($sqlHeader)===TRUE){
            $_SESSION['status'] = "Record Inserted Successfully";
            header('location:admin.php');
        }else{
            $_SESSION['status'] = "Error: Insertion Failed.....";
            header('location:admin.php');
        }
        $conn->close();
    }

    if(isset($_POST['update_contact'])){
        $id = $_POST['txtid'];
        $contactType = ucwords($_POST['contactType']);
        $contact = $_POST['contact'];
        $contactLink = $_POST['contactLink'];


        $sqlContact = "UPDATE tbl_contact 
        SET contactType='$contactType', contact='$contact', contactLink='$contactLink' WHERE contactID='$id'";

        if($conn->query($sqlContact)===TRUE){
            $_SESSION['status'] = "Record Updated Successfully";
            header('location:contact.php');
        }else{
            $_SESSION['status'] = "Error: Update Failed.....";
            header('location:editContact.php');
        }
        $conn->close();

    }

    if(isset($_POST['update_project'])){
        $id = $_POST['txtid'];
        $projectTitle = strtoupper($_POST['projectTitle']);
        $projectDesc = $_POST['projectDesc'];
        $projectLink = $_POST['projectLink'];
        $pic_new = $_FILES['projectImg']['name'];
        $pic_old = $_POST['txtpic_old'];

        if($pic_new != ''){
            $update_pic = $pic_new;
        }else{
            $update_pic = $pic_old;
        }
        echo "$update_pic";
        

        $sqlProject = "UPDATE tbl_projects
        SET projectImg='$update_pic', projectTitle='$projectTitle', projectDesc='$projectDesc', projectLink='$projectLink' WHERE projectID='$id'";

        if($conn->query($sqlProject)===TRUE){
            move_uploaded_file($_FILES["projectImg"]["tmp_name"],"projectUploads/".$_FILES["projectImg"]["name"]);
            $_SESSION['status'] = "Record Updated Successfully";
            header('location:project.php');
        }else{
            $_SESSION['status'] = "Error: Update Failed.....";
            header('location:editProject.php');
        }
        $conn->close();

    }

    if(isset($_POST['update_about'])){
        $id = $_POST['txtid'];
        $content = $_POST['aboutContent'];

        $sqlAbout = "UPDATE tbl_about 
        SET content='$content' WHERE aboutID='$id'";

        if($conn->query($sqlAbout)===TRUE){
            $_SESSION['status'] = "Record Updated Successfully";
            header('location:about.php');
        }else{
            $_SESSION['status'] = "Error: Update Failed.....";
            header('location:editAbout.php');
        }
        $conn->close();

    }

    if(isset($_POST['update_home'])){
        $id = $_POST['txtid'];
        $profileBanner = $_POST['profileBanner'];
        $profileBio = strtoupper($_POST['profileBio']);
        $pic_new = $_FILES['profilePhoto']['name'];
        $pic_old = $_POST['txtpic_old'];

        if($pic_new != ''){
            $update_pic = $pic_new;
        }else{
            $update_pic = $pic_old;
        }
        echo "$update_pic";
        
        $sqlHome = "UPDATE tbl_home 
        SET profilePhoto='$update_pic', profileBanner='$profileBanner', profileBio='$profileBio'WHERE homeID='$id'";

        if($conn->query($sqlHome)===TRUE){
            move_uploaded_file($_FILES["profilePhoto"]["tmp_name"],"profileUploads/".$_FILES["profilePhoto"]["name"]);
            $_SESSION['status'] = "Record Updated Successfully";
            header('location:home.php');
        }else{
            $_SESSION['status'] = "Error: Update Failed.....";
            header('location:editHome.php');
        }
        $conn->close();

    }

    if(isset($_POST['update_header'])){
        $id = $_POST['txtid'];
        $siteTitle = ucwords($_POST['siteTitle']);
        $menu1 = ucwords($_POST['menu1']);
        $menu2 = ucwords($_POST['menu2']);
        $menu3 = ucwords($_POST['menu3']);
        $menu4 = ucwords($_POST['menu4']);


        $sqlHeader = "UPDATE tbl_header 
        SET siteTitle='$siteTitle', menu1='$menu1', menu2='$menu2', 
        menu3='$menu3', menu4='$menu4' WHERE headerID='$id'";

        if($conn->query($sqlHeader)===TRUE){
            $_SESSION['status'] = "Record Updated Successfully";
            header('location:admin.php');
        }else{
            $_SESSION['status'] = "Error: Update Failed.....";
            header('location:editHeader.php');
        }
        $conn->close();
      
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $idName = $_GET['idName'];
        $tbl = $_GET['tbl'];
        $folder = $_GET['folder'];

        $part=$_GET['section'];

        $sql = "DELETE FROM $tbl WHERE $idName = '$id'";

        if($conn->query($sql) === TRUE){
            unlink("$folder/".$_GET['pic']);
            $_SESSION['status'] = "Record Deleted Successfully";
            if($part==="home"){
                header('location:home.php');
            }else if($part==="about"){
                header('location:about.php');
            }else if($part==="project"){
                header('location:project.php');
            }else if($part==="contact"){
                header('location:contact.php');
            }else{
            header('location:admin.php');
            }
        }else{
            $_SESSION['status'] = "Error: Deletion Failed.....";
            header('location:admin.php');
        }
        $conn->close();
    }
?>