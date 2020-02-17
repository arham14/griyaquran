<li class="nav-item">
    <a href="/" class="nav-link @if($active == 'dashboard') active @endif">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-item has-treeview @if($active == 'add-griya' || $active == 'data-griya') menu-open @else menu-close @endif">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-school"></i>
        <p>
        Data Griya
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="/add-griya" class="nav-link @if($active == 'add-griya') active @endif">
            <p>Tambah Data Griya</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="/data-griya" class="nav-link @if($active == 'data-griya') active @endif">
            <p>Data Griya</p>
        </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview @if($active == 'add-pengajar' || $active == 'data-pengajar') menu-open @else menu-close @endif">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-chalkboard-teacher"></i>
        <p>
        Data Pengajar
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="/add-pengajar" class="nav-link @if($active == 'add-pengajar') active @endif">
            <p>Tambah Data Pengajar</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="/data-pengajar" class="nav-link @if($active == 'data-pengajar') active @endif">
            <p>Data Pengajar</p>
        </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview @if($active == 'add-santri' || $active == 'data-santri') menu-open @else menu-close @endif">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
        Data Santri
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="/add-santri" class="nav-link @if($active == 'add-santri') active @endif">
            <p>Tambah Data Santri</p>
        </a>
        </li>
        <li class="nav-item">
        <a href="/data-santri" class="nav-link @if($active == 'data-santri') active @endif">
            <p>Data Santri</p>
        </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="pembelajaran" class="nav-link @if($active == 'pembelajaran') active @endif">
        <i class="nav-icon fas fa-clipboard-list"></i>
        <p>
            Pembelajaran
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        {{ __('Logout') }}>
        <i class="nav-icon fas fa-sign-out"></i>
        <p>
            Keluar
        </p>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </a>
</li>