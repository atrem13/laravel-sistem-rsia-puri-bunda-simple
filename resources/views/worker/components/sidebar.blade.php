<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-heading">Dashboard</li>
      <li class="nav-item">
        <a class="nav-link {{ (Route::current()->getName() == 'worker.dashboard.index' || Route::current()->getName() == 'worker.dashboard.edit') ? '' : 'collapsed' }}" href="{{ route('worker.dashboard.index') }}">
          <i class="ri-dashboard-line"></i><span>Dashboard</span>
        </a>
      </li>
      <li class="nav-heading">Users</li>
      <li class="nav-item">
        <a class="nav-link {{ (Route::current()->getName() == 'worker.worker.index' || Route::current()->getName() == 'worker.worker.edit') ? '' : 'collapsed' }}" href="{{ route('worker.worker.edit', auth()->guard('worker')->user()->id) }}">
          <i class="ri-user-settings-line"></i><span>Profile</span>
        </a>
      </li>
    </ul>

</aside>