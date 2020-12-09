<aside id="sidebar-left" class="sidebar-left">	
    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
            
                <ul class="nav nav-main">
                    <li>
                        <a class="nav-link" href="/dashboard">
                            <i class="fas fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>                        
                    </li>
                    <li >
                        <a class="nav-link" href="/appointment">
                            <i class="fas fa-tasks" aria-hidden="true"></i>
                            <span>Manage Appointments</span>
                        </a>
               
                    </li>
        
                    <li>
                        <a class="nav-link" href="/services">
                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                            <span>Services</span>
                        </a>                        
                    </li>
                    <li>
                        <a class="nav-link" href="/reports">
                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                            <span>Reports</span>
                        </a>                        
                    </li>
                    <li>
                        <a class="nav-link" href="/addWalkIn">
                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                            <span>Add a walk in</span>
                        </a>                        
                    </li>
                </ul>
            </nav>
        </div>
        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
                    
                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>
    </div>
</aside>



