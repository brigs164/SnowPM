<li class="nav-item">
    <a href="{{ route('home') }}" class="{{ (Route::is('home')) ? 'nav-link active' : 'nav-link'}}">
       <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('clients.index') }}" class="{{ (Route::is('clients.index')) ? 'nav-link active' : 'nav-link'}}">
       <p>Clients</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('jobs.index') }}" class="{{ (Route::is('jobs.index')) ? 'nav-link active' : 'nav-link'}}">
        <p>Jobs</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('tablet') }}" class="{{ (Route::is('tablet')) ? 'nav-link active' : 'nav-link'}}">
        <p>Tablet-Mode</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('controlpanel.index') }}" class="{{ (Route::is('controlpanel.index')) ? 'nav-link active' : 'nav-link'}}">
        <p>Control Panel</p>
    </a>
</li>
