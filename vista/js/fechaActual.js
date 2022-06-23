function obtenerFecha(){
    fecha = new Date();
    anio = date.getFullYear();
    mes = date.getMonth() + 1;
    dia = date.getDate();
    document.getElementById("fechaNacimiento").innerHTML = anio + "/" + mes + "/" + dia;
}