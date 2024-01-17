        <!-- dri ang modal-->
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Periodicals Information</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off" action="/store/periodicals" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="accession_number" type="text" placeholder="Accession Number" name="accession_number" required/>
                            <label for="accession_number">Accession Number</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="title" type="text" placeholder="Title" name="title" required/>
                            <label for="title">Title</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="volume_number" type="text" placeholder="Volume Number" name="volume_number" required/>
                            <label for="volume_number">Volume Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="issue_number" type="text" placeholder="Issue Number" name="issue_number" required/>
                            <label for="issue_number">Issue Number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="period_covered" type="date" placeholder="Period Covered" name="period_covered" required/>
                            <label for="period_covered">Period Covered</label>
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