<?php

namespace App\Http\Controllers;

use App\Product;
use App\PermisosUser;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();

        $permissions = Permission::get();

        $individual = PermisosUser::where('user_id',auth()->id())->get();

        $roles = auth()->user()->roles;

        $permisos = [];
        $i=0;
        foreach ($permissions as $permission) {
            if (auth()->user()->can($permission->slug)) {
                $permisos[$i] = $permission->slug;
                $i++;
            }
        }
        

        //return view('products.index', compact('products'));
        return [
            'products'      => $products,
            'permissions'   => $permisos,
            'roles'         => $roles,
            'individual'    => $individual,
        ];
        //return $permissions;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return redirect()->route('products.edit',$product->id)
                ->with('info','Producto guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('products.edit',$product->id)
        ->with('info','Producto actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('info','Eliminado correctamente');
    }
}
