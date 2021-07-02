<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menuRecusive;//Khởi tạo
    private $menu;//Khởi tạo
    public function __construct(MenuRecusive $menuRecusive, Menu $menu){//Khởi tạo
        $this->menuRecusive = $menuRecusive;//Khởi tạo
        $this->menu = $menu;//Khởi tạo
    }
    public function index(){
        $menus = $this->menu->paginate(10);//Phân trang
        return view('admin.menus.index',compact('menus'));
    }
    public function create(){
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();//Lấy ra những tag option của thg menu
        return view('admin.menus.add',compact('optionSelect'));//gán 'name' vào trong tag select
    }
    public function store(Request $request){
        //Lấy những thứ người dùng nhập vào và lưu trên db
        $this->menu->create([
            'name' => $request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>str_slug($request->name),
        ]);
        return redirect()->route('menus.index');//khi submit thì trở lại trang index
    }
    public function edit($id,Request $request){
        $menuFollowIdEditor = $this->menu->find($id);//Lấy ra thg có id = id ;
        $optionSelect = $this->menuRecusive->menuRecusiveEdit($menuFollowIdEditor->parent_id);//Lấy 'name' cuat thg menu
        return view('admin.menus.edit',compact('optionSelect','menuFollowIdEditor'));//truyền biến optionSelect cho thg menus.edit và hiển thị ra html
    }
    public function update($id,Request $request){
        $menu = $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>str_slug($request->name),
        ]);
        return redirect()->route('menus.index');
    }
    public function delete($id){
        $menu = $this->menu->find($id)->delete();
        return redirect()->route('menus.index');
    }
}
