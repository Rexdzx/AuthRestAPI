<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;

class ViewPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('create.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {


        $posts = Post::all();

        return view('export', [
            'posts' => $posts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', 'Data Tidak Valid');
        }

        auth()->user()->post()->create($request->all());


        return back()->with('success', 'Data Berhasil Dibuat');
    }

    public function cetak()
    {

        $posts = Post::all();

        $pdf = PDF::loadView('topdf', ['posts' => $posts]);
        return $pdf->download('data-posts.pdf');
    }


    // -------------- Untuk Yang View Cuma Sampai Create Data --------------------- //


    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'title' => 'required',
    //         'content' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return $validator->errors();
    //     }

    //     $post = Post::findOrFail($id);

    //     if (auth()->user()->id === $post->user_id) {
    //         $post->update($request->all());
    //         return response()->json([
    //             'message' => 'Data Berhasil Diupdate',
    //             'data' => $post,
    //         ], 200);
    //     }

    //     return response()->json([
    //         'message' => 'Unauthorized'
    //     ], 401);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $post = Post::findOrFail($id);

    //     if (auth()->user()->id === $post->user_id) {
    //         $post->delete();

    //         return response()->json([
    //             'message' => 'Data Berhasil Dihapus',
    //         ], 200);
    //     }

    //     return response()->json([
    //         'message' => 'Unauthorized'
    //     ], 401);
    // }

    // public function allposts()
    // {
    //     $posts = Post::all();

    //     return response()->json([
    //         'data' => $posts,
    //     ], 200);
    // }
}
