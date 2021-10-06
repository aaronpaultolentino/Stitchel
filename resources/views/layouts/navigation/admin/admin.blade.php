      <ul class="nav {{ request()->is('admin/home*') ? 'active' : '' }}">
          <li class="nav-item {{ request()->is('admin/home*') ? 'active' : '' }}">
          <a class=" nav-link" href="{{ route('home') }}"> <i class="fa-fw text-left fas fa-desktop text-primary"></i> Dashboard
            </a>
          </li>
         <li class="nav-item {{ request()->is('admin/integrations*') ? 'active' : '' }}">
          <a class=" nav-link {{ request()->is('admin/integrations*') ? 'active' : '' }}" href="{{ route('integrations.index') }}"> <i class="fa-fw text-left fas fa-users text-yellow"></i> Integrations
            </a>
          </li>
         </li>
         <li class="nav-item {{ request()->is('admin/profiles*') ? 'active' : '' }}">
          <a class=" nav-link {{ request()->is('admin/profiles*') ? 'active' : '' }}" href="{{ route('profiles.index') }}"> <i class="fa-fw text-left fas fa-user text-success"></i> Profiles
            </a>
          </li>
         <li class="nav-item {{ request()->is('admin/myplan*') ? 'active' : '' }}">
          <a class=" nav-link {{ request()->is('admin/myplan*') ? 'active' : '' }}" href="{{ route('myplan.index') }}"> <i class="fa-fw text-left fas fa-calendar text-red"></i> My Plan
            </a>
          </li>
      </ul>
 