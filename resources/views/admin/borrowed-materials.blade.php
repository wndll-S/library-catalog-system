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
                                <h1 class="mt-4">BORROWED MATERIALS</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">
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
                            
                            <div class="card-body overflow-auto">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Borrower's ID Number</th>
                                            <th>Material ID</th>
                                            <th>Category</th>
                                            <th>Borrowed At</th>
                                            <th>Returned At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($borrow as $item)
                                           <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->borrower_id_number}}</td>
                                                <td>{{$item->material_id}}</td>
                                                <td>{{$item->category}}</td>
                                                <td>{{$item->borrowed_at}}</td>
                                                <td>{{$item->returned_at}}</td>
                                                <td class="d-flex">
                                                    @if ($item->returned_at == null)
                                                        <form action="/update/{{$item->id}}/{{$item->category}}/{{$item->material_id}}" method="post">
                                                            @method('put')
                                                            @csrf
                                                            <input type="hidden" value="{{$item->id}}" name="id">
                                                            <button type="submit" class="btn btn-primary ml-1">
                                                                Return Item
                                                            </button>
                                                        </form>
                                                    @else
                                                        COMPLETED
                                                    @endif
                                                    
                                                </td>
                                           </tr>
                                       @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Borrower's ID Number</th>
                                            <th>Material ID</th>
                                            <th>Category</th>
                                            <th>Borrowed At</th>
                                            <th>Returned At</th>
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

@include('partials.__footer')