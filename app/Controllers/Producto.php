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

        //ricibo datos formularios
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
                //necesito llamar al modelo
                //Sacar una fotocopia de la clase(crear objeto)
                $modelo = new ProductoModelo();

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
                $mensaje = "Exito agregando producto";
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

        try {
            //Necesito llamar al modelo 
            //crear un objeto de la clase modelo 
            $modelo = new ProductoModelo();

            //utilizar el modelo para hablar con la BD
            //y buscartodos los datos de la tabla
            $resultado = $modelo->findAll();

            //organizo los datos como un arreglo
            //asociativo
            $productos = array("productos" => $resultado);

            //cargar la vista entregando los datos
            return view('listaproductos', $productos);
        } catch (\Exception $error) {
            //throw $th;
            $mensaje = $error->getMessage();
            return redirect()->to(site_url('/productos/registro'))->with('mensaje', $mensaje);
        }

        //Necesito llamar al modelo 
        //crear un objeto de la clase modelo 

        return view('listaproductos');
    }

    public function eliminar($id)
    {

        try {
            //necesito llamar al modelo
            //Sacar una fotocopia de la clase(crear objeto)
            $modelo = new ProductoModelo();

            //utilizar el modelo para habalar con la BD
            // y eliminar el registro con el id capturado
            $modelo->where('id', $id)->delete();

            $mensaje = "Exito eliminando producto";
            return redirect()->to(site_url('/productos/registro'))->with('mensaje', $mensaje);
        } catch (\Exception $error) {
            //throw $th;
            $mensaje = $error->getMessage();
            return redirect()->to(site_url('/productos/registro'))->with('mensaje', $mensaje);
        }
    }

    public function editar($id)
    {
        // echo('estoy editando'. $id);

        //ricibo datos formularios
        $nombreproducto = $this->request->getPost("nombreproducto");
        $foto = $this->request->getPost("foto");
        $precio = $this->request->getPost("precio");
        $descripcion = $this->request->getPost("descripcion");

        //se aplican validaciones
        if ($this->validate('EditformularioProducto')) {
            //echo ('esto casi no funciona');

            //intentar conectarme a la bd
            //e insertar datos
            try {
                //necesito llamar al modelo
                //Sacar una fotocopia de la clase(crear objeto)
                $modelo = new ProductoModelo();

                //armo el paquete de datos a registrar
                $datos = array(

                    "nombreproducto" => $nombreproducto,
                    "foto" => $foto,
                    "precio" => $precio,
                    "descripcion" => $descripcion


                );

                //agrego los datos
                $modelo->update($id, $datos);

                //entrego una respuesta
                $mensaje = "Exito Editando el producto";
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
    }
}
