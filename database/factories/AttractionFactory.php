<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Attraction;

class AttractionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        
        // if($chosen_location != '')
        //     return [
        //         'location' => getLocation(),
        //         'image' => 'images/special/no_image.png'
        //     ];
        // else
        //     die('all attractions created');
        $locations = ['Berlin', 'Chisinau', 'Tokyo', 'Chicago', 'London', 'Kiev', 'Paris', 'Oslo'];
        return [
                'location' => $this->faker->unique()->randomElement($locations), //$this->getLocation(),
                'image' => ''
            ];
    }

    // private function getLocation(){
    //     $locations = ['Berlin', 'Chisinau', 'Tokyo', 'Chicago', 'London', 'Kiev', 'Paris', 'Oslo'];
    //     $chosen_location = '';

    //     $attractions = Attraction::get();
    //     $attraction_locations = [];
    //     foreach ($attractions as $attraction) {
    //         array_push($attraction_locations, $attraction->location);
    //     }

    //     foreach($locations as $location){
    //         if(!in_array($location, $attraction_locations)){
    //             $chosen_location = $location;
    //             break; 
    //         }
    //     }    
        
    //     if($chosen_location == ''){
    //         $chosen_location = $this->faker->word();
    //     }

    //     return $chosen_location;
    // }
}
