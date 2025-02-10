@extends('backend.layouts.app')

@section('style')
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New User</h5>

                        <!-- Vertical Form -->
                        <form class="row g-3" action="" method="post">
                            {{ csrf_field() }}
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputNanme4" name="name" required
                                    value="{{ $getRecord->name }}">
                                    <div style="color: red">{{ $errors->first('name') }} </div>

                            </div>

                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email" required
                                    value="{{ $getRecord->email }}">
                                    <div style="color: red">{{ $errors->first('email') }} </div>

                            </div>

                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" name="password">
                                <p style="margin-bottom: 0px;margin-top:5px;font-size:14px"> you want change password please fill new password</p>
                            </div>

                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
