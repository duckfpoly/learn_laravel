<?php

namespace App\Http\Controllers;
use App\Http\Requests\categories\DestroyCategoriesRequest;
use App\Http\Requests\categories\StoreCategoriesRequest;
use App\Http\Requests\categories\UpdateCategoriesRequest;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\CategoriesCollection;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $arr = [
            'status'    =>  true,
            'message'   =>  "List Categories",
            'data'      =>  new CategoriesCollection(Categories::paginate(2))
        ];
        return response()->json($arr, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
    public function store(StoreCategoriesRequest $request)
    {
        $categories = Categories::create($request->validated());
        $arr = [
            'status'   => true,
            'message'  => "Create Successfully !",
            'data'     => new CategoriesResource($categories)
        ];
        return response()->json($arr, 201);
    }
    public function show($category)
    {
        $categories = Categories::find($category);
        if (is_null($categories)) {
            $arr = [
                'status'    => false,
                'message'   => 'No category !',
                'data'      => []
            ];
            return response()->json($arr, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
        }
        $arr = [
            'status'    =>  true,
            'message'   =>  "Detail Category",
            'data'      =>  new CategoriesResource($categories)
        ];
        return response()->json($arr, 201, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
    public function update(Request $request, $id)
    {
        $categories = Categories::find($id);

        if (is_null($categories)) {
            $arr = [
                'status'    => false,
                'message'   => 'No category !',
                'data'      => []
            ];
            return response()->json($arr, 200, ['Content-type'=> 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'name_category' => 'required'
        ]);

        if($validator->fails()){
            $arr = [
                'status'    => false,
                'message'   => 'Error Check Data !',
                'data'      => $validator->errors()
            ];
            return response()->json($arr, 200);
        }

        $categories->update($input);

        $arr = [
            'status'    => true,
            'message'   => 'Update Successfully !',
            'data'      => new CategoriesResource($categories)
        ];
        
        return response()->json($arr, 200);
    }
    public function destroy(DestroyCategoriesRequest $request, $category)
    {
        $categories = Categories::find($category);
        if (is_null($categories)) {
            $arr = [
                'success' => false,
                'message' => 'No category !',
                'dara' => []
            ];
            return response()->json($arr, 200);
        }
        Categories::destroy($category);
        $arr = [
            'status' => true,
            'message' =>'Delete Successfully !',
            'data' => [],
        ];
        return response()->json($arr, 200);
    }
}
