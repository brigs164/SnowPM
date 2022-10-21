<li class="nav-item">
    <a href="{{ route('home') }}" class="{{ (Route::is('home')) ? 'nav-link active' : 'nav-link'}}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('clients.index') }}" class="{{ (Route::is('clients.index')) ? 'nav-link active' : 'nav-link'}}">
        <i class="nav-icon fa fa-users"></i>
        <p>Clients</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('jobs.index') }}" class="{{ (Route::is('jobs.index')) ? 'nav-link active' : 'nav-link'}}">
        <i class="nav-icon fa fa-briefcase"></i>
        <p>Jobs</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('products.index') }}" class="{{ (Route::is('products.index')) ? 'nav-link active' : 'nav-link'}}">
        <i class="nav-icon fa fa-cubes"></i>
        <p>Products</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('tablet') }}" class="{{ (Route::is('tablet')) ? 'nav-link active' : 'nav-link'}}">
        <i class="nav-icon fa fa-tablet"></i>
        <p>Tablet-Mode</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('controlpanel.index') }}" class="{{ (Route::is('controlpanel.index')) ? 'nav-link active' : 'nav-link'}}">
        <i class="nav-icon fa fa-cogs"></i>
        <p>Control Panel</p>
    </a>
</li>
