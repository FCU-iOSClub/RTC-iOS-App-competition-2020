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

  var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight){
        content.style.maxHeight = null;
        } else {
        content.style.maxHeight = content.scrollHeight + "px";
        } 
    });
    }
</script>


<script>
    function changeVideosource(videoname) {
        var tag = document.getElementById('YT');
        tag.src = "https://www.youtube.com/embed/" + videoname;
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
        <iframe id="YT" style="width: inherit; height: 56vw;" src="https://www.youtube.com/embed/ZSOnM7Yn2j8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <div id="tablewrapper">
            <button class="collapsible">說明會影片</button>
            <div class="content">
                <div>
                    <a href="javascript:changeVideosource('ZSOnM7Yn2j8')" style="">5/8說明會</a>
                </div>
                <div>
                    <a href="javascript:changeVideosource('R7a8Ltniej4')" style="">5/13說明會</a>
                </div>
            </div>
            <button class="collapsible">官方課程影片</button>
            <div class="content">
                <div>
                    <a href="javascript:changeVideosource('yB1hAR7T-sw')" style="">創新設計思考</a>
                </div>
                <div>
                    <a href="javascript:changeVideosource('F6SLju7-PR0')" style="">產品企劃實務</a>
                </div>
                <div>
                    <a href="javascript:changeVideosource('TC3Yze2546c')" style="">市場行銷策略</a>
                </div>
                <div>
                    <a href="javascript:changeVideosource('kiC_xGMuGnE')" style="">Pages 基礎入門</a>
                </div>
                <div>
                    <a href="javascript:changeVideosource('FVXYfH_GNm4')" style="">iMovie 基礎入門</a>
                </div>
            </div>
        </div>
    </div>
</section>
@include('components.sponsors')
@include('components.footer') 
@endsection