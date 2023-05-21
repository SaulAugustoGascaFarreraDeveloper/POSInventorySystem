<?php

    session_start();

    include_once'./header.php';

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
              <form>
                <div class="card-body">
                 
                  <div class="form-group">
                    <label for="changePassword1">Password</label>
                    <input type="password" class="form-control" id="oldPassword" placeholder="Old Password" name="txtOldPassword">
                    <br/>
                    <input type="password" class="form-control" id="changePassword1" placeholder="Password" name="txtPassword1">
                    <br/>
                    <input type="password" class="form-control" id="changePassword2" placeholder="Confirm Password" name="txtConfirmPassword" >
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
            var passwordInput1 = document.getElementById('changePassword1');
            var passwordInput2 = document.getElementById('changePassword2');
            var passwordMatchMessage = document.getElementById('passwordMatchMessage');
            var showPasswordCheckbox = document.getElementById('showPasswordCheckbox');

            showPasswordCheckbox.addEventListener('change', function() {
                if (this.checked) {
                passwordInput1.type = 'text';
                } else {
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
