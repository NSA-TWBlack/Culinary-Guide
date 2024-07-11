@extends('layouts.manager')
@section('title')
    <title>Thêm Danh Mục</title>
@endsection

@section('content')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="/css/body_share.css">
    <form action="{{ route('admin.categories_properties.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row ">
                <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mx-auto row bg-main">
                    <div class="py-4">
                        <div class="row d-flex justify-content-center pt-4">
                            <div class="p-3 col-xl-7 col-lg-7 col-md-12">
                                <!-- name of repice -->
                                <div class="form-group mb-3">
                                    <label for="title"><strong>Tiêu đề</strong></label>
                                    <input type="text" id="title" name="txtTitle" class="form-control rounded-0">
                                </div>
                                @error('txtTitle')
                                    <div class="text-danger fs-15 fw-bold">{{ $message }}</div>
                                @enderror
                                <!-- categories -->
                                <div class="form-group mb-3">
                                    <label for="categories"><strong>Danh mục</strong></label>
                                    <select name="txtCategories" id="categories" class="form-select rounded-0">
                                        <option selected value=""></option>
                                        @foreach ($categories_properties as $value)
                                            <option value="{{ $value['id'] }}">{{ $value['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('txtCategories')
                                    <div class="text-danger fs-15 fw-bold">{{ $message }}</div>
                                @enderror


                            </div>


                        </div>
                        <div class="row d-flex justify-content-center pt-4">
                            <button class="btn-submit p-2 mb-3 col-xl-2">
                                <strong>Thêm</strong>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
