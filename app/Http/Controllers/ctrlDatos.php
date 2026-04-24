<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class ctrlDatos extends Controller
{
    public function AccesoDatosVista(){
        $pro = Product::all();
        return view('vistadatos')->with(compact('pro')); //
        //return view('vistadatos');
    }

    public function AccesoDatosVistaLink(){

    $enlace = Http::get('https://api.jsonbin.io/v3/b/69d93892856a6821891d660b');
        $traductorjson = $enlace->json();

        return view('vistadatoslink')->with(compact('traductorjson')); //
    }

    public function AccesoDatosVistaHoliss(){
        $pro = Product::all();
        return view('vistadatosholisss')->with(compact('pro')); //
        //return view('vistadatos');
    }

    public function AccesoDatosVistaHolisss(){

    $enlace = Http::get('https://holisss.mundoiti.com/');
        $traductorjson = $enlace->json();

        return view('vistadatosholisss')->with(compact('traductorjson')); //
    }

    //Datos con URL propia
    public function AccesoDatosVistaLinkPropio(){
    $enlace = Http::get('https://mroastedcoffee.github.io/lara23/cafe_menu.json');
        $data = $enlace->json() ?? [];
        $traductorjson = $data['menu'] ?? [];

        return view('vistadatoslinkpropio')->with(compact('traductorjson')); //
    }

    public function detalle($id){

        $enlace = Http::get('https://mroastedcoffee.github.io/lara23/cafe_menu.json');
        $data = $enlace->json() ?? [];
        $menu = $data['menu'] ?? [];
        $traductorjson = collect($menu)->firstWhere('id', (int) $id);

        if (! $traductorjson) {
            abort(404, 'Producto no encontrado');
        }

        return view('vistadetalles')->with(compact('traductorjson')); //
    }
}
