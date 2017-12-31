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
$op = $_REQUEST['op'];
switch ($op) {
    case 1: {
            unset($_SESSION['mensaje']);
            $objDao = new TipoViajeDao();
            $lista = $objDao->ListaTipoViaje();
            $_SESSION['list'] = $lista;
            $destino = "../TipoViaje/ListaTipoViaje.php";
            break;
        }
    case 2: {
            unset($_SESSION['mensaje']);
            $objbeann=new TipoBean();
            $objDao=new tipoDao();
            $objbeann=$objDao->CapturaDato1();
            $_SESSION['datos']=$objbeann;
            $destino = "../TipoViaje/GrabarTipoViaje.php";
            break;
        }
    case 3: {
            unset($_SESSION['mensaje']);
            $id = $_REQUEST['id'];
            $nombre = $_REQUEST['nombre'];
            $tipoviaje = $_REQUEST['tipoviaje'];
            $objbean = new tipoviajeBean();
            $objdao = new TipoViajeDao();
            $objbean->setIdtipoviaje($id);
            $objbean->setIdtipo($nombre);
            $objbean->setNombretipo($tipoviaje);
            $i = $objdao->GrabarTipoViaje($objbean);
            if ($i == 1) {
                $mensaje = "Registro insertado correctamente";
            } else {
                $mensaje = "Registro no insertado";
            }
            $_SESSION['mensaje'] = $mensaje;
            $destino = "../TipoViaje/GrabarTipoViaje.php";
            break;
        }
    case 4: {
            unset($_SESSION['mensaje']);
            $cod = $_REQUEST['cod'];
            $objbean = new tipoviajeBean();
            $objbea = new tipoviajeBean();
            $objbeanviaje=new TipoBean();
            $objdaoviaje=new tipoDao();
            $objdao = new TipoViajeDao();
            $objbeanviaje=$objdaoviaje->CapturaDato1();
            $objbean->setIdtipoviaje($cod);
            $objbea = $objdao->CapturaTipoViaje($objbean);
            $id = $objbea->getIdtipoviaje();
            $nombre = $objbea->getIdtipo();
            $tipoviaje = $objbea->getNombretipo();
            $nombreviaje = $objbea->getNombreviaje();

            $_SESSION['datos']=$objbeanviaje;
            $_SESSION['id'] = $id;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['tipoviaje'] = $tipoviaje;
            $_SESSION['nombreviaje'] = $nombreviaje;

            $destino = "../TipoViaje/ModificarTipoViaje.php";
            break;
        }
    case 5: {
            unset($_SESSION['mensaje']);
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
            $lista = $objdao->ListaTipoViaje();
            $_SESSION['mensaje'] = $mensaje;
            $_SESSION['list'] = $lista;
            $destino = "../TipoViaje/ListaTipoViaje.php";
            break;
        }
    case 6: {
            unset($_SESSION['mensaje']);
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
            $lista = $objdao->ListaTipoViaje();
            $_SESSION['mensaje'] = $mensaje;
            $_SESSION['list'] = $lista;
            $destino = "../TipoViaje/ListaTipoViaje.php";
            break;
        }
}
header("location:$destino");
?>

