<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\articulosModal;
use App\proveedorModal;
use App\ventasModal;

class ventasController extends Controller{
    
    public function index(){
        $provedor  = proveedorModal::all();
        $articulos  = articulosModal::all();
        
        $ventas = DB::select("SELECT v.idVenta,v.fecha, ar.nombre, v.cantidad FROM ventas AS v
        JOIN articulos AS ar ON ar.idArticulo = v.idArticulo;");
        return view('ventas.index',compact('provedor','articulos','ventas'));
    }

    public function store(Request $request){
        $validator= $request->validate([
            'fecha'=>'required',
            'idArticulo'=> 'required',
            'cantidad'=> 'required'
        ]);    
        $ventas = new ventasModal($request->all());
        $ventas->fecha         = $request->fecha;
        $ventas->idArticulo    = $request->idArticulo;
        $ventas->cantidad      = $request->cantidad;
        $ventas->save();
        return redirect('/ventas')
        ->with('success', 'Venta agregada correctamente'); 
    }

    public function update(Request $request, $id){
        $ventas = ventasModal::find($id);
        $ventas->fecha         = $request->fecha;
        $ventas->idArticulo    = $request->idArticulo;
        $ventas->cantidad      = $request->cantidad;
        $ventas->update();      
        return redirect('/ventas')
        ->with('success', 'Venta actualizada correctamente');
    }
    
    public function destroy($id){
        $ventas = ventasModal::findOrFail($id);
        $ventas->delete();
        return redirect('/ventas')
            ->with('success', 'Venta eliminada correctamente'); 
    }
}
