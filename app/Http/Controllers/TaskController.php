<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
use App\Task; // ★ 追加

use App\Http\Requests;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // すべてのフォルダを取得する
        $folders = Auth::user()->folders()->get();
//dump($folders);

        // 選ばれたフォルダを取得する
        $current_folder = Folder::find($id);
        // 選ばれたフォルダに紐づくタスクを取得する
        //$tasks = Task::where('folder_id', $current_folder->id)->get();
        //$tasks = $current_folder->tasks()->get();

        //①完了②着手中③未着手の順番に並びようにする。
        $tasks = $current_folder->tasks()
        ->orderBy('status', 'desc')
        ->orderBy('id', 'asc')
        ->get();
//dump($tasks);
//$yyy = collect($tasks)->count();
//dump($yyy);
        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCreateForm($id)
    {
        return view('tasks/create', [
            'folder_id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create($id, CreateTask $request)
    {
        $current_folder = Folder::find($id);

        $task = new Task();
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'id' => $current_folder->id,
        ]);
    }


    /**
     * Display the specified resource.
     * GET /folders/{id}/tasks/{task_id}/
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTask($id,$task_id)
    {
        $task = Task::find($task_id);
        $categories = $task->categories()->get();
        //dump($categories);

        return view('tasks/show',[
            'task' => $task,
            'categories' => $categories,
        ]);
    }

    /**
     * GET /folders/{id}/tasks/{task_id}/edit
     */
    public function showEditForm($id,$task_id)
    {
        $task = Task::find($task_id);
        $check_categories = $task->categories()->get();
        $checks = [];
        foreach($check_categories as $check){
            $checks[] = $check->id;
        }
        //dump($check_categoris);
        //dump($checks);
        return view('tasks/edit', [
            'task' => $task,
            'checks' => $checks,
        ]);
    }

    public function edit($id,$task_id, EditTask $request)
    {
        // 新規タスクを作成
        $task = Task::find($task_id);

        // 新規タスクにrequestをセット
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        //カテゴリーの更新
        $task->categories = $request->categories;
        //dump($task->categories);
        $task->categories()->sync($task->categories);

        // 3
        return redirect()->route('tasks.index', [
            'id' => $task->folder_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id,$task_id)
    {
        \App\Task::destroy($task_id);
        return redirect()->route('tasks.index', [
            'id' => $id,
        ]);
    }
}
