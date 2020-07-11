<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use App\Post;
use App\Category;

class PostController extends Controller
{
    public function __construct(){
    	$this->middleware('api.auth', ['except' => ['index','getImage']]);
    }

    /*JSON RETURN*/
    /*public function index(){
    	$posts = Post::all()->load('Category');

    	return response()->json([
    		'code' => 200,
    		'status' => 'success',
    		'posts' => $posts
    	], 200);
    }*/
    public function index(){
    	//fetch 5 posts from database which are active and latest
	    $posts = Post::all()->load('Category');
	    $categories = Category::all();
	    //page heading
	    //return home.blade.php template from resources/views folder
	    return view('list-posts')->withPosts($posts)->withCategories($categories);
	}

    public function getImage($filename){
    	$isset = Storage::disk('public')->exists($filename);

    	if($isset){
    		$file = Storage::disk('public')->get($filename);
    		return new Response($file,200);
    	} else {
    		$data = [
    			'code' => 404,
    			'status' => 'error',
    			'message' => 'La imagen no existe'
    		];
    	}

    	return response()->json($data, $data['code']);
    }
}
