<?php
    session_start();

    if (empty($_SESSION["correo"])) 
        {
            include "../modelo/Usuario.php";
            include "../modelo/Priva.php";
            include "../modelo/BD.php";
            include "../vista/html/registro.html";
            $bd = new BD();
            $en = new Priva();

            if (isset($_POST['crear']))
                {
                    $nombre = $_POST['nombre-completo'];
                    $correo = $_POST['correo'];
                    $contrasenia = $_POST['contrasenia'];
                    $contraseniaV = $_POST['contraseniaV'];

                    $bd->correoExiste($correo);

                    if ($contrasenia !== $contraseniaV) 
                    {
                            echo "Las contraseñas no coinciden, intente de nuevo";
                            exit;
                    }

                    //$encriptada = $en->encriptar($contrasenia);
            
                    $usuario = new Usuario();
                    $usuario->setNombre($nombre);
                    $usuario->setCorreo($correo);
                    $usuario->setContrasenia($contrasenia);

                    $bd->guardarUsuario($usuario);

                    session_start();
                    
                    $_SESSION["correo"] = $correo;

                    header("Location:home.php");
                }
        }
    else 
        {
            header("Location:home.php");
        } 
?>