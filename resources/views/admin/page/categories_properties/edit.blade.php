@extends('layouts.manager')
@section('title')
    <title>Sửa Danh Mục Con</title>
@endsection

@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<link rel="stylesheet" href="/css/body_share.css">
<form action="{{ route('admin.categories_properties.update', $categories_properties->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
  
        <div class="row pt-4">
            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mx-auto row bg-main">
                <div class="py-4">
                    <div class="row d-flex justify-content-center pt-4">
                        <div class="p-3 col-xl-7 col-lg-7 col-md-12">
                            <!-- name of repice -->
                            <div class="form-group mb-3">
                                <label for="title">Tiêu đề</label>
                                <input type="text" id="title" name="txtTitle" class="form-control rounded-0" value="{{ $categories_properties['title'] }}">
                            </div>
                                     <!-- categories -->
                                     <div class="form-group mb-3">
                                        <label for="categories">Danh mục</label>
                                        <select name="txtCategories" id="id_categories" class="form-select rounded-0">
                                         
                                            @foreach ($categories as $cate)
                                            @if ($categories_properties['id_categories'] == $cate['id'])
                                            <option value="   {{ $cate['id'] }} "  selected> 
                                                {{ $cate['title'] }} 
                                           </option>
                                            @else
                                            <option value="   {{ $cate['id'] }} " > 
                                                {{ $cate['title'] }} 
                                           </option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                   
                        
                        </div>
                 
              
                    </div>
                    <div class="row d-flex justify-content-center pt-4">
                        <button class="btn-submit p-2">
                        Cập Nhật
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection