<?php

namespace App\Http\Controllers;

use App\Rates;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    public function index()
    {
    	$rates = Rates::all();
    	return view('rates.index', compact('rates'));
    }

    public function create()
    {
    	return view('rates.create');
    }

    public function store(Request $request)
    {
    	$rate = new Rates;
    	$rate->name = $request->name;
    	$rate->multiplier = $request->multiplier;
    	$rate->save();
    	return redirect()->route('rates.index')->withMessage('New Conversion Rate Created Successfully!');
    }

    public function edit(Rates $rate)
    {
    	if ($request->name) {
    		$rate->name = $request->name;
    	}
    	if ($request->multiplier) {
    		$rate->multiplier = $request->multiplier;
    	}
    	$rate->update();

    	return redirect()->route('rates.index')->withMessage('Rate Successfully Updated');
    }

    public function delete(Rates $rate)
    {
    	$rate->softDelete();
    	return back()->with('message', 'Rate Deleted Successfully');
    }
}
