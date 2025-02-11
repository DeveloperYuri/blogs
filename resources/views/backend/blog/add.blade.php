@extends('backend.layouts.app')

@section('style')
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Blog</h5>

                        <!-- Vertical Form -->
                        <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Title *</label>
                                <input type="text" class="form-control" id="inputNanme4" value="{{ old('title') }}"
                                    name="title" required>
                            </div>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Category *</label>
                                <select class="form-control" name="category_id" id="">
                                    <option value="">Select Category</option>
                                    @foreach ($getCategory as $value)
                                        <option value="{{ $value->id }}">{{ $value->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Image *</label>
                                <input type="file" class="form-control" id="inputNanme4" value="{{ old('image_file') }}"
                                    name="image_file" required>
                            </div>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Description *</label>
                                <textarea class="form-control tinymce-editor" name="description" id="" cols="30" rows="10"></textarea>
                            </div>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Tags</label>
                                <input type="text" class="form-control" id="inputNanme4" value="{{ old('tags') }}"
                                    name="tags">
                            </div>

                            

                            <hr>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Meta Description</label>
                                <textarea class="form-control" name="meta_description" id="" cols="30" rows="10"></textarea>
                            </div>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" id="inputNanme4" value="{{ old('meta_keywords') }}"
                                    name="meta_keywords">
                            </div>

                            <hr>

                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Publish *</label>
                                <select class="form-control" name="is_publish">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="inputPassword4" class="form-label">Status *</label>
                                <select class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">InActive</option>
                                </select>
                            </div>

                            <div class="col-12" style="margin-top: 30px">
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
