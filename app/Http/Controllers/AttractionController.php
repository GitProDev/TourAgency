<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;
use Illuminate\Validation\Rule;
use App\Models\Tour;

class AttractionController extends Controller
{
    public function index(){
        $attractions = Attraction::simplePaginate('5');
		return view('dashboard/attractions', ['attractions' => $attractions]);
    }

    public function create(){

    	return view('create_attraction');	
    }

    public function store(){
    	$attributes = request()->validate([
            'location' => ['required', 'max:255', Rule::unique('attractions', 'location')],
            'image' => 'required|image'
        ]);

    	$attributes = array_merge($attributes, [
    		'image' => request()->file('image')->store('images')
    	]);
    	
    	Attraction::create($attributes);

    	return redirect('/dashboard/attractions');
    }
    public function edit(Attraction $attraction){
    	return view('edit_attraction', ['attraction' => $attraction]);		
    }

    public function update(Attraction $attraction){
		$attributes = request()->validate([
            'location' => ['required', 'max:255', Rule::unique('attractions', 'location')->ignore($attraction->id)],
            'image' => 'image'
        ]);

        if(isset($attributes['image'])){
            $img_path = request()->file('image')->store('images');
    		$attributes['image'] = $img_path;
        }
        else
            $img_path = '';

    	$attraction->update($attributes);

    	return back()->with('success', 'Attraction Updated!');
        //echo json_encode(['success' => 'true', 'img_path' => $img_path]);
	}

	public function destroy(Attraction $attraction){
    	$tours = Tour::where('attraction_id', $attraction->id)->get();
		if(count($tours) == 0){
			$attraction->delete();
    		echo json_encode(['success' => 'true', 'message' => 'Attraction Deleted!']);	 
		}
		else{
			echo json_encode(['success' => 'false', 'message' => 'This attraction is in use!']);	
		}    
    }

    public function delete_image(Attraction $attraction){
    	$attributes['image'] = '';
    	$attraction->update($attributes);
    	echo json_encode(['success' => 'true', 'message' => 'Attraction Image Deleted!']);
    }
}
