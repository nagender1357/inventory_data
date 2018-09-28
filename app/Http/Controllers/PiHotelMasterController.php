<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PiHotelmaster as Hotelmaster;
use App\PiCountry as PiCountry;
use App\PiState as PiState;
use App\PiCity as PiCity;
use App\PiHotelAmentie as PiHotelAmentie;
use App\PiHotelLandmark as PiHotelLandmark;
use App\PiHotelAmenityMapping as PiHotelAmenityMapping;
use App\PiHotelCancellationPolicie as PiHotelCancellationPolicie;
use App\PiHotelTermsCondition as PiHotelTermsCondition;
use Validator;
use Illuminate\Validation\Rule;
use DB;



class PiHotelMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotelmaster::where('is_active', 1)->get();
        $inputs=[];
        $search = 0;
        $count=count($hotels);
        return view('hotel.index',compact('hotels','inputs','search','count'));
    }

    /**
     * addEdit hotel amenties
     *
     * @return \Illuminate\Http\Response
     */
    public function addEdit_hotel_amenties($id)
    {
         $amentie_listing = PiHotelAmentie::where('is_active', 1)->get();
         $hotel = Hotelmaster::select('id', 'hotel_name as hotel_name', 'is_active')->where(
                [
                    ['id', '=', $id],
                    ['is_active', '=', '1'],
                ]
            )->first();
        return view('hotel.addEdit_hotel_amenties',compact('country_listing','amentie_listing','hotel','id'));
    }



