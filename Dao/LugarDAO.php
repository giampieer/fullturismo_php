<?php
require_once '../BEAN/LugarBean.php';
require_once '../UTIL/ConexionBD.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LugarDAO
 *
 * @author Home
 */
class LugarDAO
{
    public function GrabarLugar(LugarBean $objbean)
    {
        $i = 0;
        try {
            $id = $objbean->getIdlugar();
            $nombre = $objbean->getNombre();
            $descripcion = $objbean->getDescripcion();
            $imagen_lugar = $objbean->getImgen_blob();
            $itinerario = $objbean->getItinerario();
            $idadmin = $objbean->getIdadmin();
            $idtipo = $objbean->getIdtipo();
            $imagen_vr = $objbean->getImagen_vr();

            $sql = "insert into lugar(idlugar, nombre_lugar, descripcion_lugar, imagen_lugar, itinerario_lugar, Admin_idadmin, tipo_viaje_id_tipo, image_vr_idimage_vr) values ('$id','$nombre','$descripcion','$imagen_lugar','$itinerario','$idadmin','$idtipo','$imagen_vr')";
            $objc = new ConexionBD();
            $cn = $objc->getconecionBD();
            $i = mysqli_query($cn, $sql);
            mysqli_close($cn);
        } catch (Exception $exc) {
            $i = 0;
        }
        return $i;
    }

    public function ListarLugares(LugarBean $objbean)
    {
        try {

            $id = $objbean->getIdadmin();
            $sql = "select l.idlugar, l.nombre_lugar, l.descripcion_lugar, l.imagen_lugar, l.itinerario_lugar, l.Admin_idadmin, t.nombre, i.nombrevr FROM lugar l INNER join viaje t on l.tipo_viaje_id_tipo=t.id_tipo INNER JOIN image_vr i on l.image_vr_idimage_vr=i.idimage_vr where l.Admin_idadmin='$id'";
            $objc = new ConexionBD();
            $cn = $objc->getconecionBD();
            $rs = mysqli_query($cn, $sql);
            $fila = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                $lista[] = $fila;

            }
            mysqli_close($cn);
        } catch (Exception $exc) {

        }
        return $lista;
    }

    public function ListarLugaresAndroid(LugarBean $objbean)
    {
        try {

            $id = $objbean->getIdtipo();
            $sql = "SELECT l.idlugar, l.nombre_lugar, l.descripcion_lugar, l.imagen_lugar, l.itinerario_lugar, v.nombre, p.precio, p.tipo_moneda, p.dias FROM lugar l JOIN precios p ON p.lugar_idlugar = l.idlugar JOIN viaje v ON v.id_tipo = l.tipo_viaje_id_tipo WHERE l.tipo_viaje_id_tipo = '$id'";
            $objc = new ConexionBD();
            $cn = $objc->getconecionBD();
            $rs = mysqli_query($cn, $sql);
            $lista['LUGARES'] = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                array_push($lista['LUGARES'],
                    array('idlugar' => $fila['idlugar'],
                        'nombre_lugar' => $fila['nombre_lugar'],
                        'descripcion_lugar' => $fila['descripcion_lugar'],
                        'imagen_lugar' => base64_encode($fila['imagen_lugar']),
                        'itinerario_lugar' => $fila['itinerario_lugar'],
                        'nombre' => $fila['nombre'],
                        'precio' => $fila['precio'],
                        'tipo_moneda' => $fila['tipo_moneda'],
                        'dias' => $fila['dias']));
            }
            mysqli_close($cn);
        } catch (Exception $exc) {

        }
        return $lista;
    }

    public function CapturarLugar(LugarBean $objbean)
    {
        try {
            $id = $objbean->getIdlugar();
            $sql = "SELECT l.idlugar, l.nombre_lugar, l.descripcion_lugar, l.imagen_lugar, l.itinerario_lugar, l.Admin_idadmin, l.tipo_viaje_id_tipo, l.image_vr_idimage_vr, t.nombre, i.nombrevr FROM lugar l inner join viaje t on l.tipo_viaje_id_tipo=t.id_tipo inner join image_vr i on l.image_vr_idimage_vr=i.idimage_vr where l.idlugar='$id'";
            $objc = new ConexionBD();
            $cn = $objc->getconecionBD();
            $rs = mysqli_query($cn, $sql);
            $datos = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                $datos[] = $fila;
            }
            mysqli_close($cn);
        } catch (Exception $ex) {

        }
        return $datos;
    }

    public function CapturarLugar1()
    {
        try {
            $sql = "select * from lugar l left join precios p on l.idlugar=p.lugar_idlugar where p.lugar_idlugar is null";
            $objc = new ConexionBD();
            $cn = $objc->getconecionBD();
            $rs = mysqli_query($cn, $sql);
            $datos = array();
            while ($fila = mysqli_fetch_assoc($rs)) {
                $datos[] = $fila;
            }
            mysqli_close($cn);
        } catch (Exception $ex) {

        }
        return $datos;
    }

    public function ModificarLugares(LugarBean $obj)
    {
        $i = 0;
        try {
            $id = $obj->getIdlugar();
            $nom = $obj->getNombre();
            $des = $obj->getDescripcion();
            $imagen = $obj->getImgen_blob();
            $itine = $obj->getItinerario();
            $idadmin = $obj->getIdadmin();
            $idtipo = $obj->getIdtipo();
            $sql = "UPDATE lugar SET nombre_lugar='$nom', descripcion_lugar='$des', imagen_lugar='$imagen', itinerario_lugar='$itine', Admin_idadmin='$idadmin', tipo_viaje_id_tipo='$idtipo' WHERE idlugar='$id'";
            $objc = new ConexionBD;
            $cn = $objc->getconecionBD();
            $i = mysqli_query($cn, $sql);

            mysqli_close($cn);
        } catch (Exception $ex) {
            $i = 0;

        }
        return $i;
    }

    public function EliminarLugares(LugarBean $objbean)
    {
        $i = 0;
        try {
            $id = $objbean->getIdlugar();
            $sql = "delete from lugar where idlugar='$id'";
            $objc = new ConexionBD();
            $cn = $objc->getconecionBD();
            $i = mysqli_query($cn, $sql);
            mysqli_close($cn);
        } catch (Exception $ex) {
            $i = 0;
        }
        return $i;
    }

    public function GenerarCodigo()
    {
        $cod = 0;
        try {
            $sql = "select max(idlugar)+1 as codigo from lugar";
            $objc = new ConexionBD();
            $cn = $objc->getconecionBD();
            $rs = mysqli_query($cn, $sql);
            $consulta = mysqli_fetch_array($rs);
            $cod = $consulta['codigo'];
            if ($cod == '') {
                $cod = 1;
            }
        } catch (Exception $ex) {
            $cod = 0;
        }
        return $cod;
    }
}
