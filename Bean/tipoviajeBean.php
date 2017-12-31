<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class tipoviajeBean{
    public $idtipoviaje;
    public $idtipo;
    public $nombretipo;
    public $nombreviaje;
    function getIdtipoviaje() {
        return $this->idtipoviaje;
    }

    function getIdtipo() {
        return $this->idtipo;
    }

    function getNombretipo() {
        return $this->nombretipo;
    }

    function getNombreviaje() {
        return $this->nombreviaje;
    }

    function setIdtipoviaje($idtipoviaje) {
        $this->idtipoviaje = $idtipoviaje;
    }

    function setIdtipo($idtipo) {
        $this->idtipo = $idtipo;
    }

    function setNombretipo($nombretipo) {
        $this->nombretipo = $nombretipo;
    }

    function setNombreviaje($nombreviaje) {
        $this->nombreviaje = $nombreviaje;
    }
}

