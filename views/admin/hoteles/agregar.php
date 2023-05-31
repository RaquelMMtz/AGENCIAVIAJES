<?php
include(__DIR__ . "/../../../core/config.php");
require(__DIR__ . "/../../../classes/usuarios/usuariosClass.php");
//validar accesos rol
require(__DIR__ . "/../../../functions/sessions/functions.php");
//llamar a la clase usuarios
$usersClass = new usuariosClass();
$users = $usersClass->getUsers();
?>

<!DOCTYPE html>
<html lang="es">

<?php include(__DIR__ . "/../../templates/head.php"); ?>
<!-- sweetaler -->
<link rel="stylesheet" href="<?php echo $root; ?>/assets/sweetAlert/sweetalert.css">

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
                        <h1 class="h3 mb-0 text-gray-800">Agregar</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Registrar Hoteles</h6>
                                </div>
                                <div class="card-body">
                                    <form class="form-validated" id="formHoteles">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Nombre</label>
                                                <input type="text" placeholder="ingresa los nombres" name="namesHoteles" class="form-control" id="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Telefono</label>
                                                <input type="number" placeholder="ingresa los nombres" name="telefonos" class="form-control" id="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Calles</label>
                                                <input type="text" placeholder="ingresa el apellido paterno" class="form-control" name="calles" id="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Colonia</label>
                                                <input type="text" placeholder="ingresa el apellido materno" class="form-control" name="colonia" id="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Cp</label>
                                                <input type="text" class="form-control" name="cp" placeholder="ingresa un usuario" id="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Pais</label>
                                                <select name="paisHotel" placeholder="" id="paisHotel" class="form-control">
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Brasil">Brasil</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="República Dominicana">República Dominicana</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="México">México</option>
                                                    <option value="Perú">Perú</option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a class="btn btn-dark" href="./lista.php">Cancelar</a>
                                    </form>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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
    <script src="<?php echo $root; ?>/js/functions/usuarios.js"></script>
    <!-- sweet aler -->
    <script src="<?php echo $root; ?>/assets/sweetAlert/sweetalert.js"></script>
    <!-- custom functions -->
    <script src="<?php echo $root; ?>/js/validateForms.js"></script>
    <script src="<?php echo $root; ?>/ajax/hotelesAjax.js"></script>

</body>

</html>