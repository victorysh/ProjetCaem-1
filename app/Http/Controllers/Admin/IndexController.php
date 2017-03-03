<?php

namespace App\Http\Controllers\Admin;

use Backpack\Base\app\Http\Controllers\AdminController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IndexController extends AdminController
{
   
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {    
        
        // number user online
        $usersActif = DB::table('people')
                        ->where('status', 1)
                        ->count();                      
        $this->data['userActif'] = $usersActif;

        // districts list
        $districts = DB::table('districts')->get();
     
        $districtsArray = array();
        $agearray = array();
        
        foreach ($districts as $district) {
       
            // number people on district
            $person = DB::table('people')
                        ->where('district_id', $district->id)
                        ->get();
            
            // to js chart
            $districtsArray[] = $person->count();
            $districtsLabelsArray[] = $district->name;
            $districtsColorsArray[] = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        
        }
      
        $this->data['district'] = json_encode($districtsArray);
        $this->data['district_colors'] = json_encode($districtsColorsArray);
        $this->data['district_labels'] = json_encode($districtsLabelsArray);

        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title

        $usersActif = DB::table('people')
                            ->where('status', 1)
                            ->count();
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title    

        $personnes=DB::table('people')
                  ->where('status', 1)
                  ->get();

        foreach ($personnes as $key) {
            $born = Carbon::parse($key->birthday);
            $age = $born->diff(Carbon::now())->format('%y');
            $agearray[] = $age;
        }

        $agedix=0;
        $agevingt=0;
        $agetrente=0;
        $agequarante=0;
        $agecinquante=0;
        $agesoixante=0;
        $agesoixantedix=0;
        $agequatrevingt=0;

        for($i=0;$i<count($agearray);$i++){
            if ($agearray[$i]<=10){
               $agedix++;
            }
            if ($agearray[$i]>10 && $agearray[$i]<=20){
               $agevingt++;
            }

            if ($agearray[$i]>20 && $agearray[$i]<=30){
                $agetrente++;
            }

            if ($agearray[$i]>30 && $agearray[$i]<=40){
                $agequarante++;
            }

            if ($agearray[$i]>40 && $agearray[$i]<=50){
                $agecinquante++;
            }

            if ($agearray[$i]>50 && $agearray[$i]<=60){
                $agesoixante++;
            }

            if ($agearray[$i]>60 && $agearray[$i]<=70){
                $agesoixantedix++;
            }
            if ($agearray[$i]>70 && $agearray[$i]<=90){
               $agequatrevingt++;
            }

        }

        $agepersonne = array(   
            $agedix,
            $agevingt , 
            $agetrente, 
            $agequarante, 
            $agecinquante , 
            $agesoixante, 
            $agesoixantedix, 
            $agequatrevingt , 
        );

        $this->data['agepersonne']=json_encode( $agepersonne);
        $this->data['userActif'] =$usersActif;

        return view('backpack::dashboard', $this->data);
        
    }
  
    /**
     * Redirect to the dashboard.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        // The '/admin' route is not to be used as a page, because it breaks the menu's active state.
        return redirect(config('backpack.base.route_prefix').'/dashboard');
    }

}
