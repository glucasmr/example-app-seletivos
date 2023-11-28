<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class AdvanceTaskController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Task $task)
    {
        $request->validate([
            'task_list_id' => 'required|integer'
        ]);

        try {
            $request['task_list_id'] = TaskList::find($request->task_list_id)->id;
        } catch (\Throwable $th) {
            return response()->json(['error' => 'The task list reported was not found'], 404);
        }

        $task->task_list_id = $request->task_list_id;
        $task->save();

        return TaskResource::make($task);
    }
}
