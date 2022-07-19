<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $this->projectClient = Project::where('client_id', '=', Auth::id())->get()->count();
        return view('client.dashboard.index', $this->data);
    }
}
