@extends('layouts.manager')
@section('content')
{{-- <h5 style="font-weight: bold">Thêm Danh Mục Sản Phẩm</h5> --}}
<div class="container mt-0">
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="/css/body_share.css">
    <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row pt-4">
                <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mx-auto row bg-main">
                    <div class="py-4">
                        <div class="row d-flex justify-content-center pt-4">
                            <div class="p-3 col-xl-7 col-lg-7 col-md-12">
                                <!-- name of repice -->
                                <div class="form-group mb-3">
                                    <label for="title"> <strong>Tiêu đề</strong> </label>
                                    <input type="text" id="title" name="txtTitle" class="form-control rounded-0">
                                </div>
                                @error('txtTitle')
                                    <div class="text-danger fs-15 fw-bold">{{ $message }}</div>
                                @enderror
                            
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center pt-4">
                            <button class="btn-submit p-2 mb-3 col-xl-2  ">
                       <strong>Thêm</strong>
                            </button>
                        </div>
                    </div>
                </div>
              </div>
              </div>
    </form>
@endsection