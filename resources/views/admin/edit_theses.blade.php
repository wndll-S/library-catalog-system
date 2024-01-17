@include('partials.head')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto centered-div p-4 rounded-4">
            <h1>Edit Theses Details</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form autocomplete="off" action="/update/theses/{{$theses->call_number}}" method="POST">
                @method('put')
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputAuthor" type="text" placeholder="Author" name="author" value="{{$theses->author}}" required/>
                    <label for="inputAuthor">Author</label>
                </div>
            
                <div class="form-floating mb-3">
                    <input class="form-control" id="title" type="text" placeholder="Title" name="title" value="{{$theses->title}}" required/>
                    <label for="title">Title</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-control" name="publication_year" id="publication_year" required>
                            <option value="{{$theses->publication_year}}" selected>{{$theses->publication_year}}</option>
                        @for ($year = 2023; $year >= 1900; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                    <label for="publication_year">Publication Year</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-control" name="subject_id" id="subject_id" required>
                            <option value="{{$theses->subject_id}}" selected>{{$theses->subject->title}}</option>
                        @foreach($subjects as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                    </select>
                    <label for="subject_id">Subject (select one)</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-control" name="availability_status" id="availability_status" required>
                        @if ($theses->availability_status == 'On-hold')
                            <option value="{{$theses->availability_status}}" selected>{{$theses->availability_status}}</option>
                            <option value="Borrowed">Borrowed</option>
                            <option value="Available">Available</option>
                        @elseif($theses->availability_status == 'Borrowed')
                            <option value="{{$theses->availability_status}}" selected>{{$theses->availability_status}}</option>
                            <option value="On-hold">On-hold</option>
                            <option value="Available">Available</option>
                        @else
                            <option value="{{$theses->availability_status}}" selected>{{$theses->availability_status}}</option>
                            <option value="On-hold">On-hold</option>
                            <option value="Borrowed">Borrowed</option>
                        @endif
                    </select>
                    <label for="availability_status">Availability Status (select one)</label>
                </div>
                <div class="col-md-4 mx-auto">
                    <a href="/theses" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
