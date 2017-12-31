<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoBean
 *
 * @author Home
 */
class TipoBean {

    public $idtipo;
    public $nombre;
    
    function getIdtipo() {
        return $this->idtipo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setIdtipo($idtipo) {
        $this->idtipo = $idtipo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }


}
