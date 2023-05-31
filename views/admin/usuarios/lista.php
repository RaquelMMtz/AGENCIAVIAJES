<?php
include(__DIR__ . "/../../../core/config.php");
require(__DIR__ . "/../../../classes/usuarios/usuariosClass.php");
//validar accesos rol
require(__DIR__."/../../../functions/sessions/functions.php");
//llamar a la clase usuarios
$usersClass = new usuariosClass();
$users = $usersClass->getUsers();
?>

<!DOCTYPE html>
<html lang="es">

<?php include(__DIR__ . "/../../templates/head.php"); ?>
<!-- custom css -->
<link href="<?php echo $root; ?>/assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- css range fitler -->
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.1/css/dataTables.dateTime.min.css">
<!-- css buttons export -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include(__DIR__ . "/../../templates/sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include(__DIR__ . "/../../templates/header.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user fa-sm text-white-50"></i> Agregar Usuarios</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Usuarios Registrados</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th style="display: none;">ID</th>
                                                    <th>Nombres</th>
                                                    <th>Usuario</th>
                                                    <th>Telefonos</th>
                                                    <th>Estado</th>
                                                    <th>Fecha Registro</th>
                                                    <th>Rol</th>
                                                    <th>Acciones: </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($users as $data) : ?>
                                                    <tr class="edit-row">
                                                        <td class="id-usuarios" style="display: none;"><?php echo $data["idUsuario"]; ?></td>
                                                        <td><?php echo $data["nombres"] . " " . $data["aPaterno"] . " " . $data["aPaterno"] ?></td>
                                                        <td><?php echo $data["username"] ?></td>
                                                        <td><?php echo $data["telefonosUsuario"] ?></td>
                                                        <td>
                                                            <?php echo $data["estatus"] == 1 ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>' ?>
                                                        </td>
                                                        <td><?php echo $data["fechaRegistro"] ?></td>
                                                        <td>
                                                            <?php echo $data["rolUsuario"] == 1 ? '<span class="badge badge-primary">Administrador</span>' : '<span class="badge badge-secondary">Clientes</span>' ?>
                                                        </td>
                                                        <td>
                                                            <button data-toggle="modal" data-target="#modalEditUsers" class="btn btn-info btn-circle btn-edit"><i class="fas fa-pencil"></i></button>
                                                            <button class="btn btn-danger btn-circle btn-delete"><i class="fa-solid fa-trash"></i></button>
                                                            <button  data-toggle="modal" data-target="#modalPass" class="btn btn-dark btn-circle btn-pass"><i class="fa-solid fa-lock"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Modal editar -->
            <div class="modal fade" id="modalEditUsers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Usuarios</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-validated" id="formUsuariosEdit">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Nombres</label>
                                        <input type="hidden" placeholder="id" class="form-control" name="id-users" id="idUsers">
                                        <input type="text" placeholder="ingresa los nombres" name="names-edit" class="form-control" id="names">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Telefonos</label>
                                        <input type="number" class="form-control" name="telf-edit" placeholder="ingresa un telefono" id="telf">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Estado</label>
                                        <select id="inputEstado" name="estado-edit" class="form-control">
                                            <option selected>Seleccionar...</option>
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Rol Usuario</label>
                                        <select id="inputRol" name="rol-edit" class="form-control">
                                            <option selected>Seleccionar...</option>
                                            <option value="1">Administrador</option>
                                            <option value="2">Clientes</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- muestra campos adicionales si es clientes -->
                                <div id="addressFieldContainer"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal editar pass -->
            <div class="modal fade" id="modalPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-validated" id="formUsuariosPass">
                                <div class="form-row">
                                <input type="hidden" placeholder="id" class="form-control" name="idUsersPass" id="idUsersPass">
                                    <div class="form-group col-md-12">
                                        <label for="">Contraseña</label>
                                        <input type="password" class="form-control" name="pass-edit" placeholder="ingresa un telefono" id="pass-edit">
                                    </div>
                                </div>
                                <!-- muestra campos adicionales si es clientes -->
                                <div id="addressFieldContainer"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <?php include(__DIR__ . "/../../templates/footer.php"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <?php include(__DIR__ . "/../../templates/scripts.php"); ?>
    <!-- datatables -->
    <script src="<?php echo $root; ?>/assets/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $root; ?>/assets/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo $root; ?>/js/demo/datatables-demo.js"></script>
    <!-- datatables ranger filter -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.4.1/js/dataTables.dateTime.min.js"></script>
    <!-- datatables buttons -->
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <!-- sweet aler -->
    <script src="<?php echo $root; ?>/assets/sweetAlert/sweetalert.js"></script>
    <!-- customs js -->
    <script src="<?php echo $root; ?>/ajax/usuariosAjax.js"></script>
    <script>
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[4]);

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function() {
            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });

            // DataTables initialisation
            var table = $('#dataTable').DataTable();

            // Refilter the table
            $('#min, #max').on('change', function() {
                table.draw();
            });
        });
    </script>

</body>

</html>