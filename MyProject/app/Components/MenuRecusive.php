<?php
namespace App\Components;
use App\Menu;

class MenuRecusive{
    private $html;//Khởi tạo
    public function __construct(){//khởi tạo
        $this->html ="";//Khởi tạo
    }
    public function menuRecusiveAdd($parent_id = 0,$subMark = ''){//Ban đầu parent_id =0
        $data = Menu::where('parent_id',$parent_id)->get();//Lấy những dữ liệu có parent_id = 0
        foreach($data as $dataItem){//loop
            //Nối chuỗi html . có value là item.id và name là name của item
            //VD:loop 1:$dataItem->id = 1,$dataItem->name = menu1
            //Đệ quy:Parent_id = $dataItem->id = 1
            //$dataItem->id = 4,$dataItem->name = menu1.1
            $this->html .= '<option value = "'.$dataItem->id.'">' .$subMark. $dataItem->name . '</option>';
            $this->menuRecusiveAdd($dataItem->id,$subMark . "--");
        }
        return $this->html;//htm giờ đây là những tag option
    }
    public function menuRecusiveEdit($parent_idMenuEdit,$parent_id = 0,$subMark = ''){//Ban đầu parent_id =0
        $data = Menu::where('parent_id',$parent_id)->get();//Lấy những dữ liệu có parent_id = 0

        foreach($data as $dataItem){//loop
            if($parent_idMenuEdit == $dataItem->id){//nếu thg parent_id của thg edit mà = id của thg item thì ta selected nó để người dùng đỡ phải tìm kiếm
                $this->html .= '<option selected value = "'.$dataItem->id.'">' .$subMark. $dataItem->name . '</option>';
            }else{
                $this->html .= '<option value = "'.$dataItem->id.'">' .$subMark. $dataItem->name . '</option>';
            }
            
            $this->menuRecusiveEdit($parent_idMenuEdit,$dataItem->id,$subMark . "--");
        }
        return $this->html;//htm giờ đây là những tag option
    }
}
// B1: lấy tất cả item menu có parent_id =0
//foreach xuất item->name ra html
//đề quy mới parent_id giờ đây là item->id