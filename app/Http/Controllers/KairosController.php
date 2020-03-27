<?php

namespace App\Http\Controllers;

use App\Models\kairos\Products;
use Illuminate\Http\Request;


class KairosController extends Controller
{
    public function index()
    {
        return view('kairos.index');
    }

    public function search(Request $request)
    {
        $products = Products::where('Descripcion','like','%'.$request->product.'%')->get();

        if(empty($products)) {

            $renderedHTML = view('kairos.noMatch')->render();
            \Log::info("NO ENCONTRE NADA");
            return response()->json($renderedHTML,200);
        }

        $renderedHTML = view('kairos.match')->with(['products' => $products])->render();

        return response()->json($renderedHTML,200);
    }
}
