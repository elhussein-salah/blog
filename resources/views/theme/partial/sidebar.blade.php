@php

    $categories = App\Models\Category::orderBy('name', 'asc')->get();

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
                                @foreach ($categories as $category )
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>{{ $category->name }}</p>
                                        <p>(03)</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        @endif

                        <div class="single-sidebar-widget popular-post-widget">
                            <h4 class="single-sidebar-widget__title">Recent Post</h4>
                            <div class="popular-post-list">
                                <div class="single-post-list">
                                    <div class="thumb">
                                        <img class="card-img rounded-0" src="{{ asset('assets') }}/img/blog/thumb/thumb1.png" alt="">
                                        <ul class="thumb-info">
                                            <li><a href="#">Adam Colinge</a></li>
                                            <li><a href="#">Dec 15</a></li>
                                        </ul>
                                    </div>
                                    <div class="details mt-20">
                                        <a href="blog-single.html">
                                            <h6>Accused of assaulting flight attendant miktake alaways</h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="single-post-list">
                                    <div class="thumb">
                                        <img class="card-img rounded-0" src="{{ asset('assets') }}/img/blog/thumb/thumb2.png" alt="">
                                        <ul class="thumb-info">
                                            <li><a href="#">Adam Colinge</a></li>
                                            <li><a href="#">Dec 15</a></li>
                                        </ul>
                                    </div>
                                    <div class="details mt-20">
                                        <a href="blog-single.html">
                                            <h6>Tennessee outback steakhouse the
                                                worker diagnosed</h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="single-post-list">
                                    <div class="thumb">
                                        <img class="card-img rounded-0" src="{{ asset('assets') }}/img/blog/thumb/thumb3.png" alt="">
                                        <ul class="thumb-info">
                                            <li><a href="#">Adam Colinge</a></li>
                                            <li><a href="#">Dec 15</a></li>
                                        </ul>
                                    </div>
                                    <div class="details mt-20">
                                        <a href="blog-single.html">
                                            <h6>Tennessee outback steakhouse the
                                                worker diagnosed</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Blog Post Siddebar -->
