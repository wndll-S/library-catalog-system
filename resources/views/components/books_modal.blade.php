        <!-- dri ang modal-->
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Add a Book</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off" action="/store/books" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="title" type="text" placeholder="Book Title" name="title" required/>
                            <label for="title">Book Title</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="author" type="text" placeholder="Author" name="author" required/>
                            <label for="author">Author</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" name="year_published" id="year_published" required>
                                    <option value="2024" selected>2024</option>
                                @for ($year = 2023; $year >= 1900; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                            <label for="year_published">Publication Year</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="call_number" type="text" placeholder="Call Number" name="call_number" required/>
                            <label for="call_number">Call Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" name="genre_id" id="genre_id" required>
                                @foreach ($genres as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                            <label for="genre_id">Genre (select one)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" name="availability_status" id="availability_status" required>
                                <option value="On-hold" selected>On-hold</option>
                                <option value="Borrowed">Borrowed</option>
                                <option value="Available">Available</option>
                            </select>
                            <label for="availability_status">Availability Status (select one)</label>
                        </div>
                        
                        <!-- himuan modal-->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
              </div>
            </div>
        </div>