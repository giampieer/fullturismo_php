<?php
require_once '../Bean/PreciosBean.php';
require_once '../UTIL/ConexionBD.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PrecioDao{
    public function ListaPrecio(){
        try {
            $sql="select p.idprecio,p.precio,p.tipo_moneda,p.dias,l.nombre_lugar from precios p inner join lugar l on p.lugar_idlugar=l.idlugar";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            $lista=array();
            while($fila= mysqli_fetch_assoc($rs)){
                $lista[]=$fila;
            }
            mysqli_close($cn);
        } catch (Exception $ex) {
            
        }
        return $lista;
    }
    public function GrabarPrecios(PreciosBean $objbean){
        $i=0;
        try {
            $id=$objbean->getIdprecio();
            $precio=$objbean->getPrecio();
            $tipomoneda=$objbean->getTipo_moneda();
            $dias=$objbean->getDias();
            $idlugar=$objbean->getIdlugar();
            $sql="insert into precios(idprecio,precio,tipo_moneda,dias,lugar_idlugar) values('$id','$precio','$tipomoneda','$dias','$idlugar');";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $i= mysqli_query($cn, $sql);
            mysqli_close($cn);
            
        } catch (Exception $ex) {
            $i=0;
        }
        return $i;
    }
    public function CapturarPrecios(PreciosBean $objbean){
        try {
            $id=$objbean->getIdprecio();
            $sql="SELECT p.idprecio, p.precio, p.tipo_moneda, p.dias, p.lugar_idlugar, l.nombre_lugar FROM precios p inner join lugar l on p.lugar_idlugar=l.idlugar WHERE  idprecio='$id'";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            $datos=array();
            while($fech= mysqli_fetch_assoc($rs)){
                $datos[]=$fech;
            }
            mysqli_close($cn);
        } catch (Exception $ex) {
            
        }
        return $datos;
    }
    
    public function ModificarDatos(PreciosBean $objbean){
        $i=0;
        try {
            $id=$objbean->getIdprecio();
            $precio=$objbean->getPrecio();
            $tipomoneda=$objbean->getTipo_moneda();
            $dias=$objbean->getDias();
            $idlugar=$objbean->getIdlugar();
            $sql="update precios set precio='$precio',tipo_moneda='$tipomoneda',dias='$dias',lugar_idlugar='$idlugar' where idprecio='$id';";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $i= mysqli_query($cn, $sql);
            mysqli_close($cn);
        } catch (Exception $ex) {
            
        }
        return $i;
    }

    public function EliminarPrecios(PreciosBean $objbean){
        $i=0;
        try {
            $id=$objbean->getIdprecio();
            $sql="delete from precios where idprecio='$id'";
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
        $cod=0;
        try {
            $sql="select max(idprecio)+1 as codigo from precios;";
            $objc=new ConexionBD();
            $cn=$objc->getconecionBD();
            $rs= mysqli_query($cn, $sql);
            $consulta= mysqli_fetch_assoc($rs);
            $cod=$consulta['codigo'];
            if($cod==''){
                $cod=1;
            }
            mysqli_close($cn);
        } catch (Exception $ex) {
            $cod=0;
        }
        return $cod;
    }
}

