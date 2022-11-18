<nav class="navbar navbar-expand-lg" style="background-color: #547794;">
<a class="navbar-brand" href="{{ url('/home') }}" style="float:left;text-align:center;margin-left:50px;">Resepku</a>
<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/home/create') }}" style="float: right;color:white;">Tulis Resep</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                style="float: right;color:white;">
                {{ __('Logout') }}
                </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>
        </ul>
    </div>
</nav>