<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeDashboardController extends Controller
{
    public function index()
    {
        $this->totalProject = Project::all()->count();
        $this->totalTask = Task::where('user_id', '=', Auth::id())->where('status', 'incomplete')->get()->count();
        return view('employee.dashboard.index', $this->data);
    }
}
