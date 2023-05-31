function showAlert(icon, title, text) {
    Swal.fire({
      icon: icon,
      title: title,
      text: text,
    });
  }
////:: actualizar perfil ::////
$("#formPerfil").on("submit", function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../../functions/PerfilFunctions.php",
      data: formData,
    })
      .done(function (response) {
        console.log(response);
        if (response == "success") {
          showAlert("success", "Registro guardado correctamente", "");
          $(".swal2-confirm").click(function () {
            location.reload();
          });
        } else {
          showAlert("error", "Oops...", "Inténtalo de nuevo");
        }
      })
      .fail(function (xhr, status, error) {
        console.log(xhr.responseText);
      });
  });