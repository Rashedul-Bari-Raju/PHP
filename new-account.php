
<?php
    require_once './db_connect.php';


    $f_name = '';
    $l_name = '';
    $email = '';
    $mobile = '';
    $gender = '';
    if(isset($_POST['login'])){
        extract($_POST);
        
        $validation = 1;
        
        if(!$f_name){
            $validation = 2;
            $mass = "Enter first name";
        }
        
        if(!$l_name){
            $validation = 2;
            $mass = "Enter last name";
        }
        
        if(!$mobile){
            $validation = 2;
            $mass = "Enter Mobile";
        }
        
        if($b_group == '1'){
            $validation = 2;
            $mass = "Select blood group";
        }
        
        if(!$pasword){
            $validation = 2;
            $mass = "Enter password";
        }
        
        if(!$c_pasword){
            $validation = 2;
            $mass = "Enter confirm password";
        }
        
        if($pasword && $c_pasword){
            if($pasword != $c_pasword){
                $mass = "Confirm password";
                $validation = 2;
            }
        }
        
        if(!$email){
            $validation = 2;
            $mass = "Enter email";
        } else {
            $select_sql = "SELECT * FROM `information` WHERE email = '$email'";
            $execute_select = $conn->query($select_sql);
            $count = mysqli_num_rows($execute_select);
            if($count > 0 ){
                $mass = "Email already exists";
                $validation = 2;
            }
        }
        
        if($validation == 1){
            $insert_sql = "INSERT INTO `information`(`f_name`, `l_name`, `email`, `mobile`, `gender`, `b_group`, `password`) VALUES ('$f_name','$l_name','$email','$mobile','$gender','$b_group','$pasword')";
            $execute_insert = $conn->query($insert_sql);
            if($execute_insert){
                header("location:data-list.php");
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php //echo $name_sc; ?> | Log In</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="hold-transition login-page">
        <div class=" login-box">
            <div class="login-logo">
                <a href="index.php"><b><?php //echo $name_sc; ?></a>
            </div>
            <?php if(isset($mass)){ ?>
            <div style="position: absolute;position: absolute;left: 223px;top: 65px;width: 67%;text-align: center;">
                <div class="alert alert-success">
                <?php echo $mass;?>
            </div>
            </div>
            
            <?php } ?>
            <div class="login-box-body new-account col-md-8 col-md-offset-2" style="position: relative;">
                <p class="login-box-msg create">Create Your account ! Start your session</p>
                <form action="" method="POST">
                    <div class="col-md-5">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control email" placeholder="First Name" value="<?php echo $f_name;?>" name="f_name">
                        </div>
                        
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control email" placeholder="Last Name"  value="<?php echo $l_name;?>" name="l_name">
                        </div>
                        
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control email" placeholder="Email"  value="<?php echo $email;?>" name="email">
                        </div>
                        
                        <div class="form-group has-feedback">
                            <input type="number" class="form-control email" placeholder="Mobile"  value="<?php echo $mobile;?>" name="mobile">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <a href="index.php">Home<a> | 
                                    <a href="data-list.php">List</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-2">
                        <div class="form-inline">
                            <div class="form-group">
                                <input name="gender" type="radio" id="radio120" checked="checked" value="Male"
                                    <?php 
                                        if(isset($gender)){
                                            if($gender == 'Male'){
                                                echo 'checked';
                                            }
                                        }
                                    ?>
                                >
                                <label for="radio120" class="radio-button">Male</label>
                            </div>

                            <div class="form-group">
                                <input name="gender" type="radio" id="radio121" value="Female"
                                    <?php 
                                        if(isset($gender)){
                                            if($gender == 'Female'){
                                                echo 'checked';
                                            }
                                        }
                                    ?>
                                >
                                <label for="radio121" class="radio-button">Female</label>
                            </div>
                        </div>
                        
                        <div class="form-group has-feedback">
                            <select class="form-control" name="b_group">
                                <option value="1">Select blood group</option>
                                <option
                                    <?php
                                        if(isset($b_group)){
                                            if($b_group == 'A+'){
                                                echo 'selected';
                                            }
                                        }
                                    ?>
                                >A+</option>
                                <option
                                    <?php
                                        if(isset($b_group)){
                                            if($b_group == 'AB+'){
                                                echo 'selected';
                                            }
                                        }
                                    ?>
                                >AB+</option>
                                <option
                                    <?php
                                        if(isset($b_group)){
                                            if($b_group == 'A-'){
                                                echo 'selected';
                                            }
                                        }
                                    ?>
                                >A-</option>
                                <option
                                    <?php
                                        if(isset($b_group)){
                                            if($b_group == 'B+'){
                                                echo 'selected';
                                            }
                                        }
                                    ?>
                                >B+</option>
                                <option
                                    <?php
                                        if(isset($b_group)){
                                            if($b_group == 'B-'){
                                                echo 'selected';
                                            }
                                        }
                                    ?>
                                >B-</option>
                                <option
                                    <?php
                                        if(isset($b_group)){
                                            if($b_group == 'O+'){
                                                echo 'selected';
                                            }
                                        }
                                    ?>
                                >O+</option>
                                <option
                                    <?php
                                        if(isset($b_group)){
                                            if($b_group == 'O-'){
                                                echo 'selected';
                                            }
                                        }
                                    ?>
                                >O-</option>
                            </select>
                        </div>
                        
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control email" placeholder="Password" name="pasword">
                        </div>
                        
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control email" placeholder="Confirm password" name="c_pasword">
                        </div>
                        
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat new" name="login">Sign In</button>
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
