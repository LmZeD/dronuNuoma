<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{route('home')}}">Dronų Nuoma</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarHeaderShop">
        <ul class="navbar-nav">
            @if(Auth::check() == false)
                <li class="nav-item" align="right">
                    @if(Auth::guard('customer'))
                        <a class="nav-link" href="{{route('customer.logout')}}" ><i class="fa fa-user" aria-hidden="true"></i>  Atsijungti</a>
                    @else
                        <a class="nav-link" href="{{route('customer.login')}}" ><i class="fa fa-user" aria-hidden="true"></i>  Prisijungti</a>
                    @endif
                </li>
            @endif
        </ul>
    </div>
</nav>
