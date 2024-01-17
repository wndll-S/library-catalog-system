        <!-- dri ang modal-->
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Borrow Form</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off" id="form" action="" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="borrower_id_number" type="text" placeholder="Borrower's ID" name="borrower_id_number" required/>
                            <label for="borrower_id_number">Borrower's ID</label>
                        </div>
                        <input type="hidden" id="id" name="material_id" >
                        <div class="form-floating mb-3">
                            <input class="form-control" id="title" type="text" placeholder="Book Title" name="title" disabled/>
                            <label for="title">Book Title</label>
                        </div>
                        <div id="change">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="author" type="text" placeholder="Author" name="author" disabled/>
                                <label for="author">Author</label>
                            </div>
                            <div class="form-floating mb-3">
                                  <input class="form-control" id="call_number" type="text" placeholder="Call Number" name="call_number" disabled/>
                                  <label for="call_number">Call Number</label>
                            </div>
                        </div>
                        
                        <input type="hidden" value="Borrowed" name="availability_status">
                        
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