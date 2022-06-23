<?php
    class Usuario 
        {
            private $nombre;
            private $correo;
            private $contrasenia;

            public function __construct()
                {
                    $this->nombre;
                    $this->correo = '';
                    $this->contrasenia = '';
                }
        
                public function setNombre($nombre){$this->nombre = $nombre;}
                public function getNombre(){return $this->nombre;}

                public function setCorreo($correo){$this->correo = $correo;}
                public function getCorreo(){return $this->correo;}

                public function setContrasenia($contrasenia){$this->contrasenia = $contrasenia;}
                public function getContrasenia(){return $this->contrasenia;}
        }
?>