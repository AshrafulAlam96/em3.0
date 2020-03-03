<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashController extends Controller
{
    public function showAdmin()
    {
        $data = [];
    // Admin count 
    	$data['admins_count'] = \App\Admin::select('name','email')->get();

    	$data['total_admins'] = count($data['admins_count']);
    	
	// Client count 
    	$data['clients_count'] = \App\Client::select('id','name','email')->get();

    	$data['total_clients'] = count($data['clients_count']);

    // Contact count 
        $data['contacts_count'] = \App\Models\Contact::select('id','contact_name', 'email', 'phone', 'address')->get();

        $data['total_contacts'] = count($data['contacts_count']);

    // Venue count 
        $data['venues_count'] = \App\Models\Venue::select('id','v_name','v_addr','status')->get();

        $data['total_venues'] = count($data['venues_count']);

        return view('admin.dashboard2', $data);
    }
}
