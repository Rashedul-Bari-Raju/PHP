
<?php
    
    require_once './db_connect.php';
    session_start();
    
    if(!isset($_SESSION['email'])){
        header("location:index.php");
    }
    
    $email = $_SESSION['email'];
    $select_sql = "SELECT * FROM `information` WHERE email = '$email'";
    $execute_select = $conn->query($select_sql);
    while ( $row = $execute_select->fetch_assoc()){
        $name = $row['f_name'].' '.$row['l_name'];
        $mobile = $row['mobile'];
        $gender = $row['gender'];
        $b_group = $row['b_group'];
        $id = $row['id'];
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $name; ?> | Log In</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="hold-transition login-page">
        <div class=" login-box">
            <?php if(isset($_SESSION['delete'])){ ?>
            <div style="position: absolute;position: absolute;left: 223px;top: 65px;width: 67%;text-align: center;">
                <div class="alert alert-success">
                <?php 
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                    ?>
            </div>
            </div>
            
            <?php } ?>
            <div class="login-box-body new-account col-md-8 col-md-offset-2" style="position: relative;">
                <p class="login-box-msg create"><b><?php echo $name;?> Information list</b></p>
                <table class="table table-responsive">
                    <tr>
                        <th style="background: #090F14;color: #fff;">Name</th>
                        <th style="background: #090F14;color: #fff;">Mobile</th>
                        <th style="background: #090F14;color: #fff;">Email</th>
                        <th style="background: #090F14;color: #fff;">Gender</th>
                        <th style="background: #090F14;color: #fff;">Blood Group</th>
                        <th style="background: #090F14;color: #fff;">Action</th>
                    </tr>
                    
                    
                    <tr>
                        <td><?php echo $name;?></td>
                        <td><?php echo $mobile;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $gender;?></td>
                        <td><?php echo $b_group;?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $id;?>" title="EDIT"><span class="glyphicon glyphicon-edit"></span></a> 
                        </td>
                    </tr>
                    
                </table>
                
               <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <a href="index.php">Home<a> | 
                                <a href="logout.php">Logout</a>
                            </div>
                        </div>
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
