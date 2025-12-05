<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{
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
