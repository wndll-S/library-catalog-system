        <!-- dri ang modal-->
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Theses Information</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off" action="/store/theses" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputAuthor" type="text" placeholder="Author" name="author" required/>
                            <label for="inputAuthor">Author</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="title" type="text" placeholder="Title" name="title" required/>
                            <label for="title">Title</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" name="publication_year" id="publication_year" required>
                                    <option value="2024" selected>2024</option>
                                @for ($year = 2023; $year >= 1900; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                            <label for="publication_year">Publication Year</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" name="subject_id" id="subject_id" required>
                                @foreach($subjects as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                            <label for="subject_id">Subject (select one)</label>
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