<?php

namespace App\Http\Controllers;

use App\Http\Requests\products\DestroyProduct;
use App\Http\Requests\products\StoreProduct;
use App\Http\Requests\products\UpdateProduct;
use App\Models\categories;
use App\Models\Products;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private Builder $model;
    public function __construct()
    {
        $this->model = (new Products())->query();
        $this->cate = (new categories())->query();
        $route_name = Route::currentRouteName();
        $arr        = explode('.', $route_name);
        $str        = array_map('ucfirst', $arr);
        $title      = implode('  /  ', $str);
        View::share('title', $title);
    }
    public function index(Request $request)
    {
        $search = $request->get('s');
        $data = $this->model
            ->where('name_product', 'like', value: '%'.$search.'%')
            ->paginate(5)
            ->appends(['s' => $search]);
//        $cate = $this->cate->find($data->id_category);
//        $data->name_category = $cate->name_category;
        return view('products.index',[
            'data' => $data,
            'search' => $search,
        ]);
    }
    public function create(){
        $cate = $this->cate->get();
        return view('products.create',[
            'categories' => $cate,
        ]);
    }

    public function store(StoreProduct $request){
        dd($request);
        $this->model->create($request->validated());
        return redirect()->route('products.index');
    }

    public function show(Products $product)
    {
        $cate = $this->cate->find($product->id_category);
        $product->name_category = $cate->name_category;
        return view('categories.detail',[
            'category' => $product,
        ]);
    }

    public function edit(Products $product)
    {
        $cate = $this->cate->get();
//        $cate = $this->cate->find($product->id_category);
//        $product->name_category = $cate->name_category;
        return view('products.edit',[
            'category' => $product,
            'categories' => $cate,
        ]);
    }

    public function update(UpdateProduct $request, $productId)
    {
        $object = $this->model->find($productId);
        $object
            ->fill($request->validated())
            ->save();
        return redirect()->route('products.index');
    }

    public function destroy(DestroyProduct $request, Products $products)
    {
        //
    }
}
