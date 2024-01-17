@include('partials.head')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto centered-div p-4 rounded-4">
            <h1>Edit Admin Account</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form autocomplete="off" action="/update/account/{{$account->id}}" method="POST">
                @method('put')
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control" id="username" type="text" placeholder="Username" name="username" value="{{$account->username}}" required/>
                    <label for="username">Username</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="email" type="email" placeholder="Email" name="email" value="{{$account->email}}" required/>
                    <label for="email">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="password" type="password" placeholder="Password" name="password" value="{{$account->password}}" required/>
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-control" name="account_type" id="account_type" required>
                        @if($account->account_type == 'Super-Admin')
                            <option value="{{$account->account_type}}" selected>{{$account->account_type}}</option>
                            <option value="Catalog-Manager">Catalog Manager</option>
                            <option value="Dashboard-Viewer" >Dashboard Viewer</option>
                        @elseif($account->account_type == 'Catalog-Manager')
                            <option value="{{$account->account_type}}" selected>{{$account->account_type}}</option>
                            <option value="Super-Admin">Super-Admin</option>
                            <option value="Dashboard-Viewer" >Dashboard Viewer</option>
                        @else
                            <option value="{{$account->account_type}}" selected>{{$account->account_type}}</option>
                            <option value="Super-Admin">Super-Admin</option>
                            <option value="Catalog-Manager">Catalog Manager</option>
                        @endif

                        
                    </select>
                    <label for="account_type">Account Type (select one)</label>
                </div>
                <div class="col-md-4 mx-auto">
                    <a href="/accounts" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
