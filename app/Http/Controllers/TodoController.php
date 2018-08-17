<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->_getRecord();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $todo = Todo::create($request->all());

        if ($todo) {
            return $this->_getRecord();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::findOrFail($id);
        return $todo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $task, $id)
    {
        $task = Todo::findOrFail($id);
        return request()->json(200, $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */

     //ganti Request dengan TodoRequest -> untuk validasi
    public function update(TodoRequest $request, $id)
    {
        $task = Todo::findOrFail($id);
        $task->update($request->all());

        if ($task) {  
            return $this->_getRecord();
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Todo::findOrFail($id);
       if ($task->delete()) return $this->_getRecord();
       else return response()->json(425, ['delete' => 'error deleting record']);

    }

    private function _getRecord() {
        $tasks = Todo::orderBy('created_at', 'desc')->paginate(10);
        return request()->json(200, $tasks);
    }
}
