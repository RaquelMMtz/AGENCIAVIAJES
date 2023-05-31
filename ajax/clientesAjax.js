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
////:: capturar datos clientes datos editar ::////

$(".btn-edit").on("click", function () {
  //tr de referencia para capturar datos
  var row = $(this).closest(".edit-row");
  //capturar datos <td>
  const idUsers = row.find("td:nth-child(1)").text();
  const names = row.find("td:nth-child(3)").text();
  //separar nombres y apellidos
  const calles = row.find("td:nth-child(5)").text();
  const colonia = row.find("td:nth-child(6)").text();
  const cp = row.find("td:nth-child(7)").text();
  const pais = row.find("td:nth-child(8)").text();


  $("#idUsers").val(idUsers);
  $("#names").val(names);
  $("#callesEdit").val(calles);
  $("#coloniaEdit").val(colonia);
  $("#cpEdit").val(cp);
  $("#paisEdit").val(pais);
});

$(document).ready(function () {
  $("#formClientesEdit").on("submit", function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../../../functions/clientesFunctions.php",
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
});

////:: eliminar registros clientes ::////

$(".btn-delete").on("click", function (e) {
  var idUsuarioDelete = $(this).closest("tr").find(".id-usuarios-delete").text();
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
        url: "../../../functions/clientesFunctions.php",
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
