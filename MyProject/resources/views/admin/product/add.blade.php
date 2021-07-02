 <!-- Stored in resources/views/child.blade.php -->

 @extends('layouts.admin')
 
 @section('title')
 <title>Add product</title>
 @endsection
 
 @section('css')
 <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
 <link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
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
            <div class="col-md-12">
             <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
               @csrf
                 <div class="form-group">
                   <label >Tên Sản phẩm</label>
                   <input type="text" name="name" class="form-control"   placeholder="Nhập tên sản phẩm">
                 </div>

                 <div class="form-group">
                  <label >Giá Sản phẩm</label>
                  <input type="text" name="price" class="form-control"   placeholder="Nhập giá sản phẩm">
                </div>

                <div class="form-group">
                  <label >Ảnh sản phẩm</label>
                  <input style="padding-bottom:37px" type="file" name="feature_image_path" class="form-control-file"  >
                </div>

                <div class="form-group">
                  <label >Ảnh chi tiết</label>
                  <input style="padding-bottom:37px" type="file" multiple name="image_path[]" class="form-control-file"  >
                </div>

                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Mô tả</label>
                  <textarea  class="form-control tinymce_editor_init" style="height:700px" id="mytextarea" rows="3"></textarea>
                </div>

                 <div class="form-group">
                     <label >Chọn danh mục cha</label>
                     <select  class="form-control select2_init" name="parent_id">
                       <option  value="">Chọn danh mục</option>
                       {!!$htmlOption!!}
                     </select>
                  </div>
                  <div class="form-group">
                    <label >Nhập tag</label>
                    <select name = 'tags[]' class="form-control tags_select_choose" multiple="multiple">
                      
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
 @section('js')
 <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 <script src="{{asset('admins/product/add/add.js')}}"></script>
 
 @endsection
 
  <!-- Content Wrapper. Contains page content -->
  