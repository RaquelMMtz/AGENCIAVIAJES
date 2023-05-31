////:: mostrar inputs adicionales si se registra clientes ::////

document.addEventListener("DOMContentLoaded", function () {
  const selectRolUsuario = document.getElementById("inputRol");
  const addressFieldContainer = document.getElementById("addressFieldContainer");

  function createAddressFields() {
    // Elimina los campos de dirección existentes
    addressFieldContainer.innerHTML = "";

    if (selectRolUsuario.value === "2") {
      // Crea los campos de dirección
      const inputs = `
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
      `;

      addressFieldContainer.innerHTML = inputs;
    }
  }

  selectRolUsuario.addEventListener("change", createAddressFields);
  createAddressFields();
});
