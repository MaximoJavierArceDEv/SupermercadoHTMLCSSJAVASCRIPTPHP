function activar() {
  menu = document.getElementById("menu").value;
  formCod = document.getElementById("formCod");
  formDesc = document.getElementById("formDesc");
  formMarca = document.getElementById("formMarca");
  formPrecio = document.getElementById("formPrecio");

  //oculto todos los formularios
  formCod.style.display = "none";
  formDesc.style.display = "none";
  formMarca.style.display = "none";
  formPrecio.style.display = "none";

  switch (menu) {
    case "1":
      formCod.style.display = "flex";
      break;
    case "2":
      formDesc.style.display = "flex";
      break;
    case "3":
      formMarca.style.display = "flex";
      break;
    case "4":
      formPrecio.style.display = "flex";
      break;
  }
}
