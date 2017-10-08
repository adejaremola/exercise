<?php

namespace App\Http\Controllers;

use App\Rates;
use App\Application;
use App\Mail\ApplResponse;
use App\Http\Controllers\Controller;

use Image;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
	public function index()
	{
		$applications = Application::all();
        // return $applications;
		return view('applications.index', compact('applications'));
	}

	public function create()
	{
        $rates = Rates::all();
		return view('applications.create', compact('rates'));
	}

    public function store(Request $request)
    {
    	// return $request->all();
    	$application = new Application;
    	$application->names = $request->names;
    	$application->email = $request->email;
    	$application->passport_no = $request->passport_no;
    	$application->passport_no = $request->passport_no;
    	$application->request_type = $request->request_type;
    	$application->amount = $request->amount;
    	$application->travel_date = date('Y-m-d', strtotime(str_replace('-', '/', $request->travel_date)));

    	$image1 = $request->ticket_upload;
    	$imagename1 = time()."-".$image1->getClientOriginalName();
    	// return $imagename;
    	Image::make($image1->getRealPath())->resize(200, 200)->save(public_path().'/assets/img/'. $imagename1);
    	$application->ticket_upload = 'assets/img/'.$imagename1;

    	$image2 = $request->passport_upload;
    	$imagename2 = time()."-".$image2->getClientOriginalName();
    	// return $imagename;
    	Image::make($image2->getRealPath())->resize(200, 200)->save(public_path().'/assets/img/'. $imagename2);
    	$application->passport_upload = 'assets/img/'.$imagename2;

    	$application->save();

    	return redirect()->route('application.create')->with('message', 'Your application has been submitted successfully! A response will be sent to you soon.');
    }

    public function show(Application $application)
    {
        $conv_rate = Rates::where('name', $application->currency)->pluck('multiplier');
        $payment = (integer)(($application->amount) / ($conv_rate[0]));
        return view('applications.show', compact(['application', 'payment']));
    }

    public function sendMail(Application $application, $payment)
    {
        Mail::to($application->email)->send(new ApplResponse($application, $payment));
        return redirect()->route('applications.index')
                         ->withMessage('Mail sent successfully!');
    }
}
