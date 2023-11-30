<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\TaskList;
use App\Http\Requests\StoreTaskListRequest;
use App\Http\Requests\UpdateTaskListRequest;
use App\Http\Resources\TaskListResource;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TaskListResource::collection((TaskList::all()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskListRequest $request)
    {
        $taskList = TaskList::create($request->validated());
        return TaskListResource::make($taskList);
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskList $taskList)
    {
        return TaskListResource::make($taskList);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskListRequest $request, TaskList $taskList)
    {
        $taskList->update($request->validated());
        return TaskListResource::make($taskList);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskList $taskList)
    {
        $taskList->delete();
        return response()->noContent();
    }
}
