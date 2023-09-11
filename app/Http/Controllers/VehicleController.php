<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function data()
    {

        $data = DB::select('SELECT vehicles.*, first_image.hinh_anh_xe
        FROM vehicles
        LEFT JOIN (
            SELECT id_xe, MIN(id) as min_id
            FROM images
            GROUP BY id_xe
        ) AS first_images
        ON vehicles.id = first_images.id_xe
        LEFT JOIN images AS first_image
        ON first_images.min_id = first_image.id');

        return response()->json([
            'data'   => $data,
        ]);
    }
}
