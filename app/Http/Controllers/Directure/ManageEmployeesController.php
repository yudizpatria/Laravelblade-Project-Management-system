<?php

namespace App\Http\Controllers\Directure;

use App\Http\Controllers\Controller;
use App\Http\Requests\Directure\Employee\StoreEmployee;
use App\Models\EmployeeDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageEmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->employees = EmployeeDetails::with('user')->get();
        return view('directure.employee.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('directure.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        if ($request->image) {
            $user->image = $request->file('image')->store(
                'avatar',
                'public',
                300
            );
        }
        $user->gender = $request->input('gender');
        $user->status = $request->input('status');
        $user->save();
        if ($user->id) {
            $employee = new EmployeeDetails();
            $employee->user_id = $user->id;
            $employee->job_title = $request->job_title;
            $employee->save();
        }

        $user->assignRole('employee');

        return redirect()->route('data_employee.index');
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
        $this->user = User::findOrFail($id);
        $this->employee = EmployeeDetails::where('user_id', '=', $this->user->id)->first();
        return view('directure.employee.edit', $this->data);
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
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != '') {
            $user->password = Hash::make($request->password);
        }
        if ($request->image) {
            $user->image = $request->file('image')->store(
                'assets/avatar',
                'public',
                300
            );
        }
        $user->gender = $request->gender;
        $user->status = $request->status;
        $user->update();

        $employee = EmployeeDetails::where('user_id', '=', $user->id)->first();
        if (empty($employee)) {
            $employee = new EmployeeDetails();
            $employee->user_id = $user->id;
        }
        $employee->job_title = $request->job_title;
        $employee->update();
        return redirect()->route('data_employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = User::findorFail($id);
        $employee->delete();

        return redirect()->route('data_employee.index');
    }
}
