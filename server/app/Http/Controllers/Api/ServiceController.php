<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\config;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $config;
    private function __construct(config $config){
        $this->config = $config;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->config->paginate(5);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param config $config
     * @return \Illuminate\Http\Response
     */
    public function show(config $config)
    {
        return $config->paginate(5);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
