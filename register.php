<?php
include(__DIR__ . "/core/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro Sistema</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $root; ?>/assets/sweetAlert/sweetalert.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<style>
    .bg-login-image {
        background: url(./assets/img/viaje-cover-login.jpg) !important;
        background-position: center;
        background-repeat: no-repeat !important;
        background-size: cover !important;
    }
</style>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crea una cuenta</h1>
                            </div>
                            <form id="formUsuarios" class="form-validated">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Primer Nombre</label>
                                        <input type="text" placeholder="ingresa los nombres" name="names" class="form-control" id="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Segundo Nombre</label>
                                        <input type="text" placeholder="ingresa los nombres" name="names-second" class="form-control" id="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Apellido Paterno</label>
                                        <input type="text" placeholder="ingresa el apellido paterno" class="form-control" name="paterno" id="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Apellido Materno</label>
                                        <input type="text" placeholder="ingresa el apellido materno" class="form-control" name="materno" id="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Correo</label>
                                        <input type="text" class="form-control" name="users" placeholder="ingresa un correo" id="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Password</label>
                                        <input type="password" placeholder="ingresa una contraseña" class="form-control" name="pass" id="inputPassword4">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Telefonos</label>
                                        <input type="number" name="telf" placeholder="ingresa un telefono" class="form-control" id="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Rol Usuario</label>
                                        <select id="inputRol" name="rol" class="form-control">
                                            <option selected>Seleccionar...</option>
                                            <option value="1">Administrador</option>
                                            <option value="2">Clientes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress">Calles</label>
                                        <input type="text" name="calles" class="form-control" id="inputCalles" placeholder="1234 Main St">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress2">Colonia</label>
                                        <input type="text" class="form-control" id="inputColonia" placeholder="colonia, apartamento, etc" name="colonia">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Codigo Postal</label>
                                        <input type="text" name="cp" placeholder="codigo postal" class="form-control" id="inputCp">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPais">Pais</label>
                                        <input type="text" name="pais" class="form-control" placeholder="inserta un pais" id="inputPais">
                                    </div>
                                </div>
                                <button name="register-front" class="btn btn-primary btn-user btn-block" type="submit">Registrate</button>
                                <a href="./login.php" class="btn btn-secondary btn-user btn-block">
                                    Iniciar Sesion
                                </a>
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="./assets/jquery/jquery.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./assets/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./js/sb-admin-2.min.js"></script>
    <!-- sweet aler -->
    <script src="<?php echo $root; ?>/assets/sweetAlert/sweetalert.js"></script>
    <!-- custom functions -->
    <script src="<?php echo $root; ?>/js/validateForms.js"></script>
    <script>
        $("#formUsuarios").on("submit", function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
                type: "POST",
                url: "./functions/usuariosFunctions.php",
                data: formData,
            })
            .done(function(response) {
                console.log(response);
                if (response == "existe") {
                    Swal.fire({
                        icon: "warning",
                        title: "Oops...",
                        text: "El usuario ya esta registrado, prueba con otro usuario",
                    });
                }
                if (response == "success") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Registro guardado correctamente",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    $("#formUsuarios")[0].reset();
                }

                if (response == "error") {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Intentalo de nuevo",
                    });
                }
            })
            .fail(function(xhr, status, error) {
                console.log(xhr.responseText);
            });
        });
        
    </script>

</body>

</html>