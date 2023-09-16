<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booking;
use App\Models\Brand;
use App\Models\Client;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexSignin()
    {
        return view('page.admin.account.signIn');
    }
    public function indexProfile()
    {
        return view('page.admin.profile.index');
    }
    public function indexDashboard()
    {
        return view('page.admin.dashboard.index');
    }
    public function indexBrand()
    {
        return view('page.admin.brand.index');
    }
    public function indexVehicle()
    {
        return view('page.admin.vehicle.index');
    }
    public function indexClassification()
    {
        return view('page.admin.classification.index');
    }
    public function indexBooking()
    {
        return view('page.admin.booking.index');
    }
    public function indexTestimonial()
    {
        return view("page.admin.testimonial.index");
    }
    public function indexReports()
    {
        return view('page.admin.report.index');
    }
    public function indexUser()
    {
        return  view('page.admin.user.index');
    }
    public function indexAapplication()
    {
        return  view('page.admin.aapplication.index');
    }
    public function dataDashboard(){
        $data['brand'] = Brand::all()->count();
        $data['vehicle'] = Vehicle::all()->count();
        $data['booking'] = Booking::all()->count();
        $data['client'] = Client::all()->count();
        return response()->json([
            'data'   => $data,
        ]);
    }
}
