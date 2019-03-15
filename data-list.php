
<?php
    require_once './db_connect.php';
    session_start();
    $select_sql = "SELECT * FROM `information`";
    $execute_select = $conn->query($select_sql);
            
    
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
                <p class="login-box-msg create">Information list</p>
                <table class="table table-responsive">
                    <tr>
                        <th style="background: #090F14;color: #fff;">Name</th>
                        <th style="background: #090F14;color: #fff;">Mobile</th>
                        <th style="background: #090F14;color: #fff;">Email</th>
                        <th style="background: #090F14;color: #fff;">Gender</th>
                        <th style="background: #090F14;color: #fff;">Blood Group</th>
                        <th style="background: #090F14;color: #fff;">Action</th>
                    </tr>
                    
                    <?php while ($row = $execute_select->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $row['f_name'].' '.$row['l_name'];?></td>
                        <td><?php echo $row['mobile'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['gender'];?></td>
                        <td><?php echo $row['b_group'];?></td>
                        <td>
                            <a href="view.php?id=<?php echo $row['id'];?>" title="VIEW"><span class="glyphicon glyphicon-eye-close"></span></a> | 
                            <a href="delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete this item?');" title="DELETE"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                
               <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <a href="index.php">Home<a> | 
                                        <a href="new-account.php">Create an account</a>
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
