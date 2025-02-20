@extends('backend.layouts.app')

@section('style')
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('layouts._message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Account Setting</h5>

                        <!-- Vertical Form -->
                        <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-12">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $getUser->name }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" readonly class="form-control" name="email" value="{{ $getUser->email }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Profile</label>
                                <input type="file" class="form-control" name="profile_pic">
                                <img src="{{ $getUser->getProfile() }}" alt="profile_picture" style="margin-top: 5px; height:100px; width:100px">
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Setting</button>
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
