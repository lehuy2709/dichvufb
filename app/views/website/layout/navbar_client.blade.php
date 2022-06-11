<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
      <a class="sidebar-brand brand-logo" href="index.html"><img src="{{BASE_URL}}public/admin/assets/images/logo.svg" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img src="{{BASE_URL}}public/admin/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{IMG_URL}}{{$_SESSION['user_avatar']}}" alt="profile" />
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column pr-3">
            <span class="font-weight-medium mb-2">{{$_SESSION["user_name"]}}</span>
            <span class="font-weight-normal">{{number_format($_SESSION["balance"])}} $</span>
          </div>
          <span class="badge badge-danger text-white ml-3 rounded">Member</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="mdi mdi-buffer menu-icon"></i>
          <span class="menu-title">Danh Mục</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="mdi mdi-package-variant-closed menu-icon"></i>
          <span class="menu-title">Dịch Vụ</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="mdi mdi-chart-bar menu-icon"></i>
          <span class="menu-title">Gói dịch vụ</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="mdi mdi-table-large menu-icon"></i>
          <span class="menu-title">Tables</span>
        </a>
      </li>
      <li class="nav-item">
        <span class="nav-link" href="#">
          <span class="menu-title">Dịch Vụ</span>
        </span>
      </li>

      @if ($sidebarCategories->count()>0)
      @foreach ($sidebarCategories as $cate)
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="{{$cate->icon}} menu-icon"></i>
          <span class="menu-title">{{$cate->name}}</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          @foreach($cate->service as $ser)
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{BASE_URL}}{{$cate->slug}}/{{$ser->slug}}">{{$ser->name}}</a>
            </li>
          </ul>
          @endforeach
      

        </div>
      </li>
      @endforeach
 
      @endif
      

      <li class="nav-item sidebar-actions">
        <div class="nav-link">
          <div class="mt-4">
            <div class="border-none">
              <p class="text-black">Notification</p>
            </div>
            <ul class="mt-4 pl-0">
              <li><a href="dang-xuat">Sign Out</a> </li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </nav>