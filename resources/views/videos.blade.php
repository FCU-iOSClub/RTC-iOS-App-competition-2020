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
        var tag = document.getElementById('YT');
        tag.src = "https://www.youtube.com/embed/" + videoname;
    }
</script>
<section class="videos">
    <div class="container-fluid">
        <h2 class="text-center display-4">影音專區</h2>
        <div id="videoview">
            <iframe id="YT" style="width: inherit; height: 56vw;" src="https://www.youtube.com/embed/ZSOnM7Yn2j8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div id="tablewrapper">
            <div class="accordion" id="accordionExample">
                <div class="card">
                  <div style="background-color: #777;" class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        線上說明會影片
                      </button>
                    </h5>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      <div id="listcontent" >
                          <a href="javascript:changeVideosource('ZSOnM7Yn2j8')" >5/8說明會</a>
                      </div>
                      <div id="listlastcontent" >
                        <a href="javascript:changeVideosource('R7a8Ltniej4')" >5/13說明會</a>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                    <div style="background-color: #777;" class="card-header" id="headingOne">
                      <a class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                          線上課程影片
                        </button>
                      </a>
                    </div>
                
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body" >
                        <div id="listcontent" >
                            <a href="javascript:changeVideosource('yB1hAR7T-sw')" >創新設計思考</a>
                        </div>
                        <div  id="listcontent" >
                          <a href="javascript:changeVideosource('F6SLju7-PR0')" >產品企劃實務</a>
                        </div>
                        <div id="listcontent" >
                            <a href="javascript:changeVideosource('TC3Yze2546c')" >市場行銷策略</a>
                        </div>
                        <div id="listcontent">
                            <a href="javascript:changeVideosource('kiC_xGMuGnE')" >Pages 基礎入門</a>
                        </div>
                        <div id="listlastcontent" >
                            <a href="javascript:changeVideosource('FVXYfH_GNm4')" >iMovie 基礎入門</a>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
@include('components.sponsors')
@include('components.footer') 
@endsection