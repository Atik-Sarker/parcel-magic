<?php

namespace App\Http\Controllers\API;

use App\Models\Campaign;
use App\Http\Traits\ImageManage;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponse;

class CampaignController extends Controller
{
    use ImageManage, ApiResponse;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $campaigns = Campaign::where('status', 1)->orderBy('created_at', 'DESC')->paginate(10);
        return response()->json($campaigns);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCampaignRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'total_budget' => 'required|numeric|min:1',
            'daily_budget' => 'required|numeric|min:1',
            'banner' => 'required',
            'banner.*' => 'required|image|mimes:jpeg,bmp,png,jpg,gif,JPG'
        ]);
        if ($validator->fails()) {
            $response = array("status" => false, "errors" => $validator->errors(), "data" =>  $request->all());
            return $this->errors(422, $response);
        }
        //Retrieve the validated input...
        $data = $validator->validated();
        $allImageName= array();
        try{
            if ($data['banner']) {
                foreach ($data['banner'] as $file){
                    $allImageName[] = $this->UploadImage($file);
                }
                $data['banner'] = implode('|', $allImageName);
            }
            Campaign::create($data);
            Log::info("Campaign create successfully using API");
            return $this->success(201,'Success', true);
        }catch(\Exception $e){
            Log::error('API Failed to create Campaign :'.$e->getMessage());
            $response = array("status" => false, "errors" => 'API Failed to create Campaign :'.$e->getMessage(), "data" =>  $request->all());
            return $this->errors($e->getCode(), $response);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Campaign $campaign)
    {
        if($campaign){
            return $this->success(200,'Success', true, $campaign);
        }
        return $this->success(204,'Success', true, array());
    }

}
