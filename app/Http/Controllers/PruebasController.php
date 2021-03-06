<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PruebasController extends Controller
{
    public function index(){
    	$titulo = 'Animales';
    	$animales = ['Perro','Gato','Leon'];

    	return view('pruebas.index', array(
    		'titulo'=>$titulo,
    		'animales'=>$animales,
    	));
    }

    public function testOrm(){
    	$posts = Post::all();
    	foreach($posts as $post){
    		echo "<h1>".$post->title."</h1>";
    		echo "<span style='color:grey;'>".$post->user->name." | ".$post->category->name."</span>";
    		echo "<p>".$post->content."</p>";
    		echo "<hr>";
    	} 

    	die();
    }
}
