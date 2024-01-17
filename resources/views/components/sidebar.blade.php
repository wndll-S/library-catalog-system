<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                @if (auth()->user()->account_type == 'Super-Admin')
                    <div id="core" class="sidebar">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="/home">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Home
                        </a>
                        <a class="nav-link" href="/dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                    </div>

                    <div id="materials" class="sidebar">
                        <div class="sb-sidenav-menu-heading">Materials</div>
                        <a class="nav-link" href="/books">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Books
                        </a>
                        <a class="nav-link" href="/periodicals">
                            <div class="sb-nav-link-icon"><i class="far fa-newspaper"></i></div>
                            Periodicals
                        </a>
                        <a class="nav-link" href="/theses">
                            <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                            Theses
                        </a>
                        <a class="nav-link" href="/borrowed-materials">
                            <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                            Borrowed Materials
                        </a>
                    </div>

                    <div id="administrator" class="sidebar">
                        <div class="sb-sidenav-menu-heading">Administrator</div>
                        <a class="nav-link" href="/accounts">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                            Accounts
                        </a>
                    </div>
                @elseif (auth()->user()->account_type == 'Catalog-Manager')
                    <div id="core" class="sidebar">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="/home">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Home
                        </a>
                    </div>
                    <div id="materials" class="sidebar">
                        <div class="sb-sidenav-menu-heading">Materials</div>
                        <a class="nav-link" href="/books">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Books
                        </a>
                        <a class="nav-link" href="/periodicals">
                            <div class="sb-nav-link-icon"><i class="far fa-newspaper"></i></div>
                            Periodicals
                        </a>
                        <a class="nav-link" href="/theses">
                            <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                            Theses
                        </a>
                        <a class="nav-link" href="/borrowed-materials">
                            <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                            Borrowed Materials
                        </a>
                    </div>
                @elseif (auth()->user()->account_type == 'Dashboard-Viewer')
                    <div id="core" class="sidebar">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="/home">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Home
                        </a>
                        <a class="nav-link" href="/dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                    </div>
                @endif


            </div>  
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ auth()->user()->username }}</div>
    </nav>
</div>