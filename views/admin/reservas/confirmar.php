<?php
include(__DIR__ . "/../../../core/config.php");
//validar accesos rol
require(__DIR__ . "/../../../functions/sessions/functions.php");
//llamar a la clase usuarios
include(__DIR__ . "/../../../classes/viajes/reservarClass.php");
$reservarClass = new reservarClass();
if ($_GET["id"]) {
    $id = $_GET["id"];
} else {
    header("Location: $root/views/viajesSolicitudes/lista.php");
}
//consultar datos viajes
$reservar = $reservarClass->getViajesSolicitados($id);

//llamar a la clase servicios
require(__DIR__ . "/../../../classes/servicios/serviciosClass.php");
$serviciosClass = new serviciosClass();
$servicios = $serviciosClass->getServices();
$hoteles = $serviciosClass->getHoteles();
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
                        <h1 class="h3 mb-0 text-gray-800">Reservar Viajes</h1>
    
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <form class="form-validated col-lg-12" id="formReservas">
                            <div class="col-lg-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Datos Viaje</h6>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">Origen</label>
                                                <input type="hidden" class="form-control" value="<?= $reservar["idViaje"] ?>" placeholder="ingresa los nombres" name="idViajes" readonly>
                                                <input type="text" value="<?= $reservar["origen"] ?>" placeholder="ingresa los nombres" name="names" class="form-control" id="" readonly>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">Destino</label>
                                                <input type="text" placeholder="ingresa los nombres" name="names-second" class="form-control" value="<?= $reservar["destino"] ?>" readonly id="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">Precio</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="validatedInputGroupPrepend">$$$</span>
                                                    </div>
                                                    <input value="<?= $reservar["precio"] ?>" type="number" step="0.01" placeholder="ingresa el precio" readonly name="price" class="form-control" id="">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">Duracion</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="validatedInputGroupPrepend">⌚</span>
                                                    </div>
                                                    <input value="<?= $reservar["duracion"] ?>" type="text" placeholder="ingresa el precio" readonly name="price" class="form-control" id="">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Cliente</label>
                                                <div class="input-group">
                                                    <input value="<?= $reservar["nombres"] . " " . $reservar["aPaterno"] . " " . $reservar["aMaterno"] ?>" type="text" placeholder="ingresa el precio" readonly name="price" class="form-control" id="">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Identificacion</label>
                                                <div class="input-group">
                                                    <input value="<?= $reservar["idCliente"] ?>" type="text" placeholder="ingresa el precio" readonly name="idClientesReserva" class="form-control" id="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Datos Transporte</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Matricula</label>
                                                <select class="form-control" name="matricula" id="">
                                                    <option value="">Selecciona...</option>
                                                    <option value="N123AB">N123AB</option>
                                                    <option value="N898AB">N898AB</option>
                                                    <option value="N230AB">N230AB</option>
                                                    <option value="N464AB">N464AB</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Modelo</label>
                                                <select class="form-control" name="modelo" id="">
                                                    <option value="">Selecciona...</option>
                                                    <option value="Boeing 737">Boeing 737</option>
                                                    <option value="irbus A350">irbus A350</option>
                                                    <option value=" Boeing 737 Freighter"> Boeing 737 Freighter</option>
                                                    <option value="Boeing 737">Airbus A330-200F</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Tipo</label>
                                                <select class="form-control" name="tipo" id="">
                                                    <option value="">Selecciona...</option>
                                                    <option value="Boeing">Boeing</option>
                                                    <option value="irbus A350">Airbus</option>

                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Operador</label>
                                                <input type="text" placeholder="ingresa el operador" class="form-control" name="operador" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Datos Hospedaje</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">Hotel</label>
                                                <select class="form-control" name="idHotel" id="">
                                                    <option value="">Selecciona...</option>
                                                    <?php foreach ($hoteles as $data) : ?>
                                                        <option value="<?= $data["idHotel"] ?>"><?= $data["nombre"] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">Servicios</label>
                                                <select class="form-control" name="hotel" id="">
                                                    <option value="">Selecciona...</option>
                                                    <?php foreach ($servicios as $data) : ?>
                                                        <option value="<?= $data["idServicios"] ?>"><?= $data["nombre"] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">Llegada</label>
                                                <input type="datetime-local" class="form-control" name="llegada">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4">Salida</label>
                                                <input type="datetime-local" class="form-control" name="salida">
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                                            <a class="btn btn-dark" href="<?php echo $root; ?>/views/admin/viajesSolicitudes/lista.php">Cancelar</a>
                                        </div>
                                    </div>

                                </div>

                        </form>

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
    <!-- sweet aler -->
    <script src="<?php echo $root; ?>/assets/sweetAlert/sweetalert.js"></script>
    <!-- custom functions -->
    <script src="<?php echo $root; ?>/ajax/reservasAjax.js"></script>

</body>

</html>