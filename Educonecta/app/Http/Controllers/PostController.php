<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Category;
use App\Models\PostsCategory;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate();
        // foreach ($variable as $key => $value) {
        //     $comentarios = Comment::where('posts_id', 'like', '{{$post -> id}}')->count();
        //     $posts -> Comments = $comentarios
        // }
        $categories = Category::where('id', '!=', "" )->get();
        
        foreach($categories as $key=>$value){
            $cantidadPosts = Post::where('category_id', 'like', $value -> id )->count();
            $value["postsCounts"] = $cantidadPosts;
        }
        foreach($posts as $key=>$value){
            $comentarios = Comment::where('posts_id', 'like', $value -> id )->count();
            $value["comentsCount"] = $comentarios;
            $likesCount = Like::where('post_id', 'like', $value->id )->count();
            $value["likesCount"] = $likesCount;
            $category = Category::where('id', 'like', $value->category_id )->get();
            $value["category_name"] = $category[0]->name;
            
            $userLikesPost = Like::where('post_id', 'like', $value->id )->where('user_id', Auth::id())->count();
            $cero = 0;
            if($userLikesPost > $cero){
                $value["userLikesPost"] = true;
            }else{
                $value["userLikesPost"] = false;
            }
        }
        

        return view('post.index', compact('posts', "categories"))
            ->with('i', (request()->input('page', 1) - 1) * $posts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        
        $categories = json_decode(Http::accept('application/json')->get(url('api/fetch-categories')), true);
        $nuevaCategoria = array(
            'name' => '-- Seleccione una opción --',
            'id' => ''
        );
        array_push($categories['categories'], $nuevaCategoria);
        $options = array_column($categories['categories'], 'name', 'id');

        return view('post.create', compact('post',"options"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Post::$rules);

        $post = Post::create($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $categories = json_decode(Http::accept('application/json')->get(url('api/fetch-categories')), true);
        $nuevaCategoria = array(
            'name' => '-- Seleccione una opción --',
            'id' => ''
        );
        array_push($categories['categories'], $nuevaCategoria);
        $options = array_column($categories['categories'], 'name', 'id');
        return view('post.edit', compact('post','options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        request()->validate(Post::$rules);

        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request, Post $post)
    {
        $likes = Like::create([
            "post_id" => $post->id,
            "user_id" => $request->user_id,
        ]);
                
        return redirect()->route('posts.index');
    }
    public function dislike(Request $request, Post $post)
    {
        $data_like = Like::where('post_id', 'like', $request->post_id)->where('user_id', 'like', Auth::id())->get();
        $like = Like::find($data_like[0]->id)->delete();
                
        return redirect()->route('posts.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $post = Post::find($id)->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }

}
