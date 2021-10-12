      <ul class="nav {{ request()->is('home*') ? 'active' : '' }}">
          <li class="nav-item {{ request()->is('home*') ? 'active' : '' }}">
          <a class=" nav-link" href="{{ route('Dashboard') }}"> <i class="fa-fw text-left fas fa-desktop text-primary"></i> Dashboard
            </a>
          </li>
         <li class="nav-item {{ request()->is('integrations*') ? 'active' : '' }}">
          <a class=" nav-link {{ request()->is('integrations*') ? 'active' : '' }}" href="{{ route('integrations') }}"> <i class="fa-fw text-left fas fa-users text-yellow"></i> Integrations
            </a>
          </li>
         </li>
         <li class="nav-item {{ request()->is('profile*') ? 'active' : '' }}">
          <a class=" nav-link {{ request()->is('profile*') ? 'active' : '' }}" href="{{ route('profile') }}"> <i class="fa-fw text-left fas fa-user text-success"></i> Profile
            </a>
          </li>
         <li class="nav-item {{ request()->is('myplan*') ? 'active' : '' }}">
          <a class=" nav-link {{ request()->is('myplan*') ? 'active' : '' }}" href="{{ route('myplan') }}"> <i class="fa-fw text-left fas fa-calendar text-red"></i> My Plan
            </a>
          </li>
      </ul>
