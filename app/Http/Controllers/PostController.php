<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $title = 'Results';
        $posts = Post::where([
            ['age_bracket', '!=', null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('posts.education_level', 'like', '%'.$search.'%')
                        ->orWhere('posts.age_bracket', 'like', '%'.$search.'%')
                        ->orWhere('posts.employment_status', 'like', '%'.$search.'%')

                        ->get();
                }
            }],
        ])
            ->paginate(5);
        // $posts = Post::all();

        return view('others.posts.posts', compact('posts', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $flag = 'new';
        $route = '/posts/create';

        return view('others.posts.form', ['flag' => $flag, 'route' => $route]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Auth::check()) {
            return redirect('/login');
        } else {
            //
            $valid = $request->validate([
                'age_bracket' => 'required',
                'education_level' => 'required',
                'employment_status' => 'required',
                'meals_before' => 'required',
                'meals_during' => 'required',
                'shelterDisturbance' => 'required',
                'disagreements' => 'required',
                'disrespect' => 'required',
                'fighting' => 'required',
                'quarrels' => 'required',
                'seperation' => 'required',
                'emotional_distress' => 'required',
                'outcomeBehaviours' => 'required',

            ]);

            $post = Post::create([
                'age_bracket' => $request->age_bracket,
                'education_level' => $request->education_level,
                'employment_status' => $request->employment_status,
                'meals_before' => $request->meals_before,
                'meals_during' => $request->meals_during,
                'shelterDisturbance' => $request->shelterDisturbance,
                'disagreements' => $request->disagreements,
                'disrespect' => $request->disrespect,
                'fighting' => $request->fighting,
                'quarrels' => $request->quarrels,
                'seperation' => $request->seperation,
                'emotional_distress' => $request->emotional_distress,
                'outcomeBehaviours' => $request->outcomeBehaviours,
                'user_id' => auth()->user()->id,
            ]);

            return redirect('/posts');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);

        return view('others.posts.single', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // public function search(Request $request){

    //     $title = 'peter';

    //     // $posts = Post::all();
    //     $posts = Post::where([
    //         ['name','!=', Null],
    //         [function($query) use ($request){
    //             if(($search = $request->search)){
    //                 $query->orWhere('name', 'like', '%'.$search.'%')->orWhere('age', 'like', '%'.$search.'%')->orWhere('sex', 'like', '%'.$search.'%')->orWhere('tel', 'like', '%'.$search.'%')->get();
    //             }
    //         }]
    //     ])->paginate(5);

    //     return view('others.posts.posts',compact('posts'));

    // }
}
