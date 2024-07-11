@extends('layouts.manager')
@section('title')
    <title>Thêm công thức</title>
@endsection
<!-- active nav-link -->
<style>
    li a.app-menu__item[href="{{ route('admin.recipes.index') }}"] {
        background-color: #000;
    }
</style>
@section('content')
    <link rel="stylesheet" href="/css/body_share.css">
    <form action="{{ route('admin.recipes.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 mx-auto row bg-main">
                    <div class="py-4">
                        <div class="row">
                            <div class="p-3 col-xl-7 col-lg-7 col-md-12">
                                <!-- name of repice -->
                                <div class="form-group mb-3">
                                    <label for="title">Tiêu đề</label>
                                    <input placeholder="Tên công thức ..." type="text" id="title" name="txtTitle"
                                        class="form-control rounded-0">
                                </div>
                                @error('txtTitle')
                                    <div class="text-danger fs-15 fw-bold">{{ $message }}</div>
                                @enderror
                                <!-- categories -->
                                <div class="form-group mb-3">
                                    <label for="categories">Danh mục</label>
                                    <select name="txtCategories" id="categories" class="form-select rounded-0">
                                        <option selected value=""></option>
                                        @foreach ($categories as $value)
                                            <option value="{{ $value['id'] }}">{{ $value['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('txtCategories')
                                    <div class="text-danger fs-15 fw-bold">{{ $message }}</div>
                                @enderror
                                <!-- description -->
                                <div class="form-group mb-3">
                                    <label for="description">Mô tả (Nếu có)</label>
                                    <textarea placeholder="Mô tả về công thức ..." name="txtDescription" id="description" class="form-control rounded-0"></textarea>
                                </div>
                                <!-- ingredients -->
                                <div class="form-group mb-3">
                                    <label for="ingredients">Thành phần</label>
                                    <input placeholder="Tên:Số lượng;Tên:Số lượng" type="text" id="ingredients"
                                        name="txtIngredients" class="form-control rounded-0">
                                </div>
                                @error('txtIngredients')
                                    <div class="text-danger fs-15 fw-bold">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- image -->
                            <div class="p-3 col-xl-5 col-lg-5 col-md-12 pt-5">
                                <img id="image" src="" alt="" height="230" class="w-100 rounded-3"
                                    style="max-width: 360px">
                                <input type="file" name="imageUpload" id="imageUpload" class="dis-none" accept="image/*"
                                    onchange="handleChange()">
                                <div class="form-group pt-4">
                                    <div class="button w-100 p-2 text-center"
                                        onclick="document.getElementById('imageUpload').click()">
                                        CHỌN ẢNH
                                    </div>
                                </div>
                                @error('imageUpload')
                                    <div class="text-danger fs-15 fw-bold">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- steps -->
                            <div class="form-group mb-3">
                                <label for="steps">Các bước thực hiện</label>
                                <textarea placeholder="Bước 1: ...
Bước 2: ..." name="txtSteps" id="steps" class="form-control rounded-0"
                                    rows="5"></textarea>
                            </div>
                            @error('txtSteps')
                                <div class="text-danger fs-15 fw-bold">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- btn submit -->
                        <div class="row d-flex justify-content-center pt-4">
                            <button class="button btn-submit p-2">
                                THÊM
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <script>
        const handleChange = () => {
            const fileUploader = document.querySelector('#imageUpload');
            const getFile = fileUploader.files;
            if (getFile.length !== 0) {
                const uploadedFile = getFile[0];
                readFile(uploadedFile);
            }
        }

        const readFile = (uploadedFile) => {
            if (uploadedFile) {
                const reader = new FileReader();
                reader.onload = () => {
                    $('#image').attr('src', reader.result);
                };

                reader.readAsDataURL(uploadedFile);
            }
        };
    </script>
@endsection
