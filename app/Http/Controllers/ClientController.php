<?php

namespace App\Http\Controllers;

use App\Models\{
    Client,
    ClientInterests,
};
use Illuminate\Http\Request;
use Mail;
use DB;

class ClientController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = DB::table('languages')->get();
        $interests = DB::table('interests')->get();

        return view('client.create', compact('languages', 'interests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|unique:clients',
            'rsa_id' => 'required|max:20|unique:clients|regex:/^\d( ?\d){12}$/i',
            'mobile_number' => 'required|max:20|regex:/^\d( ?\d){9}$/i',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'language_id' => 'required|integer',
            'interests' => 'required|array|min:1',
        ]);

        $client = Client::create($request->all());

        foreach ($request->interests as $interest) {
            ClientInterests::create([
                'client_id' => $client->id,
                'interest_id' => $interest,
            ]);
        }

        $to = $request->email;

        Mail::raw('Your details have been captured on our system. Welcome to the ProPay family.', function ($message) use ($to) {
            $message->to($to)->subject('Welcome to ProPay');
        });

        return redirect()
            ->route('client.show', $client->id)
            ->with('success', "Client {$client->id} created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $interests = [];
        foreach ($client->interests as $interest) {
            $interests[] = $interest->interest->description;
        }
        $interests = join($interests, ', ');

        return view('client.show', compact('client', 'interests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $languages = DB::table('languages')->get();
        $interests = DB::table('interests')->get();
        $interest_ids = array_map(fn($interest) => $interest['interest_id'], $client->interests->toArray());

        return view('client.edit', compact('client', 'languages', 'interests', 'interest_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $email_rules = 'required|email';
        if ($request->has('email')) {
            if ($request->get('email') !== $client->email) {
                $email_rules .= '|unique:clients';  //  Add the `unique` constraint (validation rule) only if the email address changed!
            }
        }

        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => $email_rules,
            'mobile_number' => 'required|max:20|regex:/^[0-9 ]+$/i',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'language_id' => 'required|integer',
            'interests' => 'required|array|min:1',
        ]);

        $original_interests = array_map(fn($interest) => $interest['interest_id'], $client->interests->toArray());

        // Add new interests
        $interests_to_add = array_diff($request->interests, $original_interests);
        if (!empty($interests_to_add)) {
            foreach ($interests_to_add as $interest) {
                ClientInterests::create([
                    'client_id' => $client->id,
                    'interest_id' => $interest,
                ]);
            }
        }

        // Remove interests
        $interests_to_remove = array_diff($original_interests, $request->interests);
        if (!empty($interests_to_remove)) {
            DB::table('client_interests')
                ->where('client_id', $client->id)
                ->whereIn('interest_id', $interests_to_remove)
                ->delete();
        }

        $client->update($request->all());

        return redirect()
            ->route('client.show', $client->id)
            ->with('success', 'Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        foreach ($client->interests as $interest) {
            $interest->delete();
        }

        $client->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Client deleted successfully');
    }
}
