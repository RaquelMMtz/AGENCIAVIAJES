document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".form-validated");

  form.addEventListener("submit", function (event) {
    const inputs = form.querySelectorAll(".form-control");
    //convierte los inputs en array y verifica con every si los inputs estan llenos o vacios
    let isValid = Array.from(inputs).every(
      (inputVal) => inputVal.value.trim() !== ""
    );

    if (!isValid) {
      event.preventDefault();
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Completa el formulario antes de enviarlo.",
      });
    }
  });
});
