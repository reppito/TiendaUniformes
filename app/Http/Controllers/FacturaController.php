<?php

namespace TiendaUniformes\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use TiendaUniformes\Factura;
class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function crear(Request $request)
     {

       $direccion= $request->direccion;
       if(Auth::check()){
          $carritos=   DB::table('carritos')
           ->join( 'productos','carritos.id_producto', '=', 'productos.id')
           ->where('carritos.id_user', Auth::user()->id)
           ->select('carritos.cantidad', 'carritos.id','productos.precio','productos.path')->get();
           $pago=0;
           foreach ($carritos as $carrito) {
            $pago=$pago+($carrito->cantidad*$carrito->precio);
           }

       return view('factura.store',compact(['direccion','pago']));

     }
     else return redirect('tienda');

     }
    public function index()
    {
      if (Auth::check()) {
        $direcciones= \TiendaUniformes\Direccion::where('id_user',Auth::user()->id)->get();
        return view('factura.index',compact('direcciones'));
      }
      else return redirect('tienda');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()){
        Factura::create([
          'id_usuario'=> Auth::user()->id,
          'id_dir'  => $request->direccion
          ]);

        $factura= Factura::where('id_usuario','=',Auth::user()->id)->orderby('created_at','DESC')->get();

       \TiendaUniformes\Pago::create([
          'id_factura' => $factura[0]->id
          ,'cantidad_pagar'=> $request->pago
          ,'referencia_bancaria'=> $request->referencia_bancaria
          ,'aprobacion_pago' => '0'

        ]);

        $carrito= \TiendaUniformes\Carrito::where('id_user',$factura[0]->id_usuario)->get();
        foreach ($carrito as $car) {
          \TiendaUniformes\ProductoComprado::create([
            'id_factura' => $factura[0]->id
            ,'id_producto'=> $car->id_producto
            , 'cantidad' => $car->cantidad
            ]);
            $cantidad=0;
          $producto= \TiendaUniformes\Producto::find($car->id_producto);

          $producto->disponibles= $producto->disponibles- $car->cantidad;
          $cantidad= $producto->disponibles;
          $producto->save();

          $carroeliminados= \TiendaUniformes\carrito::where('cantidad','<', $cantidad)->
                                                      where('id_producto',$car->id_producto)->delete();


        }
        \TiendaUniformes\Carrito::where('id_user',$factura[0]->id_usuario)->delete();

     }
        return redirect('tienda');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
