@php

    $categories = App\Models\Category::orderBy('name', 'asc')->get();
    $recentBlogs = App\Models\Blog::latest()->take(3)->get();

@endphp
<!-- Start Blog Post Siddebar -->
<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            <form action="{{ route('subscriber.store') }}" method="post">
                <div class="form-group mt-30">
                    <div class="col-autos">
                        @csrf
                        <input type="email" class="form-control" name="email" id="inlineFormInputGroup"
                            placeholder="Enter email" onfocus="this.placeholder = ''" value="{{ old('email') }}"
                            onblur="this.placeholder = 'Enter email'">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        @if (session('status'))
                            <div class="text-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
                <button type="submit" class="bbtns d-block mt-20 w-100">Subcribe</button>
            </form>
        </div>
        @if (count($categories) > 0)

            <div class="single-sidebar-widget post-category-widget">
                <h4 class="single-sidebar-widget__title">Catgory</h4>
                <ul class="cat-list mt-20">
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('theme.category', ['id' => $category->id]) }}"
                                class="d-flex justify-content-between">
                                <p>{{ $category->name }}</p>
                                <p>({{ count($category->blog) }})</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (count($recentBlogs) > 0)
        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Recent Post</h4>
            <div class="popular-post-list">
                    @foreach ($recentBlogs as $blog)
                        <div class="single-post-list">
                            <div class="thumb">
                                <img class="card-img rounded-0" src="{{ asset("storage/blogs/$blog->image") }}"
                                    alt="">
                                <ul class="thumb-info">
                                    <li><a href="#">{{ $blog->user->name }}</a></li>
                                    <li><a href="#">{{ $blog->created_at->format('M j') }}</a></li>
                                </ul>
                            </div>
                            <div class="details mt-20">
                                <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                    <h6>432</h6>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</div>
<!-- End Blog Post Siddebar -->
