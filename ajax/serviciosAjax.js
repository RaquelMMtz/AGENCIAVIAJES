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
  
  ////:: agregar servicios ::////
  
  $("#formServicios").on("submit", function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../../../functions/hoteles/serviciosFunctions.php",
      data: new FormData(this), //pasa la imagen y todos los datos del form
      contentType: false,
      cache: false,
      processData: false,
    })
      .done(function (response) {
        console.log(response);
        if (response == "existe") {
          showAlert(
            "warning",
            "Llena todos los campos antes de guardar el registro.",
            ""
          );
        }
        if (response == "success") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Registro guardado correctamente",
            showConfirmButton: false,
            timer: 1500,
          });
          $("#formServicios")[0].reset();
        }
  
        if (response == "error") {
          showAlert("error", "Intentalo de nuevo", "");
        }
      })
      .fail(function (xhr, status, error) {
        console.log(xhr.responseText);
      });
  });
  
  ////:: capturar datos editar hoteles ::////
  
  $(".btn-edit").on("click", function () {
    //tr de referencia para capturar datos
    var row = $(this).closest(".edit-row");
    //capturar datos <td>
    const idDirecciones = row.find("td:nth-child(1)").text();
    const idUsers = row.find("td:nth-child(2)").text();
    const names = row.find("td:nth-child(3)").text();
    const telf = row.find("td:nth-child(4)").text();
    const calles = row.find("td:nth-child(5)").text();
    const colonia = row.find("td:nth-child(6)").text();
    const cp = row.find("td:nth-child(7)").text();
    const pais = row.find("td:nth-child(8)").text();
  
    $("#idDirecciones").val(idDirecciones);
    $("#idHoteles").val(idUsers);
    $("#names").val(names);
    $("#telefonosEdit").val(telf);
    $("#callesEdit").val(calles);
    $("#coloniaEdit").val(colonia);
    $("#cpEdit").val(cp);
    $("#paisEdit").val(pais);
  });
  
  $("#formEditHoteles").on("submit", function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../../../functions/viajes/hotelesFunctions.php",
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
  
  ////:: eliminar destinos ::////
  
  $(".btn-delete").on("click", function (e) {
    var idUsuarioDelete = $(this).closest("tr").find(".id-servicios").text();
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
          url: "../../../functions/hoteles/serviciosFunctions.php",
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
  