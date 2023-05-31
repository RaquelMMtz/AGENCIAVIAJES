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
    header("Location: ./solicitar.php");
}
$reservar = $reservarClass->getViajesId($id);

?>



<!DOCTYPE html>
<html lang="es">

<?php include(__DIR__ . "/../../templates/head.php"); ?>
<!-- sweetaler -->
<link rel="stylesheet" href="<?php echo $root; ?>/assets/sweetAlert/sweetalert.css">
<style>
    .border-right {
        border-right: 1px solid #7c7c7c !important;
    }


    input[type="text"],
    input[type="password"],
    input[type="date"],
    input[type="datetime"],
    input[type="email"],
    input[type="number"],
    input[type="search"],
    input[type="tel"],
    input[type="time"],
    input[type="url"],
    textarea,
    select {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        font-size: 16px;
        height: auto;
        margin: 0;
        outline: 0;
        padding: 15px;
        width: 100%;
        background-color: #e8eeef;
        color: #8a97a0;
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
        margin-bottom: 30px;
    }

    input[type="radio"],
    input[type="checkbox"] {
        margin: 0 4px 8px 0;
    }

    select {
        padding: 6px;
        height: 32px;
        border-radius: 2px;
    }

    button {
        padding: 19px 39px 18px 39px;
        color: #FFF;
        background-color: #4bc970;
        font-size: 18px;
        text-align: center;
        font-style: normal;
        border-radius: 5px;
        width: 100%;
        border: 1px solid #3ac162;
        border-width: 1px 1px 3px;
        box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.1) inset;
        margin-bottom: 10px;
    }

    fieldset {
        margin-bottom: 30px;
        border: none;
    }

    legend {
        font-size: 1.4em;
        margin-bottom: 10px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    label.light {
        font-weight: 300;
        display: inline;
    }

    .number {
        background-color: #5fcf80;
        color: #fff;
        height: 30px;
        width: 30px;
        display: inline-block;
        font-size: 0.8em;
        margin-right: 4px;
        line-height: 30px;
        text-align: center;
        text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
        border-radius: 100%;
    }

    @media screen and (min-width: 480px) {

        form {
            max-width: 480px;
        }

    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include(__DIR__ . "/../../templates/sidebarClientes.php"); ?>
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
                        <a href="./solicitar.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plane fa-sm text-white-50"></i> Ver Destinos</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Datos Viaje</h6>
                                </div>
                                <div class="card-body">
                                    <div class="container-dates-destino">
                                        <div class="info-destino">
                                            <div class="info-title-wrapper">
                                                <h2><?= $reservar["destino"]; ?></h2>

                                                <div>
                                                    <span class="text-primary border-right px-2"><?= $reservar["duracion"]; ?></span>
                                                    <span class="price-destino text-success"><?= '$' . $reservar["precioDestino"]; ?></span>
                                                </div>

                                            </div>
                                            <div class="info-content-wrapper">
                                                <p><?= $reservar["descripcion"]; ?></p>
                                                <h2>Imagen Tour</h2>
                                                <img class="img-description-destino" src="<?php echo $root . "/uploads/viajes/" . $reservar["img"]; ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="tour-booking px-4 py-2">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form id="formSolicitudes" method="post">
                                                        <h1> Reservar Viaje </h1>

                                                        <fieldset>

                                                            <legend></span>Datos Viaje</legend>
                                                            <input type="hidden" id="name" value="<?php echo $_SESSION["id_login"]; ?>" name="idCliente" readonly>

                                                            <label for="name">Cliente:</label>
                                                            <input type="text" id="name" value="<?php echo $namesClientes; ?>" name="cliente" readonly>

                                                            <label for="name">Origen:</label>
                                                            <input type="text" id="origen" name="origen">

                                                            <label for="email">Destino:</label>
                                                            <input type="text"  value="<?= $reservar["destino"] ?>" name="destino" readonly>

                                                            <label for="email">Duracion:</label>
                                                            <input type="text"  value="<?= $reservar["duracion"] ?>" name="duracion" readonly>

                                                            <label for="password">Precio:</label>
                                                            <input type="number" value="<?= $reservar["precioDestino"] ?>" id="" name="price">

                                                            <label for="password">Fecha Reserva:</label>
                                                            <input type="date" id="password" name="fechaReserva">

                                                        </fieldset>

                                                        <button type="submit">Solicitar Reserva</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <!-- sweet aler -->
    <script src="<?php echo $root; ?>/assets/sweetAlert/sweetalert.js"></script>
    <!-- custom functions -->
    <script src="<?php echo $root; ?>/ajax/reservasAjax.js"></script>

</body>

</html>