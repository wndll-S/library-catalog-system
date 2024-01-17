@include('partials.head')
    <body class="sb-nav-fixed">
        <x-navbar />
        <div id="layoutSidenav">
            <x-sidebar />
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="d-flex">
                            <div>
                                <h1 class="mt-4">BOOKS</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">
                                        <button class="btn btn-primary" id="showModal">Add a Book</button>
                                        @if(session('message'))
                                            <div class="alert alert-primary" role="alert">
                                                {{ session('message') }}
                                            </div>
                                        @endif
                                        @if($errors->any())
                                            <div class="alert alert-danger mt-3">
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Library Catalog
                            </div>
                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Year Published</th>
                                            <th>Call Number</th>
                                            <th>Genre</th>
                                            <th>Availability Status</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($books as $item)
                                           <tr>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->author}}</td>
                                                <td>{{$item->year_published}}</td>
                                                <td>{{$item->call_number}}</td>
                                                <td>{{$item->genre->title}}</td>
                                                <td>{{$item->availability_status}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>{{$item->updated_at}}</td>
                                                <td class="d-flex">
                                                    {{-- himuan pa para sa iya edit --}}
                                                    <a href="/edit/book/{{$item->id}}" type="button" class="btn btn-warning">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="/delete/book/{{$item->id}}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger ml-1">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                           </tr>
                                       @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Year Published</th>
                                            <th>Call Number</th>
                                            <th>Genre</th>
                                            <th>Availability Status</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            <x-footer />
            </div>
        </div>

    <x-books_modal :genres="$genre"/>
        <!-- dri asta ang modal-->

@include('partials.__footer')