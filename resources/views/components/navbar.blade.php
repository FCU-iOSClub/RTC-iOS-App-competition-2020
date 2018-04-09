<navbar>
  <h1 slot="logo"><a href="{{route('home',[],false)}}" class="goto-target">{{config('app.name', 'Laravel')}}</a></h1>
  <ul slot="nav-content">
    @auth
    <li>
      <a href="{{route('user',[],false)}}">你好，{{auth()->user()->name}}！</a>
    </li>
    @endauth @if (URL::current()!=route('home',[],false) && URL::current()!=route('home',[],false))
    <li>
      <a href="{{route('home',[],false)}}">首頁</a>
    </li>
    @endif
    <li>
      <a href="{{route('home',[],false)}}#about">簡介</a>
    </li>
    <li>
      <a href="{{route('home',[],false)}}#timeline">競賽</a>
    </li>
    <li>
      <a href="{{route('home',[],false)}}#award">獎項</a>
    </li>
    <li>
      <a href="{{route('home',[],false)}}#portal">報名</a>
    </li>
    <li>
      <a href="{{route('home',[],false)}}#sponsors">贊助商</a>
    </li>
    @auth
    <li>
      <a href="{{ route('logout',[],false) }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
      <form id="logout-form" action="{{ route('logout',[],false) }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </li>
    @else
    <li>
      <a href="{{ route('login',[],false) }}">登入</a>
    </li>
    @endauth {{$slot}} {{--
    <li class="menu-has-children">
      <i class="fas fa-chevron-down"></i>
      <a href="#">Drop Down</a>
      <ul>
        <li>
          <a href="#">Drop Down 1</a>
        </li>
        <li class="menu-has-children">
          <i class="fas fa-chevron-right"></i>
          <a href="#">Drop Down 2</a>
          <ul>
            <li>
              <a href="#">Deep Drop Down 1</a>
            </li>
            <li>
              <a href="#">Deep Drop Down 2</a>
            </li>
            <li>
              <a href="#">Deep Drop Down 3</a>
            </li>
            <li>
              <a href="#">Deep Drop Down 4</a>
            </li>
            <li>
              <a href="#">Deep Drop Down 5</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">Drop Down 3</a>
        </li>
        <li>
          <a href="#">Drop Down 4</a>
        </li>
        <li>
          <a href="#">Drop Down 5</a>
        </li>
      </ul>
    </li> --}}
  </ul>
</navbar>