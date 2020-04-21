<section class="features" id="portal">
    <div class="container-fluid">
        <h2 class="text-center display-4">傳送門</h2>
        <div class="row justify-content-around">
            <div class="feature-col col-12 col-md-4">
                <div class="card card-block text-center" style="cursor: pointer;" onclick="window.location='{{route('team.proposal.uplaod')}}'">
                    <div>
                        <div class="feature-icon">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <div>
                        <h3>企劃書 提交</h3>
                        <p> 企劃書提交將在{{Carbon::parse(Setting::get('proposal_deadline', '2019-6-10'), 'Asia/Taipei')->toDateTimeString()}} 截止，在那之前各參賽隊伍可隨時修改、優化、重新上傳已更新的競賽文件資料。企劃書將以提交截止日前上傳的最後一版為，逾期將不再受理。</p>
                    </div>
                </div>
            </div>
            <div class="feature-col col-12 col-md-4">
                <div class="card card-block text-center" style="cursor: pointer;" onclick="window.location='{{route('team.register.form.uplaod')}}'">
                    <div>
                        <div class="feature-icon">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <div>
                        <h3>決賽隊伍 繳交書面報名表</h3>
                        <p> 凡進入決賽隊伍，{{Carbon::parse(Setting::get('register_form_deadline', '2019-6-30'), 'Asia/Taipei')}} 前須提交參賽隊伍所在學校系所用印後的報名表(請至網頁上6/15比賽流程內下載附件)，文件需整併成一個PDF檔，不限制檔案名稱，任一人未於時間內繳交者，則取消該隊決賽資格。</p>
                    </div>
                </div>
            </div>
            <div class="feature-col col-12 col-md-4">
                <div class="card card-block text-center" style="cursor: pointer;" onclick="window.location='{{route('team.app.uplaod')}}'">
                    <div>
                        <div class="feature-icon">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <div>
                        <h3>決賽隊伍 繳交App作品</h3>
                        <p> 決賽隊伍請於 {{Carbon::parse(Setting::get('app_upload_deadline', '2019-7-26'), 'Asia/Taipei')}} 前上傳資料, 詳細內容請<a href="{{route('team.app.uplaod')}}" style="color: #3e48c1;">點我</a>謝謝。 </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="feature-col col-12 col-md-6">
                <div class="card card-block text-center" style="cursor: pointer;" onclick="window.location= 'https://www.straighta.com.tw/pages/app' ">
                    <div>
                        <div class="feature-icon">
                            <span class="fas fa-trophy"></span>
                        </div>
                    </div>
                    <div>
                        <h3>歷屆得獎作品</h3>
                        {{-- <p> 凡進入決賽隊伍，{{Carbon::parse(Setting::get('register_form_deadline', '2019-6-30'), 'Asia/Taipei')}} 前須提交參賽隊伍所在學校系所用印後的報名表(請至網頁上6/15比賽流程內下載附件)，文件需整併成一個PDF檔，不限制檔案名稱，任一人未於時間內繳交者，則取消該隊決賽資格。</p> --}}
                    </div>
                </div>
            </div>
            <div class="feature-col col-12 col-md-6">
                <div class="card card-block text-center" style="cursor: pointer;" onclick="window.location='https://www.straighta.com.tw/pages/apple-edu'">
                    <div>
                        <div class="feature-icon">
                            <span class="fas fa-link"></span>
                        </div>
                    </div>
                    <div>
                        <h3>StraightA購機優惠專區</h3>
                        {{-- <p> 決賽隊伍請於 {{Carbon::parse(Setting::get('app_upload_deadline', '2019-7-26'), 'Asia/Taipei')}} 前上傳資料, 詳細內容請<a href="{{route('team.app.uplaod')}}" style="color: #3e48c1;">點我</a>謝謝。 </p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>