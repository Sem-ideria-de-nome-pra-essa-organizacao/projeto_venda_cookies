<nav style="background: #f5d0d0;" class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{url('')}}">
            BOINALACHAS
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('bakers') }}">Confeiteiros</a>  
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('biscuits') }}">Biscoitos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('ratings') }}">Notas</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="{{ url('clients') }}">Clientes</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
