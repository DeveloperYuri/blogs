@extends('layouts.app')

@section('content')
    <!-- Detail Start -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex flex-column text-left mb-3">
                    <p class="section-title pr-5">
                        <span class="pr-2">Blog Detail Page</span>
                    </p>
                    <h1 class="mb-3">{{ $getRecord->title }}</h1>
                    <div class="d-flex">
                        <p class="mr-3"><i class="fa fa-user text-primary"></i> {{ $getRecord->user_name }}</p>
                        <p class="mr-3">
                            <a href="{{ url($getRecord->category_slug) }}"><i class="fa fa-folder text-primary"></i>
                                {{ $getRecord->category_name }}</a>
                        </p>
                        <p class="mr-3"><i class="fa fa-comments text-primary"></i> 15</p>
                    </div>
                </div>
                <div class="mb-5">
                    @if (!empty($getRecord->getImage()))
                        <img style="max-height: 574px;object-fit:cover;" class="img-fluid rounded w-100 mb-4"
                            src="{{ $getRecord->getImage() }}" alt="Image" />
                    @endif

                    {!! $getRecord->description !!}


                    <!-- Related Post -->
                    @if (!empty($getRelatedPost->count()))
                        <div class="mb-5 mx-n3">
                            <h2 class="mb-4 ml-3">Related Post</h2>
                            <div class="owl-carousel post-carousel position-relative">
                                @foreach ($getRelatedPost as $related)
                                    <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mx-3">
                                        <img class="img-fluid" src="{{ $related->getImage() }}"
                                            style="width: 80px; height: 80px" />
                                        <div class="pl-3">
                                            <a href="{{ url($related->slug) }}">
                                                <h5 class="">{!! strip_tags(Str::substr($related->title, 0, 20)) !!}...</h5>
                                            </a>
                                            <div class="d-flex">
                                                <small class="mr-3"><i class="fa fa-user text-primary"></i>
                                                    {{ $related->user_name }}</small>
                                                <small class="mr-3">
                                                    <a href="{{ url($related->category_slug) }}"><i class="fa fa-folder text-primary"></i>{{ $related->category_name }}</a></small>
                                                <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Comment List -->
                    <div class="mb-5">
                        <h2 class="mb-4">3 Comments</h2>
                        <div class="media mb-4">
                            <img src="{{ asset('front/img/user.jpg') }}" alt="Image"
                                class="img-fluid rounded-circle mr-3 mt-1" style="width: 45px" />
                            <div class="media-body">
                                <h6>
                                    John Doe <small><i>01 Jan 2045 at 12:00pm</i></small>
                                </h6>
                                <p>
                                    Diam amet duo labore stet elitr ea clita ipsum, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores
                                    sed sed eirmod ipsum. Gubergren clita aliquyam consetetur
                                    sadipscing, at tempor amet ipsum diam tempor consetetur at
                                    sit.
                                </p>
                                <button class="btn btn-sm btn-light">Reply</button>
                            </div>
                        </div>
                        <div class="media mb-4">
                            <img src="{{ asset('front/img/user.jpg') }}" alt="Image"
                                class="img-fluid rounded-circle mr-3 mt-1" style="width: 45px" />
                            <div class="media-body">
                                <h6>
                                    John Doe <small><i>01 Jan 2045 at 12:00pm</i></small>
                                </h6>
                                <p>
                                    Diam amet duo labore stet elitr ea clita ipsum, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores
                                    sed sed eirmod ipsum. Gubergren clita aliquyam consetetur
                                    sadipscing, at tempor amet ipsum diam tempor consetetur at
                                    sit.
                                </p>
                                <button class="btn btn-sm btn-light">Reply</button>
                                <div class="media mt-4">
                                    <img src="{{ asset('front/img/user.jpg') }}" alt="Image"
                                        class="img-fluid rounded-circle mr-3 mt-1" style="width: 45px" />
                                    <div class="media-body">
                                        <h6>
                                            John Doe <small><i>01 Jan 2045 at 12:00pm</i></small>
                                        </h6>
                                        <p>
                                            Diam amet duo labore stet elitr ea clita ipsum, tempor
                                            labore accusam ipsum et no at. Kasd diam tempor rebum
                                            magna dolores sed sed eirmod ipsum. Gubergren clita
                                            aliquyam consetetur, at tempor amet ipsum diam tempor at
                                            sit.
                                        </p>
                                        <button class="btn btn-sm btn-light">Reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comment Form -->
                    <div class="bg-light p-5">
                        <h2 class="mb-4">Leave a comment</h2>
                        <form>
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name" />
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email" />
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" class="form-control" id="website" />
                            </div>

                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Leave Comment" class="btn btn-primary px-3" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <!-- Search Form -->
                <div class="mb-5">
                    <form action="{{ url('blog') }}" method="get">
                        <div class="input-group">
                            <input name="q" type="text" required class="form-control form-control-lg"
                                placeholder="Keyword" />
                            <div class="input-group-append">
                                <button class="input-group-text bg-transparent text-primary"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Category List -->
                <div class="mb-5">
                    <h2 class="mb-4">Categories</h2>
                    <ul class="list-group list-group-flush">
                        @foreach ($getCategory as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="{{ url($category->slug) }}">{{ $category->name }}</a>
                                <span class="badge badge-primary badge-pill">{{ $category->totalBlog() }}</span>
                            </li>
                        @endforeach
                </div>

                <!-- Single Image -->
                <div class="mb-5">
                    <img src="{{ asset('front/img/blog-1.jpg') }}" alt="" class="img-fluid rounded" />
                </div>

                <!-- Recent Post -->
                <div class="mb-5">
                    <h2 class="mb-4">Recent Post</h2>

                    @foreach ($getRecentPost as $recent)
                        <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mb-3">
                            @if (!empty($recent->getImage()))
                                <img class="img-fluid" src="{{ $recent->getImage() }}"
                                    style="width: 80px; height: 80px" />
                            @endif

                            <div class="pl-3">
                                <a href="{{ url($recent->slug) }}">
                                    <h5 class="">{!! strip_tags(Str::substr($recent->title, 0, 20)) !!}...</h5>
                                </a>
                                <div class="d-flex">
                                    <small class="mr-3"><i class="fa fa-user text-primary"></i>
                                        {{ $recent->user_name }}</small>
                                    <small class="mr-3"><i class="fa fa-folder text-primary"><a href="{{ url($recent->category_slug) }}"></i>
                                        {{ $recent->category_name }}</a></small>
                                    <small class="mr-3"><i class="fa fa-comments text-primary"></i> 0 </small>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- Single Image -->
                <div class="mb-5">
                    <img src="{{ asset('front/img/blog-2.jpg') }}" alt="" class="img-fluid rounded" />
                </div>

                <!-- Tag Cloud -->
                @if (!empty($getRecord->getTag->count()))
                    <div class="mb-5">
                        <h2 class="mb-4">Tag Cloud</h2>
                        <div class="d-flex flex-wrap m-n1">
                            @foreach ($getRecord->getTag as $tag)
                                <a href="{{ url('blog?q=' . $tag->name) }}"
                                    class="btn btn-outline-primary m-1">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Single Image -->
                <div class="mb-5">
                    <img src="{{ asset('front/img/blog-3.jpg') }}" alt="" class="img-fluid rounded" />
                </div>

                <!-- Plain Text -->
                <div>
                    <h2 class="mb-4">Plain Text</h2>
                    Aliquyam sed lorem stet diam dolor sed ut sit. Ut sanctus erat ea
                    est aliquyam dolor et. Et no consetetur eos labore ea erat voluptua
                    et. Et aliquyam dolore sed erat. Magna sanctus sed eos tempor rebum
                    dolor, tempor takimata clita sit et elitr ut eirmod.
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->
@endsection
