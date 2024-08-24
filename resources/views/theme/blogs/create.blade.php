@extends('theme.master')
@section('title','New blog')
@section('content')

@include('theme.partial.hero',['title'=>'New blog'])

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
        <div class="col-12">
            @if (session('blog-status'))
            <div class="text-success">
                {{ session('blog-status') }}
            </div>
            @endif
            <form action="{{ route('blogs.store') }}" class="form-contact contact_form"
                enctype="multipart/form-data" method="post" id="contactForm" novalidate="novalidate">

                @csrf
                <div class="form-group">
                    <input class="form-control border" name="title" type="text" placeholder="Enter blog's title" value="{{ old('title') }}">
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <input class="form-control border" name="subject"  type="text" placeholder="Enter blog's subject" {{ old('subject') }}>
                        <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                    </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control border" name="image" type="file">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <select class="form-control border" name="category_id" {{ old('category_id') }}>
                                <option value="">Select Category</option>
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <textarea class="w-100 border" name="description" cols="" rows="3"
                            type="text" placeholder="Enter blog description">{{ old("description") }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="form-group text-center text-md-right mt-3">
                    <button type="submit" class="button button--active button-contactForm">Post</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
