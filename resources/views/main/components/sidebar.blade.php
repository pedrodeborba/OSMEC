<nav class="menu-lateral">

    <div class="btn-expandir">
        <i class="bi bi-list" id="btn-exp"></i>
    </div>

    <ul>
        <li class="item-menu ativo">
            <a href="{{ route ('dashboard.index') }}">
                <span class="icon"><i class="bi bi-house-door"></i></span>
                <span class="txt-link">Dashboard</span>
            </a>
        </li>
        <li class="item-menu">
            <a href="{{ route ('service_orders.index') }}">
                <span class="icon"><i class="bi bi-columns-gap"></i></span>
                <span class="txt-link">Serviços</span>
            </a>
        </li>
        <li class="item-menu">
            <a href="{{ route ('clients.index') }}">
                <span class="icon"><i class="bi bi-person-arms-up"></i></span>
                <span class="txt-link">Clientes</span>
            </a>
        </li>
        <li class="item-menu">
            <a href="{{ route ('mechanics.index') }}">
                <span class="icon"><i class="bi bi-person-badge-fill"></i></span>
                <span class="txt-link">Mecânicos</span>
            </a>
        </li>
        <li class="item-menu">
            <a href="{{ route ('teams.index') }}">
                <span class="icon"><i class="bi bi-people-fill"></i></span>
                <span class="txt-link">Equipes</span>
            </a>
        </li>
        <li class="item-menu">
            <a href="{{ route ('vehicles.index') }}">
                <span class="icon"><i class="bi bi-car-front"></i></span>
                <span class="txt-link">Veículos</span>
            </a>
        </li>
        <li class="item-menu">
            <a href="{{ route ('parts.index') }}">
                <span class="icon"><i class="bi bi-wrench"></i></span>
                <span class="txt-link">Peças</span>
            </a>
        </li>
    </ul>

</nav>
<script src="{{ asset('js/sidebar.js') }}"></script>