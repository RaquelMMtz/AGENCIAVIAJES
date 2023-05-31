$(document).ready(function () {
  $("#loginForm").on("submit", function (e) {
    e.preventDefault();
    var user = $("#user").val();
    var pass = $("#pass").val();

    $.ajax({
      type: "POST",
      url: "./functions/login/loginFunctions.php",
      data: {
        userLogin: user,
        pass: pass,
      },
      cache: false,
    })
      .done(function (result) {
        console.log(result);
        if (result === "success") {
          let timerInterval;
          Swal.fire({
            title: "Iniciando Sesion!",
            html: "Espere por favor <b></b>",
            timer: 2000,
            timerProgressBar: true,
            didOpen: () => {
              Swal.showLoading();
              const b = Swal.getHtmlContainer().querySelector("b");
              timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft();
              }, 100);
            },
            willClose: () => {
              clearInterval(timerInterval);
            },
          }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                window.location.href = "./views/enrutar.php";
            }
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Usuario o contraseña incorrectos! Intentalo de nuevo",
          });
        }
      })
      .fail(function (xhr, status, error) {
        console.log(xhr.responseText);
      });

    return false;
  });
});
