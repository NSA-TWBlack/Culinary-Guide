<link rel="stylesheet" href="/css/body_recipe.css">

<div class="container-fluid" style="background: #39404A">
    <div class="container pt-4 pb-4 text-center searchBox">
        <div class="title pb-3 fs-30">-- CÔNG THỨC NẤU ĂN --</div>
        <div class="row form pt-2 pb-2">
            <div class="col-10"><input class="px-3 border-0" type="text" placeholder="tìm kiếm"></div>
            <div class="icon col-2 d-flex justify-content-center align-items-center"><i class="fa fa-search fs-20"></i>
            </div>
        </div>
    </div>
</div>

<div class="container pt-5">
    <div class="card-content d-flex flex-wrap justify-content-center">

        <div class="card shadow rounded-1 overflow-hidden mx-4 mb-5 p-4 bg-light">
            <div class="card-image rounded-2 overflow-hidden">
                <img class="mw-100"
                    src="https://th.bing.com/th/id/OIP.iHuqrCsaKmYyDuqu4A2X8QHaEK?w=279&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7"
                    alt="">
            </div>
            <div class="card-info text-center bg-light">
                <p class="mt-3 text-dark fs-18 fw-bold">Sườn bì chả</p>
                <p class="fs-14 border-bottom border-dark">sườn cốt lết, gạo tấm, bì heo, trứng gà, thịt nạc heo xay, miến</p>
                <div class="d-flex justify-content-between">
                    <p>
                        <i class="bi bi-calendar-fill"></i>
                        15/11/2022
                    </p>
                    <p>
                        <i class="bi bi-person-fill"></i>
                        By username
                    </p>
                </div>
            </div>
            <div class="like d-flex justify-content-center pt-1 rounded-circle bg-light right-0"><i
                    class="bi bi-suit-heart"></i></div>
        </div>

        @include('user.page.recipes.body.text_recipe')

        <div class="pagi justify-content-center">
            {{-- <li class="page-item previous-page disable"><a href="#" class="page-link">Prev</a></li>
                <li class="page-item current-page active"><a href="#" class="page-link">1</a></li>
                <li class="page-item dots"><a href="#" class="page-link">...</a></li>
                <li class="page-item current-page"><a href="#" class="page-link">5</a></li>
                <li class="page-item current-page"><a href="#" class="page-link">6</a></li>
                <li class="page-item dots"><a href="#" class="page-link">...</a></li>
                <li class="page-item current-page"><a href="#" class="page-link">10</a></li>
                <li class="page-item next-page"><a href="#" class="page-link">Next</a></li>  --}}
        </div>

    </div>
</div>

<script src="/js/recipe_body.js"></script>
