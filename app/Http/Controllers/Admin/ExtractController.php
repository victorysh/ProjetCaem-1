<?php

namespace App\Http\Controllers\Admin;

use Backpack\Base\app\Http\Controllers\AdminController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Excel;

class ExtractController extends AdminController {

	public function index(Request $request){

        $usersActif = DB::table('people')
        					->join('teachers_activities','people.id','=','teachers_activities.person_id')
        					->select('people.*')
                            ->get();   

        $districts = DB::table('districts')
					        ->get(); 
		
		$instruments = DB::table('instruments')
                            ->get(); 

        $activities = DB::table('activities')
                            ->get(); 
        
        $dataExtract = $this->getData($request);
    	$dataRequest = "";

    	if (!empty($request['agemin'])){       		
    		$dataRequest['agemin'] = $request["agemin"];
    	}
    	if (!empty($request['agemax'])){
    		$dataRequest['agemax'] = $request["agemax"];	
    	}
    	if (!empty($request['districts'])){
    		$dataRequest['districts'] = $request["districts"];
    	}
    	if (!empty($request['sday'])){
    		$dataRequest['sday'] = $request["sday"];
    	}
    	if (!empty($request['eday'])){
    		$dataRequest['eday'] = $request["eday"];
    	}
    	if (!empty($request['teachers'])){
    		$dataRequest['teachers'] = $request["teachers"];
    	}
    	if (!empty($request['instruments'])){    		 
    		$dataRequest['instruments'] = $request["instruments"];
    	}
    	if (!empty($request['activities'])){
    		$dataRequest['activities'] = $request["activities"];
    	}
    	if (!empty($request['days'])){
    		$dataRequest['days'] = $request["days"];
    	}
    	if (!empty($request['type'])){
    		$dataRequest['type'] = $request["type"];
    	}
	       
		return view('admin/extract',["usersActif" => $usersActif, "districts" => $districts, 'instruments' => $instruments, "activities" => $activities, "dataExtract" => $dataExtract, 'dataRequest' => $dataRequest ]); 

	}

    public function export(Request $request){
    	$dataExtract=$this->getData($request);
    	if (!empty($request['agemin'])){
        		// print_r($data['agemin']);
    		$dataRequest['agemin'] = $request["agemin"];
    	}
    	if (!empty($request['agemax'])){
    		$dataRequest['agemax'] = $request["agemax"];	
    	}
    	if (!empty($request['districts'])){
    		$dataRequest['districts'] = $request["districts"];
    	}
    	if (!empty($request['sday'])){
    		$dataRequest['sday'] = $request["sday"];
    	}
    	if (!empty($request['eday'])){
    		$dataRequest['eday'] = $request["eday"];
    	}
    	if (!empty($request['teachers'])){
    		$dataRequest['teachers'] = $request["teachers"];
    	}
    	if (!empty($request['instruments'])){
    		 
    		$dataRequest['instruments'] = $request["instruments"];
    	}
    	if (!empty($request['activities'])){
    		$dataRequest['activities'] = $request["activities"];
    	}
    	if (!empty($request['days'])){
    		$dataRequest['days'] = $request["days"];
    	}
    	if (!empty($request['type'])){
    		$dataRequest['type'] = $request["type"];
    	}

    	if ($dataRequest['type']==1){


	    	foreach ($dataExtract as $key => $value) {

	    		$dataExtract[$key]->age = $this->getAge($dataExtract[$key]->mem_birthday);
	    	}
    	}


    	$this->exportExcel($dataExtract,$dataRequest);
    }

    public function exportExcel($dataExtract,$dataRequest){


    		$GLOBALS['dataExtract'] = $dataExtract;
    		$GLOBALS['dataRequest'] = $dataRequest;
    		try{

	        	Excel::create('activities',function($excel){
	        		$excel->sheet('activities', function($sheet){
	        			$sheet->loadView('admin/export_activities', ["dataExtract" => $GLOBALS['dataExtract'],'dataRequest' => $GLOBALS['dataRequest']]);
	        		});
	        	})->export('xlsx');
	        }
	        catch(Exception $e){
	        	if (getenv('APP_ENV') !== 'testing'){
	        		throw $e;
	        	}
	        }
	        				

			   
    } 
   
