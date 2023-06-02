<script src="../plugins/sweetalert2/sweetalert2.all.js"></script>

<?php


    

      include_once("../db/connectdb.php");
      session_start();

    
    require_once __DIR__."/../vendor/autoload.php";

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    

    // Consulta para obtener los datos de la base de datos
      $get = $pdo->prepare("SELECT * FROM tbl_user");
      $get->execute();
      $data = $get->fetchAll(PDO::FETCH_ASSOC);


      if (isset($_POST['export_excel'])) {
            // Crear un nuevo objeto de archivo de Excel
            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Establecer encabezados de columna
            $sheet->setCellValue('A1', 'ID');
            $sheet->setCellValue('B1', 'Name');
            $sheet->setCellValue('C1', 'Email');
            $sheet->setCellValue('D1', 'Password');
            $sheet->setCellValue('E1', 'Role');
            $sheet->setCellValue('F1', 'Image');

            // Llenar datos en la hoja de trabajo
            $row = 2;
            foreach ($data as $row_data) {
                $sheet->setCellValue('A' . $row, $row_data['id']);
                $sheet->setCellValue('B' . $row, $row_data['name']);
                $sheet->setCellValue('C' . $row, $row_data['email']);
                $sheet->setCellValue('D' . $row, $row_data['password']);
                $sheet->setCellValue('E' . $row, $row_data['role']);
                $sheet->setCellValue('F' . $row, $row_data['image']);
                $row++;
            }

            // Establecer el nombre del archivo
            $filename = 'users.xlsx';


             // Limpiar el búfer de salida
             ob_clean();

            // Configurar encabezados para la descarga del archivo
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            // Guardar el archivo de Excel en la salida
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
            $writer->save('php://output');
            exit();

    }

    if(isset($_POST['btnSave']))
    {
          $name = $_POST['txtName'];
          $email = $_POST['txtEmail'];
          $password = $_POST['txtPassword1'];
          $image = $_FILES['txtFile']['name'];
          $role = $_POST['txtRole'];

          $btnSave = $_POST['btnSave'];

          $imageDirectory = '';

          if($role == "User")
          {
            $imageDirectory = "../images/users/";

          }elseif($role == "Admin")
          {
            $imageDirectory = "../images/admins/";
          }

          //complete route
          $imagePath = $imageDirectory.$image;


          if(move_uploaded_file($_FILES['txtFile']['tmp_name'],$imagePath))
          {
              //databse query
              $insert = $pdo->prepare("INSERT INTO tbl_user (name,email,password,role,image) VALUES ('$name','$email','$password','$role','$imagePath')");

              if($insert->execute())
              {
                echo "regsitration success";
              }

          }

          
        
    }


    include_once'./header.php';


?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><b>Registration</b></h1>
          <br/>
          <small>Here the admin can manage the inventory system</small>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container">
      <div class="row">
        <!-- left column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label >Name</label>
                  <input type="text" class="form-control" name="txtName" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label >Email address</label>
                  <input type="email" class="form-control" name="txtEmail" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label >Password</label>
                  <input type="password" class="form-control" id="setPassword" name="txtPassword1" placeholder="Password">
                  <input type="checkbox" id="showPasswordCheckbox"><label>Show Password</label>
                </div>
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="txtRole">
                    <option value="" disabled selected>Select role</option>
                    <option>User</option>
                    <option>Admin</option>
                    
                  </select>
                </div>
                <br/>
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control" name="txtFile">                 
                </div>
              </div>

              <button type="submit" class="btn btn-info" name="btnSave"   >Save</button>
              
              
          <!-- /.box-body -->
            <button type="submit" name="export_excel" class="btn btn-success mr-4">Export to Excel</button>
              
            </form>
          </div>
        </div>
        <!-- /.col-md-4 -->
        <!-- user table data -->
        <div class="col-md-8 mb-4">
          <div class="table-responsive">



          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
          
            <tbody>
            <?php
                                $get = $pdo->prepare("SELECT * FROM tbl_user ORDER BY id DESC");
                                $get->execute();
                                $data = $get->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($data as $row_data) {
                                    echo '
                                    <tr>
                                        <td>' . $row_data['id'] . '</td>
                                        <td>' . $row_data['name'] . '</td>
                                        <td>' . $row_data['email'] . '</td>
                                        <td>' . $row_data['password'] . '</td>
                                        <td>' . $row_data['role'] . '</td>
                                        <td><img src="' . $row_data['image'] . '" alt="User Image" width="60"></td>
                                    </tr>';
                                }




                                

                               
          ?>
            </tbody>


          </table>


          </div>
          
        </div>
        <!-- /.col-md-8 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /.content -->
  
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
<!-- /.content-wrapper -->


    <script>

      document.addEventListener('DOMContentLoaded',function(){

          var txtUserPassword = document.getElementById('setPassword')
          var showPassword = document.getElementById('showPasswordCheckbox')

          showPassword.addEventListener('change',() => {
            if(showPassword.checked)
            {
              txtUserPassword.type = "text"
              
            }else{
              txtUserPassword.type = "password"
            }
          })
      })


    </script>


<?php

    include_once'./footer.php';

    ob_end_flush();
?>



<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>