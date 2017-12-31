 <?php session_start();
require_once '../Bean/LugarBean.php';
require_once '../Dao/LugarDAO.php';
require_once '../Dao/tipoDao.php';
require_once '../Bean/TipoBean.php';
require_once '../Bean/imagenvrBean.php';
require_once '../Dao/imagenvrDao.php';

$op=$_REQUEST['op'];
switch ($op){
    case 1:{
        unset($_SESSION['mensaje']);        
        $cod=$_REQUEST['cod'];
        $objbean=new LugarBean();
        $objbean->setIdadmin($cod);
        $objdao=new LugarDAO();
        $lista=$objdao->ListarLugares($objbean);
        $_SESSION['lista']=$lista;
        $_SESSION['codigo']=$cod;
        $destino="../Lugares/listar.php";
        break;
    }
    case 2:{
        unset($_SESSION['mensaje']);        
        $cod=$_REQUEST['cod'];
        $objbeanimage=new imagenvrBean();
        $objdaoimage=new imagenvrDao();
        $objbeann=new TipoBean();
        $objdaotipo=new tipoDao();
        $objbeann=$objdaotipo->CapturaDato1();
        $objbeanimage=$objdaoimage->Datosimagenvr1();
        $_SESSION['codigo']=$cod;
        $_SESSION['datos']=$objbeann;
        $_SESSION['datosimage']=$objbeanimage;
        $destino="../Lugares/index.php";
        break;
    }
    case 3:{
        unset($_SESSION['mensaje']);    
        
        $id=$_REQUEST['idlugar'];
        $nombre=$_REQUEST['nombre'];
        $descripcion=$_REQUEST['descripcion'];
        $imagen= addslashes(file_get_contents($_FILES['imagen'] ['tmp_name']));
        $itinerioa=$_REQUEST['itinerario'];
        $idadmin=$_REQUEST['idadmin'];
        $tipo=$_REQUEST['tipo'];
        $imagenvr=$_REQUEST['imagenvr'];
        $objdao=new LugarDAO();
        $objbean=new LugarBean();
        $objbean->setIdlugar($id);
        $objbean->setNombre($nombre);
        $objbean->setDescripcion($descripcion);
        $objbean->setImgen_blob($imagen);
        $objbean->setImagen_vr($imagenvr);
        $objbean->setItinerario($itinerioa);
        $objbean->setIdadmin($idadmin);
        $objbean->setIdtipo($tipo);
        $i=$objdao->GrabarLugar($objbean);
        if($i==1){
            $mensaje="Registro Insertado Satisfactoriamente";

        }else{
            $mensaje="Registro No Insertado ";

        }
        $_SESSION['mensaje']= $mensaje;

        $objbea=new TipoBean();
        $objdaotip=new tipoDao();
        $objbea=$objdaotip->CapturaDato1();
        
        $_SESSION['codigo']=$idadmin;
        $_SESSION['datos']=$objbea;
        $destino="../Lugares/index.php";
        break;
    }
    case 4:{
        unset($_SESSION['mensaje']);        
        $id=$_REQUEST['cod'];
        $idadmin=$_REQUEST['codadmin'];
        $objbean=new LugarBean();
        $objbean->setIdlugar($id);
        $objbean->setIdadmin($idadmin);
        $objdao=new LugarDAO();
        $i=$objdao->EliminarLugares($objbean);
        $lista=$objdao->ListarLugares($objbean);

        if($i==1){
            $mensaje="datos Eliminados";
        }else{
            $mensaje="datos no eliminados";
        }
        $_SESSION['mensaje']=$mensaje;
        
        $_SESSION['lista']=$lista; 
        $_SESSION['codigo']=$idadmin;
        $destino="../Lugares/listar.php";
        break;
    }
    case 5:{
        unset($_SESSION['mensaje']);        
        $id=$_REQUEST['cod'];
        $objbean=new LugarBean();
        $objbean->setIdlugar($id);
        $objdao=new LugarDAO();
        $objbean=$objdao->CapturarLugar($objbean);
        $_SESSION['data']=$objbean;
        
        $objbeann1=new TipoBean();
        $objdaoo=new tipoDao();
        $objbeann1=$objdaoo->CapturaDato1();
        $_SESSION['da']=$objbeann1;
        
        $objbeanimage=new imagenvrBean();
        $objdaoimage=new imagenvrDao();
        $objbeanimage=$objdaoimage->Datosimagenvr1();
        $_SESSION['datosimage']=$objbeanimage;
        $destino="../Lugares/ModificarLugar.php";
        break;
    }
    case 6:{
        unset($_SESSION['mensaje']);    
        
        $id=$_REQUEST['idlugar'];
        $nombre=$_REQUEST['nombre'];
        $descripcion=$_REQUEST['descripcion'];
        $imagen= addslashes(file_get_contents($_FILES['imagen'] ['tmp_name']));
        $imagenvr=$_REQUEST['imagenvr'];
        $itinerioa=$_REQUEST['itinerario'];
        $idadmin=$_REQUEST['idadmin'];
        $tipo=$_REQUEST['tipo'];
        $objdao=new LugarDAO();
        $objbean=new LugarBean();
        $objbean->setIdlugar($id);
        $objbean->setNombre($nombre);
        $objbean->setDescripcion($descripcion);
        $objbean->setImgen_blob($imagen);
        $objbean->setImagen_vr($imagenvr);
        $objbean->setItinerario($itinerioa);
        $objbean->setIdadmin($idadmin);
        $objbean->setIdtipo($tipo);
        $i=$objdao->ModificarLugares($objbean);
        if($i==1){
            $mensaje="Registro Modificado Satisfactoriamente";

        }else{
            $mensaje="Registro No Modificado ";

        }
        $_SESSION['mensaje']= $mensaje;
        $lista=$objdao->ListarLugares($objbean);
        $_SESSION['lista']=$lista;
        $_SESSION['codigo']=$idadmin;
        $destino="../Lugares/listar.php";
        break;
    }
    
    
}
header("location:$destino");
?>


