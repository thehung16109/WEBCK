<?php

namespace App\Http\Controllers;
use App\Components\Recusive;
use Illuminate\Http\Request;
use App\Category;
use Storage;
class AdminProductController extends Controller
{
    private $category;
    public function __construct(Category $category){
        $this->category = $category;
    }
    public function index(){
        return view('admin.product.index');
    }
    public function create(){
        $htmlOption = $this->getCategory($parent_id='');
        return view('admin.product.add',compact('htmlOption'));
    }
    public function getCategory($parent_id){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption=$recusive->categoryRecusive($parent_id);
        return $htmlOption;

    }
    public function store(Request $request){
        $file = $request->feature_image_path;
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
        $filePath = $request->file('feature_image_path')->storeAs('public/product/' .auth()->id(),$fileNameHash);
        $data=[
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath),
        ];
        dd($data);
    }
}