    public function getData($data){
    	$dataExtract = "";    				
   		if(!empty($data)){   	
    		if ($data['type']=="1"){
    			// -------------------------------------------------
    			// Cas affichage membres
    			// -------------------------------------------------
    			$dataExtract = DB::table( 'member_activities')
    							->join('people as Member', 'Member.id', 'member_activities.person_id')
    			 				->join('activities', 'activities.id', 'member_activities.activity_id')
    			 				->join('activity_instruments','activity_instruments.activity_id','activities.id')
	        					->join('instruments','instruments.id','activity_instruments.instrument_id')
    			 				->select(
    			 					'activities.id as act_id',
						        	'activities.name as act_name',
						        	'activities.created_at as act_created_at',
						        	'activities.updated_at as act_updated_at',
						        	'activities.description as act_description',
						        	'activities.day as act_day',
						        	'activities.hour_start as act_hour_start',
						        	'activities.hour_end as act_hour_end',
						        	'activities.year as act_year',
						        	'activities.status as act_status',
						        	'Member.name as mem_name',
		        					'Member.id as mem_id',
						        	'Member.family_name as mem_family_name',
						        	'Member.birthday as mem_birthday',
						        	'Member.observation as mem_observation',
						        	'Member.city_id as mem_city_id',
						        	'Member.district_id as mem_district_id',
						        	'Member.created_at as mem_created_at',
						        	'Member.updated_at as mem_updated_at',
						        	'Member.code_analytique as mem_code_analytique',
						        	'Member.image_right as mem_image_right',
						        	'Member.picture as mem_picture',
						        	'Member.status as mem_status',
						        	'Member.city_id as mem_city_id',
						        	'Member.city_id as mem_city_id',
						        	'instruments.name as ins_name'
    			 					)
    			 				->where('Member.status','=',1)
    			 				->where('activities.status','=',1);
    			
    		}elseif($data['type']=="2"){
    			// -------------------------------------------------
    			// Cas affichage activitées
    			// -------------------------------------------------

    			$dataExtract = DB::table( 'activities')
    			 				->join('activity_instruments','activity_instruments.activity_id','activities.id')
	        					->join('instruments','instruments.id','activity_instruments.instrument_id')
	        					->join('types_activities','types_activities.id', 'activities.type_activity_id')
    			 				->select(
    			 					'activities.id as act_id',
						        	'activities.name as act_name',
						        	'activities.created_at as act_created_at',
						        	'activities.updated_at as act_updated_at',
						        	'activities.description as act_description',
						        	'activities.day as act_day',
						        	'activities.hour_start as act_hour_start',
						        	'activities.hour_end as act_hour_end',
						        	'activities.year as act_year',
						        	'types_activities.name as typ_name',
						        	'activities.status as act_status',
						        	'instruments.name as ins_name'
    			 					)
    			 				->where('activities.status','=',1);

    			
    		}elseif($data['type']=="3"){
				// -------------------------------------------------
    			// Cas affichage professeurs
    			// -------------------------------------------------
    			$dataExtract = DB::table( 'teachers_activities')
    			 				->join('people', 'people.id', 'teachers_activities.person_id')
    			 				->join('activities', 'activities.id', 'teachers_activities.activity_id')
    			 				->select(
    			 					'activities.id as act_id',
						        	'activities.name as act_name',
						        	'activities.created_at as act_created_at',
						        	'activities.updated_at as act_updated_at',
						        	'activities.description as act_description',
						        	'activities.day as act_day',
						        	'activities.hour_start as act_hour_start',
						        	'activities.hour_end as act_hour_end',
						        	'activities.year as act_year',
						        	'activities.status as act_status',
						        	'people.id as peo_id',
						        	'people.family_name as peo_family_name',
						        	'people.birthday as peo_birthday',
						        	'people.observation as peo_observation',
						        	'people.city_id as peo_city_id',
						        	'people.district_id as peo_district_id',
						        	'people.code_analytique as peo_code_analytique',
						        	'people.image_right as peo_image_right',
						        	'people.picture as peo_picture',
						        	'people.status as peo_status',
						        	'people.created_at as peo_created_at',
						        	'people.updated_at as peo_updated_at',
						        	'people.name as peo_name'
    			 					)
    			 				->where('people.status','=',1)
    			 				->where('activities.status','=',1);

    		}else{

	        	$dataExtract = DB::table( 'activities')
	                ->select(
    		        	'activities.id as act_id',
    		        	'activities.name as act_name',
    		        	'activities.created_at as act_created_at',
    		        	'activities.updated_at as act_updated_at',
    		        	'activities.description as act_description',
    		        	'activities.day as act_day',
    		        	'activities.hour_start as act_hour_start',
    		        	'activities.hour_end as act_hour_end',
    		        	'activities.year as act_year',
    		        	'activities.status as act_status',
    		        	DB::raw('Teacher.id as peo_id'),   		        	
    		        	DB::raw('Teacher.family_name as peo_family_name'),
    		        	DB::raw('Teacher.birthday as peo_birthday'),
    		        	DB::raw('Teacher.observation as peo_observation'),
    		        	DB::raw('Teacher.city_id as peo_city_id'),
    		        	DB::raw('Teacher.district_id as peo_district_id'),
    		        	DB::raw('Teacher.created_at as peo_created_at'),
    		        	DB::raw('Teacher.updated_at as peo_updated_at'),
    		        	DB::raw('Teacher.code_analytique as peo_code_analytique'),
    		        	DB::raw('Teacher.image_right as peo_image_right'),
    		        	DB::raw('Teacher.picture as peo_picture'),
    		        	DB::raw('Teacher.status as peo_status'),   		        	
    		        	DB::raw('Teacher.name as peo_name'), 
    		        	DB::raw('Member.name as mem_name'),
    		        	DB::raw('Member.id as mem_id'),   		        	
    		        	DB::raw('Member.family_name as mem_family_name'),
    		        	DB::raw('Member.birthday as mem_birthday'),
    		        	DB::raw('Member.observation as mem_observation'),
    		        	DB::raw('Member.city_id as mem_city_id'),
    		        	DB::raw('Member.district_id as mem_district_id'),
    		        	DB::raw('Member.created_at as mem_created_at'),
    		        	DB::raw('Member.updated_at as mem_updated_at'),
    		        	DB::raw('Member.code_analytique as mem_code_analytique'),
    		        	DB::raw('Member.image_right as mem_image_right'),
    		        	DB::raw('Member.picture as mem_picture'),
    		        	DB::raw('Member.status as mem_status'),
    		        	DB::raw('Member.city_id as mem_city_id'),
    		        	DB::raw('Member.city_id as mem_city_id'),
    		        	DB::raw('instruments.name as ins_name'),
    		        	DB::raw('teachers_activities.*'),
    		        	DB::raw('activity_instruments.*'))
    		        ->join('teachers_activities', 'teachers_activities.activity_id','activities.id')
    		        ->join('member_activities', 'member_activities.activity_id','activities.id')
    		        ->join('people as Teacher', 'Teacher.id', 'teachers_activities.person_id')
    		        ->join('people as Member', 'Member.id', 'member_activities.person_id')
    		        ->join('activity_instruments','activity_instruments.activity_id','activities.id')
    		        ->join('instruments','instruments.id','activity_instruments.instrument_id')
    		        ->join('types_activities','types_activities.id', 'activities.type_activity_id')
    		        ->where('Member.status','=',1)
    		        ->where('Teacher.status','=',1)
    		        ->where('activities.status','=',1);
    		}

        	
        	if (!empty($data['agemin'])){
        		$dmin = Carbon::now();
        		$dmin = $dmin->subYears($data['agemin']);       		
        		$dataExtract = $dataExtract->where('Member.birthday', '>', $dmin);
        	}
        	if (!empty($data['agemax'])){
        		$dmax = Carbon::now();
        		$dmax = $dmax->subYears($data['agemax']);        		
        		$dataExtract = $dataExtract->where('Member.birthday', '<', $dmax);	       		
        	}
        	if (!empty($data['districts'])){
        		$dataExtract = $dataExtract->where('Member.district_id', '=', $data['districts']);	
        	}
        	if (!empty($data['sday'])){
        		if($data['type']==1){
        			$dataExtract = $dataExtract->where('Member.created_at', '>', $data['sday']);
        		}else if($data['type']==2){
        			$dataExtract = $dataExtract->where('activities.year', '>', $data['sday']);
        			$dataExtract = $dataExtract->where('activities.created_at', '>', $data['sday']);

        		}else if($data['type']==3){
        			$dataExtract = $dataExtract->where('people.created_at', '>', $data['sday']);
        		}
        	}
        	if (!empty($data['eday'])){
        		
        		if($data['type']==1){
        			$dataExtract = $dataExtract->where('Member.created_at', '<', $data['sday']);
        		}else if($data['type']==2){
        			$dataExtract = $dataExtract->where('activities.year', '<', $data['sday']);
        			$dataExtract = $dataExtract->where('activities.created_at', '<', $data['sday']);

        		}else if($data['type']==3){
        			$dataExtract = $dataExtract->where('people.created_at', '<', $data['sday']);
        		}	
        	}
        	if (!empty($data['teachers'])){
        		$dataExtract = $dataExtract
        		 
        		 ->where('Teacher.id', '=',$data['teachers'] );
        	}
        	if (!empty($data['instruments'])){
        		$dataExtract = $dataExtract->where('activity_instruments.instrument_id', '=', $data['instruments']);
        		if($data['type']==1){

        			// $dataExtract = $dataExtract->here('activity_instruments.instrument_id', '=', $data['instruments']);
        		}
        	}
        	if (!empty($data['activities'])){
        		$dataExtract = $dataExtract->where('activities.id', '=', $data['activities']);
        	}
        	if (!empty($data['days'])){
        		$dataExtract = $dataExtract->where('activities.day', '=', $data['days']);
        	}
	       	
	        $dataExtract = $dataExtract->orderBy('act_year','desc')->orderBy('act_updated_at','desc')->get();
	        
	        foreach ($dataExtract as $key => $value) {
	        	
	        	$nbMembre = DB::table( 'member_activities')->where('member_activities.activity_id', '=',$value->act_id )->count();
	        	$dataExtract[$key]->nbMembre = $nbMembre;	        	
	        }			   
        }
	    return $dataExtract;
    }

    public function getAge($birthday){
    	$born = Carbon::parse($birthday);
        return $born->diff(Carbon::now())->format('%y');
    }

}
