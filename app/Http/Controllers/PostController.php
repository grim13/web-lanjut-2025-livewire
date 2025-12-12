<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with([
                'user:id,email,name', 
                'feature_image:id,post_id,feature_image',
                'categories:id,category',
            ])
            ->select('id', 'user_id', 'title')
            ->paginate(10);
        return view('post.index', compact('posts'));
    }

    public function add()
    {
        $categories = Category::all();
        return view('post.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'content' => 'required|string',
            'categories' => 'required|array',
            'feature_image' => 'nullable|image|max:2048',
        ]);
        $post = new Post();
        $post->user_id = auth()->id();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->save();
        $post->categories()->sync($request->categories);
        if ($request->hasFile('feature_image')) {
            $path = $request->file('feature_image')->store('feature_images', 'public');
            $post->feature_image()->create([
                'feature_image' => $path,
            ]);
        }
        return redirect()->route('post')->with('success', 'Post created successfully.');
    }

    public function get()
    {
        $user = User::with([
            'posts:id,user_id,title',
            'posts.feature_image:id,post_id,feature_image',
            'posts.categories:id,category',
        ])->select('id','email','name')->find(1);
        return $user;
    }

    
    #tugas
    public function CatagoryPosts()
    {
        $catagory = Catagory::where('slug', 'technology')->first();
        return $category;

        /*
        {
            "id": 1,
            "slug": "technology",
            "category": "Technology",
            "posts": [
                {
                    "id": 5,
                    "title": "The Future of AI: Trends to Watch in 2025",
                    "feature_image": {
                        "id": 5,
                        "post_id": 5,
                        "feature_image": "feature_images/ai_future.jpg"
                    },
                    user: {
                        "id": 2,
                        "email": "a@a.com"
                        "name": "User A"
                    }
                },
                {
                    "id": 12,
                    "title": "Top 10 Programming Languages to Learn in 2025",
                    "feature_image": {
                        "id": 12,
                        "post_id": 12,
                        "feature_image": "feature_images/top_languages.jpg"
                    },
                    user: {
                        "id": 2,
                        "email": "a@a.com"
                        "name": "User A"
                    }
                }
            ]
        }
        */
    }
}
