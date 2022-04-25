<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Tour;
use App\Models\Attraction;
use Illuminate\Database\Eloquent\Builder;

class TourController extends Controller
{
	public function index(){
		$tours = Tour::simplePaginate('5');
        $tours->onEachSide(2)->links();
		return view('dashboard/tours', ['tours' => $tours]);
	}
    public function create(){
    		$attractions = Attraction::all();
    	return view('create_tour', ['attractions' => $attractions]);
    }

    public function store(){	
    	$attributes = request()->validate([
            'description' => 'required',
            'cost' => 'required|digits_between:0, 1000000000',
            'date' => 'required|date|date_format:Y-m-d', 
            'attraction_id' => ['required', Rule::exists('attractions', 'id')]

        ]);

    	Tour::create($attributes);

    	return redirect('/dashboard/tours');
    }

     public function edit(Tour $tour){
     	$attractions = Attraction::all();
    	return view('edit_tour', ['tour' => $tour, 'attractions' => $attractions]);
    }

    public function update(Tour $tour){

    	$attributes = request()->validate([
            'description' => 'required',
            'cost' => 'required|digits_between:0, 1000000000',
            'date' => 'required|date|date_format:Y-m-d', 
            'attraction_id' => ['required', Rule::exists('attractions', 'id')]
        ]);
        $tour->update($attributes);
    	return back()->with('success', 'Tour Updated!');
    }

    public function destroy(Tour $tour){
  		$tour->delete();
    	echo json_encode(['success' => 'true', 'message' => 'Tour Deleted!']);	 
    }

    public function search(){
        $tours = Tour::with('attraction')
            ->whereHas('attraction', function (Builder $query) {
                $query->where('location', 'like', '%' . request('search_tours') . '%');
            })
            ->orWhere('description', 'like', '%' . request('search_tours') . '%')
            ->simplePaginate('5')
            ->setPath('/');

        $html = '';        

        foreach ($tours as $tour){
            $html .= '
            <tr>
                <td class="w-50">' . $tour->description . '</td>
                <td>' . date("Y-M-d", strtotime($tour->date)) . '</td>
                <td>' . $tour->attraction->location . '</td>
                <td>' . $tour->cost . '&euro;</td>
                <td>
                    <div class="flex-shrink-0">';
                        if (!empty($tour->attraction->image)){
                            $html .= '<img src="' . asset('storage/' . $tour->attraction->image ) . '" alt="" width="120" height="120" class="rounded-xl">';
                        }
                        else{
                            $html .= '<img src="' . asset('storage/images/special/no_image.png' ) . '" alt="" width="120" height="120" class="rounded-xl">';
                        }
                        
            $html .= '</div>
                </td>
            </tr>';
        }
        $paginationLinks = $tours->onEachSide(2)->links()->render();
        echo json_encode(['html' => $html, 'pagination_links' => $paginationLinks]);  
        //return Response::json(View::make('includes.posts', ['posts' => $posts])->render());
    }
}
