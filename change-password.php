<?php
session_start();
$id = $_SESSION['id'];
if(empty($_SESSION['name']))
{
    header('location:index.php');
    exit();
}

include('header.php');
include('includes/connection.php');
    
if(isset($_REQUEST['change-pwd']))
{
    $current_pwd = md5($_REQUEST['current_pwd']);
    $new_pwd = $_REQUEST['new_pwd'];
    $confirm_pwd = $_REQUEST['confirm_pwd'];
    $select_query = mysqli_query($connection, "SELECT password FROM tbl_user WHERE id='$id'");
    $curr_pass = mysqli_fetch_assoc($select_query); 
    if($curr_pass['password'] == $current_pwd){
        if($new_pwd == $confirm_pwd){
            $new_pwd = md5($new_pwd);
            $sql = "UPDATE `tbl_user` SET password='$new_pwd' WHERE id='$id'";   
            $result = mysqli_query($connection, $sql);
            if($result){
                $msg = "Your Password updated successfully!";
            }
        } else {
            $msg = "New Password and Confirm Password do not match!";
        }
    } else {
        $msg = "Current Password does not match!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/xsal.png">
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    
    <!-- Inline CSS to set the font to Times New Roman -->
    <style>
        body {
            font-family: 'Times New Roman', serif;
        }
        .page-wrapper, .content, .form-group, .btn {
            font-family: 'Times New Roman', serif;
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4">
                    <h4 class="page-title">Change Password</h4>
                </div>
                <div class="col-sm-8 text-right m-b-20">
                    <a href="dashboard.php" class="btn btn-primary btn-rounded float-right">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Current Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="current_pwd" required> 
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>New Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="new_pwd" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirm New Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="confirm_pwd" required> 
                                </div>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <button name="change-pwd" class="btn btn-primary submit-btn">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
<?php
    include('footer.php');
?>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/app.js"></script>
<script type="text/javascript">
    <?php
    if(isset($msg)) {
        echo 'swal("' . $msg . '");';
    }
    ?>
</script>
</body>
</html>
