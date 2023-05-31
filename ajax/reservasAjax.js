// Función para mostrar alerts
function showAlert(icon, title, text) {
    Swal.fire({
      icon: icon,
      title: title,
      text: text,
    });
  }
  
  function reloadPage() {
    $(".swal2-confirm").click(function () {
      location.reload();
    });
  }

  ////:: agregar solicitud viajes - clientes ::////

  $("#formSolicitudes").on("submit", function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../../../functions/viajes/reservasFunctions.php",
      data: new FormData(this), //pasa la imagen y todos los datos del form
      contentType: false,
      cache: false,
      processData: false,
    })
      .done(function (response) {
        console.log(response);
        if (response == "empty") {
            showAlert("warning", "Llena todos los campos antes de guardar el registro.", "");
        }
        if (response == "success") {
          showAlert("success", "Registro guardado correctamente", "");
        $(".swal2-confirm").click(function () {
          window.location.href = "../viajes/lista.php";

        });
        }

        if (response == "error") {
            showAlert("error", "Intentalo de nuevo", "");
        }
      })
      .fail(function (xhr, status, error) {
        console.log(xhr.responseText);
      });
  });
  
////:: confirmar reservas admin

$("#formReservas").on("submit", function (e) {
  e.preventDefault();
  console.log('admin')
  var formData = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "../../../functions/viajes/reservasFunctions.php",
    data: new FormData(this), //pasa la imagen y todos los datos del form
    contentType: false,
    cache: false,
    processData: false,
  })
    .done(function (response) {
      console.log(response);
      if (response == "empty") {
          showAlert("warning", "Llena todos los campos antes de guardar el registro.", "");
      }
      if (response == "success") {
        showAlert("success", "Registro guardado correctamente", "");
      $(".swal2-confirm").click(function () {
        window.location.href = "../viajes/lista.php";

      });
      }

      if (response == "error") {
          showAlert("error", "Intentalo de nuevo", "");
      }
    })
    .fail(function (xhr, status, error) {
      console.log(xhr.responseText);
    });
});


////:: eliminar solicitudes reservas ::////

$(".btn-delete").on("click", function (e) {

  var idUsuarioDelete = $(this).closest("tr").find(".id-viajes").text();
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
        url: "../../../functions/viajes/reservasFunctions.php",
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