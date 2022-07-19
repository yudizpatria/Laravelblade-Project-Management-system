<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientManageProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $this->projects = Project::where('client_id', '=', Auth::id())->orderBy('id', 'DESC')->get();

        $this->totalProject = Project::where('client_id', '=', Auth::id())->count();

        $this->projectSuccess = Project::where('status', '=', 'finished')
            ->where('client_id', '=', Auth::id())->get()->count();

        $this->projectProgress = Project::where('status', '=', 'in progress')
            ->where('client_id', '=', Auth::id())->get()->count();

        $this->projectPending = Project::where('status', '=', 'not started')
            ->where('client_id', '=', Auth::id())->get()->count();

        $this->projectCancel = Project::where('status', '=', 'cancelled')
            ->where('client_id', '=', Auth::id())->get()->count();

        return view('client.project.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $this->project = Project::with('category')->findorFail($id);
        return view('client.project.show', $this->data);
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