/**
     * Update Hotel Cancellation Policies.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_hotel_terms_conditions(Request $request,$id)
    {
       $inputs = $request->all();

        $customMessages = [
                'required' => ':attribute can not be blank.'
            ];
             $validator = Validator::make($request->all(), [
                 'terms_conditions1'=>'required',
                 'terms_conditions2'=>'required'
                ],$customMessages);
            if ($validator->fails()) {
                  \Session::flash('flash_message_err','Reqired field can not be blank');
                  return redirect('/hotel_terms_conditions/'.$id)->withInput($request->input());
                  exit();
            }


       $count =  PiHotelTermsCondition::where(
                [
                    ['fk_hotel_master_id', '=', $id],
                    ['is_active', '=', '1'],
                ]
        )->count();
        if($count>0)
        {
            $Hotelmaster = new PiHotelTermsCondition;
            $Hotelmaster->where('fk_hotel_master_id', $id)->update(['is_active'=>0]);
        }
        $PiHotelTermsCondition = new PiHotelTermsCondition; 
        $PiHotelTermsCondition->fk_hotel_master_id =$id; 
        if($request->has('terms_conditions1'))
        {
           $PiHotelTermsCondition->terms_conditions1=trim($inputs['terms_conditions1']); 
        }
        if($request->has('terms_conditions2'))
        {
           $PiHotelTermsCondition->terms_conditions2=trim($inputs['terms_conditions2']); 
        }
         $today = date("Y-m-d");
         $PiHotelTermsCondition->created_on=$today;
         $PiHotelTermsCondition->modified_on=$today;
         $PiHotelTermsCondition->deleted_on=$today;
         $PiHotelTermsCondition->created_by=1;
         $PiHotelTermsCondition->modified_by=1;
         $PiHotelTermsCondition->deleted_by=1;
         $PiHotelTermsCondition->is_active=1;
         $PiHotelTermsCondition->save();
         if($PiHotelTermsCondition) {
         \Session::flash('flash_message',"Hotel Terms and Conditions updated successfully.");
         return redirect('/hotel_terms_conditions/'.$id);           

         }
        
    }



/**
     * Update Hotel Cancellation Policies.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_hotel_cancellation_policies(Request $request,$id)
    {
       $inputs = $request->all();

        $customMessages = [
                'required' => ':attribute can not be blank.'
            ];
             $validator = Validator::make($request->all(), [
                 'cancellation1'=>'required',
                 'cancellation2'=>'required'
                ],$customMessages);
            if ($validator->fails()) {
                  \Session::flash('flash_message_err','Reqired field can not be blank');
                  return redirect('/hotel_cancellation_policies/'.$id)->withInput($request->input());
                  exit();
            }


       $count =  PiHotelCancellationPolicie::where(
                [
                    ['fk_hotel_master_id', '=', $id],
                    ['is_active', '=', '1'],
                ]
        )->count();
        if($count>0)
        {
            $Hotelmaster = new PiHotelCancellationPolicie;
            $Hotelmaster->where('fk_hotel_master_id', $id)->update(['is_active'=>0]);
        }
      $CancellationPolicie = new PiHotelCancellationPolicie; 
      $CancellationPolicie->fk_hotel_master_id =$id; 
        if($request->has('cancellation1'))
        {
           $CancellationPolicie->cancellation_policy1=trim($inputs['cancellation1']); 
        }
        if($request->has('cancellation2'))
        {
           $CancellationPolicie->cancellation_policy2=trim($inputs['cancellation2']); 
        }
         $today = date("Y-m-d");
         $CancellationPolicie->created_on=$today;
         $CancellationPolicie->modified_on=$today;
         $CancellationPolicie->deleted_on=$today;
         $CancellationPolicie->created_by=1;
         $CancellationPolicie->modified_by=1;
         $CancellationPolicie->deleted_by=1;
         $CancellationPolicie->is_active=1;
         $CancellationPolicie->save();
         if($CancellationPolicie) {
            \Session::flash('flash_message',"Hotel Cancellation Policies updated successfully.");
        return redirect('/hotel_cancellation_policies/'.$id);           

         }
        
    }


/**
     * Update Hotel Amenties.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_hotel_amenties(Request $request,$id)
    {
       $inputs = $request->all();
       $count =  PiHotelAmenityMapping::where(
                [
                    ['fk_hotel_master_id', '=', $id],
                    ['is_active', '=', '1'],
                ]
        )->count();
        if($count>0)
        {
            $Hotelmaster = new PiHotelAmenityMapping;
            $Hotelmaster->where('fk_hotel_master_id', $id)->update(['is_active'=>0]);
        }
        
    if($request->has('hotel_amentie'))
    {
        $hotel_amentie_arr = $inputs['hotel_amentie'];
        $count_amentie=count($hotel_amentie_arr);
        if($count_amentie>0)
        {
            foreach($hotel_amentie_arr as $hotel_amentie)
                {
                     $HotelAmentie = new PiHotelAmenityMapping;
                     $HotelAmentie->fk_hotel_master_id =$id;
                     $HotelAmentie->fk_hotel_amenties_master_id =$hotel_amentie;
                     $today = date("Y-m-d");
                     $HotelAmentie->created_on=$today;
                     $HotelAmentie->modified_on=$today;
                     $HotelAmentie->deleted_on=$today;
                     $HotelAmentie->created_by=1;
                     $HotelAmentie->modified_by=1;
                     $HotelAmentie->deleted_by=1;
                     $HotelAmentie->is_active=1;
                     $HotelAmentie->save();
                     if($HotelAmentie) {
                                   

                     }
                }
        }
    }
        
        \Session::flash('flash_message',"Amenties updated successfully.");
        return redirect('/add_hotel_amenties/'.$id);
        
    }


/**
     * Search hotel
     *
     * @return \Illuminate\Http\Response
     */
    public function search_hotel(Request $request)
    {
         $inputs = $request->all();
         $data = $this->validate($request, [
            'hotel_name'=>'required'
        ]);
         $customMessages = [
                'required' => ':attribute can not be blank.'
            ];
             $validator = Validator::make($request->all(), [
                 'hotel_name'=>'required'
                ],$customMessages);
            if ($validator->fails()) {
                         \Session::flash('flash_message',$message);
                  return redirect('/search_hotel')->withInput($request->input());
                        exit();
            }
         $search=1;
         $hotels = Hotelmaster::where('is_active', '=', '1');
           if($request->has('hotel_name'))
            {
                $hotels->where('hotel_name', 'like', '%'.$inputs['hotel_name'].'%');
            }
           $hotels= $hotels->get();
           $count=count($hotels);
         return view('hotel.index',compact('hotels','inputs','search','count'));
    }

    /**
     * Show add Hotel Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $country_listing = PiCountry::where('status', 1)->get();
         $amentie_listing = PiHotelAmentie::where('is_active', 1)->get();
        return view('hotel.create',compact('country_listing','amentie_listing'));
    }

    /**
     * Get State according to country id  .
     **/
    public function ajax_state($id,$state_id=null)    { 
        echo"s----$state_id<br>";
        $states = PiState::where('country_id',$id)->orderBy('state_name')->get();
        return view('hotel.ajax_state',compact('states','state_id'));
        die();
    } 

     /**
     * Get City according to state id  .
     **/
    public function ajax_city($id,$city_id=null)    { 
        $city = PiCity::where('state_id',$id)->orderBy('city_name')->get();
        return view('hotel.ajax_city',compact('city','city_id'));
        die();
    } 

