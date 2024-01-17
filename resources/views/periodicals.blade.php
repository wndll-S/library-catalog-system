@include('partials.head', ['title' => $title])
<body>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a href="/" class="btn btn-primary">
        <span class="far fa-arrow-alt-circle-left"></span>
        BACK</a>
    <a class="navbar-brand ps-3" href="#">Library Catalog System</a>
</nav>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        PERIODICALS
    </div>
    
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Accession Number</th>
                    <th>Title</th>
                    <th>Volume Number</th>
                    <th>Issue Number</th>
                    <th>Period Covered</th>
                    <th>Availability Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($periodicals as $item)
                   <tr>
                        <td>{{$item->accession_number}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->volume_number}}</td>
                        <td>{{$item->issue_number}}</td>
                        <td>{{$item->period_covered}}</td>
                        <td>
                            @if ($item->availability_status == 'Available')
                                <strong class="text-primary">{{$item->availability_status}}</strong>
                            @elseif ($item->availability_status == 'Borrowed')
                                <strong class="text-danger">{{$item->availability_status}}</strong> 
                                
                            @elseif ($item->availability_status == 'On-hold')
                                <strong class="text-warning">{{$item->availability_status}}</strong>
                            @endif
                        </td>
                        <td>
                            @if ($item->availability_status == 'Available')
                                <button  data-id="{{$item->accession_number}}" data-material="periodical" class="borrow btn  btn-outline-primary">Borrow</button>
                            @endif 
                        </td>
                        
                   </tr>
               @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Accession Number</th>
                    <th>Title</th>
                    <th>Volume Number</th>
                    <th>Issue Number</th>
                    <th>Period Covered</th>
                    <th>Availability Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<x-borrow_modal />
@if(session('message'))
        <div class="toast-container position-fixed bottom-0 end-0 p-3" >
            <div id="myToast"  class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                  <div class="toast-body">
                    {{ session('message') }}
                  </div>
                  <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    @if($errors->any())
        <div class="toast-container position-fixed bottom-0 end-0 p-3" >
            @foreach($errors->all() as $error)
            <div id="myToast"  class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                  <div class="toast-body">
                    {{ $error }}
                  </div>
                  <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            @endforeach
        </div>
    @endif
@include('partials.__footer')