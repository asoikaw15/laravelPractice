<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\tasks;
use App\Models\workers;
use App\Models\parts;
class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = tasks::all();
         foreach($tasks as $task) {
        $partsTotal = DB::table('parts')->where('tasks_id' ,'=', $task->id)->sum('partsTotal');
        $workersTotal = DB::table('workers')->where('tasks_id' ,'=', $task->id)->sum('workersTotal');
        DB::table('tasks')->where('id', '=', $task->id)->update(['laborTotal'=> $workersTotal, 'partsTotal'=>$partsTotal]);
        }
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if ($request->has('taskName')){
        $storeData = $request->all();
        $tasks = tasks::create($storeData);
        return redirect('tasks');
        }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        tasks::destroy($id);
        return redirect('tasks');
        
    }
}
