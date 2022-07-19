<?php

namespace App\Http\Controllers\Directure;

use App\Http\Controllers\Controller;
use App\Http\Requests\Directure\Client\StoreClient;
use App\Models\ClientDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->clients = ClientDetails::with('user')->get();
        return view('directure.client.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('directure.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClient $request)
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
            $client = new ClientDetails();
            $client->user_id = $user->id;
            $client->company_name = $request->company_name;
            $client->save();
        }
        $user->assignRole('client');

        return redirect()->route('data_client.index');
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
        $this->client = ClientDetails::where('user_id', '=', $this->user->id)->first();
        return view('directure.client.edit', $this->data);
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
        $client = ClientDetails::where('user_id', '=', $user->id)->first();
        $client->company_name = $request->company_name;
        $client->update();
        return redirect()->route('data_client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = User::findorFail($id);
        $client->delete();

        return redirect()->route('data_client.index');
    }
}