/**
     * Create.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function uploadImages()
    {
    }




/**
     * Update Hotel Landmark.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function update_hotel_landmark(Request $request,$id)
    {
         $inputs = $request->all();
         $customMessages = [
                'required' => ':attribute can not be blank.'
            ];
             $validator = Validator::make($request->all(), [
                 'landmark_name.0'=>'required',
                 'distance_km.0'=>'required'
                ],$customMessages);
            if ($validator->fails()) {
                  \Session::flash('flash_message_err','Reqired field can not be blank');
                  return redirect('/hotel_landmark/'.$id)->withInput($request->input());
                  exit();
            }

           
       $count =  PiHotelLandmark::where(
                [
                    ['fk_hotel_master_id', '=', $id],
                    ['is_active', '=', '1'],
                ]
        )->count();
        if($count>0)
        {
            $Hotelmaster = new PiHotelLandmark;
            $Hotelmaster->where('fk_hotel_master_id', $id)->update(['is_active'=>0]);
        }
        
    if(trim($inputs['landmark_name']['0']) !=''  && trim($inputs['distance_km']['0']) !='' )
    {

        $hotel_arr = $inputs['landmark_name'];
        $count_data=count($hotel_arr);
        if($count_data>0)
        {
            $x=0;
            foreach($hotel_arr as $hotel_landmark)
                {
                     $landmark_name = trim($inputs['landmark_name'][$x]);
                     $description = trim($inputs['description'][$x]);
                     $distance_km = trim($inputs['distance_km'][$x]);

                     $HotelLandmark = new PiHotelLandmark;
                     $HotelLandmark->fk_hotel_master_id =$id;
                     $HotelLandmark->landmark_name= $landmark_name;
                     $HotelLandmark->description= $description;
                     $HotelLandmark->distance_km= $distance_km;
                     $today = date("Y-m-d");
                     $HotelLandmark->created_on=$today;
                     $HotelLandmark->modified_on=$today;
                     $HotelLandmark->deleted_on=$today;
                     $HotelLandmark->created_by=1;
                     $HotelLandmark->modified_by=1;
                     $HotelLandmark->deleted_by=1;
                     $HotelLandmark->is_active=1;
                     $HotelLandmark->save();
                     if($HotelLandmark) {
                                   

                     }
                    $x++;
                }
        }
    }
       
        \Session::flash('flash_message',"Record updated successfully.");
        return redirect('/hotel_landmark/'.$id);
    }


/**
     * Hotel Landmark.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function hotel_landmark($id)
    {
        $HotelLandmark = PiHotelLandmark::where(

                [
                    ['fk_hotel_master_id', '=', $id],
                    ['is_active', '=', '1'],
                ]
            )->orderBy('id')->get();
        $count = PiHotelLandmark::where(
            
                [
                    ['fk_hotel_master_id', '=', $id],
                    ['is_active', '=', '1'],
                ]
            )->count();
        $hotel = Hotelmaster::select('id', 'hotel_name as hotel_name', 'is_active')->where(
                [
                    ['id', '=', $id],
                    ['is_active', '=', '1'],
                ]
            )->first();
         return view('hotel.hotel_landmark',compact('id','hotel','HotelLandmark','count'));
    }

/**
     * Hotel Cancellation Policies.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function hotel_cancellation_policies($id)
    {
         $cancellation_get = PiHotelCancellationPolicie::select('id', 'fk_hotel_master_id','cancellation_policy1' ,'cancellation_policy2', 'is_active')->where(

                [
                    ['fk_hotel_master_id', '=', $id],
                    ['is_active', '=', '1'],
                ]
            )->first();
         $count = PiHotelCancellationPolicie::select('id', 'fk_hotel_master_id','cancellation_policy1' ,'cancellation_policy2', 'is_active')->where(

                [
                    ['fk_hotel_master_id', '=', $id],
                    ['is_active', '=', '1'],
                ]
            )->count();
        // echo"count--$count<br>";die();
         $hotel = Hotelmaster::select('id', 'hotel_name as hotel_name', 'is_active')->where(
                [
                    ['id', '=', $id],
                    ['is_active', '=', '1'],
                ]
            )->first();
     return view('hotel.hotel_cancellation_policies',compact('id','hotel','cancellation_get','count'));
    }

    /**
     * Hotel Terms Conditions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function hotel_terms_conditions($id)
    {
         $TermsCondition_get = PiHotelTermsCondition::select('id', 'fk_hotel_master_id','terms_conditions1' ,'terms_conditions2', 'is_active')->where(

                [
                    ['fk_hotel_master_id', '=', $id],
                    ['is_active', '=', '1'],
                ]
            )->first();
         $hotel = Hotelmaster::select('id', 'hotel_name as hotel_name', 'is_active')->where(
                [
                    ['id', '=', $id],
                    ['is_active', '=', '1'],
                ]
            )->first();
          $count = PiHotelTermsCondition::select('id', 'fk_hotel_master_id','terms_conditions1' ,'terms_conditions2', 'is_active')->where(

                [
                    ['fk_hotel_master_id', '=', $id],
                    ['is_active', '=', '1'],
                ]
            )->count();
     return view('hotel.hotel_terms_conditions',compact('id','hotel','TermsCondition_get','count'));
    }
    

    /**
     * Store in hotel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $inputs = $request->all();
       $Hotel = new Hotelmaster;
        $data = $this->validate($request, [
            'hotel_name'=>'required',
            'hotel_code'=>'required',
            'contact_person'=> 'required',
            'contact_email_id'=> 'required',
            'star_rating'=> 'required',
            'latitude'=> 'required',
            'longitude'=> 'required',
            'address_line1'=> 'required',
            'country'=> 'required',
            'state_id'=> 'required',
            'city_id'=> 'required'
        ]);
        $count =  Hotelmaster::where(
                [
                    ['hotel_code', '=', trim($inputs['hotel_code'])],
                    ['is_active', '=', '1'],
                ]
        )->count();
        if($count>0)
        {
        \Session::flash('flash_message_data',"Given hotel code already exists.");
        \Session::flash('flash_message',$message);
        return redirect('/add_hotel')->withInput($request->input());
        exit();
         }
        if($request->hasfile('file'))
        {

            foreach($request->file('file') as $file)
             {
            $name=$file->getClientOriginalName();
            $ext=substr(strrchr($name,'.'),1);
            $rand=rand(0000000,9999999).'_'.rand(0000000,9999999).'_'.rand(0000000,9999999).".".$ext;
            $file->move(public_path().'/images/', $rand);  
            $Imagedata[] = $rand;  
             }

         }
          if(count($Imagedata) > 0)
          {
            $image_implode=implode(',',$Imagedata);
          }
          else
          {
            $image_implode='';
          }

       $Hotel->hotel_name=trim($inputs['hotel_name']);
       $Hotel->contact_person=trim($inputs['contact_person']);
       $Hotel->contact_email_id=trim($inputs['contact_email_id']);
       $Hotel->star_rating=trim($inputs['star_rating']);
       $Hotel->latitude=trim($inputs['latitude']);
       $Hotel->longitude=trim($inputs['longitude']);
       $Hotel->address_line1=trim($inputs['address_line1']);
       $Hotel->address_line2=trim($inputs['address_line2']);
       $Hotel->country=trim($inputs['country']);
       $Hotel->state=trim($inputs['state_id']);
       $Hotel->city=trim($inputs['city_id']);
       $Hotel->hotel_images=trim($image_implode);
       $today = date("Y-m-d");
       $Hotel->created_on=$today;
       $Hotel->modified_on=$today;
       $Hotel->deleted_on=$today;
       $Hotel->created_by=1;
       $Hotel->modified_by=1;
       $Hotel->deleted_by=1;
       $Hotel->is_active=1;
       $Hotel->save();
         if($Hotel) {
                   \Session::flash('flash_message',"Record added successfully.");
                  //return redirect()->route('/hotel_listing');
                  return redirect('hotel_listing');

            } else { 
                 \Session::flash('flash_message',$message);
                  return redirect('/add_hotel')->withInput($request->input());
                
            }   
        
    }

    /**
     * show Edit Hotel
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotelmaster::where('id', $id)->first();
        $country_listing = PiCountry::where('status', 1)->get();

        return view('hotel.edit', compact('hotel', 'id' , 'country_listing'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update Hotel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $inputs = $request->all();
            $data = $this->validate($request, [
            'hotel_name'=>'required',
            'hotel_code'=>'required',
            'contact_person'=> 'required',
            'contact_email_id'=> 'required',
            'star_rating'=> 'required',
            'latitude'=> 'required',
            'longitude'=> 'required',
            'address_line1'=> 'required',
            'country'=> 'required',
            'state_id'=> 'required',
            'city_id'=> 'required'
        ]);
        $Imagedata =[];
        if($request->hasfile('file'))
        {

            foreach($request->file('file') as $file)
             {
            $name=$file->getClientOriginalName();
            $ext=substr(strrchr($name,'.'),1);
            $rand=rand(0000000,9999999).'_'.rand(0000000,9999999).'_'.rand(0000000,9999999).".".$ext;
            $file->move(public_path().'/images/', $rand);  
            $Imagedata[] = $rand;  
             }

         }
          $Hotel = Hotelmaster::find($id);
      if(count($Imagedata) > 0)
      {
        $image_implode=$Hotel->hotel_images;
        if($image_implode!='')
        {
            $image_implode=$image_implode.','.implode(',',$Imagedata);    
        }
        else
        {
          $image_implode=implode(',',$Imagedata);    
        }
        
      }
      else
      {
        $image_implode=$Hotel->hotel_images;
      }
     
       $Hotel->hotel_name=trim($inputs['hotel_name']);
       $Hotel->hotel_code=trim($inputs['hotel_code']);
       $Hotel->contact_person=trim($inputs['contact_person']);
       $Hotel->contact_email_id=trim($inputs['contact_email_id']);
       $Hotel->star_rating=trim($inputs['star_rating']);
       $Hotel->latitude=trim($inputs['latitude']);
       $Hotel->longitude=trim($inputs['longitude']);
       $Hotel->address_line1=trim($inputs['address_line1']);
       $Hotel->address_line2=trim($inputs['address_line2']);
       $Hotel->country=trim($inputs['country']);
       $Hotel->state=trim($inputs['state_id']);
       $Hotel->city=trim($inputs['city_id']);
       $Hotel->hotel_images=trim($image_implode);
       $today = date("Y-m-d");
       $Hotel->created_on=$today;
       $Hotel->modified_on=$today;
       $Hotel->deleted_on=$today;
       $Hotel->created_by=1;
       $Hotel->modified_by=1;
       $Hotel->deleted_by=1;
       $Hotel->is_active=1;
       $Hotel->save();
         if($Hotel) {
                   \Session::flash('flash_message',"Record updated successfully.");
                  return redirect('hotel_listing');

            } else { 
                 \Session::flash('flash_message',$message);
                  return redirect('/edit_hotel')->withInput($request->input());
                
            }  
    }

/**
     * Remove Image .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function removeItemString($str, $item) {
$parts = explode(',', $str);
while(($i = array_search($item, $parts)) !== false) {
unset($parts[$i]);
}
return implode(',' ,$parts);
}



public function gallery_image_delete($id,$no)
    {
        $listing_gallery_obj = Hotelmaster::findOrFail($id);
        $image_data=$listing_gallery_obj->hotel_images;
        $expImages=explode(',', $image_data);
        $count=count($expImages);
        $del=$expImages[$no];
        $result_string = $this->removeItemString($image_data, $del);
        \File::delete('images/'.$del);
        $Hotelmaster = new Hotelmaster;
        $Hotelmaster->where('id', $id)->update(['hotel_images'=>trim($result_string)]);
        \Session::flash('flash_message', 'Image Deleted Successfully');
        return redirect('/edit_hotel/'.$id);

    }

    

    /**
     * Delete Landmark
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_landmark($hid,$id)
    {
        $HotelLandmark = new PiHotelLandmark;
        $HotelLandmark->where(
                [
                    ['id', '=' ,$id],
                    ['fk_hotel_master_id', '=' ,$hid],
                ]
            )->update(['is_active'=>0]);
          \Session::flash('flash_message','Record has been deleted!!');
        return redirect('/hotel_landmark/'.$hid);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Hotelmaster = Hotelmaster::find($id);
        $image_data=$Hotelmaster->hotel_images;
        $expImages=explode(',', $image_data);
        $count=count($expImages);
        for($x=0;$x<$count;$x++)
        {
         $image=$expImages[$x];
         \File::delete('images/'.$image);
        }
        $Hotelmaster = new Hotelmaster;
        $Hotelmaster->where('id', $id)->update(['is_active'=>0]);
         \Session::flash('flash_message','Record has been deleted!!');
        return redirect('/hotel_listing');
    }
}