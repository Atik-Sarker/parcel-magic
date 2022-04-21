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
        $campaigns = Campaign::where('status', 1)->paginate(5);
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
        //
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
       
        






        $allImageName= array();
        if ($request->hasFile('image')) {
            $count = 1;
            foreach ($request->image as $file)
            {
                $getClientMimeType = $file->getClientMimeType();
                if ($getClientMimeType != 'image/png' and $getClientMimeType != 'image/jpg' and $getClientMimeType != 'image/jpeg' and $getClientMimeType != 'image/gif'){
                    Toastr::error('Invalid Image', 'Error');
                    return redirect()->back();
                }
                $originalExtension = $file->getClientOriginalExtension();
                $customImageName = str_replace([' ','.','_'],['-','','-'],$request->name).'-'.time().$count++.'.'.$originalExtension;
                $destinationPath = storage_path('/app/public/image');
                $img = Image::make($file->getRealPath());
                $img->resize(555, 400)->save($destinationPath.'/'.$customImageName);
//                $file->storeAs('image',$customImageName);
                $allImageName[] = $customImageName . '|';
            }
            $oldImage = array_filter(explode('|',$car->image));
            foreach($oldImage as $image){
                $allImageName[] = $image.'|';
            }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */


    public function deleteImage(Campaign $campaign, $index){

        return 'delete image';
        $allimage = explode("|", $campaign->banner);

        if (file_exists(storage_path("app/public/image/{$allimage[$index]}"))){
            unlink(storage_path("app/public/image/{$allimage[$index]}"));
            unset($allimage[$index]);
        }else{
            unset($allimage[$index]);
        }

        $campaign->banner = implode('|',$allimage);
        $campaign->save();
        return redirect()->back();

    }

}
