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
                        <h5 class="card-title">Blog List (Total : {{ $getRecord->total() }})
                            <a href="{{ url('panel/blog/add') }}" class="btn btn-primary"
                                style="float: right; margin-top:-12px">Add New</a>
                        </h5>

                        <form class="row g-3" accept="get">
                            <div class="col-md-1" style="margin-bottom: 10px">
                                <label for="inputNanme4" class="form-label">ID</label>
                                <input type="text" name="id" value="{{ Request::get('id') }}" class="form-control" id="inputNanme4">
                            </div>
                            <div class="col-md-2" style="margin-bottom: 10px">
                                <label for="inputNanme4" class="form-label">Username</label>
                                <input type="text" name="username" value="{{ Request::get('username') }}" class="form-control" id="inputNanme4">
                            </div>
                            <div class="col-md-3" style="margin-bottom: 10px">
                                <label for="inputNanme4" class="form-label">Title</label>
                                <input type="text" name="title" value="{{ Request::get('title') }}" class="form-control" id="inputNanme4">
                            </div>
                            <div class="col-md-2" style="margin-bottom: 10px">
                                <label for="inputNanme4" class="form-label">Category</label>
                                <input type="text" name="category" value="{{ Request::get('category') }}" class="form-control" id="inputNanme4">
                            </div>
                            <div class="col-md-2" style="margin-bottom: 10px">
                                <label for="inputNanme4" class="form-label">Publish</label>
                                <select class="form-control" name="is_publish">
                                    <option value="">Select</option>
                                    <option {{ (Request::get('is_publish') == 1) ? 'selected' : '' }} value="1">Yes</option>
                                    <option {{ (Request::get('is_publish') == 100) ? 'selected' : '' }} value="100">No</option>
                                </select>
                            </div>
                            <div class="col-md-2" style="margin-bottom: 10px">
                                <label for="inputNanme4" class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="">Select</option>
                                    <option {{ (Request::get('status') == 1) ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ (Request::get('status') == 100) ? 'selected' : '' }} value="100">InActive</option>
                                </select>
                            </div>
                            <div class="col-md-2" style="margin-bottom: 10px">
                                <label for="inputNanme4" class="form-label">Start Date</label>
                                <input type="date" name="start_date" value="{{ Request::get('start_date') }}" class="form-control" id="inputNanme4">
                            </div>
                            <div class="col-md-2" style="margin-bottom: 10px">
                                <label for="inputNanme4" class="form-label">End Date</label>
                                <input type="date" name="end_date" value="{{ Request::get('end_date') }}" class="form-control" id="inputNanme4">
                            </div>
                            
                            <div class="col-md-2">
                                <label class="form-label" style="display: block">&nbsp;</label>
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href={{ url('panel/blog/list') }} class="btn btn-secondary">Reset</a>
                            </div>
                        </form>

                        <hr>

                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Meta Description</th>
                                    <th scope="col">Meta Keywords</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Publish</th>
                                    <th scope="col">Created Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($getRecord as $value)
                                    <tr>
                                        <th scope="row">{{ $value->id }}</th>
                                        <td>
                                            @if (!empty($value->getImage()))
                                                <img src="{{ $value->getImage() }}" alt=""
                                                    style="height: 100px; width:100px">
                                            @endif
                                        </td>
                                        <td>{{ $value->user_name }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->category_name }}</td>
                                        <td>{{ $value->meta_description }}</td>
                                        <td>{{ $value->meta_keywords }}</td>
                                        <td>{{ !empty($value->status) ? 'Active' : 'InActive' }}</td>
                                        <td>{{ !empty($value->is_publish) ? 'Yes' : 'No' }}</td>
                                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('panel/blog/edit/' . $value->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a onclick="return confirm('Are you sure you want delete record?')"
                                                href="{{ url('panel/blog/delete/' . $value->id) }}"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%">Record Not Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
