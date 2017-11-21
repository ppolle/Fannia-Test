<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
Use App\User;

class UserController extends Controller
{

	
    public function getIndex(){

    	$firstDateRecord = User::orderBy('created_at','asc')->limit(1)->first();
		$firstDate = new \DateTime($firstDateRecord->created_at);
    	
    	$lastDateRecord = User::orderBy('created_at','desc')->limit(1)->first();
    	$lastDate = new \DateTime($lastDateRecord->created_at);

    	$noOfDays=$firstDate->diff($lastDate)->format('%d');
    	$noOfWeeks=ceil($noOfDays/7);

    	
    	$current_date=$firstDateRecord->created_at;
        $weekly=[];
    	for($i=1;$i<=$noOfWeeks;$i++){
    		$newDate = date('Y-m-d', strtotime($current_date ."+ 6 days"));
    		$weeklyUsers = User::where('created_at','>=',$current_date)->where('created_at','<=',$newDate)->count();
    		$onboardingStages=[0,20,40,50,70,90,99,100];
    		$percentageOfUsers=[];
    		foreach ($onboardingStages as $stage) {
    			$numberOfUsersOnStage= User::where('created_at','>=',$current_date)
    									->where('created_at','<=',$newDate)
                                        ->where('onboarding_percentage','>=',$stage)->count();
                $percentage=($numberOfUsersOnStage>0)?round(($numberOfUsersOnStage/$weeklyUsers)*100,2):0;
                // $percentageOfUsers[$stage]=$percentage;
                array_push($percentageOfUsers, $percentage);
    		}
            $weekName="Week ".$i;
            $array=[
                'name'=>$weekName,
                'data'=>$percentageOfUsers
            ];
            // $weekly[$i]=$array;
            array_push($weekly, $array);
    		$current_date=$newDate;

    	}
        //echo "<pre>".var_export(json_encode($weekly),TRUE)."</pre>";
        //exit();
       // dd(json_encode($weekly));
       $weekly=json_encode($weekly);
       $onboardingStages=json_encode($onboardingStages);
    return view('welcome',compact('weekly','onboardingStages'));
    }
}
