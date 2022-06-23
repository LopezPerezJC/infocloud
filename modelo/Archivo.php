<?php
    class Archivo 
    {
        private $id_usuario;
        private $nombre;
        private $tamanio;
        private $tipo;

        public function__construct()
        {
            $this->id_usuario = 0;
            $this->nombre = "";
            $this->tamanio = 0;
            $this->tipo = "";
        }

        public function setId_usuario($id_usuario){ $this->id_usuario = $id_usuario; }
        public function getId_usuario($id_usuario){ return $this->nombre; }

        public function setNombre($nombre){ $this->nombre = $nombre; }
        public function getNombre($id_usuario) { return $this->nombre; }

        public function setTamanio($tamanio){$this->tamanio = $tamanio; }
        public function getTamanio() {return $this->tamanio; }
        
        public function setTipo($tipo){ $this->tipo = $tipo; }
        public function getTipo() { return $this->tipo; }
    }
?>