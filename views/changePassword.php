

<script src="../plugins/sweetalert2/sweetalert2.all.js"></script>


<?php


     ob_start();

    include_once'../db/connectdb.php';

    session_start();


    if( $_SESSION['email'] == "" OR $_SESSION['role'] === '')
    {
      header("Location: index.php");
      
    }

    if($_SESSION['role'] == "Admin")
    {
      include_once'./header.php';
    }else{
      include_once'./headeruser.php';
    }


    if(isset($_POST['btnUpdate']))
    {
        $txtOldPassword = $_POST['txtOldPassword'];
        $txtPassword = $_POST['txtPassword1'];
        $txtConfirmPassword = $_POST['txtConfirmPassword'];


        $email = $_SESSION['email'];

        $select = $pdo->prepare("select * from tbl_user where email='$email'");

        $select->execute();

        $row = $select->fetch(PDO::FETCH_ASSOC);

        $useremail_db = $row['email'];
        $userpassword_db = $row['password'];

        //Comapre user input and database values

        if($txtOldPassword === $userpassword_db )
        {

                  if($txtPassword == $txtConfirmPassword)
                  {


                                  $update = $pdo->prepare("update tbl_user set password=:password where email=:email");

                                  $update->bindParam(':password',$txtConfirmPassword);
                                  $update->bindParam(':email',$email);


                                  if($update->execute())
                                  {

                                          echo '<script type="text/javascript">
                                          jQuery(function validation(){
                                            Swal.fire({
                                              icon: "success",
                                              title: "Congratulations !!!",
                                              text: "Your Password Has Been Updated Succesfully !!!",
                                              button:"Ok",
                                            })
                                          })
                                        </script>';
                                  }

                                  else
                                  {
                                        echo '<script type="text/javascript">
                                        jQuery(function validation(){
                                          Swal.fire({
                                            icon: "error",
                                            title: "Fail !!!",
                                            text: "Your Password Has Not Updated !!!",
                                            button:"Ok",
                                          })
                                        })
                                      </script>';


                                      header("refresh:1.5; changePassword.php");
                                  }


                  }
                  else{


                    echo '<script type="text/javascript">
                    jQuery(function validation(){
                      Swal.fire({
                        icon: "error",
                        title: "Error !!!",
                        text: "Your Password Does not Match !!!",
                        button:"Ok",
                      })
                    })
                  </script>';


                  header("refresh:1.5; changePassword.php");


                 }




          

        }else{
              echo '<script type="text/javascript">
              jQuery(function validation(){
                Swal.fire({
                  icon: "warning",
                  title: "Warning !!!",
                  text: "Your Password Is Wrong Please Fill Right Password",
                  button:"Ok",
                })
              })
            </script>';

              header("refresh:1.5; changePassword.php");

        }

    }

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><b>Change Password  Form</b></h1>
            <br/>
            <small>Here you can change the password</small>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->


        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                 
                  <div class="form-group">
                    <label for="changePassword1">Password</label>
                    <input type="password" class="form-control" id="oldPassword" placeholder="Old Password" name="txtOldPassword" require>
                    <br/>
                    <input type="password" class="form-control" id="changePassword1" placeholder="Password" name="txtPassword1" require>
                    <br/>
                    <input type="password" class="form-control" id="changePassword2" placeholder="Confirm Password" name="txtConfirmPassword" require >
                    <br/>
                    <span id="passwordMatchMessage" style="display: none; color: red;">Password don't match</span>
                    <br/>
                    <input type="checkbox" id="showPasswordCheckbox"><label for="showPasswordCheckbox">Show Password</label>
                  </div>
                  
                  
               
                </div>
                <!-- /.card-body -->


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btnUpdate">Change Password</button>
                </div>
                
              </form>
            </div>





      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

 
</div>
<!-- ./wrapper -->


<script>
            document.addEventListener('DOMContentLoaded', function() {
            var oldPassword = document.getElementById('oldPassword');
            var passwordInput1 = document.getElementById('changePassword1');
            var passwordInput2 = document.getElementById('changePassword2');
            var passwordMatchMessage = document.getElementById('passwordMatchMessage');
            var showPasswordCheckbox = document.getElementById('showPasswordCheckbox');

            showPasswordCheckbox.addEventListener('change', function() {
                if (this.checked) {
                oldPassword.type = 'text';
                passwordInput1.type = 'text';
                } else {
                oldPassword.type = 'password';
                passwordInput1.type = 'password';
                }
            });

            passwordInput2.addEventListener('input', function() {
                var password1 = passwordInput1.value;
                var password2 = passwordInput2.value;

                if (password1 === password2) {
                passwordMatchMessage.style.display = 'none';
                } else {
                passwordMatchMessage.style.display = 'block';
                }
            });
            });
</script>



<?php

    include_once'./footer.php'
?>


<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>