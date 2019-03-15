
<?php
session_start();
if(isset($_SESSION['email'])){
    header("location:profile.php");
}

require_once './db_connect.php';
$email = '';

if (isset($_POST['login'])) {
    extract($_POST);
//            echo $username.' '.$Password;
    $validation = TRUE;
    if (!$email) {
        $message = 'Enter email';
        $validation = FALSE;
    }
    if (!$password) {
        $message = 'Enter password';
        $validation = FALSE;
    }


    if ($validation) {
        $select_sql = "SELECT * FROM `information` WHERE email = '$email' && password = '$password'";
        $execute_sql = $conn->query($select_sql);
        $count = mysqli_num_rows($execute_sql);
        if ($count == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header("location:profile.php");
        } else {
            $message = 'Email or password wrong !';
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php //echo $name_sc;  ?> | Log In</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="hold-transition login-page">
        <div class=" login-box">
            <div class="login-logo">
                <a href="index.php"><b><?php //echo $name_sc;  ?></a>
            </div>
            <?php if (isset($message)) { ?>
                <div style="position: absolute;position: absolute;left: 223px;top: 65px;width: 67%;text-align: center;">
                    <div class="alert alert-success">
                        <?php echo $message; ?>
                    </div>
                </div>

            <?php } ?>
            <div class="login-box-body col-md-4 col-md-offset-4">
                <p class="login-box-msg">Sign in to start your session</p>

                <form  method="post">
                    <div class="form-group has-feedback">
                        <input type="text" value="<?php echo $email; ?>" class="form-control email" placeholder="Email" name="email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback">
                        </span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control pass" placeholder="Password" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <a href="new-account.php">Create an account !<a>
                                        <a href="data-list.php">Goto info List</a>
                                        </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <button type="submit" class="btn btn-primary btn-block btn-flat log" name="login">Sign In</button>
                                        </div>
                                        </div>
                                        </form>

                                        </div>


                                        </div>

                                        <script src="js/jquery-2.2.3.min.js"></script>
                                        <script src="js/bootstrap.min.js"></script>
                                        <script>
                                            $(function () {
                                                $('input').iCheck({
                                                    checkboxClass: 'icheckbox_square-blue',
                                                    radioClass: 'iradio_square-blue',
                                                    increaseArea: '20%' // optional
                                                });
                                            });
                                        </script>
                                        </body>
                                        </html>
