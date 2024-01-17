
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
                                <h1 class="mt-4">ADMIN ACCOUNTS</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">
                                        <button class="btn btn-primary" id="showModal">Add Admin</button>
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
                                Admin Accounts
                                
                            </div>
                            
                            <div class="card-body overflow-auto">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Account Type</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($accounts as $item)
                                           <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->username}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->account_type}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>{{$item->updated_at}}</td>
                                                <td class="d-flex">
                                                    <a href="/edit/account/{{$item->id}}" type="button" class="btn btn-warning">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                    <form action="/delete/account/{{$item->id}}" method="post">
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
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Account Type</th>
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

    <x-accounts_modal />
        <!-- dri asta ang modal-->

@include('partials.__footer')