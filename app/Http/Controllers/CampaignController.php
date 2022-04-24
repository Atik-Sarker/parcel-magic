<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Http\Traits\ImageManage;
use Illuminate\Support\Facades\Log;

class CampaignController extends Controller
{
    use ImageManage;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::where('status', 1)->orderBy('created_at', 'DESC')->paginate(7);
        return view('backend.campaign.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.campaign.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCampaignRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCampaignRequest $request)
    {
        $data = $request->validated();
        $allImageName= array();
        try{
            if ($data['banner']) {
                foreach ($data['banner'] as $file){
                    $allImageName[] = $this->UploadImage($file);
                }
                $data['banner'] = implode('|', $allImageName);
            }
            Campaign::create($data);
            Log::info("Campaign create successfully");
            session()->flash('message', 'Campaign create successfully');
            return redirect()->route('campaign.index')->with('status', true);
        }catch(\Exception $e){
            Log::error('Failed to create Campaign :'.$e->getMessage());
            session()->flash('message', 'Whoops! Something went wrong, Please try again.');
            return redirect()->route('campaign.index')->with('status', false);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {

        $html = view('backend.campaign.view', compact('campaign'))->render();
        $response = [
            'code' => "200",
            'html' => $html,
        ];

       return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        return view('backend.campaign.edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCampaignRequest  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
        $data = $request->validated();
        $newImageName= array();
        try{
            if (isset($data['banner'])) {
                foreach ($data['banner'] as $file){
                    $newImageName[] = $this->UploadImage($file);
                }
                if($campaign->banner){
                    $data['banner'] = implode('|', array_merge($newImageName, explode('|', $campaign->banner)));
                }else{
                    $data['banner'] = implode('|',$newImageName);
                }
            }else{
                $data['banner'] = $campaign->banner;
            }
            $campaign->update($data);
            Log::info("Campaign update successfully");
            session()->flash('message', 'Campaign update successfully');
            return redirect()->route('campaign.index')->with('status', true);
        }catch(\Exception $e){
            Log::error('Failed to update Campaign :'.$e->getMessage());
            session()->flash('message', 'Whoops! Something went wrong, Please try again.');
            return redirect()->route('campaign.index')->with('status', false);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        try{

            foreach(explode('|', $campaign->banner) as $banner){
                if (file_exists(storage_path("app/public/{$banner}")))
                    unlink(storage_path("app/public/{$banner}"));
            }
            $campaign->delete();
            Log::info("Campaign delete successfully");
            session()->flash('message', 'Campaign delete successfully');
            return redirect()->route('campaign.index')->with('status', true);
        }catch(\Exception $e){
            Log::error('Failed to delete Campaign :'.$e->getMessage());
            session()->flash('message', 'Whoops! Something went wrong, Please try again.');
            return redirect()->route('campaign.index')->with('status', false);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */

    public function deleteImage(Campaign $campaign, $index){
        $banners = explode("|", $campaign->banner);
        if (file_exists(storage_path("app/public/{$banners[$index]}"))){
            unlink(storage_path("app/public/{$banners[$index]}"));
            unset($banners[$index]);
        }else{
            unset($banners[$index]);
        }
        $campaign->banner = implode('|',$banners);
        $campaign->save();
        return redirect()->back();

    }

}
