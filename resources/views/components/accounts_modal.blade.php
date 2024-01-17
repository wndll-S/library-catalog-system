        <!-- dri ang modal-->
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Add an Admin Account</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off" action="/store/account" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control" id="username" type="text" placeholder="Username" name="username" required/>
                            <label for="username">Username</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="Email" name="email" required/>
                            <label for="email">Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="password" type="password" placeholder="Password" name="password" required/>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" name="account_type" id="account_type" required>
                                <option value="Super-Admin" >Super Admin</option>
                                <option value="Catalog-Manager">Catalog Manager</option>
                                <option value="Dashboard-Viewer" selected>Dashboard Viewer</option>
                            </select>
                            <label for="account_type">Account Type (select one)</label>
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