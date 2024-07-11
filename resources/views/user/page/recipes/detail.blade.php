@extends('layouts.guest')

@section('title')
    <title>Công thức nấu ăn</title>
@endsection

<!-- active nav-link -->
<style>
    a.nav-link[href="{{ route('recipes') }}"] {
        font-size: 18px;
        font-weight: 500;
        color: rgb(249, 233, 5);
    }
</style>

<link rel="stylesheet" href="/css/main-detail.css">
@section('content')
    <div class="container">
        <div class="row col-xl-10 col-lg-12 col-md-12 col-sm-12 mx-auto">
            <div class="main-content p-3 col-xl-9 col-lg-8 col-md-12 pt-4">
                <!-- image -->
                <div class="main-image rounded-3 overflow-hidden">
                    <img src="/upload/{{ $recipe['image'] }}" alt="">
                </div>
                <div class="detail-content p-2">
                    <div class="d-flex justify-content-between">
                        <!-- title -->
                        <div class="title pt-2 fs-23 text-dark fw-bold">
                            {{ $recipe['title'] }}
                        </div>
                        <!-- view and like -->
                        <form action="{{ route('recipes.like', $recipe['id']) }}" method="post">
                            @csrf
                            <div class="pt-3 text-dark fw-bold">
                                <i class="far fa-eye pe-1"></i>{{ $recipe['view'] }}

                                <?php $like = false; ?>
                                @foreach ($favorites as $favo)
                                    @if ($favo['id_recipes'] == $recipe['id'])
                                        <?php $like = true; ?>
                                    @endif
                                @endforeach

                                @if ($like == true)
                                    <i class="fas fa-heart pe-1 ps-4" onclick="document.getElementById('btn-like').click()"
                                        style="cursor: pointer"></i>
                                    <input type="number" value=-1 name="likeCheck" class="dis-none">
                                @else
                                    <i class="far fa-heart pe-1 ps-4" onclick="document.getElementById('btn-like').click()"
                                        style="cursor: pointer"></i>
                                    <input type="number" value=1 name="likeCheck" class="dis-none">
                                @endif
                                {{ $recipe['like'] }}
                                <button class="dis-none" id="btn-like"></button>
                            </div>
                        </form>
                    </div>
                    <!-- created at -->
                    <div class="created_at">
                        Ngày đăng: {{ $recipe['created_at']->format('d/m/Y') }}
                    </div>
                    <!-- description -->
                    @if (Str::length($recipe['description']) == 0)
                        <div class="description text-format pt-4 text-dark">
                            < Không có mô tả>
                        </div>
                    @else
                        <div class="description text-format pt-4 text-dark">{{ $recipe['description'] }}</div>
                    @endif
                    <!-- ingredients -->
                    <div class="ingredients pt-4">
                        <div class="text-dark fs-20 fw-bold pb-2">Thành phần</div>
                        <?php
                        $ingredients = explode(';', $recipe['ingredients']);
                        ?>

                        @foreach ($ingredients as $item)
                            <?php $ingredient = explode(':', $item); ?>
                            <div class="text-dark d-flex justify-content-between">
                                <div class="name">
                                    {{ $ingredient[0] }}
                                </div>
                                <div class="quantity">
                                    {{ $ingredient[1] }}
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <!-- steps -->
                    <div class="steps pt-3">
                        <div class="text-dark fs-20 fw-bold pb-2">Các bước thực hiện</div>
                        <div class="text-format text-dark fs-16">{{ $recipe['steps'] }}</div>
                    </div>
                    <!-- comments -->
                    <div class="comments pt-5">
                        <div class="text-dark fs-20 fw-bold pb-2">Bình luận</div>
                        <!-- list comments -->
                        @foreach ($comments as $comment)
                            <div class="item-comment p-2 border rounded-3 my-2">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <div class="username fs-16 text-dark fw-bold">
                                            <i class="fas fa-user-circle"></i>
                                            {{ $comment['name'] }}
                                        </div>
                                        <div class="created_at fs-12">
                                            <i class="far fa-calendar-alt pe-1 fs-12"></i>
                                            {{ $comment['created_at']->format('d/m/Y') }}
                                        </div>
                                    </div>
                                    <?php $id_user = Auth::user()->id ?? -1; ?>
                                    @if ($id_user == $comment['id_user'])
                                        <div>
                                            <a href="{{ route('user.comments.destroy', [$comment['id'], $recipe['id'], $comment['id_user']]) }}"
                                                class="m-0 px-2 rounded-3 border border-2 fw-bold">Thu hồi</a>
                                        </div>
                                    @endif
                                </div>
                                <div class="comment-text text-format text-dark pt-1 fs-15">
                                    <div>{{ $comment['content'] }}</div>
                                </div>
                            </div>
                        @endforeach
                        <!-- write comment -->
                        <form action="{{ route('user.comments', $recipe['id']) }}" method="post">
                            @csrf
                            <div class="item-comment p-2 border rounded-3 my-2">
                                <textarea placeholder="Viết bình luận của bạn ..." name="txtContent" id="" class="border-0 w-100"></textarea>
                                <div class="pt-2">
                                    <button class="btn btn-success">
                                        Gửi
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="sub-content p-3 col-xl-3 col-lg-4 col-md-12">
                <div class="title fs-25 text-dark fw-bold pb-2">Công thức tương tự</div>
                @if (sizeof($recipesSimilar) == 0)
                    <div>Không có Công thức tương tự</div>
                @else
                    @foreach ($recipesSimilar as $item)
                        <a class="item" href="{{ route('recipes.detail', $item['id']) }}">
                            <div class="sub-img rounded-2 overflow-hidden">
                                <img src="/upload/{{ $item['image'] }}" alt="">
                            </div>
                            <div class="title text-dark fs-16 pt-1 fw-bold">
                                {{ $item['title'] }}
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
