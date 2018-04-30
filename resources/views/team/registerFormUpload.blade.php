@extends('layouts.app') @section('content')
<section class="pt-3">
    <div class="container">
        @if ($errors->any())
        <div class="row justify-content-center py-2">
            <div class="col-6 text-center text-danger h3 alert alert-danger">{{$errors->first()}}</div>
        </div>
        @endif
        <form method="post">
            @csrf
            <teamedit title="{{\App\TeamMember::levelText($level)}}"></teamedit>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">送出</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection