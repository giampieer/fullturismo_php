<?php

require_once '../Bean/imagenvrBean.php';
require_once '../UTIL/ConexionBD.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class imagenvrDao {

    public function Listarimagenvr() {
        try {
            $sql = "select * from image_vr";
            $objc = new ConexionBD();
            $cn = $objc->getconecionBD();
            $rs = mysqli_query($cn, $sql);
            $lista = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                $lista[] = $fila;
            }
            mysqli_close($cn);
        } catch (Exception $ex) {
            
        }
        return $lista;
    }

    public function generarCodigo() {
        $i = 0;
        try {
            $sql = "select max(idimage_vr) as codigo from image_vr;";
            $objc = new ConexionBD();
            $cn = $objc->getconecionBD();
            $rs = mysqli_query($cn, $sql);
            $consulta = mysqli_fetch_array($rs);
            $i = $consulta['codigo'];
            mysqli_close($cn);
        } catch (Exception $ex) {
            $i = 0;
        }
        return $i;
    }

    public function Agregarimagenvr(imagenvrBean $objbean) {
        $i=0;
        try {
            $id=$objbean->getIdimagen();
            $nombre=$objbean->getNombrevr();
            $descripcion=$objbean->getDescripcion();
            $sql="insert into image_vr(idimage_vr, nombrevr, descripcion) values('$id','$nombre','$descripcion')";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $i= mysqli_query($cn, $sql);
            mysqli_close($cn);
        } catch (Exception $ex) {
            $i=0;
        }
        return $i;
    }
    
    public function Datosimagenvr(imagenvrBean $objbean){
        try {
            $id=$objbean->getIdimagen();
            $sql="select * from image_vr where idimage_vr='$id'";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            if ($fila= mysqli_fetch_assoc($rs)){
                $objbeann=new imagenvrBean();
                $objbeann->setIdimagen($fila['idimage_vr']);
                $objbeann->setNombrevr($fila['nombrevr']);
                $objbeann->setDescripcion($fila['descripcion']);
            }
            mysqli_close($cn);
        } catch (Exception $ex) {
            
        }
        return $objbeann;
    }
    
    public function Datosimagenvr1(){
        try {
            $sql="SELECT * FROM image_vr i left join lugar l on i.idimage_vr=l.image_vr_idimage_vr where l.image_vr_idimage_vr is null";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            $datos=array();
            while ($fila= mysqli_fetch_assoc($rs)){
                $datos[]=$fila;
            }
            mysqli_close($cn);
        } catch (Exception $ex) {
            
        }
        return $datos;
    }
    
    public function Modificarimagenvr(imagenvrBean $objbean){
        $i=0;
        try {
            $id=$objbean->getIdimagen();
            $nombre=$objbean->getNombrevr();
            $descripcion=$objbean->getDescripcion();
            $sql="UPDATE image_vr SET nombrevr='$nombre',descripcion='$descripcion' where idimage_vr='$id'";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $i= mysqli_query($cn, $sql);
            mysqli_close($cn);
        } catch (Exception $ex) {
            $i=0;
        }
        return $i;
    }
    
    public function Eliminarimagenvr(imagenvrBean $objbean){
        $i=0;
        try {
            $id=$objbean->getIdimagen();
            $sql="delete from image_vr where idimage_vr='$id'";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $i= mysqli_query($cn, $sql);
            mysqli_close($cn);
        } catch (Exception $ex) {
            $i=0;
        }
        return $i;
    }

}
