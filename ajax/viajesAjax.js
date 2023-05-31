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

  ////:: agregar viajes ::////

  $("#formViajes").on("submit", function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../../../functions/viajes/viajesFunctions.php",
      data: new FormData(this), //pasa la imagen y todos los datos del form
      contentType: false,
      cache: false,
      processData: false,
    })
      .done(function (response) {
        console.log(response);
        if (response == "existe") {
            showAlert("warning", "Llena todos los campos antes de guardar el registro.", "");
        }
        if (response == "success") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Registro guardado correctamente",
            showConfirmButton: false,
            timer: 1500,
          });
          $("#formViajes")[0].reset();
        }

        if (response == "error") {
            showAlert("error", "Intentalo de nuevo", "");
        }
      })
      .fail(function (xhr, status, error) {
        console.log(xhr.responseText);
      });
  });
  
  ////:: eliminar destinos ::////
  
  $(".btn-delete").on("click", function (e) {
    var idUsuarioDelete = $(this).closest("tr").find(".id-destinos").text();
    showAlert("warning", "Registro guardado correctamente", "");
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
          url: "../../../functions/viajes/viajesFunctions.php",
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
        showAlert("success", "Registro eliminado correctamente", "");
        reloadPage();
      }
    });
  });
  

//// cancelar viajes usuarios ////

$(".btn-cancel").on("click", function (e) {
  var idUsuarioDelete = $(this).closest("tr").find(".id-viajes").text();

  showAlert("warning", "Registro guardado correctamente", "");
  Swal.fire({
    title: "Atencion!",
    text: "Estas seguro de cancelar el viaje!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, borrar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        method: "POST",
        url: "../../../functions/viajes/viajesFunctions.php",
        data: {
          idCancel: idUsuarioDelete,
        },
      })
        .done(function (data) {
          console.log(data);
        })
        .fail(function (jqXHR, textStatus) {
          console.log("error: " + jqXHR + textStatus);
        });
      showAlert("success", "Registro eliminado correctamente", "");
      reloadPage();
    }
  });
});