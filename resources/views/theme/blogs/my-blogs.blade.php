@extends('theme.master')
@section('title', 'My Blogs')
@section('content')

    @include('theme.partial.hero', ['title' => 'My Blogs'])

    <!-- ================ contact section start ================= -->
    @if (session('blog-status'))
        <script>
            alert('{{ session('blog-status') }}');
        </script>
    @endif
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($blogs) > 0)
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>
                                            <a href="{{ route('blogs.show', ['blog' => $blog]) }}"
                                                target="_blank">{{ $blog->title }}</a>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-primary mr-2">Edit</a>
                                            <form id="del-form" action="{{ route('blogs.destroy',['blog'=>$blog]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="#" id="del-link" class="btn btn-sm btn-danger mr-2">Delete</a>
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    @if (count($blogs) > 0)
                        {{ $blogs->render('pagination::bootstrap-4') }}
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
