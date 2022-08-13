<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="{{ (Route::is('home')) ? 'nav-link active' : 'nav-link'}}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('clients.index') }}" class="{{ (Route::is('clients')) ? 'nav-link active' : 'nav-link'}}">
        <i class="nav-icon fa fa-users"></i>
        <p>Clients</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('tablet') }}" class="{{ (Route::is('tablet')) ? 'nav-link active' : 'nav-link'}}">
        <i class="nav-icon fa fa-tablet"></i>
        <p>Tablet-Mode</p>
    </a>
</li>
