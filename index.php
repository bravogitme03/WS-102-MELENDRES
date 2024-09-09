<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/xsal.png">
    <title>Student Record System</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Times New Roman', serif;
        }

        .account-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 400px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            border-radius: 8px;
            animation: fadeIn 1s ease-out;
        }

        .account-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .account-logo img {
            max-width: 100px;
            margin-bottom: 10px;
        }

        .account-logo h3 {
            font-size: 28px;
            margin: 0;
            color: #333;
        }

        .form-signin {
            width: 100%;
        }

        .form-signin .form-group {
            margin-bottom: 15px;
            position: relative;
        }

        .form-signin label {
            font-weight: bold;
            color: #555;
        }

        .form-signin .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px 15px;
            transition: border-color 0.3s;
        }

        .form-signin .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            color: #fff;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }

        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<?php
session_start();
include('includes/connection.php');

if (isset($_REQUEST['login'])) {
    $username = mysqli_real_escape_string($connection, $_REQUEST['username']);
    $password = md5($_REQUEST['pwd']);
    $pwd = mysqli_real_escape_string($connection, $password);

    $fetch_query = mysqli_query($connection, "SELECT * FROM tbl_user WHERE username ='$username' AND password = '$pwd'");
    $res = mysqli_num_rows($fetch_query);

    if ($res > 0) {
        $data = mysqli_fetch_array($fetch_query);
        $name = $data['first_name'] . ' ' . $data['last_name'];
        $id = $data['id'];
        $_SESSION['name'] = $name;
        $_SESSION['id'] = $id;
        header('location:dashboard.php');
    } else {
        $msg = "Incorrect login details.";
    }
}
?>

<body>
    <div class="account-wrapper">
        <div class="account-box">
            <div class="account-logo">
                <a href="#"><img src="assets/img/xsal.png" alt="Logo"></a>
                <h3>Student Record System</h3>
            </div>
            <form method="post" class="form-signin">
                <div class="error-message">
                    <?php if (!empty($msg)) { echo $msg; } ?>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" id="username" class="form-control" name="username" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" id="password" class="form-control" name="pwd" required>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>
