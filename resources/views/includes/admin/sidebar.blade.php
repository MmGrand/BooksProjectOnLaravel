<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">ADMIN PANEL</li>
        <li class="nav-item">
            <a href="{{ route('admin.book.index') }}" class="nav-link">
                <i class="nav-icon fas fa-align-justify"></i>
                <p>
                    Books
                    <span class="badge badge-info right"></span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.author.index') }}" class="nav-link">
                <i class="nav-icon fas fa-align-justify"></i>
                <p>
                    Authors
                    <span class="badge badge-info right"></span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.genre.index') }}" class="nav-link">
                <i class="nav-icon fas fa-align-justify"></i>
                <p>
                    Genres
                    <span class="badge badge-info right"></span>
                </p>
            </a>
        </li>
    </ul>
</nav>
