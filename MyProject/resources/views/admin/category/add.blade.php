 <!-- Stored in resources/views/child.blade.php -->

 @extends('layouts.admin')
 <title>Trang chủ</title>
 @section('title')
 
 @endsection
 
 @section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Category','key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
             <form action="{{route('categories.store')}}" method="post">
               @csrf
                 <div class="form-group">
                   <label >Tên danh mục</label>
                   <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục">
                   <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                 </div>
                 <div class="form-group">
                     <label >Chọn danh mục cha</label>
                     <select class="form-control" name="parent_id">
                       <option value="0">Chọn danh mục cha</option>
                       {!!$htmlOption!!}
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
  