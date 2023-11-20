<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class AdvanceTaskController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|integer'
        ]);
        $task->status = $request->status;
        $task->save();

        return TaskResource::make($task);
    }
}
