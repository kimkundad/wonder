<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{url('assets/back/img/sidebar-4.png')}}">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      Creative Tim
    </a>
  </div>

  <div class="sidebar-wrapper">
    <ul class="nav">

      <li class="nav-item {{ (Request::is('admin/dashboard*') ? 'active' : '') }} ">
        <a class="nav-link" href="{{url('admin/dashboard')}}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>

      <li class="nav-item {{ (Request::is('admin/users*') ? 'active' : '') }} ">
        <a class="nav-link" href="{{url('admin/users')}}">
          <i class="material-icons">person</i>
          <p>รายชื่อลูกค้า</p>
        </a>
      </li>

      <li class="nav-item {{ (Request::is('admin/employee*') ? 'active' : '') }} ">
        <a class="nav-link" href="{{url('admin/employee')}}">
          <i _ngcontent-qis-c19="" class="material-icons icon-image-preview">face</i>
          <p>ข้อมูลพนักงาน</p>
        </a>
      </li>

      <li class="nav-item {{ (Request::is('admin/events*') ? 'active' : '') }} ">
        <a class="nav-link" href="{{url('admin/events')}}">
          <i class="material-icons">bubble_chart</i>
          <p>งาน Events</p>
        </a>
      </li>

      <li class="nav-item {{ (Request::is('admin/products*') ? 'active' : '') }} ">
        <a class="nav-link" href="{{url('admin/products')}}">
          <i class="material-icons">card_giftcard</i>
          <p>สินค้า</p>
        </a>
      </li>

      <li class="nav-item {{ (Request::is('admin/order_admin*') ? 'active' : '') }} ">
        <a class="nav-link" href="{{url('admin/order_admin')}}">
          <i class="material-icons">library_books</i>
          <p>Orders สินค้า</p>
        </a>
      </li>

      <li class="nav-item {{ (Request::is('admin/pay_admin*') ? 'active' : '') }} ">
        <a class="nav-link" href="{{url('admin/pay_admin')}}">
          <i class="material-icons">credit_card</i>
          <p>แจ้งชำระโอน</p>
        </a>
      </li>

      <li class="nav-item {{ (Request::is('admin/options*') ? 'active' : '') }} ">
        <a class="nav-link" href="{{url('admin/options')}}">
          <i class="material-icons">donut_small</i>
          <p>ออฟชั่น</p>
        </a>
      </li>


      <li class="nav-item {{ (Request::is('admin/vampire_admin*') ? 'active' : '') }} {{ (Request::is('admin/search_vam*') ? 'active' : '') }}">
        <a class="nav-link" href="{{url('admin/vampire_admin')}}">
          <i class="material-icons">where_to_vote</i>
          <p>รายชื่อกิจกรรม vampire</p>
        </a>
      </li>

      <li class="nav-item {{ (Request::is('admin/event1*') ? 'active' : '') }} {{ (Request::is('admin/search_event1*') ? 'active' : '') }}">
        <a class="nav-link" href="{{url('admin/event1')}}">
          <i class="material-icons">accessibility_new</i>
          <p>รายชื่อกิจกรรม 5 วัน 5 คืน</p>
        </a>
      </li>



      <li class="nav-item {{ (Request::is('admin/slide*') ? 'active' : '') }} ">
        <a class="nav-link" href="{{url('admin/slide')}}">
          <i class="material-icons">queue_play_next</i>
          <p>slide</p>
        </a>
      </li>


      <li class="nav-item {{ (Request::is('admin/contact*') ? 'active' : '') }} ">
        <a class="nav-link" href="{{url('admin/contact')}}">
          <i class="material-icons">mail_outline</i>
          <p>contact us</p>
        </a>
      </li>


      <li class="nav-item {{ (Request::is('admin/unlock_events*') ? 'active' : '') }} ">
        <a class="nav-link" href="{{url('admin/unlock_events')}}">
          <i class="material-icons">bug_report</i>
          <p>unlock_events</p>
        </a>
      </li>

    </ul>
  </div>

</div>
