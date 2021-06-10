function alerta()
    {
        //window.location="index.html";
    //var mensaje;
    //var opcion = confirm("Aceptar");
    if (confirm("Aceptar")) { // opcion == false
       /* <form method="post" action="">
            <input type="submit" name="salir" class="salir" value="Salir" style="float: : right; cursor: pointer;">
            <input type="button" onclick="history.back()" name="Cancelar" value="Cancelar">
        </form>        */
        window.location="../salir.php";
        window.alert("Mal");

        $.ajax({
            type: "POST",
            url: "salir.php",
            data: { "salir" :  "salir" },
            success: function(data){
                alert(data);
            }
        });

	} else {
	    window.alert("Bien");
	}
	//document.getElementById("ejemplo").innerHTML = mensaje;
}


function confirmar() {
  var txt;
  var r = confirm("¿De verdad desea abandonar la sesion?");
  if (r == true) {
  } else {
    window.location.assign("menu_principal.php");

    txt = "Continuando...";
  }
  document.getElementById("demo").innerHTML = txt;
}
