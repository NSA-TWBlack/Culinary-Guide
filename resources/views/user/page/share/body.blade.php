<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<link rel="stylesheet" href="/css/body_share.css">

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto row border-0 bg-main">
            <div class="p-5">
                <div class="row">
                    <div class="title text-white">
                        THÊM BÀI VIẾT
                    </div>
                    <div class="p-3 col-xl-7 col-lg-7 col-md-12">
                        <!-- name of repice -->
                        <div class="form-group mb-3">
                            <label for="title">Tiêu đề</label>
                            <input type="text" id="title" name="title" class="form-control rounded-0">
                        </div>
                        <!-- categories -->
                        <div class="form-group mb-3">
                            <label for="categories">Danh mục</label>
                            <select name="categories" id="categories" class="form-select rounded-0">
                                <option selected value=""></option>
                                <option value="">Gà</option>
                                <option value="">Bò</option>
                            </select>
                        </div>
                        <!-- description -->
                        <div class="form-group mb-3">
                            <label for="description">Mô tả (Nếu có)</label>
                            <textarea name="description" id="description" class="form-control rounded-0"></textarea>
                        </div>
                        <!-- ingredients -->
                        <div class="form-group mb-3">
                            <label for="ingredients">Thành phần</label>
                            <input type="text" id="ingredients" name="ingredients" class="form-control rounded-0">
                        </div>
                    </div>
                    <div class="p-3 col-xl-5 col-lg-5 col-md-12">
                        <img src="" alt="" height="230" class="w-100 rounded-3" style="max-width: 350px">
                        <input type="file" name="fileinput" id="fileinput" class="dis-none">
                        <div class="form-group pt-4">
                            <button class="w-100 p-2" onclick="document.getElementById('fileinput').click()">CHỌN ẢNH</button>
                        </div>
                    </div>
                    <div class="px-3">
                        <form action="view.php" method="post">
                            <label for="">Các bước thực hiện</label>
                            <textarea name="editor" id="editor"></textarea>
                        </form>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#editor'))
                                .then(editor => {
                                    console.log(editor);
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                        </script>
                    </div>
                </div>
                <div class="row d-flex justify-content-center pt-4">
                    <button class="btn-submit p-2">
                        THÊM
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
