<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Category;
use App\Models\Tag;
use App\Models\PostsTag;
use App\Http\Controllers\TagController;
use App\Models\PostsCategory;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FirebaseDBController;
use App\Http\DAO\CategoryDao;
use App\Http\DAO\PostDao;
use App\Http\DAO\TagsDao;
use App\Http\DAO\PostTagsDao;
use App\Models\PostFile;
use PDF;
use Illuminate\Support\Facades\Storage;

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
        $categories = Category::where('id', '!=', "")->get();

        foreach ($categories as $key => $value) {
            $cantidadPosts = Post::where('category_id', 'like', $value->id)->count();
            $value["postsCounts"] = $cantidadPosts;
        }
        foreach ($posts as $key => $value) {
            $comentarios = Comment::where('posts_id', 'like', $value->id)->count();
            $value["comentsCount"] = $comentarios;
            $likesCount = Like::where('post_id', 'like', $value->id)->count();
            $value["likesCount"] = $likesCount;
            $category = Category::where('id', 'like', $value->category_id)->get();
            $value["category_name"] = $category[0]->name;
            $postTags = PostsTag::where('posts_id', 'like', $value->id)->get();

            $tags = [];
            foreach ($postTags as $key_tagPost => $value_tagPost) {
                $tagRecord = Tag::where('id', 'like', $value_tagPost->tags_id)->get();
                $tagRecord_len = Tag::where('id', 'like', $value_tagPost->tags_id)->count();
                if ($tagRecord_len > 0) {
                    foreach ($tagRecord as $key_tag => $value_tag) {
                        $nuevoValor = array(
                            'name' => $value_tag->name,
                        );
                        array_push($tags, $nuevoValor);
                    }
                }
            }
            $value["tags_names"] = $tags;

            $userLikesPost = Like::where('post_id', 'like', $value->id)->where('user_id', Auth::id())->count();
            $cero = 0;
            if ($userLikesPost > $cero) {
                $value["userLikesPost"] = true;
            } else {
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

        // $categories = json_decode($category = Category::where('id', '!=', "")->get());
        $categories = Category::where('id', '!=', "")->get();
        $ArrayCategories = [];
        $nuevaCategoria = array(
            'name' => '-- Seleccione una opción --',
            'id' => ''
        );
        array_push($ArrayCategories, $nuevaCategoria);

        foreach ($categories as $key => $value) {
            // $cantidadPosts = Post::where('category_id', 'like', $value -> id )->count();
            $nuevaCategoria = array(
                'name' => $value->name,
                'id' => $value->id
            );
            array_push($ArrayCategories, $nuevaCategoria);
        }
        $options = array_column($ArrayCategories, 'name', 'id');

        $tags_data["tags"] = json_decode(Tag::get(["name", "id"]));
        $tags_data = array_column($tags_data["tags"], 'name', 'id');

        return view('post.create', compact('post', "options", "tags_data"));
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

        $Tags = $request->Tags;
        $Tags = implode(',', $Tags);
        $Tags = explode(",", $Tags);
        $arrayTags = [];

        $post_id = $post->id;

        $files_count = $request->files_count;
        echo ($files_count);
        foreach (range(1, $files_count) as $number) {
            echo $number;
            $image = $request->file('file_' . $number);
            $imageReference = FirebaseDBController::uploadFile($image, $post_id);
            $postFile = PostFile::create([
                "post_id" => $post_id,
                "file_name" => $image->getClientOriginalName(),
                "file_url_fb" => $imageReference,
            ]);
        }




        foreach ($Tags as $key => $value) {
            $nuevoValor = array(
                'category_id' => $value,
                'post_id' => $post_id
            );
            $tags = PostsTag::create([
                "posts_id" => $post_id,
                "tags_id" => $value,
            ]);
            array_push($arrayTags, $nuevoValor);
        }


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

        $postTags = PostsTag::where('posts_id', 'like', $id)->get();

        $postFiles = PostFile::where('post_id', 'like', $id)->get();

        $tags = [];
        $files_ = [];
        foreach ($postFiles as $key_tpostFiles => $value_postFile) {
            $nuevoValor = array(
                'name' => $value_postFile->file_name,
                'url' => $value_postFile->file_url_fb,
            );
            array_push($files_, $nuevoValor);
        }
        foreach ($postTags as $key_tagPost => $value_tagPost) {
            $tagRecord = Tag::where('id', 'like', $value_tagPost->tags_id)->get();
            $tagRecord_len = Tag::where('id', 'like', $value_tagPost->tags_id)->count();
            if ($tagRecord_len > 0) {
                foreach ($tagRecord as $key_tag => $value_tag) {
                    $nuevoValor = array(
                        'name' => $value_tag->name,
                    );
                    array_push($tags, $nuevoValor);
                }
            }
        }
        $post["tags_names"] = $tags;
        $post["files"] = $files_;

        $category = Category::where('id', 'like', $post->category_id)->get();
        $post["category_name"] = $category[0]->name;

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
        $post = PostDao::searchById($id);
        if($post->success == true){
            $post = $post->detail;
        }else{
            return redirect()->route('categories.index')->with('error', $post->message);
        }

        $fetchCategories = CategoryDao::getAllCategories();
        if ($fetchCategories->success == true) {
            $options = $fetchCategories->detail;
        } else {
            return redirect()->route('categories.index')->with('error', $fetchCategories->message);
        }

        $tags_data = TagsDao::getAllTags();
        if ($tags_data->success == true) {
            $tags_data = $tags_data->detail;
        } else {
            return redirect()->route('categories.index')->with('error', $tags_data->message);
        }
        
        
        $tagsData = PostTagsDao::SearchByPost($post->id);
        if($tagsData->success == true){
            $tagsData = $tagsData->detail;
            $selectedTags = [];
            foreach ($tagsData as $key => $value) {
                array_push($selectedTags, $value->tags_id);
            }
            $post["Tags"] = $selectedTags;
        }else{
            return redirect()->route('categories.index')->with('error', $tagsData->message);
        }
        

        return view('post.edit', compact('post', 'options', 'tags_data'));
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

        $Tags = $request->Tags;
        $Tags = implode(',', $Tags);
        $Tags = explode(",", $Tags);
        $arrayTags = [];

        $post_id = $post->id;

        $postTags = PostsTag::where('posts_id', 'like', $post_id)->get();

        $selectedTags = [];
        foreach ($postTags as $key => $value) {
            $postTagDeleted = PostsTag::find($value->id)->delete();
        }

        foreach ($Tags as $key => $value) {
            $nuevoValor = array(
                'category_id' => $value,
                'post_id' => $post_id
            );
            $tags = PostsTag::create([
                "posts_id" => $post_id,
                "tags_id" => $value,
            ]);
            array_push($arrayTags, $nuevoValor);
        }
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

    public function pdf($id)
    {
        $post = Post::find($id);

        $pdf = PDF::loadView('post.pdf', ["post" => $post]);
        return $pdf->stream();

        // $pdf = Pdf::loadView('post.pdf', ["post"=>$post]);
        // return $pdf->download($post->title.'.pdf');
    }
    public function download($id)
    {
        $post = Post::find($id);

        // $pdf = PDF::loadView('post.pdf', ["post"=>$post]);
        // return $pdf->stream();

        $pdf = PDF::loadView('post.pdf', ["post" => $post]);
        return $pdf->download($post->title . '.pdf');
    }
}
