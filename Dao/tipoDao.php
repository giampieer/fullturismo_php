<?php
require_once '../Bean/TipoBean.php';
require_once '../UTIL/ConexionBD.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class tipoDao{
    
    public function ListarTipo(){
        try {
            $sql="select * from viaje;";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            $lista=array();
            while ($fila= mysqli_fetch_assoc($rs)){
                $lista[]=$fila;
            }
            mysqli_close($cn);
        } catch (Exception $ex) {
            $i=0;
        }
        return $lista;
    }
    
    public function GrabarTipo(TipoBean $objbean){
        $i=0;
        try {
            $id=$objbean->getIdtipo();
            $nombre=$objbean->getNombre();
            $sql="insert into viaje(id_tipo,nombre) value ('$id','$nombre');";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $i= mysqli_query($cn, $sql);
            mysqli_close($cn);
            
        } catch (Exception $ex) {
            
        }
        return $i;
    }
    public function CapturarTipo(TipoBean $objbean){
        try {
            $id=$objbean->getIdtipo();
            $sql="select * from viaje where id_tipo='$id'";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            $data=array();
            while($fecha= mysqli_fetch_assoc($rs)){
                $data[]=$fecha;
            }
            mysqli_close($cn);
        } catch (Exception $ex) {
            
        }
        return $data;
    }
    public function CapturaDato1(){
        try {
            $sql="select * from viaje t left join lugar l on l.tipo_viaje_id_tipo=t.id_tipo is null";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            $data=array();
            while($fecha= mysqli_fetch_assoc($rs)){
                $data[]=$fecha;
            }
            mysqli_close($cn);
        } catch (Exception $ex) {
            
        }
        return $data;
    }
    

    public function ModificarTipo(TipoBean $objbean){
        $i=0;
        try {
            $id=$objbean->getIdtipo();
            $nom=$objbean->getNombre();
            $sql="update viaje set nombre='$nom' where id_tipo='$id'";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $i= mysqli_query($cn, $sql);
            
            mysqli_close($cn);
        } catch (Exception $ex) {
            $i=0;
        }
        return $i;
    }

    public function EliminarTipo(TipoBean $objbean){
        $i=0;
        try {
            $id=$objbean->getIdtipo();
            $sql="delete from viaje where id_tipo='$id'";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $i= mysqli_query($cn, $sql);
            mysqli_close($cn);
        } catch (Exception $ex) {
            $i=0;
        }
        return $i;
    }
    
    public function GenerarCodigo(){
        $i=0;
        try {
            $sql="select max(id_tipo)+1 as codigo from viaje";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            $consulta= mysqli_fetch_array($rs);
            $i=$consulta['codigo'];
            
            if($i==''){
                $i=1;
            }
            mysqli_close($cn);
        } catch (Exception $ex) {
        $i=0;
        }
        return $i;
    }

    
}
