////:: guardar registros usuarios ::////

$(document).ready(function () {
  $("#formUsuarios").on("submit", function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../../../functions/usuariosFunctions.php",
      data: formData,
    })
      .done(function (response) {
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
      .fail(function (xhr, status, error) {
        console.log(xhr.responseText);
      });
  });
});

////:: capturar datos usuarios editar ::////

$(".btn-edit").on("click", function () {
  //tr de referencia para capturar datos
  var row = $(this).closest(".edit-row");
  //capturar datos <td>
  const idUsers = row.find("td:nth-child(1)").text();
  const names = row.find("td:nth-child(2)").text();
  //separar nombres y apellidos
  const separador = names.split(" ");
  const aPaterno = separador[separador.length - 2];
  const aMaterno = separador[separador.length - 1];
  const telefonos = row.find("td:nth-child(4)").text();
  const status = row.find("td:nth-child(5)").text().trim();
  const rol = row.find("td:nth-child(7)").text().trim();
  const rolNumber = rol == "Administrador" ? 1 : 2;
  const statusNumber = status == "Activo" ? 1 : 0;

  $("#idUsers").val(idUsers);
  $("#names").val(names);
  $("#paterno").val(aPaterno);
  $("#materno").val(aMaterno);
  $("#telf").val(telefonos);
  $("#inputEstado").val(statusNumber);
  $("#inputRol").val(rolNumber);
});

$(document).ready(function () {
  $("#formUsuariosEdit").on("submit", function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../../../functions/usuariosFunctions.php",
      data: formData,
    })
      .done(function (response) {
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
          $("#formUsuariosEdit")[0].reset();
          $("#modalEditUsers").modal("hide");
          location.reload();
        }

        if (response == "error") {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Intentalo de nuevo",
          });
        }
      })
      .fail(function (xhr, status, error) {
        console.log(xhr.responseText);
      });
  });
});

////:: eliminar usuarios registrados ::////

$(".btn-delete").on("click", function (e) {
  var idUsuarioDelete = $(this).closest("tr").find(".id-usuarios").text();
  Swal.fire({
    title: "Atencion!",
    text: "Los registros eliminados no se podran recuperar!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, borrar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        method: "POST",
        url: "../../../functions/usuariosFunctions.php",
        data: {
          idDelete: idUsuarioDelete,
        },
      })
        .done(function (data) {
          console.log(data);
        })
        .fail(function (jqXHR, textStatus) {
          console.log("error: " + jqXHR + textStatus);
        });
      Swal.fire("Eliminado!", "Registros eliminados correctamente.", "success");
      $(".swal2-confirm").click(function () {
        location.reload();
      });
    }
  });
});

////:: editar pass usuarios ::////

$(".btn-pass").on("click", function (e) {
  var idUPass = $(this).closest("tr").find(".id-usuarios").text();
  $("#idUsersPass").val(idUPass);
  $("#formUsuariosPass").on("submit", function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    $.ajax({
      method: "POST",
      url: "../../../functions/usuariosFunctions.php",
      data: formData,
    })
      .done(function (data) {
        console.log(data);
        if (data == "success") {
          Swal.fire(
            "Exito!",
            "Contraseña actualizada correctamente.",
            "success"
          );
          $(".swal2-confirm").click(function () {
            location.reload();
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Intentalo de nuevo",
          });
        }
      })
      .fail(function (jqXHR, textStatus) {
        console.log("error: " + jqXHR + textStatus);
      });
  });
});
