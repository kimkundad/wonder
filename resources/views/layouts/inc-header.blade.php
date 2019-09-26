<nav class="navbar navbar-default navbar-inverse navbar-theme navbar-theme-abs navbar-theme-transparent navbar-theme-border" id="main-nav">
  <div class="container">
    <div class="navbar-inner nav">
      <div class="navbar-header">
        <button class="navbar-toggle collapsed" data-target="#navbar-main" data-toggle="collapse" type="button" area-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('/')}}">
          <img src="{{url('assets/home/img/Group-207.png')}}" alt="Image Alternative text" title="Image Title"/>
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-main">
        <ul class="nav navbar-nav">


          <li class="active dropdown">
            <a href="{{url('/')}}" >Home</a>
          </li>

          <li class=" dropdown">
            <a href="{{url('/events')}}" >Events</a>
          </li>
          <li class=" dropdown">
            <a href="{{url('/quotes')}}" >Quotes</a>
          </li>
          <li class=" dropdown">
            <a href="{{url('/blog')}}" >Blog</a>
          </li>
          <li class=" dropdown">
            <a href="{{url('/about_us')}}" >About us</a>
          </li>
          <li class=" dropdown">
            <a href="{{url('/contact_us')}}" >Contact us</a>
          </li>
          <li class=" dropdown">
            <a href="{{url('confirm_payment')}}">Confirm Payment</a>
          </li>





        </ul>


        <ul class="nav navbar-nav navbar-right">






          <li class="navbar-nav-item-user dropdown">
            @if (Auth::guest())
            <a  href="{{url('login')}}" >
              <i class="fa fa-user-circle-o navbar-nav-item-user-icon"></i>เข้าสู่ระบบ
            </a>
            @else
            <a  href="{{url('/user_profile')}}" >
              <i class="fa fa-user-circle-o navbar-nav-item-user-icon"></i> {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{url('/user_profile')}}">ข้อมูลส่วนตัว</a>
              </li>
              <li>
                <a href="{{url('buy_history')}}">ประวัติ การสั่งซื้อ</a>
              </li>
              <li>
                <a href="{{url('user_point')}}">Point คะแนนสะสม</a>
              </li>
              <li>
                <a href="{{url('payment_history')}}">ประวัติ การชำระเงิน</a>
              </li>

              <li>
                <a href="{{url('events_history')}}">Event ที่เข้าร่วม</a>
              </li>
              <li>
                <a href="{{url('confirm_payment')}}">แจ้งการชำระเงิน</a>
              </li>

              <li>
                <a href="{{url('logout')}}">ออกจากระบบ</a>
              </li>
            </ul>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
