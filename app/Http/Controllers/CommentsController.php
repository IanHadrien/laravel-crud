<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Http\Requests\StoreCommentsRequest;
use App\Http\Requests\UpdateCommentsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comments::get();

        // return response()->json($users);

        return view('comments.index', [
            'comments' => $comments,
        ]);
    }

    public function create()
    {
        return view('comments.create');
    }

    public function store(Request $request)
    {
        // $data = $request->only(['name', 'comment']);

        $data = $request->validate(
            [
                'name'  => 'required||max:255|min:5',
                'comment' => 'required||max:255|min:5'
            ],
            [
                'name.required'  => 'Digite um nome para continuar',
                'comment.required' => 'Digite um comentario válido'
            ]
        );
        // dd($data);

        Comments::create($data);

        // return redirect()->back();
        return redirect()->back()->with('success', 'Dado cadastrado com sucesso!');
    }

    public function show($id)
    {
        $comment = Comments::find($id);

        return view('comments.show', [
            'comment' => $comment,
        ]);
    }

    public function edit($id)
    {
        $comment = Comments::find($id);

        return view('comments.edit', [
            'comment' => $comment,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'comment']);

        $comment = Comments::find($id);

        $comment->update($data);
        // return redirect()->back();
        return redirect()->back()->with('success', 'Dado editado com sucesso!');
    }

    public function destroy($id)
    {
        $comment = Comments::find($id);

        $comment->delete();
        return redirect()->back();
    }
}
