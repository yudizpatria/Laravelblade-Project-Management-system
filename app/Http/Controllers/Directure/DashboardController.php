<?php

namespace App\Http\Controllers\Directure;

use App\Http\Controllers\Controller;
use App\Models\ClientDetails;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $this->project = Project::all()->count();
        $this->client = User::Role('client')->where('status', '=', 'active')->get()->count();
        $this->task = Task::all()->count();
        $this->employee = User::Role('employee')->where('status', '=', 'active')->get()->count();
        return view('directure.dashboard.index', $this->data);
    }
}
