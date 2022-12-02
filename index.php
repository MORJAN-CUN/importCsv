  <?php
  header("Content-Type: text/html;charset=utf-8");
  include('config.php');
  ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg" />
    <title>Excel a MYSQL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/cargando.css">
    <link rel="stylesheet" type="text/css" href="css/cssGenerales.css">

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  </head>

  <body>
    <div class="cargando">
      <div class="loader-outter"></div>
      <div class="loader-inner"></div>
    </div>
    <br>
    <div class="container">
      <main>
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">

              <form action="recibe_excel_validando.php" method="POST" enctype="multipart/form-data" />

              <div class="row">
                <div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                  <input type="file" id="fichero-tarifas" class="input-file" value="">
                  Subir fichero...
                </div>
                <!-- <div class="file-input text-center col-md-12" style="background-color:red;">
                  <input type="file" name="dataCliente" id="file-input" class="file-input__input" />
                  <label class="file-input__label" for="file-input">
                    <i class="zmdi zmdi-upload zmdi-hc-2x"></i>
                    <span>Elegir Archivo Excel</span></label>
                </div> -->

                <div class="col-md-12 name-input-file" id="name-input-file"></div>

                <div class="col-md-12" style="background-color:yellow;">
                  <input type="submit" name="subir" id="btn-enviar" class="btn-enviar" value="Subir Excel" />
                </div>
              </div>

              </form>

            </div>
          </div>
          <div class="card ">
            <div class="card-header">
              <?php
              $sqlClientes = ("SELECT * FROM clientes ORDER BY id ASC");
              $queryData   = mysqli_query($con, $sqlClientes);
              $total_client = mysqli_num_rows($queryData);
              ?>
              <i class="fas fa-table me-1"></i> Lista de Clientes <strong>(<?php echo $total_client; ?>)</strong>
            </div>
            <div class="card-body">
              <table id="datatablesSimple">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Celular</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Celular</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $i = 1;
                  while ($data = mysqli_fetch_array($queryData)) { ?>
                    <tr>
                      <th scope="row"><?php echo $i++; ?></th>
                      <td><?php echo $data['nombre']; ?></td>
                      <td><?php echo $data['correo']; ?></td>
                      <td><?php echo $data['celular']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>

      <footer class="py-2 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2022</div>
            <div>
              <a href="#">Privacy Policy</a> &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

    <script src="js/jquery.min.js"></script>
    <script src="'js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $(window).load(function() {
          $(".cargando").fadeOut(2000);
        });
      });

      document.getElementById('file-input').onchange = function() {
        document.getElementById('name-input-file').innerHTML = "Se cargo el archivo: <br>" + document.getElementById('file-input').files[0].name;
        document.getElementById('btn-enviar').style.display = 'block';
      }

      // document.getElementById('name-input-file').onchange = function() {
      //   document.getElementById('file-input').style.display = 'none';
      // }
    </script>

  </body>

  </html>