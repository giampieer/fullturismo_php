<?php

session_start();

require_once '../Bean/tipoviajeBean.php';
require_once '../Bean/TipoBean.php';
require_once '../Dao/TipoViajeDao.php';
require_once '../Dao/tipoDao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-Type: application/json');
$op = $_REQUEST['op'];
switch ($op) {
    case 1: {
            $objDao = new TipoViajeDao();
            $lista = $objDao->ListaTipoViaje();
            echo json_encode($lista);
            break;
        }
    case 2: {
            $objbeann=new TipoBean();
            $objDao=new tipoDao();
            $Data['datos']=$objbeann=$objDao->CapturaDato1();
            echo json_encode($Data);
            break;
        }
    case 3: {
            $nombre = $_REQUEST['nombre'];
            $tipoviaje = $_REQUEST['tipoviaje'];
            $objbean = new tipoviajeBean();
            $objdao = new TipoViajeDao();
            $id = $objdao->GenerarCodigo();
            if($id==0){
                $id=1;
            }else{
                $id = $objdao->GenerarCodigo();
            }
            $objbean->setIdtipoviaje($id);
            $objbean->setIdtipo($nombre);
            $objbean->setNombretipo($tipoviaje);
            $i = $objdao->GrabarTipoViaje($objbean);
            if ($i == 1) {
                $mensaje = "Registro insertado correctamente";
            } else {
                $mensaje = "Registro no insertado";
            }
            echo json_encode($mensaje);
            break;
        }
    case 4: {
            $cod = $_REQUEST['cod'];
            $objbean = new tipoviajeBean();
            $objbea = new tipoviajeBean();
            $objdao = new TipoViajeDao();
            $objbean->setIdtipoviaje($cod);
            $objbea = $objdao->CapturaTipoViaje($objbean);
            $Datos['id']= $objbea->getIdtipoviaje();
            $Datos['nombre'] = $objbea->getIdtipo();
            $Datos['tipoviaje'] = $objbea->getNombretipo();
            $Datos['nombreviaje'] = $objbea->getNombreviaje();
            echo json_encode($Datos);
            break;
        }
    case 5: {
            $id = $_REQUEST['id'];
            $nombre = $_REQUEST['nombre'];
            $tipoviaje = $_REQUEST['tipoviaje'];
            $objbean = new tipoviajeBean();
            $objdao = new TipoViajeDao();
            $objbean->setIdtipoviaje($id);
            $objbean->setIdtipo($nombre);
            $objbean->setNombretipo($tipoviaje);
            $i = $objdao->ModificarTipoViaje($objbean);
            if ($i == 1) {
                $mensaje = "Registro modificado correctamente";
            } else {
                $mensaje = "Registro no modificado";
            }
            echo json_encode($mensaje);
            break;
        }
    case 6: {
            $objbean = new tipoviajeBean();
            $objdao = new TipoViajeDao();
            $id = $_REQUEST['cod'];
            $objbean->setIdtipoviaje($id);
            $i = $objdao->EliminarTipoViaje($objbean);
            if ($i == 1) {
                $mensaje = "Registro eliminado correctamente";
            } else {
                $mensaje = "Registro no eliminado";
            }
            echo json_encode($mensaje);
            break;
        }
}
?>

