<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-heading">Dashboard</li>
      <li class="nav-item">
        <a class="nav-link {{ (Route::current()->getName() == 'admin.dashboard.index' || Route::current()->getName() == 'admin.dashboard.edit') ? '' : 'collapsed' }}" href="{{ route('admin.dashboard.index') }}">
          <i class="ri-dashboard-line"></i><span>Dashboard</span>
        </a>
      </li>
      <li class="nav-heading">Master Data</li>
      <li class="nav-item">
        <a class="nav-link {{ (Route::current()->getName() == 'admin.unit.index' || Route::current()->getName() == 'admin.unit.edit') ? '' : 'collapsed' }}" href="{{ route('admin.unit.index') }}">
          <i class="ri-archive-drawer-line"></i><span>Unit</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Route::current()->getName() == 'admin.occupation.index' || Route::current()->getName() == 'admin.occupation.edit') ? '' : 'collapsed' }}" href="{{ route('admin.occupation.index') }}">
          <i class="ri-archive-drawer-line"></i><span>Jabatan</span>
        </a>
      </li>
      <li class="nav-heading">Users</li>
      <li class="nav-item">
        <a class="nav-link {{ (Route::current()->getName() == 'admin.worker.index' || Route::current()->getName() == 'admin.worker.edit') ? '' : 'collapsed' }}" href="{{ route('admin.worker.index') }}">
          <i class="ri-contacts-line"></i><span>Worker</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Route::current()->getName() == 'admin.admin.index' || Route::current()->getName() == 'admin.admin.edit') ? '' : 'collapsed' }}" href="{{ route('admin.admin.index') }}">
          <i class="ri-user-settings-line"></i><span>Profile</span>
        </a>
      </li>
    </ul>

</aside>