<?php

require_once '../Bean/tipoviajeBean.php';
require_once '../UTIL/ConexionBD.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class TipoViajeDao{
    public function ListaTipoViaje(){
        try {
            $sql="SELECT t.idtipo_viaje, v.nombre, t.nombretipo FROM tipoviaje t inner join viaje v on t.tipo_viaje_id_tipo=v.id_tipo";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            $lista=array();
            while ($fila= mysqli_fetch_assoc($rs)){
                $lista[]=$fila;
            }
            mysqli_close($cn);
        } catch (Exception $ex) {
        }
        return $lista;
    }
    public function GenerarCodigo(){
        $i=0;
        try {
            $sql="select max(idtipo_viaje)+1 as codigo from tipoviaje";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            $consulta= mysqli_fetch_array($rs);
            $i=$consulta['codigo'];
            mysqli_close($cn);
        } catch (Exception $ex) {
            $i=0;
        }
        return $i;
    }
    public function GrabarTipoViaje(tipoviajeBean $objbean){
        $i=0;
        try {
            $id=$objbean->getIdtipoviaje();
            $nombre=$objbean->getIdtipo();
            $tipoviaje=$objbean->getNombretipo();
            $sql="insert into tipoviaje(idtipo_viaje, tipo_viaje_id_tipo, nombretipo) value ('$id','$nombre','$tipoviaje');";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $i= mysqli_query($cn, $sql);
            mysqli_close($cn);
        } catch (Exception $ex) {
            $i=0;
        }
        return $i;
    }
    public function CapturaTipoViaje(tipoviajeBean $objbean){
        try {
            $id=$objbean->getIdtipoviaje();
            $sql="select t.idtipo_viaje, t.tipo_viaje_id_tipo, t.nombretipo, v.nombre from tipoviaje t inner join viaje v on t.tipo_viaje_id_tipo=v.id_tipo where t.idtipo_viaje='$id'";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            if($fila= mysqli_fetch_assoc($rs)){
                $objbea=new tipoviajeBean();
                $objbea->setIdtipoviaje($fila['idtipo_viaje']);
                $objbea->setIdtipo($fila['tipo_viaje_id_tipo']);
                $objbea->setNombretipo($fila['nombretipo']);
                $objbea->setNombreviaje($fila['nombre']);
            }
        } catch (Exception $ex) {
            
        }
        return $objbea;
    }
    public function ModificarTipoViaje(tipoviajeBean $objbean){
        $i=0;
        try {
            $id=$objbean->getIdtipoviaje();
            $nombre=$objbean->getIdtipo();
            $tipoviaje=$objbean->getNombretipo();
            $sql="UPDATE tipoviaje SET idtipo_viaje='$id',tipo_viaje_id_tipo='$nombre',nombretipo='$tipoviaje';";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $i= mysqli_query($cn, $sql);
            
            mysqli_close($cn);
        } catch (Exception $ex) {
            $i=0;
        }
        return $i;
    }
    public function EliminarTipoViaje(tipoviajeBean $objbean){
        $i=0;
        try {
            $id=$objbean->getIdtipoviaje();
            $sql="delete from tipoviaje where idtipo_viaje='$id'";
            $objc=new ConexionBD;
            $cn=$objc->getconecionBD();
            $i= mysqli_query($cn, $sql);
            mysqli_close($cn);
        } catch (Exception $ex) {
            $i=0;
        }
        return $i;
    }
}

