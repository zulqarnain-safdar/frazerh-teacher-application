<?php

namespace App\Http\Controllers;

use Auth;
use Stripe;
use Session;
use Exception;
use Stripe\Plan;
use App\Models\User;
use App\Models\Review;
use App\Models\Package;
use App\Models\Profile;
use App\Models\Ad;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\SubscriptionItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Doctrine\Inflector\Rules\Substitutions;
use Laravel\Cashier\Database\Factories\SubscriptionFactory;
use Spatie\Newsletter\NewsletterFacade as Newsletter;

class TeacherController extends Controller
{
    public function save_teacher_info(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        Session::put('user', ['first_name' => $request->get('first_name'), 'surname' => $request->get('surname'), 'email' => $request->get('email'), 'step1' => 'true']);
        
        return redirect('/set-password');
       
    }

    public function save_password(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required|min:6',
        ]);

        $user = Session::get('user');
        $user['password'] = $request->get('password');
        $user['step2'] = 'true';

        Session::put('user', $user);
       
        return redirect('/teacher-profile');
         
    }

    public function save_package(Request $request)
    {
        // dd($request->all());
        $user = Session::get('user');
        
        $user['package'][$request->get('p_name')] = $request->get('p_url');

        Session::put('user', $user);

        Session::flash('message', 'Package added sucessfully!');
        // dd(Session::get('user'));

        return response([
            "success" => 'true'
        ] 
        );
    }

    public function save_teacher_profile(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'profile_image' => 'required',
            'teacher_name' => 'required',
            'cover_photo' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'subjects_taught' => 'required',
            'languages' => 'required',
            'headline' => 'required',
            'qualifications' => 'required',
            'about_me' => 'required',
        ],
            [
                'headline.required' => 'This field is required.',
                'about_me.required' => 'This field is required.',
            ]
        );

        $user = Session::get('user');

        $user['teacher_name'] = $request->get('teacher_name');
        $user['nationality'] = $request->get('nationality');
        $user['gender'] = $request->get('gender');
        $user['subjects_taught'] = $request->get('subjects_taught');
        $user['languages'] = $request->get('languages');
        $user['headline'] = $request->get('headline');
        $user['qualifications'] = $request->get('qualifications');
        $user['video_url'] = $request->get('video_url');
        $user['lesson_price'] = $request->get('lesson_price');
        $user['trial_price'] = $request->get('trial_price');
        $user['trial_payment_url'] = $request->get('trial_payment_url');
        $user['trial_booking_link'] = $request->get('trial_booking_link');
        $user['booking_link'] = $request->get('booking_link');
        $user['booking_password'] = $request->get('booking_password');
        $user['profile_email'] = $request->get('profile_email');
        $user['twitter'] = $request->get('twitter');
        $user['whatsapp'] = $request->get('whatsapp');
        $user['line'] = $request->get('line');
        $user['wechat'] = $request->get('wechat');
        $user['skype'] = $request->get('skype');
        $user['instagram'] = $request->get('instagram');
        $user['facebook'] = $request->get('facebook');
        $user['phone_number'] = $request->get('phone_number');
        $user['about_me'] = $request->get('about_me');

        
        if($request->hasFile('profile_image'))                    {
            $name = time().'_'.$request->file('profile_image')->getClientOriginalName();
          
            $request->file('profile_image')->storeAs('public/profiles', $name);
            $user['profile_image'] = $name;
        }

        if($request->hasFile('cover_photo'))                    {
            $name = time().'_'.$request->file('cover_photo')->getClientOriginalName();
            $request->file('cover_photo')->storeAs('public/covers', $name);
            $user['cover_photo'] = $name;
        }
        $user['step3'] = 'true';
        
        Session::put('user', $user);

        return redirect('/choose-website');

    }

    public function save_profile_link(Request $request)
    {
        $request->validate([
            'profile_name' => 'required|unique:profiles,profile_name',
        ],[
            'profile_name.required' => 'This field is required.',
            'profile_name.unique' => 'This name is already taken.',
        ]);
        $user = Session::get('user');
        $user['profile_name'] = $request->get('profile_name');
        $user['step4'] = 'true';

        Session::put('user', $user);
        
        return redirect('/pricing');
    }

    public function get_basic_plan()
    {
       
       //dd(Session::get('user'));

       $userData = Session::get('user');
       $useremail = $userData['email'];
      
       $password = $userData['password'];

       DB::transaction(function () use($userData, $useremail, $password) {

           //save teaher info into user table
           $user = new User();
           $user->first_name = $userData['first_name'];
           $user->surname = $userData['surname'];
           $user->email = $useremail;
           $user->user_type = 'teacher';
           $user->password = Hash::make($password);
           $user->subscribe_plan = 'Basic';
           $user->account_type = 'Free';
           $user->save();

           //save teache profile information into profile table
           $profile = new Profile();
           $profile->user_id = $user->id;
           $profile->teacher_name = $userData['teacher_name'];
           $profile->profile_name = $userData['profile_name'];
           $profile->ranking_score = 0;
           $profile->nationality = $userData['nationality'];
           $profile->gender = $userData['gender'];
           $subjects = explode(",",$userData['subjects_taught']);
           $profile->subjects_taught = $subjects;
           $profile->languages = $userData['languages'];
           $profile->headline = $userData['headline'];
           $qualifications = explode(",",$userData['qualifications']);
           $profile->qualifications = $qualifications;
           $profile->video_url = $userData['video_url'];
           $profile->lesson_price = $userData['lesson_price'];
           $profile->trial_price = $userData['trial_price'];
           $profile->trial_payment_url = $userData['trial_payment_url'];
           $profile->trial_booking_link = $userData['trial_booking_link'];
           $profile->booking_link = $userData['booking_link'];
           $profile->booking_password = $userData['booking_password'];
           $profile->profile_image = $userData['profile_image'];
           $profile->cover_photo = $userData['cover_photo'];
           $profile->email = $userData['profile_email'];
           $profile->twitter = $userData['twitter'];
           $profile->whatsapp = $userData['whatsapp'];
           $profile->line = $userData['line'];
           $profile->wechat = $userData['wechat'];
           $profile->skype = $userData['skype'];
           $profile->instagram = $userData['instagram'];
           $profile->facebook = $userData['facebook'];
           $profile->phone_number = $userData['phone_number'];
           $profile->about_me = $userData['about_me'];
           $profile->status = 'Active';
           $profile->save();

            //save packages information into package table

           if(isset($userData['package']))
            {
                foreach($userData['package'] as $key => $value)
                {
                    $package = new Package();
                    $package->user_id = $user->id;
                    $package->profile_id = $profile->id;
                    $package->p_name = $key;
                    $package->payment_url = $value;
                    $package->status = 'Active';
                    $package->save();
                }
            }

            
        });


        //create audience
        Newsletter::subscribePending($userData['email'], ['NAME'=>$userData['first_name'], 'NATIONALIT'=>$userData['nationality'],'GENDER'=>$userData['gender'],'SUBJECTS'=>$userData['subjects_taught'],'LANGUAGES'=>$userData['languages']]);
        	
        Newsletter::addTags(['FREE USER'], $userData['email']);

        //forget session
        Session::forget('user');


       
        //logins work
        $dataAttempt = array(
            'email' => $useremail,
            'password' => $password
        );


        // dd($dataAttempt);

        if (Auth::attempt($dataAttempt))
        {
            return redirect('/free-dashboard');
        }
        else
        {
            echo 'server error';
        }

       
    }

    public function get_premium_plan(Request $request)
    {
       
       //dd(Session::get('user'));

       if(Auth::check())
       {
            $intent = auth()->user()->createSetupIntent();
            $plan_type = $request->get('plan');
        
            return view('frontend.subscription.index',compact('intent','plan_type'));
       }
       else
       {
        $userData = Session::get('user');
        $useremail = $userData['email'];
       
        $password = $userData['password'];
 
         DB::transaction(function () use($request, $userData, $useremail, $password) {
            //save teaher info into user table
            $user = new User();
            $user->first_name = $userData['first_name'];
            $user->surname = $userData['surname'];
            $user->email = $useremail;
            $user->user_type = 'teacher';
            $user->password = Hash::make($password);
            $user->subscribe_plan = 'Basic';
            $user->account_type = 'Unpaid';
            $user->subscribe_plan = $request->get('plan');
            $user->save();
 
            //save teache profile information into profile table
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->teacher_name = $userData['teacher_name'];
            $profile->profile_name = $userData['profile_name'];
            $profile->ranking_score = 0;
            $profile->nationality = $userData['nationality'];
            $profile->gender = $userData['gender'];
            $subjects = explode(",",$userData['subjects_taught']);
            $profile->subjects_taught = $subjects;
            $profile->languages = $userData['languages'];
            $profile->headline = $userData['headline'];
            $qualifications = explode(",",$userData['qualifications']);
            $profile->qualifications = $qualifications;
            $profile->video_url = $userData['video_url'];
            $profile->lesson_price = $userData['lesson_price'];
            $profile->trial_price = $userData['trial_price'];
            $profile->trial_payment_url = $userData['trial_payment_url'];
            $profile->trial_booking_link = $userData['trial_booking_link'];
            $profile->booking_link = $userData['booking_link'];
            $profile->booking_password = $userData['booking_password'];
            $profile->profile_image = $userData['profile_image'];
            $profile->cover_photo = $userData['cover_photo'];
            $profile->email = $userData['profile_email'];
            $profile->twitter = $userData['twitter'];
            $profile->whatsapp = $userData['whatsapp'];
            $profile->line = $userData['line'];
            $profile->wechat = $userData['wechat'];
            $profile->skype = $userData['skype'];
            $profile->instagram = $userData['instagram'];
            $profile->facebook = $userData['facebook'];
            $profile->phone_number = $userData['phone_number'];
            $profile->about_me = $userData['about_me'];
            $profile->status = 'Active';
            $profile->save();
 
             //save packages information into package table
 
            if(isset($userData['package']))
             {
                 foreach($userData['package'] as $key => $value)
                 {
                     $package = new Package();
                     $package->user_id = $user->id;
                     $package->profile_id = $profile->id;
                     $package->p_name = $key;
                     $package->payment_url = $value;
                     $package->status = 'Active';
                     $package->save();
                 }
             } 
         });

         //create audience
        Newsletter::subscribePending($userData['email'], ['NAME'=>$userData['first_name'], 'NATIONALIT'=>$userData['nationality'],'GENDER'=>$userData['gender'],'SUBJECTS'=>$userData['subjects_taught'],'LANGUAGES'=>$userData['languages']]);
        	
        Newsletter::addTags(['PAID USER'], $userData['email']);
 
         //forget session
         Session::forget('user');
 
         //logins work
         $dataAttempt = array(
             'email' => $useremail,
             'password' => $password
         );
 
         // dd($dataAttempt);
         if (Auth::attempt($dataAttempt))
         {
             $intent = auth()->user()->createSetupIntent();
             $plan_type = $request->get('plan');
         
             return view('frontend.subscription.index',compact('intent','plan_type'));
         }
         else
         {
             echo 'server error';
         }
       }
    }

    public function update_profile(Request $request)
    {
           $profile = Auth::user()->profile;
           $profile->teacher_name = $request['teacher_name'];
           $profile->nationality = $request['nationality'];
           $profile->gender = $request['gender'];
           $subjects = explode(",",$request['subjects_taught']);
           $profile->subjects_taught = $subjects;
           $profile->languages = $request['languages'];
           $profile->headline = $request['headline'];
           $qualifications = explode(",",$request['qualifications']);
           $profile->qualifications = $qualifications;
           $profile->video_url = $request['video_url'];
           $profile->lesson_price = $request['lesson_price'];
           $profile->trial_price = $request['trial_price'];
           $profile->trial_payment_url = $request['trial_payment_url'];
           $profile->trial_booking_link = $request['trial_booking_link'];
           $profile->booking_link = $request['booking_link'];
           $profile->booking_password = $request['booking_password'];
           $profile->email = $request['profile_email'];
           $profile->twitter = $request['twitter'];
           $profile->whatsapp = $request['whatsapp'];
           $profile->line = $request['line'];
           $profile->wechat = $request['wechat'];
           $profile->skype = $request['skype'];
           $profile->instagram = $request['instagram'];
           $profile->facebook = $request['facebook'];
           $profile->phone_number = $request['phone_number'];
           $profile->about_me = $request['about_me'];
           $profile->status = 'Active';

           if($request->hasFile('profile_image'))                    {
                $name = time().'_'.$request->file('profile_image')->getClientOriginalName();
            
                $request->file('profile_image')->storeAs('public/profiles', $name);
                $profile->profile_image = $name;
            }

            if($request->hasFile('cover_photo'))                    {
                $name = time().'_'.$request->file('cover_photo')->getClientOriginalName();
                $request->file('cover_photo')->storeAs('public/covers', $name);
                $profile->cover_photo = $name;
            }

           $profile->save();

           return redirect('/free-dashboard');
    }

    public function reset_password(Request $request)
    {
       
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|min:6|same:confirmpassword',
            'confirmpassword' => 'required|min:6',
        ]);

        $hashedPassword = Auth::user()->password;
       
        if (Hash::check($request->oldpassword , $hashedPassword )) {
  
          if (!Hash::check($request->newpassword , $hashedPassword)) {
  
            $users =User::find(Auth::user()->id);
            $users->password = Hash::make($request->newpassword);
            User::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));

            session()->flash('successmessage','password updated successfully');
            return redirect()->back();
        }
  
        else
        {
            session()->flash('errormessage','new password can not be the old password!');
            return redirect()->back();
        }
  
        }
  
        else{
            session()->flash('errormessage','old password doesnt matched ');
            return redirect()->back();
        }

    }

    public function edit_teacher_profile()
    {
        $profile = Auth::user()->profile;

        return view('frontend.teacher.edit-teacher-profile', compact('profile'));
    }

    public function get_all_packages_list()
    {
        $htmlResponse = view('frontend.package.packages-list')->render();

        return response([
            'success' => true,
            'htmlResponse' => $htmlResponse
        ]);
    }

    public function add_pakage(Request $request)
    {
        $package = new Package();
        $package->user_id = Auth::user()->id;
        $package->profile_id = Auth::user()->profile->id;
        $package->p_name = $request->get('p_name');
        $package->payment_url = $request->get('p_url');
        $package->status = 'Active';
        $package->save();

        return response([
            'success' => true,
        ]);
    }

    public function delete_package(Request $request)
    {
        Package::find($request->package_id)->delete();

        return response([
            'success' => true,
        ]);
    }

    public function get_teacher_profile($profile_name)
    {
        $profile = Profile::where('profile_name', $profile_name)->first();
        
        if($profile == null)
        {
            abort(404);
        }
        else
        {
            if($profile->user->account_type == 'Free' OR $profile->user->account_type == '14 days trial')
            {
                $free_ads = Ad::where('ad_type', 'Free Profile')->get();
                return view('frontend.account.free-profile', compact('profile', 'free_ads'));
            }
            else
            {
                if($profile->user->account_type == "Unpaid")
                {
                    $free_ads = Ad::where('ad_type', 'Free Profile')->get();
                    return view('frontend.account.free-profile', compact('profile','free_ads'));
                }
                else
                {
                    $profile_ads = Ad::where('ad_type', 'Search Page')->get();
                    return view('frontend.account.paid-profile', compact('profile','profile_ads'));
                }
                
            }
        }
    }

    public function check_booking_password(Request $request)
    {
        $profile_id = $request->get('profile_id');
        $password = $request->get('password');

        $profile = Profile::find($profile_id);
        if($profile->booking_password == $password)
        {
            return response([
                'success' => 'true',
                'redirect_url'=> $profile->booking_link
            ]);
        }
        else
        {
            return response([
                'success' => 'false'
            ]);
        }
    }

    public function review_store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'nationality' => 'required',
            'rating' => 'required',
            'review' => 'required',
        ]);

        $review = new Review();
        $review->profile_id = $request->profile_id;
        $review->name= $request->name;
        $review->nationality = $request->nationality;
        $review->review= $request->review;
        $review->rating = $request->rating;

        if($request->hasFile('image'))                    {
            $name = time().'_'.$request->file('image')->getClientOriginalName();
        
            $request->file('image')->storeAs('public/profiles', $name);
            $review->image = $name;
        }
       
        if($review->save())
        {
            $profile = Profile::find($request->profile_id);
            $profile->ranking_score = $profile->ranking_score + 1;
            $profile->save();
        }

        return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
    }

    public function approve_review($id)
    {
        $review = Review::find($id);

        $review->status = 'Approved';

        $review->save();

        return redirect()->back();
    }

    public function decline_review($id)
    {
        $review = Review::find($id);

        $review->status = 'Declined';

        $review->save();

        return redirect()->back();
    }

    public function find_teacher()
    {
        $profiles = Profile::orderBy('ranking_score','desc')->get();
        $subjects = Profile::pluck('subjects_taught');
        $profile_ads = Ad::where('ad_type', 'Search Page')->get();
        
        return view('frontend.teacher.find-teacher', compact('profiles','subjects', 'profile_ads'));
    }

    public function get_teachers_profiles(Request $request)
    {
        $subject = $request->get('subject');
        $nationality = $request->get('nationality');
        $language = $request->get('language');
        $sort_by = $request->get('sort_by');

        $query = Profile::query();

        if($subject == "All")
        {
           $query->where("subjects_taught", 'Like', '%');
        }
        else
        {
            $query->whereJsonContains('subjects_taught', $subject);
        }

        if($nationality == "All")
        {
           $query->where("nationality", 'Like', '%');
        }
        else
        {
            $query->where('nationality', $nationality);
        }

        if($language == "All")
        {
           $query->where("languages", 'Like', '%');
        }
        else
        {
            $query->whereJsonContains('languages', $language);
        }

        if($sort_by == "all")
        {
           $query->orderBy('id');
        }

        if($sort_by == "name")
        {
           $query->orderBy('teacher_name');
        }

        if($sort_by == "price")
        {
           $query->orderBy('lesson_price','asc');
        }
        

        $profiles = $query->get();

        if($sort_by == "rating")
        {
           $profiles = $profiles->sortByDesc(function ($profile, $key) {
                return $profile->reviews->avg('rating');
            });
        }
        
        
        $htmlResponse = view('frontend.profile.profile', compact('profiles'))->render();

        return response([
            'success' => true,
            'htmlResponse' => $htmlResponse
        ]);
    }

    public function search_teacher_by_username(Request $request)
    {
        $teacher_name = $request->get('teacher_name');

        $profiles = Profile::where(function ($q) use ($teacher_name) {
            $q->where('profiles.teacher_name', 'LIKE', '%' . $teacher_name . '%');
        })->select('profiles.*')->orderBy('ranking_score', 'desc')->get();

        $subjects = Profile::pluck('subjects_taught');

        return view('frontend.teacher.find-teacher', compact('profiles', 'subjects', 'teacher_name'));

    }
}
