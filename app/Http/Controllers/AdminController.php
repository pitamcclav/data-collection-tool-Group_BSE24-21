<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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

        return view('admin.posts.posts', compact('title', 'posts'));
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
        $route = '/admin/posts/create';

        return view('admin.posts.form', ['flag' => $flag, 'route' => $route]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            'direspect' => $request->disrespect,
            'fighting' => $request->fighting,
            'quarrels' => $request->quarrels,
            'seperation' => $request->seperation,
            'emotional_distress' => $request->emotional_distress,
            'outcomeBehaviours' => $request->outcomeBehaviours,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/admin/posts');
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

        return view('admin.posts.single', ['post' => $post]);
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
        $flag = 'modify';
        $route = '/admin/posts/update/'.$id;
        $post = Post::find($id);

        return view('admin.posts.form', ['flag' => $flag, 'route' => $route, 'post' => $post]);
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
        $post = Post::find($id);
        $request->validate([
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

        // $post->name=$request->name;
        // $post->tel=$request->tel;
        // $post->age=$request->age;
        // $post->sex=$request->sex;
        // $post->education=$request->education;
        // $post->employment=$request->employment;
        // $post->trad_f_role=$request->tf;
        // $post->trad_m_role=$request->tm;
        // $post->covid_f_role=$request->cf;
        // $post->covid_m_role=$request->cm;
        // $post->effects_f_role=$request->ef;
        // $post->effects_m_role=$request->em;
        // $post->intv_leaders=$request->sl;
        // $post->intv_fathers=$request->sf;
        // $post->intv_mothers=$request->sm;

        $post->update($request->all());

        return redirect('/admin/posts')->with('success', 'Post updated Successfully!');
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
        $post = Post::find($id);
        $post->delete();

        return redirect('/admin/posts');
    }
}
