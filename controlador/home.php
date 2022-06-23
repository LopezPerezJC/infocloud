<?php
    session_start();

    if (empty($_SESSION["correo"])) 
        {
            header("Location: ../");
        }

    include "../modelo/Usuario.php";
    include "../modelo/BD.php";

    $datosUsuario = new Usuario();
    $bd = new BD();

    $correo = $_SESSION["correo"];

    $datosUsuario = $bd->mostrarDatos($correo);

    include "../vista/html/home.html";
/* 
    if (isset($_POST['submit']))
        {
            $revisar = getimagesize($_FILES["image"]["tmp_name"]);
            if ($revisar !== false)
                {
                    $image = $_FILES['image']['tmp_name'];
                    $imgContenido = addslashes(file_get_contents($image));
                    $bd->almacenarArchivo($imgContenido);
                }
            else {
                echo "fail";
            }
        }
     */
    /*
    echo "<br>Datos Personales.";
    echo "<br>Tu correo es: <strong>" . $_SESSION["correo"] . "</strong>";
    
    printf('<br>Tu nombre es: <strong>%s</strong>',$datosUsuario->getNombre());
    printf('<br>Tu apellido es: <strong>%s</strong>',$datosUsuario->getApellido());
    printf('<br>Tu fecha de nacimiento es: <strong>%s</strong>',$datosUsuario->getFechaNaci()); 
        */
?>