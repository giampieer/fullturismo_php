<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminBean
 *
 * @author Home
 */
class AdminBean {
	public $idadmin;
	public $nombre;
	public $usuario;
	public $contraseña;
        
        function getIdadmin() {
            return $this->idadmin;
        }

        function getNombre() {
            return $this->nombre;
        }

        function getUsuario() {
            return $this->usuario;
        }

        function getContraseña() {
            return $this->contraseña;
        }

        function setIdadmin($idadmin) {
            $this->idadmin = $idadmin;
        }

        function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        function setUsuario($usuario) {
            $this->usuario = $usuario;
        }

        function setContraseña($contraseña) {
            $this->contraseña = $contraseña;
        }


	


}
