<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
      <a class="sidebar-brand brand-logo" href="index.html"><img src="{{BASE_URL}}public/admin/assets/images/logo.svg" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img src="{{BASE_URL}}public/admin/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{IMG_URL}}{{$_SESSION['admin_avatar']}}" alt="profile" />
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column pr-3">
            <span class="font-weight-medium mb-2">{{$_SESSION['admin_username']}}</span>
            <span class="font-weight-normal">{{number_format($_SESSION["balance"])}} $</span>
          </div>
          <span class="badge badge-danger text-white ml-3 rounded">Admin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{BASE_URL}}admin/dashboard">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{BASE_URL}}admin/categories">
          <i class="mdi mdi-buffer menu-icon"></i>
          <span class="menu-title">Danh mục</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{BASE_URL}}admin/services">
          <i class="mdi mdi-package-variant-closed menu-icon"></i>
          <span class="menu-title">Dịch vụ</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{BASE_URL}}admin/packages">
          <i class="mdi mdi-chart-bar menu-icon"></i>
          <span class="menu-title">Gói dịch vụ</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{BASE_URL}}admin/orders">
          <i class="mdi mdi-receipt menu-icon"></i>
          <span class="menu-title">Đơn hàng</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{BASE_URL}}admin/users">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">Người dùng</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{BASE_URL}}admin/money">
          <i class="mdi mdi-cash menu-icon"></i>
          <span class="menu-title">Cộng trừ tiền</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="https://www.facebook.com/hi.im.huy.dzz/">
          <i class="mdi mdi-file-document-box menu-icon"></i>
          <span class="menu-title">Hướng dẫn sử dụng </span>
        </a>
      </li>
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