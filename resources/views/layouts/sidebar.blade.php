<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        
        <ul class="sidebar-menu">
            {{-- <li class="menu-header">Main</li> --}}

            <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="/dashboard"><span>Dashboard</span></a></li>
            <li class="{{ request()->is('users') ? 'active' : '' }}"><a class="nav-link my-4" href="/users"><span>Users</span></a></li>
            <li class="{{ request()->is('all-subscriptions') ? 'active' : '' }}"><a class="nav-link my-4" href="/all-subscriptions"><span>Subscriptions</span></a></li>
            <li class="{{ request()->is('ads') ? 'active' : '' }}"><a class="nav-link my-4" href="/ads"><span>Ads</span></a></li>
        </ul>
    </aside>
</div>
