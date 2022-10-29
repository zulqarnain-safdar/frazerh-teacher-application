<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $free_ads = Ad::where('ad_type', 'Free Profile')->get();
        $profile_ads = Ad::where('ad_type', 'Search Page')->get();
        // dd(isset($free_ads[1]));
        return view('admin.ads.index', compact('free_ads', 'profile_ads'));
    }

    public function save_free_profile_ads(Request $request)
    {
        // dd($request->all());

        if($request->hasFile('ad1_image')){
            $request->validate([
                'ad1_link' => 'required',
            ]);

            $ad1_name = time() . '_' . $request->file('ad1_image')->getClientOriginalName();

            $request->file('ad1_image')->storeAs('public/ads', $ad1_name);
           

            $ad1 = Ad::firstOrNew(array('id' => 1));
            
            $ad1->image = $ad1_name;
            $ad1->link = $request->get('ad1_link');
            $ad1->ad_type = 'Free Profile';
            $ad1->save();

        }

        if($request->hasFile('ad2_image')){
            $request->validate([
                'ad2_link' => 'required',
            ]);

            $ad2_name = time() . '_' . $request->file('ad2_image')->getClientOriginalName();

            $request->file('ad2_image')->storeAs('public/ads', $ad2_name);
           

            $ad1 = Ad::firstOrNew(array('id' => 2));
            
            $ad1->image = $ad2_name;
            $ad1->link = $request->get('ad2_link');
            $ad1->ad_type = 'Free Profile';
            $ad1->save();

        }

        if($request->hasFile('ad3_image')){
            $request->validate([
                'ad3_link' => 'required',
            ]);

            $ad3_name = time() . '_' . $request->file('ad3_image')->getClientOriginalName();

            $request->file('ad3_image')->storeAs('public/ads', $ad3_name);
           

            $ad1 = Ad::firstOrNew(array('id' => 3));
            
            $ad1->image = $ad3_name;
            $ad1->link = $request->get('ad3_link');
            $ad1->ad_type = 'Free Profile';
            $ad1->save();

        }

        if($request->hasFile('ad4_image')){
            $request->validate([
                'ad4_link' => 'required',
            ]);

            $ad4_name = time() . '_' . $request->file('ad4_image')->getClientOriginalName();

            $request->file('ad4_image')->storeAs('public/ads', $ad4_name);
           

            $ad1 = Ad::firstOrNew(array('id' => 4));
            
            $ad1->image = $ad4_name;
            $ad1->link = $request->get('ad4_link');
            $ad1->ad_type = 'Free Profile';
            $ad1->save();

        }

        notify()->success("Ads Added Successfully  !");
        return redirect('/ads');
    }

    public function save_search_page_profile_ads(Request $request)
    {
       

        if($request->hasFile('ad5_image')){
            $request->validate([
                'ad1_link' => 'required',
            ]);

            $ad5_name = time() . '_' . $request->file('ad5_image')->getClientOriginalName();

            $request->file('ad5_image')->storeAs('public/ads', $ad5_name);
           

            $ad5 = Ad::firstOrNew(array('id' => 5));
            
            $ad5->image = $ad5_name;
            $ad5->link = $request->get('ad1_link');
            $ad5->ad_type = 'Search Page';
            $ad5->save();

        }

        if($request->hasFile('ad6_image')){
            $request->validate([
                'ad2_link' => 'required',
            ]);

            $ad6_name = time() . '_' . $request->file('ad6_image')->getClientOriginalName();

            $request->file('ad6_image')->storeAs('public/ads', $ad6_name);
           

            $ad6 = Ad::firstOrNew(array('id' => 6));
            
            $ad6->image = $ad6_name;
            $ad6->link = $request->get('ad2_link');
            $ad6->ad_type = 'Search Page';
            $ad6->save();

        }

        if($request->hasFile('ad7_image')){
            $request->validate([
                'ad3_link' => 'required',
            ]);

            $ad7_name = time() . '_' . $request->file('ad7_image')->getClientOriginalName();

            $request->file('ad7_image')->storeAs('public/ads', $ad7_name);
           

            $ad7 = Ad::firstOrNew(array('id' => 7));
            
            $ad7->image = $ad7_name;
            $ad7->link = $request->get('ad3_link');
            $ad7->ad_type = 'Search Page';
            $ad7->save();

        }

        if($request->hasFile('ad8_image')){
            $request->validate([
                'ad4_link' => 'required',
            ]);

            $ad8_name = time() . '_' . $request->file('ad8_image')->getClientOriginalName();

            $request->file('ad8_image')->storeAs('public/ads', $ad8_name);
           

            $ad8 = Ad::firstOrNew(array('id' => 8));
            
            $ad8->image = $ad8_name;
            $ad8->link = $request->get('ad4_link');
            $ad8->ad_type = 'Search Page';
            $ad8->save();

        }

        notify()->success("Ads Added Successfully  !");
        return redirect('/ads');
    }
}
