<?php

namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
use App\Sample;
//use App\Folder;
use Request;
//use App\Http\Requests;
use App\Http\Controllers\Controller;

class samplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $samples = Sample::all();
        $folders = \App\Folder::all();
        dump($samples
            ->take(3)
            ->toArray()
        );
        dump($samples
            ->where('id', '>', 7)
        );
        //dump($folders);
        $modelSample = new Sample;
        $mes = $modelSample->WorkItem1();
        //dd($mes);
        //$sampleAll = $modelSample->WorkItem2();
        //dump($sampleAll);
        return view('sample.index',compact('samples','mes'));
    }

    public function showCreateForm()
    {
        return view('sample/create');
    }

    public function create()
    {
        $sample = new Sample();
        $sample->title = Request::input('title');
        $sample->body = Request::input('body');
        $sample->username = Request::input('username');
        $sample->save();
        return redirect()->route('samples.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $massage = '詳細ページです';
        $sample = Sample::find($id);
        return view('sample.show',compact('sample','massage'));
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
        //
    }
}
