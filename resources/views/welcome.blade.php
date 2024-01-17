@include('partials.__header')
<body class="">
    
    <div class="container">
        <div class="col">
            <div class="col height d-flex justify-content-center align-items-center">
                {{-- <h1>Welcome to our Library Catalog System</h1> --}}
                <h1 class="fw-bold">What are you looking for?</h1>
            </div>
            <div class="col d-flex justify-content-center ">
                    {{-- <a href="/search" type="button" class="btn btn-primary">Get Started</a> --}}
                    <a href="/search/books" class="btn btn-primary">Books</a>
                    <a href="/search/periodicals" class="btn btn-primary mx-2">Periodicals</a>
                    <a href="/search/theses" class="btn btn-primary">Theses</a>
                
            </div>
        </div>
    </div>
</body>
</html>