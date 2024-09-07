<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function addclient()
    {
        return \view('admin.clients.addclient');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:clients',
            'password' => 'required|min:8',
            'mobile' => 'required',
            'address' => 'required',
            'doctype' => 'required',
            'docnumber' => 'required',
            'city' => 'required'

        ]);
        $input = ([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

            'mobile' => $request->mobile,
            'alternatemobile' => $request->alternatemobile,
            'doctype' => $request->doctype,
            'docnumber' => $request->docnumber,
            'address' => $request->address,
            'city' => $request->city

        ]);


        Client::create($input);

        return \redirect()->route('admin.user.viewclient')
            ->with('success', 'record Added Successfully');
    }

    public function viewclient()
    {
        $clients = Client::all();
        return \view('admin.clients.viewclient', \compact('clients'));
    }
    public function editclient(Request $request, $id)
    {
        $clients = Client::find($id);
        return \view('admin.clients.editclient', \compact('clients'));
    }
    public function updateclient(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
        ]);
        $input = $request->all();

        $client->update($input);


        return \redirect()->route('admin.user.viewclient')
            ->with('Success', 'Client Edited Successfully');
    }

    // public function deleteclient($id)
    // {

    //     Client::find($id)->delete();
    //     // \dd($id);

    //     return \redirect()->route('admin.user.viewclient')
    //         ->with('Success', 'record deleted successfully');
    // }
    public function delete($id)
    {
        // Find the user by ID and delete
        $client = Client::find($id);
        if ($client) {
            $client->delete();
            // Optionally, you can redirect back or to a specific route after deletion
            return redirect()->back()->with('Success', 'client deleted successfully');
        }
        // Handle if the clie$client doesn't exist
        return redirect()->back()->with('error', 'client not found');
    }
}
