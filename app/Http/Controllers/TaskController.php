<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return $tasks;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => ''
        ]);

        $task = Task::create($request->all());
        return $task;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Task::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id)->update($request->all());
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Task::destroy($id);
        return 'Task '.$id.' has been deleted';
    }
}
