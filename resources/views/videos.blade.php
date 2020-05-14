@extends('layouts.app')
<!-- yield -->
@section('hero')
<!-- Hero -->
@include('components.hero')
<!-- /Hero -->
@endsection

@section('content')


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-164379399-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-164379399-1');
</script>


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
        {{-- <iframe id="YT" style="width: inherit; height: 56vw;" src="https://www.youtube.com/embed/ZSOnM7Yn2j8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
        <div id="tablewrapper">
            <div id="header" >影片列表</div>
            <div id="tablescroll">
                <table class="table table-hover bg-dark text-white posotion:relative">
                    <tbody>
                        <tr>
                            <th scope="row"><a href="javascript:changeVideosource('20200511')">創新設計思考</a></th>
                        </tr>
                        <tr>
                            <th scope="row"><a href="javascript:changeVideosource('20200512')">產品企劃實務</a></th>
                        </tr>
                        <tr>
                            <th scope="row"><a href="javascript:changeVideosource('20200513')">市場行銷策略</a></th>
                        </tr>
                        <tr>
                            <th scope="row"><a href="javascript:changeVideosource('20200514')">Pages 基礎入門</a></th>
                        </tr>
                        <tr>
                            <th scope="row"><a href="javascript:changeVideosource('20200515')">iMovie 基礎入門</a></th>
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