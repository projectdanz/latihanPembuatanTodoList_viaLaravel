<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\todo;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $max_data = 5;

        if(request('search')){
            $data = todo::where('task' ,'like' ,'%'.request('search').'%')->paginate($max_data)->withQueryString();
        }else{
            $data = todo::orderby('task', 'asc')->paginate($max_data);
        }
        return view("todo.app", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|min:3|max:25'
        ], [
            'task.required' => 'Isian task ini wajib diisikan',
            'task.min' => 'Minimal isian task 3 karakter',
            'task.max' => 'Maximal isian task 25 karakter',
        ]);

        $data = [
            'task'=>$request->input('task')
        ];

        todo::create($data);
        return redirect()->route('todo')->with('success', 'berhasil simpan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'task' => 'required|min:3|max:25'
    ], [
        'task.required' => 'Isian task ini wajib diisikan',
        'task.min' => 'Minimal isian task 3 karakter',
        'task.max' => 'Maximal isian task 25 karakter',
    ]);

    $data = [
        'task' => $request->input('task'),
        'is_done' => $request->input('is_done')
    ];

    todo::where('id', $id)->update($data);

    return redirect()->route('todo')->with('success', 'Berhasil menyimpan perbaikan data');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        todo::where('id', $id)->delete();
        return redirect()->route('todo')->with('success', 'Berhasil menghapus data!!');

    }
}
