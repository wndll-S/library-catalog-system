@include('partials.head')
<body>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark ">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="#">Library Catalog System</a>
    
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </form>
</nav>
    <div class="container">
        <div class="col">
            <h2>What are you looking for?</h2>
            <div class="mt-3">
                <a href="/search/books" class="btn btn-primary">Books</a>
                <a href="/search/periodicals" class="btn btn-primary">Periodicals</a>
                <a href="/search/theses" class="btn btn-primary">Theses</a>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="col height d-flex justify-content-center align-items-center">

          <div class="col-md-6">

            <h2>What are you looking for?</h2>
            <div class="mt-3">
                <a href="/search/books" class="btn btn-primary">Books</a>
                <a href="/search/periodicals" class="btn btn-primary">Periodicals</a>
                <a href="/search/theses" class="btn btn-primary">Theses</a>
            </div>
          </div>
          
        </div>
    </div>
</body>
@include('partials.__footer')
            {{-- <div class="search">
                <i class="fa fa-search"></i>
                <input type="text" class="form-control" placeholder="Search a title, author, year, or any other details . . .">
                <button class="btn btn-primary">Search</button>
            </div> --}}