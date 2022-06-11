
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{$title}}</title>
    @include('layout.style_client')
  </head>
  <body>
    <div class="container-scroller">
        @include('layout.navbar_client')
      <div class="container-fluid page-body-wrapper">

        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
          </div>
        </div>

        @include('layout.nav_setting_client')
     
        <div class="main-panel">
          
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Hi, welcome {{$_SESSION['user_name']}} <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Chúc bạn có một {{$_SESSION['goodtime']}} zui zẻ.</span>
              </h3>
              {{-- <div class="d-flex">
                <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                  <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>
                <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
                  <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>
                <button type="button" class="btn btn-sm ml-3 btn-success"> Add User </button>
              </div> --}}
              @yield('add-client')
            </div>
            <div class="row">
              @yield('main-content-client')
            </div>

          </div>

          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Huy Lê Văn</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Iu mọi người lắm <a href="https://www.facebook.com/hi.im.huy.dzz/" target="_blank">Huy Lê Văn</a> from Thanh Hóa with luv</span>
            </div>
          </footer>

        </div>

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('layout.script_client')
  </body>
</html>