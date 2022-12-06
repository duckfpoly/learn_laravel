<?php

namespace App\Http\Controllers;

use App\Enums\ProductsStatusEnum;
use App\Http\Requests\products\DestroyProduct;
use App\Http\Requests\products\StoreProduct;
use App\Http\Requests\products\UpdateProduct;
use App\Models\categories;
use App\Models\Products;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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
        $arrStudentStatus = ProductsStatusEnum::getStatusProduct();
        View::share('title', $title);
        View::share('arrStudentStatus', $arrStudentStatus);
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
        $path = Storage::disk('public')->putFile('products',$request->file('image_product'));
        $arr = $request->validated();
        $arr['image_product'] = $path;
        $this->model->create($arr);
        return redirect()->route('products.index')->with('success','Create Successfully !');
    }

    public function show(Products $product)
    {
        dd($product);
//        $cate = $this->cate->find($product->id_category);
//        $product->name_category = $cate->name_category;
//        return view('products.detail',[
//            'category' => $product,
//        ]);
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
        return redirect()->route('products.index')->with('success','Update Successfully !');
    }

    public function destroy(DestroyProduct $request, $productId)
    {
        $this->model->find($productId)->delete();
//        $this->model->where('id',$categoryId)->delete();
        return redirect()->route('products.index')->with('success','Delete Successfully !');
    }
}
