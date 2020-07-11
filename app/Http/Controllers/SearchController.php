<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(){
		return view('search');
	}

	public function search(Request $request){
		
		/*TITLE FILTER*/
		if($request->has('title')){
			$output="";
			$posts=DB::table('posts')
				->where('title','LIKE','%'.$request->title."%")
				->join('categories', 'posts.category_id', '=', 'categories.id')
				->select('categories.*', 'posts.*')
				->get();
			if($posts){
				foreach ($posts as $key => $post) {
					$output.='<div class="col-xl-4 col-md-12 mb-1">';
						$output.='<div class="card">';
							$output.='<img class="card-img-top" src="/api/post/image/'.$post->image.'" alt="Card image cap">';
							$output.='<div class="card-body">';
								$output.='<h5 class="card-title">'.$post->title.'</h5>';
								$output.='<p class="card-text">'.substr($post->content, 0,  60).'...</p>';
							$output.='</div>';
						$output.='</div>';
					$output.='</div>';
				}
				return Response($output);
   			}
   		}

   		/*CATEGORY FILTER*/
   		if($request->has('category')){
   			$output="";
   			$postsByCategory=DB::table('posts')
   				->where('category_id','LIKE','%'.$request->category."%")
   				->get();
   			if($postsByCategory){
				foreach ($postsByCategory as $key => $post) {
					$output.='<div class="col-xl-4 col-md-12 mb-1">';
						$output.='<div class="card">';
							$output.='<img class="card-img-top" src="/api/post/image/'.$post->image.'" alt="Card image cap">';
							$output.='<div class="card-body">';
								$output.='<h5 class="card-title">'.$post->title.'</h5>';
								$output.='<p class="card-text">'.substr($post->content, 0,  60).'...</p>';
							$output.='</div>';
						$output.='</div>';
					$output.='</div>';
				}
				return Response($output);
   			}
   		}
   	}
}
