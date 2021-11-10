<?php

namespace App\Controllers;


use  App\Models\ProductoModelo;



class Producto extends BaseController
{
    public function index()
    {
        return view('registroproducto');
    }

    public function registroproducto()
    {

        //datos formularios
        $nombreproducto = $this->request->getPost("nombreproducto");
        $foto = $this->request->getPost("foto");
        $precio = $this->request->getPost("precio");
        $descripcion = $this->request->getPost("descripcion");
        $tipo = $this->request->getPost("tipo");

        //se aplican validaciones
        if ($this->validate('formularioProducto')) {
            //echo ('esto casi no funciona');
            
            //intentar conectarme a la bd
            //e insertar datos
            try {
                //Sacar una fotocopia de la clase(crear objeto)
                $modelo=new ProductoModelo();

                //armo el paquete de datos a registrar
                $datos = array(

                    "nombreproducto" => $nombreproducto,
                    "foto" => $foto,
                    "precio" => $precio,
                    "descripcion" => $descripcion,
                    "tipo" => $tipo

                );

                //agrego los datos
                $modelo->insert($datos);

                //entrego una respuesta
                $mensaje="Exito agregando producto";
                return redirect()->to(site_url('/productos/registro'))->with('mensaje', $mensaje);

            } catch (\Exception $error) {
                //throw $th;
                $mensaje = $error->getMessage();
                return redirect()->to(site_url('/productos/registro'))->with('mensaje', $mensaje);
            }
        } else {

            $mensaje = "Tenemos campos sin llenar";
            return redirect()->to(site_url('/productos/registro'))->with('mensaje', $mensaje);
        }

        //arreglo asociativo
        /*$datos = array(
            
                    "nombreproducto"=>$nombreproducto, 
                    "foto"=>$foto,
                    "precio"=>$precio,
                    "descripcion"=> $descripcion,
                    "tipo"=>$tipo 

                );

        );

        print_r($datos);*/
    }

    public function buscar()
    {

    }
}
