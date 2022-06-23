<?php
    class BD {
        private $sql;

		public function __construct()
			{
				//Get Heroku ClearDB connection information
                $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
                $cleardb_server = $cleardb_url["host"];
                $cleardb_username = $cleardb_url["user"];
                $cleardb_password = $cleardb_url["pass"];
                $cleardb_db = substr($cleardb_url["path"],1);
                $active_group = 'default';
                $query_builder = TRUE;

                //conexio a remoto mysql -h nombre_servidor -u nombre_usuario -p

               /* $this->sql = new mysqli("localhost","b6a1af66bd0498"," 31a0784a","heroku_0725de50da341f2");*/
                //$this->sql = new mysqli("us-cdbr-east-05.cleardb.net","b6a1af66bd0498","31a0784a","heroku_0725de50da341f2");
                $this->sql = new mysqli($cleardb_url, $cleardb_username,$cleardb_password, $cleardb_db);
				if($this->sql->errno) /* logre ingresar un usuario y me muestra que lo autentifica --- Ya quedo entonces? esa parte!*/
				{    
                    echo "<script>alert('ERROR EN LA CONEXION')</script>";
				}
			}
        
        public function guardarUsuario($usuario)
            {
                $consulta = "INSERT INTO cuenta(nombre,correo,contrasenia) VALUES('".$usuario->getNombre()."','".$usuario->getCorreo()."','".$usuario->getContrasenia()."')";
                $this->sql->query($consulta);
            }

            //este es un comentario de prueba


        public function correoExiste($correoE)
            {
                $consulta = "SELECT *FROM cuenta";
                $resultado = $this->sql->query($consulta);

                while ($fila = $resultado->fetch_assoc())
                    {
                       $correo = $fila['correo'];
                        if ($correo == $correoE) 
                            {
                                echo "<script>alert('El correo $correo ya existe, intente con otro')</script>";
                                exit;
                            }    
                    }
            }  
            
        public function buscarCuenta($correoE)
            {
                $consulta = "SELECT *FROM cuenta";
                $resultado = $this->sql->query($consulta);

                while ($fila = $resultado->fetch_assoc())
                    {
                        $correo = $fila['correo'];

                        if ($correo == $correoE) 
                            {
                                $contrasenia = $fila['contrasenia'];
                                /* $usuario = new Usuario();
                                $usuario->setCorreo($fila['correo']);
                                $usuario->setContrasenia($fila['contrasenia']);
                                return $usuario; */
                                return $contrasenia;
                            } 
                    }
            }

        public function mostrarDatos($correoE)
            {
                /* $datosUsuario = array(); */
                $consulta = "SELECT *FROM cuenta";
                $resultado = $this->sql->query($consulta);
        
                while($fila = $resultado->fetch_assoc())
                    {
                        $correo = $fila['correo'];

                        if ($correo == $correoE) 
                            {
                                $usuario = new Usuario();
                                $usuario->setNombre($fila['nombre']);

                                return $usuario;
                                exit;
                            }
        
                    }
                
            }

       /*  public function almacenarArchivo($imagen)
            {
                $consulta = "INSERT INTO archivo(imagen) VALUES('".$imagen."')";
                $this->sql->query($consulta);
            }
 */
        
          
    } 
?>