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
                        <h5 class="card-title">Blog List
                            <a href="{{ url('panel/blog/add')}}" class="btn btn-primary" style="float: right; margin-top:-12px">Add New</a>
                        </h5>

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
                                        <img src="{{ $value->getImage() }}" alt="" style="height: 100px; width:100px">
                                        @endif
                                    </td>
                                    <td>{{ $value->user_name }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->category_name }}</td>
                                    <td>{{ $value->meta_description }}</td>
                                    <td>{{ $value->meta_keywords }}</td>
                                    <td>{{ !empty($value->status) ? 'Active' : 'InActive' }}</td>
                                    <td>{{ !empty($value->is_publish) ? 'Yes' : 'No' }}</td>
                                    <td>{{ date('d-m-Y H:i A', strtotime($value->created_at))  }}</td>
                                    <td>
                                        <a href="{{ url('panel/blog/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a onclick="return confirm('Are you sure you want delete record?')" href="{{ url('panel/blog/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
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
