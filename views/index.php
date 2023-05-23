<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>

<script src="../plugins/sweetalert2/sweetalert2.all.js"></script>


<?php
      include_once'../db/connectdb.php';

      session_start();

      

      

      if(isset($_POST['btn_login']))
      {
            $email = $_POST['txt_email'];
            $password = $_POST['txt_password'];

            $select = $pdo->prepare("select * from tbl_user where email='$email' AND password='$password'");

            $select->execute();

            $row = $select->fetch(PDO::FETCH_ASSOC);

            /*if($select->execute())
            {
              $row = $select->fetch(PDO::FETCH_ASSOC);

              print_r($row);
            }*/

            if($row['email'] === $email && $row['password'] === $password && $row['role'] === "Admin")
            {

              

                
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];
               

                  echo '<script type="text/javascript">
                    jQuery(function validation(){
                      Swal.fire({
                        icon: "success",
                        title: "Good Job! '.$_SESSION['name'].' ",
                        text: "You have bben login succesfully",
                        button:"Loading.....",
                      })
                    })
                  </script>';

                  header('refresh:2;dashboard.php');

            }elseif($row['email'] === $email && $row['password'] === $password && $row['role'] === "User"){
              
              

                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];

                echo '<script type="text/javascript">
                    jQuery(function validation(){
                      Swal.fire({
                        icon: "success",
                        title: "Good Job! '.$_SESSION['name'].' ",
                        text: "You have bben login succesfully",
                        button:"Loading.....",
                      })
                    })
                  </script>';

                  header('refresh:2;user.php');
              
            }else{
              echo '<script type="text/javascript">
                    jQuery(function validation(){
                      Swal.fire({
                        icon: "error",
                        title: "Login Failed ",
                        text: "Email or Password is Wrong !!",
                        button:"Loading.....",
                      })
                    })
                  </script>';

              session_destroy();
            }

      }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LogIn | Inventory POS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>Inventory</b>POS</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="txt_email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="txt_password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
              <p class="mb-1">
                <a href="#" onclick="Swal.fire('To Get Password','Contact with the provider or admin','error')">I forgot my password</a>
              </p>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="btn_login">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  <br/>
  <center><small><b>Copyright &copy; Saul Augusto Gasca Farrera - sgfarreradev@gmail.com</b></small></center>
</div>
<!-- /.login-box -->

</body>
</html>
