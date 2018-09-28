<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PiHotelRoomMaster ;
use App\PiRoomAmentie;
use App\PiHotelroomAmenityMapping;
use App\PiHotelRoomRateMaster;
use DB;
class PiHotelRoomMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = PiHotelRoomMaster::get();
        
        return view('hotel_room.index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotel_room.create');
    }

/**
     * Create.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function uploadImages()
    {
        // $imgName = request()->file->getClientOriginalName();
        // request()->file->move(public_path('images'), $imgName);
        // return response()->json(['uploaded' => '/images/'.$imgName]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $inputs = $request->all();
       $HotelRoom = new PiHotelRoomMaster;
        $data = $this->validate($request, [
            'fk_hotel_id'=>'required',
            'room_type'=> 'required',
            'room_name'=> 'required',
            'description'=> 'required',
            'fk_category'=> 'required'
            
        ]);
        //$Imagedata[] ='';
        if($request->hasfile('file'))
        {

            foreach($request->file('file') as $file)
             {
            $name=$file->getClientOriginalName();
            $ext=substr(strrchr($name,'.'),1);
            $rand=rand(0000000,9999999).'_'.rand(0000000,9999999).'_'.rand(0000000,9999999).".".$ext;
            $file->move(public_path().'/hotel_room/', $rand);  
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
       $HotelRoom->fk_hotel_id=trim($inputs['fk_hotel_id']);
       $HotelRoom->room_type=trim($inputs['room_type']);
       $HotelRoom->room_name=trim($inputs['room_name']); 
       $HotelRoom->description=trim($inputs['description']);
       $HotelRoom->fk_category=trim($inputs['fk_category']);
       $HotelRoom->hotel_room_images=trim($image_implode);
       $today = date("Y-m-d");
       $HotelRoom->created_on=$today;
        $HotelRoom->modified_on=$today;
        $HotelRoom->deleted_on=$today;
        $HotelRoom->created_by=1;
        $HotelRoom->modified_by=1;
        $HotelRoom->deleted_by=1;
        $HotelRoom->is_active=1;
        
        $HotelRoom->save();
         if($HotelRoom) {
                   \Session::flash('flash_message',"Hotel Room added successfully.");
                  //return redirect()->route('/hotel_listing');
                  return redirect('hotel_room_listing');

            } else { 
                 \Session::flash('flash_message',$message);
                  return redirect('/add_hotel_room')->withInput($request->input());
                
            }   
        
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $hotel_room = PiHotelRoomMaster::where('id', $id)->first();

        return view('hotel_room.edit', compact('hotel_room', 'id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {
         $inputs = $request->all();
            $data = $this->validate($request, [
            'fk_hotel_id'=>'required',
            'room_type'=> 'required',
            'room_name'=> 'required',
            'description'=> 'required',
            'fk_category'=> 'required'
        ]);
        $Imagedata =[];
        if($request->hasfile('file'))
        {

            foreach($request->file('file') as $file)
             {
            $name=$file->getClientOriginalName();
            $ext=substr(strrchr($name,'.'),1);
            $rand=rand(0000000,9999999).'_'.rand(0000000,9999999).'_'.rand(0000000,9999999).".".$ext;
            $file->move(public_path().'/hotel_room/', $rand);  
            $Imagedata[] = $rand;  
             }

         }
          $Hotel_Room = PiHotelRoomMaster::find($id);
         // print_r($Hotel);
      if(count($Imagedata) > 0)
      {
        $image_implode=$Hotel_Room->hotel_room_images;
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
        $image_implode=$Hotel_Room->hotel_images;
      }
     
       $Hotel_Room->fk_hotel_id=trim($inputs['fk_hotel_id']);
       $Hotel_Room->room_type=trim($inputs['room_type']);
       $Hotel_Room->room_name=trim($inputs['room_name']);
       $Hotel_Room->description=trim($inputs['description']);
       $Hotel_Room->fk_category=trim($inputs['fk_category']);
       $Hotel_Room->hotel_room_images=trim($image_implode);
       $today = date("Y-m-d");
       $Hotel_Room->created_on=$today;
       $Hotel_Room->modified_on=$today;
       $Hotel_Room->deleted_on=$today;
       $Hotel_Room->created_by=1;
       $Hotel_Room->modified_by=1;
       $Hotel_Room->deleted_by=1;
       $Hotel_Room->is_active=1;
       $Hotel_Room->save();
         if($Hotel_Room) {
                   \Session::flash('flash_message',"Hotel Room updated successfully.");
                  return redirect('hotel_room_listing');

            } else { 
                 \Session::flash('flash_message',$message);
                  return redirect('/edit_hotel_room')->withInput($request->input());
                
            }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $res=PiHotelRoomMaster::where('id',$id)->delete();
                 \Session::flash('flash_message',"Hotel Room has been deleted!!.");
        return redirect('/hotel_room_listing')->with('success', 'Hotel Room has been deleted!!');
        //return view('hotel_room.index',compact('hotels'));
    }
    
    public function hotel_room_search (Request $request){
         $inputs = $request->all();
         $fk_hotel_id  =$inputs['fk_hotel_id'];
         $hotel_room_name  =$inputs['hotel_room_name'];
         $final_query ="";
         $fk_hotel_id  =$inputs['fk_hotel_id']; 
        if(isset($fk_hotel_id) && $fk_hotel_id !=''){ 
                 $final_query .=  "AND fk_hotel_id =$fk_hotel_id"; 
            }
        if(isset($hotel_room_name) && $hotel_room_name !=''){ 
                 $final_query .=  " AND room_name LIKE '%$hotel_room_name%'"; 
            }
        $sql ="select * from  pi_hotel_room_masters where is_active = 1 $final_query"; 
        $hotels = DB::select( DB::raw($sql) );
       // echo "<pre>"; print_r($hotels); die("check data");
        if(is_array($hotels)){
            $hotels = $hotels;
        } else{
            $hotels = "No Records Found";
        }
        return view('hotel_room.index',compact('hotels'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_hotel_room_amenties($id)
    {
         $amentie_listing = PiRoomAmentie::where('is_active', 1)->get();
        
         $hotel_room = PiHotelRoomMaster::select('id', 'room_name as room_name', 'is_active')->where(
                [
                    ['id', '=', $id],
                    ['is_active', '=', '1'],
                ]
            )->first();
        return view('hotel_room.add_hotel_room_amenties',compact('country_listing','amentie_listing','hotel_room','id'));
    }



/**
     * update_hotel_amenties.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_hotel_room_amenties(Request $request,$id)
    {
       $inputs = $request->all();
       $count =  PiHotelroomAmenityMapping::where(
                [
                    ['fk_hotelroom_master_id', '=', $id],
                    ['is_active', '=', '1'],
                ]
        )->count();
        if($count>0)
        {
            $Hotelroommaster = new PiHotelroomAmenityMapping;
            $Hotelroommaster->where('fk_hotelroom_master_id', $id)->update(['is_active'=>0]);
        }
       
    if($request->has('hotel_room_amentie'))
    {
        $hotel_amentie_arr = $inputs['hotel_room_amentie'];
        $count_amentie=count($hotel_amentie_arr);
        if($count_amentie>0)
        {   
            foreach($hotel_amentie_arr as $hotel_room_amentie)
                {     
                     $HotelRoomAmentie = new PiHotelroomAmenityMapping;
                     $HotelRoomAmentie->fk_hotelroom_master_id =$id;
                     $HotelRoomAmentie->fk_hotelroom_amenties_master_id =$hotel_room_amentie;
                     $today = date("Y-m-d");
                     $HotelRoomAmentie->created_on=$today;
                     $HotelRoomAmentie->modified_on=$today;
                     $HotelRoomAmentie->deleted_on=$today;
                     $HotelRoomAmentie->created_by=1;
                     $HotelRoomAmentie->modified_by=1;
                     $HotelRoomAmentie->deleted_by=1;
                     $HotelRoomAmentie->is_active=1;
                     $HotelRoomAmentie->save();
                     if($HotelRoomAmentie) {
                                 
                     }
                }
                 \Session::flash('flash_message',"Selected Hotel Room Amenties Aded Successfully.");
                            return redirect('/hotel_room_listing/'); 
        }
    }
        
        \Session::flash('flash_message',"Selected amenties added successfully.");
        return redirect('/add_hotel_room_amenties/'.$id);
        
    }

   public function add_hotel_room_rate($hotel_id,$id) {
        return view('hotel_room.add_hotel_room_rate',compact('hotel_id','id'));
   }
   
   public function hotel_room_rate_save(Request $request){
       
         $inputs = $request->all(); 
            $data = $this->validate($request, [
            'rate'=>'required',
            'from_date'=> 'required',
            'to_date'=> 'required',
            'fk_hotel_master_id'=> 'required',
            'fk_hotelroom_master_id'=> 'required'
        ]);
        $HotelRoomRate = new PiHotelRoomRateMaster;
        $HotelRoomRate->fk_hotel_master_id=trim($inputs['fk_hotel_master_id']);
        $HotelRoomRate->fk_hotelroom_master_id=trim($inputs['fk_hotelroom_master_id']);
        $HotelRoomRate->from_date=trim($inputs['from_date']);
        $HotelRoomRate->to_date=trim($inputs['to_date']);
        $HotelRoomRate->rate=trim($inputs['rate']);    
        $HotelRoomRate->is_refundable=1;
        $today = date("Y-m-d");
        $HotelRoomRate->created_on=$today;
        $HotelRoomRate->modified_on=$today;
        $HotelRoomRate->deleted_on=$today;
        $HotelRoomRate->created_by=1;
        $HotelRoomRate->modified_by=1;
        $HotelRoomRate->deleted_by=1;
        $HotelRoomRate->is_active=1;
        $HotelRoomRate->save();
         if($HotelRoomRate) {
                   \Session::flash('flash_message',"Hotel Room Rate Add successfully.");
                  return redirect('hotel_room_rate_list');

            } else { 
                 \Session::flash('flash_message',$message);
                  return redirect('/hotel_room_rate_list')->withInput($request->input());
                
            }
   }
   public function hotel_room_rate_list()
    {
        $hotel_room_rate = PiHotelRoomRateMaster::where('is_active',"1")->get();
        //echo "<pre>"; print_r($hotel_room_rate); die("mm");
        return view('hotel_room.hotel_room_rate_list',compact('hotel_room_rate'));
    }
}