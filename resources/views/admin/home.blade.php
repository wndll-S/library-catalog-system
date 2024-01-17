@include('partials.head')
    <body class="sb-nav-fixed">
        <x-navbar />
        <div id="layoutSidenav">
            <x-sidebar />
            <div id="layoutSidenav_content" class="d-flex align-items-center justify-content-center">
                <section>
                    <div class="container">
                        <div class="d-flex flex-column align-items-center text-center">
                            <h1 class="fw-bold mb-4">WELCOME BACK <span class="text-primary text-decoration-underline font-italic">{{ auth()->user()->username }}</span>!</h1>
                            <div class="breadcrumb">Where do you want to go?</div>
                            <div>
                                @if (auth()->user()->account_type == 'Super-Admin')
                                    <a href="/dashboard" class="btn btn-primary">DASHBOARD</a>
                                    <a href="/books" class="btn btn-primary">BOOKS</a>
                                    <a href="/periodicals" class="btn btn-primary">PERIODICALS</a>
                                    <a href="/theses" class="btn btn-primary">THESES</a>
                                @elseif( auth()->user()->account_type == 'Dashboard-Viewer')
                                    <a href="/dashboard" class="btn btn-primary">DASHBOARD</a>
                                @elseif(auth()->user()->account_type == 'Catalog-Manager')
                                    <a href="/books" class="btn btn-primary">BOOKS</a>
                                    <a href="/periodicals" class="btn btn-primary">PERIODICALS</a>
                                    <a href="/theses" class="btn btn-primary">THESES</a>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </section>                                
            
            </div>
        </div>
        <x-footer />
    <x-periodicals_modal/>
        <!-- dri asta ang modal-->

@include('partials.__footer')