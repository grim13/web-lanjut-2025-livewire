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

        // $user_posts = $user->posts;
        return $user;
    }
}
