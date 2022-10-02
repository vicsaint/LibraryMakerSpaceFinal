<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmoUsers;
use App\Models\Emo;


class WelcomeController extends Controller {

	/**

	 * Create a new controller instance.

	 *

	 * @return void

	 */

	public function __construct() {

		//$this->middleware('auth');

	}

	public function regsForm(Request $request) {
  
         $fn = $request->fullname;
         $age = $request->age;

      if(trim($fn) == ''){
        die("Full Name is required");
      }

       $data = EmoUsers::create([
            'fullname'              => $fn,
            'age'                   => $age,
        ]);
        
        $request->session()->put('sessionUserId', $data->id);
        
        return redirect('/one');

		//return view('test.index');
	}

    public function oneData(Request $request) {

      $logId = $request->session()->get('sessionUserId');
      $emo = $request->emo;
      
      $e = Emo::where('user_id', $logId)->first();
      
      if($e != null){
        
        $e->one = $emo;
        $e->save();

      } else {

        Emo::create([
            'user_id' => $logId,
            'one'=> $emo,

        ]);

      }
     
      return redirect('/two');
    
    }

    public function twoData(Request $request) {

        
      $logId = $request->session()->get('sessionUserId');
      $emo = $request->emo;
      
      $e = Emo::where('user_id', $logId)->first();
      
      if($e != null){
        
        $e->two = $emo;
        $e->save();

      } 
     
      return redirect('/three');

    }

    public function threeData(Request $request) {

        $logId = $request->session()->get('sessionUserId');
        $emo = $request->emo;
        
        $e = Emo::where('user_id', $logId)->first();
        
        if($e != null){
          
          $e->three = $emo;
          $e->save();
  
        } 
       
        return redirect('/four');
      
    }
    
    public function fourData(Request $request) {

        $logId = $request->session()->get('sessionUserId');
        $emo = $request->emo;
        
        $e = Emo::where('user_id', $logId)->first();
        
        if($e != null){
          
          $e->four = $emo;
          $e->save();
  
        } 
       
        return redirect('/five');
      
    }
    
    public function fiveData(Request $request) {

        $logId = $request->session()->get('sessionUserId');
        $emo = $request->emo;
        
        $e = Emo::where('user_id', $logId)->first();
        
        if($e != null){
          
          $e->five = $emo;
          $e->save();
  
        } 
        
        return redirect('/six');
      
      
    }
    

    public function sixData(Request $request) {

      $logId = $request->session()->get('sessionUserId');
      $emo = $request->summary;
      
      $e = Emo::where('user_id', $logId)->first();
      
      if($e != null){
        
        $e->comments = $emo;
        $e->save();

      } 
      
    
      $c_em = Emo::all()->count();
      $numUsr = $c_em;

      $base = $numUsr * 5; 

      $happy_one = Emo::where('one', 'happy')->count();
      $happy_two = Emo::where('two', 'happy')->count();
      $happy_three = Emo::where('three', 'happy')->count();
      $happy_four = Emo::where('four', 'happy')->count();
      $happy_five = Emo::where('five', 'happy')->count();
      $tot_happy = ($happy_one + $happy_two + $happy_three + $happy_four + $happy_five);
      //echo $happy_one .' '. $happy_two .' '. $happy_three .' '. $happy_four .' '. $happy_five . '<br />';

      $neu_one = Emo::where('one', 'neutral')->count();
      $neu_two = Emo::where('two', 'neutral')->count();
      $neu_three = Emo::where('three', 'neutral')->count();
      $neu_four = Emo::where('four', 'neutral')->count();
      $neu_five = Emo::where('five', 'neutral')->count();

      $tot_neu = ($neu_one + $neu_two + $neu_three + $neu_four + $neu_five);
       
      //echo $neu_one .' '. $neu_two .' '. $neu_three .' '. $neu_four .' '. $neu_five;
      //echo '<br />';//$tot_neu;

      $sad_one = Emo::where('one', 'sad')->count();
      $sad_two = Emo::where('two', 'sad')->count();
      $sad_three = Emo::where('three', 'sad')->count();
      $sad_four = Emo::where('four', 'sad')->count();
      $sad_five = Emo::where('five', 'sad')->count();
      $tot_sad = ($sad_one + $sad_two + $sad_three + $sad_four + $sad_five);
      
      //echo $sad_one .' '. $sad_two .' '. $sad_three .' '. $sad_four .' '. $sad_five;
     return view('resultpage', compact('numUsr', 'tot_happy', 'tot_neu', 'tot_sad'));
    
  }

}
