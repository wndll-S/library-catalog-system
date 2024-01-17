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
            <form autocomplete="off" action="/update/book/{{$book->id}}" method="POST">
                @method('put')
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control" id="title" type="text" placeholder="Book Title" name="title" value="{{$book->title}}" required/>
                    <label for="title">Book Title</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="author" type="text" placeholder="Author" name="author" value="{{$book->author}}" required/>
                    <label for="author">Author</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-control" name="year_published" id="year_published" required>
                            <option value="{{$book->year_published}}" selected>{{$book->year_published}}</option>
                        @for ($year = 2023; $year >= 1900; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                    <label for="year_published">Publication Year</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="call_number" type="text" placeholder="Call Number" name="call_number" value="{{$book->call_number}}" required/>
                    <label for="call_number">Call Number</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-control" name="genre_id" id="genre_id" required>
                            <option value="{{$book->genre_id}}">{{$book->genre->title}}</option>
                        @foreach ($genre as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                    </select>
                    <label for="genre_id">Genre (select one)</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-control" name="availability_status" id="availability_status" required>
                        @if ($book->availability_status == 'On-hold')
                            <option value="{{$book->availability_status}}" selected>{{$book->availability_status}}</option>
                            <option value="Borrowed">Borrowed</option>
                            <option value="Available">Available</option>
                        @elseif($book->availability_status == 'Borrowed')
                            <option value="{{$book->availability_status}}" selected>{{$book->availability_status}}</option>
                            <option value="On-hold">On-hold</option>
                            <option value="Available">Available</option>
                        @else
                            <option value="{{$book->availability_status}}" selected>{{$book->availability_status}}</option>
                            <option value="On-hold">On-hold</option>
                            <option value="Borrowed">Borrowed</option>
                        @endif
                    </select>
                    <label for="availability_status">Availability Status (select one)</label>
                </div>
                <div class="col-md-4 mx-auto">
                    <a href="/books" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
