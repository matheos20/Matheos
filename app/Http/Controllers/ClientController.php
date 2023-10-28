<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $clients = Client::latest()->get();
        // $clients = Client::paginate(10);
        // $statut = $request->statut;
        $search = $request->search;
        $clients = Client::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->Where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->orWhere('contact', 'LIKE', '%' . $search . '%')
                        ->orWhere('whatsapp', 'LIKE', '%' . $search . '%')
                        ->get();
                }
                // if ($request->statut != "") {
                //     $query->where('statut', '=', $request->statut)->get();
                // }
            }]
        ])->orderBy('id', 'DESC')->paginate(10);


        return view('client.listes', [
            'clients' => $clients,
            'search' => $search,
            // 'statut' => $statut,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("client.add"); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|string|max:255',
            'statut' => 'bail|required|string|max:255',
            'email' => 'required|email|unique:clients',
        ]);

        Client::create([
            "name" => $request->name,
            "statut" => $request->statut,
            "contact" => $request->contact,
            "whatsapp" => $request->whatsapp,
            "email" => $request->email,
        ]);
    
        return redirect('/client');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view("client.edit", compact("client"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $rules = [
            'name' => 'bail|required|string|max:255',
            'statut' => 'bail|required|string|max:255',
            'email' => 'required|email',
        ];

        $this->validate($request, $rules);
        
        $client->update([
            "name" => $request->name,
            "statut" => $request->statut,
            "contact" => $request->contact,
            "whatsapp" => $request->whatsapp,
            "email" => $request->email,
        ]);

        return redirect(route("client.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect(route('client.index'));
    }
}
