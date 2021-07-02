 <!-- Stored in resources/views/child.blade.php -->

 @extends('layouts.admin')
 <title>Trang chủ</title>
 @section('title')
 
 @endsection
 
 @section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Menus','key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
             <form action="{{route('menus.update',['id'=>$menuFollowIdEditor->id])}}" method="post">
               @csrf
                 <div class="form-group">
                   <label >Tên Menu</label>
                   <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục" value="{!!$menuFollowIdEditor->name!!}">
                   
                 </div>
                 <div class="form-group">
                     <label >Chọn menu cha</label>
                     <select class="form-control" name="parent_id">
                       <option value="0">Chọn menu cha</option>
                       {!!$optionSelect!!}
                     </select>
                   </div>
                 <button type="submit" class="btn btn-primary">Submit</button>
               </form>
            
            </div>
             <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <!-- /.content -->
  </div>

   <!-- /.content-wrapper -->
 @endsection
 
 
  <!-- Content Wrapper. Contains page content -->
  