 <?php session_start();
require_once '../Bean/PreciosBean.php';
require_once '../Dao/PrecioDao.php';
require_once '../Dao/LugarDAO.php';
require_once '../Bean/LugarBean.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$op=$_REQUEST['op'];
switch ($op){
    case 1:{
        unset($_SESSION['mensaje']);        $objdao=new PrecioDao();
        $lista=$objdao->ListaPrecio();
        $_SESSION['lista']=$lista;
        $destino="../Precio/ListaPrecio.php";
        break;
    }
    case 2:{
        unset($_SESSION['mensaje']);        $objdaol=new LugarDAO();
        $objbean=new LugarBean();
        $objbean=$objdaol->CapturarLugar1();
        $_SESSION['data']=$objbean;
        $destino="../Precio/GrabarPrecio.php";
        break;
    }
    case 3:{
        unset($_SESSION['mensaje']);        $id=$_REQUEST['id'];
        $precio=$_REQUEST['precio'];
        $moneda=$_REQUEST['moneda'];
        $dias=$_REQUEST['dias'];
        $idlugar=$_REQUEST['lugar'];
        $objbean=new PreciosBean();
        $objbean->setIdprecio($id);
        $objbean->setPrecio($precio);
        $objbean->setTipo_moneda($moneda);
        $objbean->setDias($dias);
        $objbean->setIdlugar($idlugar);
        $objdao=new PrecioDao();
        $i=$objdao->GrabarPrecios($objbean);
        if($i==1){
            $mensaje="datos agregados";
        }else{
            $mensaje="datos no agregados";
        }
        $_SESSION['mensaje']= $mensaje;
        $destino="../Precio/GrabarPrecio.php";
        
        break;
    }
    case 4:{
        unset($_SESSION['mensaje']);        
        $id=$_REQUEST['cod'];
        $objbean=new PreciosBean();
        $objbean->setIdprecio($id);
        $objdao=new PrecioDao();
        $i=$objdao->EliminarPrecios($objbean);
        if($i==1){
            $mensaje="datos agregados";
        }else{
            $mensaje="datos no agregados";
        }
        $_SESSION['mensaje']= $mensaje;
        $lista=$objdao->ListaPrecio();
        $_SESSION['lista']=$lista;
        $destino="../Precio/ListaPrecio.php";
        break;
    }
    case 5:{
        unset($_SESSION['mensaje']);        
        $id=$_REQUEST['cod'];
        $objbean=new PreciosBean();
        $objdao=new PrecioDao();
        $objbean->setIdprecio($id);
        $objbean=$objdao->CapturarPrecios($objbean);
        $_SESSION['dat']=$objbean;
        
        $objbeanl=new LugarBean();
        $objdaol=new LugarDAO();
        $objbeanl=$objdaol->CapturarLugar1();
        $_SESSION['datalu']=$objbeanl;
        $destino="../Precio/ModificarPrecio.php";
        break;
    }
    case 6:{
        unset($_SESSION['mensaje']);        $id=$_REQUEST['id'];
        $precio=$_REQUEST['precio'];
        $moneda=$_REQUEST['moneda'];
        $dias=$_REQUEST['dias'];
        $idlugar=$_REQUEST['lugar'];
        $objbean=new PreciosBean();
        $objbean->setIdprecio($id);
        $objbean->setPrecio($precio);
        $objbean->setTipo_moneda($moneda);
        $objbean->setDias($dias);
        $objbean->setIdlugar($idlugar);
        $objdao=new PrecioDao();
        $i=$objdao->ModificarDatos($objbean);
        if($i==1){
            $mensaje="datos modificados";
        }else{
            $mensaje="datos no modificados";
        }
        $_SESSION['mensaje']= $mensaje;
        
        $lista=$objdao->ListaPrecio();
        $_SESSION['lista']=$lista;
        $destino="../Precio/ListaPrecio.php";
        
        break;
    }
}
header("location:$destino");
?>