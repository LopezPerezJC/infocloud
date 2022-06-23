<?php
    session_start();

    if (empty($_SESSION["correo"])) 
        {
            include "../vista/html/login.html";
            include "../modelo/BD.php";
            include "../modelo/Priva.php";

            $bd = new BD();
            $en = new Priva();

            if (isset($_POST['acceder']))
                {
                    $correo = $_POST["correo"];
                    $contrasenia = $_POST["contrasenia"];
                    
                    $encriptada = $bd->buscarCuenta($correo);

                    if ($encriptada)
                        {
                            $desencriptada = $en->desencriptar($encriptada);

                            if ($desencriptada == $contrasenia)
                                {
                                    session_start();
                                    
                                    $_SESSION["correo"] = $correo;
                                    header("Location:home.php");
                                }
                            else 
                                {
                                    echo "<script>alert('Contraseña Incorrecto')</script>";
                                    exit;
                                }
                        }
                    else
                        {
                            echo "<script>alert('Correo Incorrecto')</script>";
                            exit;
                        }            
                }
        }
    else
        {
            
            header("Location:home.php");
        
        }
?>