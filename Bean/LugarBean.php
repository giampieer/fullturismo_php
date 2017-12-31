<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LugarBean
 *
 * @author Home
 */
class LugarBean {

    public $idlugar;
    public $nombre;
    public $descripcion;
    public $imgen_blob;
    public $itinerario;
    public $idadmin;
    public $idtipo;
    public $imagen_vr;

    function getIdlugar() {
        return $this->idlugar;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getImgen_blob() {
        return $this->imgen_blob;
    }

    function getItinerario() {
        return $this->itinerario;
    }

    function getIdadmin() {
        return $this->idadmin;
    }

    function getIdtipo() {
        return $this->idtipo;
    }

    function getImagen_vr() {
        return $this->imagen_vr;
    }

    function setIdlugar($idlugar) {
        $this->idlugar = $idlugar;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setImgen_blob($imgen_blob) {
        $this->imgen_blob = $imgen_blob;
    }

    function setItinerario($itinerario) {
        $this->itinerario = $itinerario;
    }

    function setIdadmin($idadmin) {
        $this->idadmin = $idadmin;
    }

    function setIdtipo($idtipo) {
        $this->idtipo = $idtipo;
    }

    function setImagen_vr($imagen_vr) {
        $this->imagen_vr = $imagen_vr;
    }
}
