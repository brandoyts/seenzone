<header class="header">
    <div class="logo-container">
        <a href="/admin" class="logo">
            <img src="img/logo.png" width="75" height="35" alt="SeenZone" />
        </a>
        <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <div class="header-right">
        <span class="separator"></span>
        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <div class="profile-info" data-lock-name="John Doe" data-lock-email="{{ Auth::user()->email }}">
                    
                    <span class="name">{{ Auth::user()->email }}</span>
                    <span class="role">
                        @if (Auth::user()->role_id == 1)
                        {{ 'Administrator' }}
                        @endif
                    </span>
                </div>

                <i class="fa custom-caret"></i>
            </a>
            <div class="dropdown-menu">
                <ul class="list-unstyled mb-2">
                    <li class="divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>