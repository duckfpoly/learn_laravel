<?php

namespace App\Http\Controllers\categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\categories\DestroyCategories;
use App\Http\Requests\categories\StoreCategories;
use App\Http\Requests\categories\UpdateCategories;
use App\Models\categories;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;

class CategoriesController extends Controller {
    private Builder $model;
    public function __construct(){
        $this->model = (new categories())->query();
        $route_name  = Route::currentRouteName();
        $arr         = explode('.', $route_name);
        $str         = array_map('ucfirst', $arr);
        $title       = implode('  /  ', $str);
        View::share('title', $title);
    }
    public function index(){
        return view('categories.index');
    }
    public function api(){
        return Datatables::of($this->model->get())
            ->addColumn('edit', function ($object) {
                return route('categories.edit', $object);
            })
            ->addColumn('destroy', function ($object) {
                return route('categories.destroy', $object);
            })
            ->make(true);
    }
    public function apiName(Request $request){
        return $this->model
            ->where('name_category', 'like', value: '%'.$request->get('q').'%')
            ->get([
                'id',
                    'name_category',
                ]);
    }
//    public function index(Request $request){
//        $search = $request->get('s');
//        $data = $this->model
//            ->where('name_category', 'like', value: '%'.$search.'%')
//            ->paginate(5)
//            ->appends(['s' => $search]);
////        $categories = $this->model->all();
//        return view('categories.index',[
//            'data' => $data,
//            'search' => $search,
//        ]);
//    }
    public function create(){
        return view('categories.create');
    }
    public function store(StoreCategories $request){
        $this->model->create($request->validated());
        return redirect()->route('categories.index');
    }
    public function show(categories $category){
        return view('categories.detail',['category' => $category]);
    }
    public function edit(categories $category){
        return view('categories.edit',['category' => $category,]);
    }
    public function update(UpdateCategories $request, $categoryId){
//        $this->model
//            ->where('id', $categoryId)
//            ->update($request->validated());
//
//        $this->model
//            ->update($request->validated());

        $object = $this->model->find($categoryId);
        $object
            ->fill($request->validated())
            ->save();
        return redirect()->route('categories.index');
    }
    public function destroy(DestroyCategories $request, $categoryId){
        $this->model->find($categoryId)->delete();
//        $this->model->where('id',$categoryId)->delete();
//        return redirect()->route('categories.index');
        $arr = [
            'status'    => true,
            'message'   => 'Delete Successfully !',
        ];
        return response()->json($arr, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);

//        return response($arr,200);
    }
}
