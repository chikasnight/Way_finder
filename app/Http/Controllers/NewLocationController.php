<?php

namespace App\Http\Controllers;

use App\Models\NewLocation;
use Illuminate\Http\Request;

class NewLocationController extends Controller
{

    public function location(){
        return view('menu.create');
    }


    public function newLocation(Request $request){
        //validate request body
        $request->validate([
            'location_name'=>['required'],
            'location_state'=>['required'],
            'directions'=>['required'],
            'image' => ['mimes:png,jpeg,gif,bmp', 'max:2048'],
            

          
        ]);

        // //get the image
        // $image = $request->file('image');
        // $image_path = $image->getPathName();

        // // get original file name and replace any spaces with _
        // // example: ofiice card.png = timestamp()_office_card.pnp
        // $filename = time()."_".preg_replace('/\s+/', '_', strtolower($image->getClientOriginalName()));

        // // move image to temp location (tmp disk)
        // $tmp = $image->storeAs( $filename, 'public');
        if ($request->has('image')) {
            # code...
                //get the image
            $image = $request->file('image');
            //$image_path = $image->getPathName();
            
            // get original file name and replace any spaces with _
            // example: ofiice card.png = timestamp()_office_card.pnp

            $filename = $image->hashName();
    
            // move image to temp location (tmp disk)
            $path = $image->storeAs('app/public', $filename, 'public');
    
        } 

    
        //create a grocery
        $newLocation = NewLocation::create([
            'user_id'=>1,
            'name'=> $request->name,
            'location_name'=> $request->location_name,
            'location_state'=> $request->location_state,
            'directions'=> $request->directions,
            'image' => $filename,
            'disk' => config('site.upload_disk'),
        ]);


        //return cuccess response

        return redirect('/');
    }

    public function details($id){
        $location = NewLocation::find($id);
        if ($id) {
            # code...
            return view('location', compact('location'));
        }

        return redirect('/');
       
    }
    
    public function delete( $id){

        $location = Newlocation::find($id);
        if($location) {
            $location-> delete();

        }

        

        //$this->authorize('delete',$newlocation);
        //delete newReservation
       
        return redirect()->back(); 
    } 

}
