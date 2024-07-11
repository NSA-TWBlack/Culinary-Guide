@if (sizeof($news) == 4)
    )
    <div class="container">
        <div class="title2 mt-5">
            <a class="p-0" href="{{ route('news') }}">TIN TỨC ẨM THỰC</a>
        </div>
    </div>
    <div class="container news pt-5">
        <div class="bg0 mb-5">
            <div class="row m-rl--1">
                <div class="col-md-6 p-rl-1 p-b-2">
                    <div class="bg-img1 size-a-3 how1 pos-relative"
                        style="background-image: url(/upload/{{ $news[0]['image'] }});">
                        <a href="{{ route('news.detail', $news[0]['id']) }}" class="dis-block how1-child1 trans-03"></a>

                        <div class="flex-col-e-s s-full p-rl-25 p-tb-20">

                            <h3 class="how1-child2 m-t-14 m-b-10">
                                <a href="{{ route('news.detail', $news[0]['id']) }}"
                                    class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                    {{ $news[0]['title'] }}
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 p-rl-1">
                    <div class="row m-rl--1">
                        <div class="col-12 p-rl-1 p-b-2">
                            <div class="bg-img1 size-a-4 how1 pos-relative"
                                style="background-image: url(/upload/{{ $news[1]['image'] }});">
                                <a href="{{ route('news.detail', $news[1]['id']) }}"
                                    class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-24">

                                    <h3 class="how1-child2 m-t-14">
                                        <a href="{{ route('news.detail', $news[1]['id']) }}"
                                            class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
                                            {{ $news[1]['title'] }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-rl-1 p-b-2">
                            <div class="bg-img1 size-a-5 how1 pos-relative"
                                style="background-image: url(/upload/{{ $news[2]['image'] }});">
                                <a href="{{ route('news.detail', $news[2]['id']) }}"
                                    class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                    <h3 class="how1-child2 m-t-14">
                                        <a href="{{ route('news.detail', $news[2]['id']) }}"
                                            class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                            {{ $news[2]['title'] }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-rl-1 p-b-2">
                            <div class="bg-img1 size-a-5 how1 pos-relative"
                                style="background-image: url(/upload/{{ $news[3]['image'] }});">
                                <a href="{{ route('news.detail', $news[3]['id']) }}"
                                    class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">

                                    <h3 class="how1-child2 m-t-14">
                                        <a href="{{ route('news.detail', $news[3]['id']) }}"
                                            class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                            {{ $news[3]['title'] }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
