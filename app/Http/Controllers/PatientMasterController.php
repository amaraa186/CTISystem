<?php

namespace App\Http\Controllers;

use App\Models\Model\patient_master;
use Illuminate\Http\Request;

class PatientMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\patientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function show(patientMaster $patientMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\patientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(patientMaster $patientMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\patientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, patientMaster $patientMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\patientMaster  $patientMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(patientMaster $patientMaster)
    {
        //
    }

    public function index_view ()
    {
        return view('pages.patient_master.patient_master-data', [
            'patient_master' => patient_master::class
        ]);
    }
}
