@extends('layouts.app')
<!-- yield -->
@section('hero')
<!-- Hero -->
@include('components.hero')
<!-- /Hero -->
@endsection

@section('content')
<script>
    function changeVideosource(videoname) {
        var tag = document.getElementById('videocontent');
        tag.src = "/storage/" + videoname + ".mp4";
    }
</script>
<section class="videos">
    <div class="container-fluid">
        <h2 class="text-center display-4">影音專區</h2>
        <div id="videoview">
            <video id="videocontent" controlsList="nodownload" controls>
                <source src="/storage/20200511.mp4" type="video/mp4">
            </video>
        </div>
        <div id="tablewrapper">
            <div id="header" >影片列表</div>
            <div id="tablescroll">
                <table class="table table-hover bg-dark text-white posotion:relative">
                    <tbody>
                        <tr>
                            <th scope="row"><a href="javascript:changeVideosource('20200511')">創新設計思考</a></th>
                        </tr>
                        <tr>
                            <th scope="row">Comming soon...</th>
                        </tr>
                        <tr>
                            <th scope="row">Comming soon...</th>
                        </tr>
                        <tr>
                            <th scope="row">Comming soon...</th>
                        </tr>
                        <tr>
                            <th scope="row">Comming soon...</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@include('components.sponsors')
@include('components.footer') 
@endsection