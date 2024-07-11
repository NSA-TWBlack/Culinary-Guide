@extends('layouts.guest')
@section('title')
    <title>Góp ý</title>
@endsection

<style>
    .title {
        font-family: 'Itim', cursive;
    }
</style>

<script>
    if ({{ $temp }} == true) alert('Gửi góp ý thành công');
</script>

@section('content')
    <form action="{{ route('user.feedback.store') }}" method="post">
        @csrf
        <div style="background-color: rgb(142, 240, 240)">
            <div class="title pt-5 fs-40 text-center">GÓP Ý</div>
            <div class="container pb-5 pt-3">
                <div class="row">
                    <div class="col-xl-12">
                        <textarea class="w-100 form-control fs-20" rows="10" name="txtFeedback"
                            placeholder="Viết ý kiến bạn muốn đóng góp ..."></textarea>
                    </div>
                </div>
                <div class="text-center pt-5">
                    <button class="btn btn-success fs-20 px-4 py-2">Gửi góp ý</button>
                </div>
            </div>
        </div>
    </form>
@endsection
