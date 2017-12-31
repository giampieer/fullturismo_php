<?php

session_start();

require_once '../Bean/imagenvrBean.php';
require_once '../Dao/imagenvrDao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$op = $_REQUEST['op'];
switch ($op) {
    case 1: {
            unset($_SESSION['mensaje']);
            $objdao = new imagenvrDao();
            $lista = $objdao->Listarimagenvr();
            $_SESSION['lista'] = $lista;
            $destino = "../imagenvr/ListaImagenvr.php";
            break;
        }
    case 2: {
            unset($_SESSION['mensaje']);
            $destino = "../imagenvr/AgregarImagenvr.php";
            break;
        }
    case 3: {
            unset($_SESSION['mensaje']);
            $objbean = new imagenvrBean();
            $objDao = new imagenvrDao();
            $id = $_REQUEST['idlugar'];
            $nombre = $_REQUEST['nombre'];
            $descripcion = addslashes(file_get_contents($_FILES['imagen'] ['tmp_name']));
            $objbean->setIdimagen($id);
            $objbean->setNombrevr($nombre);
            $objbean->setDescripcion($descripcion);
            $i = $objDao->Agregarimagenvr($objbean);
            if ($i == 1) {
                $mensaje = "Datos Agregados Satisfactoriamente";
            } else {
                $mensaje = "Datos no Agregados";
            }
            $_SESSION['mensaje'] = $mensaje;
            $destino = "../imagenvr/AgregarImagenvr.php";
            break;
        }
    case 4: {
            unset($_SESSION['mensaje']);
            $id = $_REQUEST['cod'];
            $objbeann = new imagenvrBean();
            $objbean = new imagenvrBean();
            $objbean->setIdimagen($id);
            $objdao = new imagenvrDao();
            $objbeann = $objdao->Datosimagenvr($objbean);
            $id = $objbeann->getIdimagen();
            $nombre = $objbeann->getNombrevr();
            $descripcion = $objbeann->getDescripcion();

            $_SESSION['id'] = $id;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['descripcion'] = $descripcion;
            $destino = "../imagenvr/ModificarImagenvr.php";
            break;
        }
    case 5: {
            unset($_SESSION['mensaje']);
            $objbeaan = new imagenvrBean();
            $objDaoo = new imagenvrDao();
            $id = $_REQUEST['idlugar'];
            $nombre = $_REQUEST['nombre'];
            $descripcion = addslashes(file_get_contents($_FILES['imagen'] ['tmp_name']));
            $objbeaan->setIdimagen($id);
            $objbeaan->setNombrevr($nombre);
            $objbeaan->setDescripcion($descripcion);
            $i = $objDaoo->Modificarimagenvr($objbeaan);
            if ($i == 1) {
                $mensaje = "Datos Modificados Satisfactoriamente";
            } else {
                $mensaje = "Datos no Modificados";
            }
            $lista = $objDaoo->Listarimagenvr();
            $_SESSION['lista'] = $lista;
            $_SESSION['mensaje'] = $mensaje;
            $destino = "../imagenvr/ListaImagenvr.php";

            break;
        }
    case 6:{
            unset($_SESSION['mensaje']);
            $id=$_REQUEST['cod'];
            $objbean=new imagenvrBean();
            $objdao=new imagenvrDao();
            $objbean->setIdimagen($id);
            $i=$objdao->Eliminarimagenvr($objbean);
            if($i==1){
                $mensaje="Datos Eliminados Satisfactoriamente";
            }else{
                $mensaje="Datos no Eliminados";
            }
            $_SESSION['mensaje']=$mensaje;
            $lista=$objdao->Listarimagenvr();
            $_SESSION['lista']=$lista;
            $destino="../imagenvr/ListaImagenvr.php";
        break;
    }
}
header("location:$destino");
?>