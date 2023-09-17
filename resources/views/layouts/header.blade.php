<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('dashboard') }}" class="nav-link">Dashboard</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
            <span class="icon-user"> Welcome, {{Auth::user()->name}}</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width: 100%">
            <li>
                <a href="{{ route('admin.showchangepassword')}}" class="dropdown-item @if($active =='change-password') active @endif">
                    <i class="fas fa-key nav-icon"></i> Change Password
                </a>
            </li>
            <li>
                <a href="{{ route('admin.showprofileupdate')}}" class="dropdown-item @if($active =='change-profile') active @endif">
                    <i class="fas fa-user nav-icon"></i> Change Profile
                </a>
            </li>
        </ul>
      </li>
    </ul>
</nav>