<script src="../plugins/sweetalert2/sweetalert2.all.js"></script>

<?php

    

               

                include_once("../db/connectdb.php");
                session_start();

                require_once __DIR__ . '/../vendor/autoload.php';

                use PhpOffice\PhpSpreadsheet\Spreadsheet;
                use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
                
                
                //ob_start();

                $get = $pdo->prepare("select id,name,image from tbl_user");
                $get->execute();
                $data = $get->fetchAll(PDO::FETCH_ASSOC);

                if (isset($_POST['export_excel'])) {
                    /** Create a new Spreadsheet Object **/
                    $spreadsheet = new Spreadsheet();
                    $sheet = $spreadsheet->getActiveSheet();

                    // Establecer encabezados de columna
                    $sheet->setCellValue('A1', 'ID');
                    $sheet->setCellValue('B1', 'Name');
                    $sheet->setCellValue('C1', 'Image');

                    // Llenar datos en la hoja de trabajo
                    $row = 2;
                    foreach ($data as $row_data) {
                        $sheet->setCellValue('A' . $row, $row_data['id']);
                        $sheet->setCellValue('B' . $row, $row_data['name']);
                        $sheet->setCellValue('C' . $row, $row_data['image']);
                        $row++;
                    }

                    // Establecer el nombre del archivo y el tipo de contenido
                    $filename = 'user.xlsx';

                    // Limpiar el búfer de salida
                    ob_clean();

                    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                    header('Content-Disposition: attachment;filename="' . $filename . '"');
                    header('Cache-Control: max-age=0');

                    // Guardar el archivo de Excel en el flujo de salida
                    $writer = new Xlsx($spreadsheet);
                    $writer->save('php://output');
                    exit;
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
            <h1 class="m-0"><b>TEST EXCEL</b></h1>
            <br/>
            <small>Here the admin can manage the inventory system</small>

            <form method="POST" enctype="multipart/form-data">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                           

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $row): ?>
                            <tr>
                                <th scope="row"><?php echo $row['id']; ?></th>
                                <td><?php echo $row['name']; ?></td>
                                <td>
                                    
                                        <img width="160px" src="<?php echo $row['image']; ?>" alt="Image"
                                            data-zoom-image="<?php echo $row['image']; ?>">
                                    
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>
                    <button type="submit" name="export_excel" class="btn btn-primary">Export to Excel</button>
            </form>


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




<?php

    include_once'./footer.php';

    ob_end_flush();
?>


<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>