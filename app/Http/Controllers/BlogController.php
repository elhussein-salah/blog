<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{

    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('theme.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateBlogRequest $request)
    {
        if (!Auth::check())
            return abort('401');
        $data = $request->validated();
        // image upload
        // 1- get image
        $image = $request->image;
        // 2- change it's current name
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        // 3- move image to my project
        $image->storeAs('blogs', $imageName, 'public');
        // 4- save new name to database record
        $data['image'] = $imageName;
        $data['user_id'] = Auth::user()->id;

        Blog::create($data);

        return to_route("blogs.create")->with('blog-status', 'Your blog has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        // show comments in this $blog and paginate them by 5 records per page

        return view('theme.single-blog', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if (!Auth::check() || $blog->user_id != Auth::user()->id)
            return abort('401');

        $categories = Category::get();
        return view('theme.blogs.edit', compact('blog', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBlogRequest $request, Blog $blog)
    {
        if (!Auth::check() && $blog->user_id != Auth::user()->id)
            return abort('401');

        $data = $request->validated();
        if ($request->hasFile('image')) {
            // delete old image
            Storage::delete("public/blogs/$blog->image");
            // get image
            $image = $request->image;
            // change it's current name
            $imageName = time() . '-' . $image->getClientOriginalName();
            //move image to my project
            $image->storeAs('blogs', $imageName, 'public');
            // save new name to database record
            $data['image'] = $imageName;

        }
        $blog->update($data);
        return to_route("blogs.my-blogs", $blog)->with('blog-status', 'Your blog has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (!Auth::check() && $blog->user_id != Auth::user()->id)
            return abort('401');

        Storage::delete("public/blogs/$blog->image");
        $blog->delete();

        return redirect()->route('blogs.my-blogs')->with('blog-status', 'Your blog has been deleted successfully.');
    }
    public function myBlogs()
    {
        if (Auth::check()) {
            $blogs = Blog::where('user_id', Auth::user()->id)->paginate(10);
            return view('theme.blogs.my-blogs', compact('blogs'));
        }
        return abort('401');
    }




}
