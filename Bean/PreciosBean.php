<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PreciosBean
 *
 * @author Home
 */
class PreciosBean {
    public $idprecio;
    public $precio;
    public $tipo_moneda;
    public $dias;
    public $idlugar;
    
    function getIdprecio() {
        return $this->idprecio;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getTipo_moneda() {
        return $this->tipo_moneda;
    }

    function getDias() {
        return $this->dias;
    }

    function getIdlugar() {
        return $this->idlugar;
    }

    function setIdprecio($idprecio) {
        $this->idprecio = $idprecio;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setTipo_moneda($tipo_moneda) {
        $this->tipo_moneda = $tipo_moneda;
    }

    function setDias($dias) {
        $this->dias = $dias;
    }

    function setIdlugar($idlugar) {
        $this->idlugar = $idlugar;
    }


    
}
