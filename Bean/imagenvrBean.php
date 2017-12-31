<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class imagenvrBean{
    public $idimagen;
    public $nombrevr;
    public $descripcion;
    function getIdimagen() {
        return $this->idimagen;
    }

    function getNombrevr() {
        return $this->nombrevr;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setIdimagen($idimagen) {
        $this->idimagen = $idimagen;
    }

    function setNombrevr($nombrevr) {
        $this->nombrevr = $nombrevr;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}