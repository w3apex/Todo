<?php

namespace App\Http\Controllers;

use App\Models\MultiStepForm;
use Illuminate\Http\Request;

class MultiStepFormController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $data['title'] = __('Create User');
        return view('backend.pages.forms.create', $data);
    }

    public function store(Request $request)
    {
        dd($request->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MultiStepForm  $multiStepForm
     * @return \Illuminate\Http\Response
     */
    public function show(MultiStepForm $multiStepForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MultiStepForm  $multiStepForm
     * @return \Illuminate\Http\Response
     */
    public function edit(MultiStepForm $multiStepForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MultiStepForm  $multiStepForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MultiStepForm $multiStepForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MultiStepForm  $multiStepForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(MultiStepForm $multiStepForm)
    {
        //
    }
}
