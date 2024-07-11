<div class="container recipe pt-1 border-top border-2">
    <div class="row">
        <div class="col-xl-9">
            <div class="title2 mb-5 mt-5">
                <a class="p-0" href="{{ route('recipes') }}">CÁC CÔNG THỨC NẤU ĂN</a>
            </div>
            <div class="container owl-carousel owl-theme p-0">
                @foreach ($recipes as $recipe)
                    <a href="{{ route('recipes.detail', $recipe['id']) }}">
                        <div class="item" role="button">
                            <div class="card rounded-0 border-0">
                                <img class="rounded-3" src="upload/{{ $recipe['image'] }}" alt="" style="height: 220px">
                                <div class="card-body content">
                                    {{ $recipe['title'] }}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="col-xl-3 ps-1">
            <div class="title2 mb-4 mt-5">
                <a class="p-0" href="{{ route('tips') }}">MẸO VẶT</a>
            </div>
            <div class="list pt-3">
                @foreach ($tips as $tip)
                    <a href="{{ route('tips.detail', $tip['id']) }}">
                        <div class="headline text-dark">
                            {{ $tip['title'] }}
                        </div>
                        <hr>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

</div>
