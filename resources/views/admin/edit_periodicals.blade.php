@include('partials.head')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto centered-div p-4 rounded-4">
            <h1>Edit Periodical Details</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form autocomplete="off" action="/update/periodicals/{{$periodicals->accession_number}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="form-floating mb-3">
                        <input class="form-control" id="accession_number" type="text" placeholder="Accession Number" name="accession_number" value="{{$periodicals->accession_number}}" required/>
                        <label for="accession_number">Accession Number</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="title" type="text" placeholder="Title" name="title" value="{{$periodicals->title}}" required/>
                        <label for="title">Title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="volume_number" type="text" placeholder="Volume Number" name="volume_number" value="{{$periodicals->volume_number}}" required/>
                        <label for="volume_number">Volume Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="issue_number" type="text" placeholder="Issue Number" name="issue_number" value="{{$periodicals->issue_number}}" required/>
                        <label for="issue_number">Issue Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="period_covered" type="date" placeholder="Period Covered" value="{{$periodicals->period_covered}}" name="period_covered" required/>
                        <label for="period_covered">Period Covered</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-control" name="availability_status" id="availability_status" required>
                            @if ($periodicals->availability_status == 'On-hold')
                                <option value="{{$periodicals->availability_status}}" selected>{{$periodicals->availability_status}}</option>
                                <option value="Borrowed">Borrowed</option>
                                <option value="Available">Available</option>
                            @elseif($periodicals->availability_status == 'Borrowed')
                                <option value="{{$periodicals->availability_status}}" selected>{{$periodicals->availability_status}}</option>
                                <option value="On-hold">On-hold</option>
                                <option value="Available">Available</option>
                            @else
                                <option value="{{$periodicals->availability_status}}" selected>{{$periodicals->availability_status}}</option>
                                <option value="On-hold">On-hold</option>
                                <option value="Borrowed">Borrowed</option>
                            @endif
                        </select>
                        <label for="availability_status">Availability Status (select one)</label>
                    </div>    

                    <div class="col-md-4 mx-auto">
                        <a href="/periodicals" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>
