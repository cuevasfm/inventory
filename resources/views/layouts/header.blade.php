<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/css/ico.png" alt="" width="24">
        </a>
    </div> -->
    <a class="navbar-brand" href="/inventories">
        <img src="/css/ico.png" alt="" width="24">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Inicio</a>
                </li> -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Inventarios
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/inventories">Inventario</a>
                    <a class="dropdown-item" href="/inventories/create">Registrar Nuevo</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/inventories/activitylog/all">Bitácora</a>
                    <!-- 
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">CPU</a>
                        <a class="dropdown-item" href="#">Laptop</a>
                        <a class="dropdown-item" href="#">HDD</a>
                        <a class="dropdown-item" href="#">Periferico</a>
                        <a class="dropdown-item" href="#">Impresoras</a>
                        <a class="dropdown-item" href="#">Monitores</a>
                        <a class="dropdown-item" href="#">Redes</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Otros</a> -->
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Empleados
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/employee">Empleados</a>
                    <a class="dropdown-item" href="/employee/create">Registrar Empleado</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Configuración
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/config/categories">Categorias</a>
                    <a class="dropdown-item" href="/config/brands">Marcas</a>
                </div>
            </li>
            <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Consultas</a>
                </li> -->
        </ul>
        <form class="d-flex" method="post" action="/logout">
            @csrf
            <button class="btn btn-outline-danger" type="submit">Salir</button>
        </form>
    </div>
</nav>