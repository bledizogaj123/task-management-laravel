<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskManagementStore;
use App\Http\Requests\TaskManagementUpdate;
use App\Models\TaskManager;
use Illuminate\Http\Request;

class TaskManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaskManager::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskManagementStore $request)
    {
        $taskToBeStored = [
            'list' => $request->list,
            'item' => $request->item,
            'description' => $request->description
        ];

        $createdTask = TaskManager::create($taskToBeStored);

        return $createdTask;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskManager  $taskManager
     * @return \Illuminate\Http\Response
     */
    public function update(TaskManagementUpdate $request, $id)
    {
        $task = TaskManager::where('id', $id)->first();

        if ($task) {
            $requestTask = [
                'list' => $request->list != ''? $request->list: $task->list,
                'item' => $request->item != ''? $request->item: $task->item,
                'description' => $request->description != '' ? $request->description: $task->description
            ];

            $task->update($requestTask);
            return 'Updated successfully';
        }
        return "Not Found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskManager  $taskManager
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foundTask = TaskManager::where('id', $id)->first();
        if ($foundTask) {
            $removeTask = TaskManager::destroy($foundTask->id);
            return "Removed successfully";
        }
        return "Not Found";
    }
}
