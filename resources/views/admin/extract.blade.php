@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
      
        
      </h1>
      <ol class="breadcrumb">
       
       
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Données à extraire</div>
                </div>

               

                <div class="box-body">
                    <form class="form-group" action="/admin/extract" method="get">
                        <div class="row">
                            <div class="col-md-4">
                                
                                <h3>Choix de la période</h3>
                                <h4>Date de début</h4>
                                <input type="date" name="sday">
                            
                                <h4>Date de fin</h4>
                                 <input type="date" name="eday">

                           

                                  <h3>Exportations</h3>
                                 <select name="type" onChange="displayFilter(this);">
                                     <option value="1">Liste des adhérents </option>
                                     <option value="2">Liste des activités</option>
                                     <option value="3">Liste des professeurs</option>
                                 </select>

                                 <div id="age" style="display:none">
                                    <h3>Choix des âges</h3>
                                    <h4>Age minimum</h4>
                                    <input type="number" step="1" value="0" min="0" name="agemin" id="agemin" >
                               
                                    <h4>Age maximum</h4>
                                    <input type="number" step="1" value="0" min="0" name="agemax" id="agemax">
                                </div>

                                <div id="instruments" style="display:none">

                                    <h3>Choix des instruments</h3>

                                    <select name="instruments" id="instrument">
                                        <option value=""> - </option>

                                    @if(!empty($instruments))
                                        @foreach($instruments as $instrument)

                                            <option value="{{ $instrument->id }}">{{ $instrument->name }} </option>
                                            
                                        @endforeach
                                    @else
                                        NOT fOUND
                                    @endif
                                       
                                    </select>
                                </div>

                                <div id="districts" style="display:none">

                                    <h3>Choix du quartiers</h3>

                                    <select name="districts" id="district" >
                                        <option value=""> - </option>
                                    @if(!empty($districts))
                                        @foreach($districts as $district)

                                            <option value="{{ $district->id }}">{{ $district->name }} </option>
                                            
                                        @endforeach
                                    @else
                                        NOT fOUND
                                    @endif
                                       
                                    </select>
                                </div>

                                <div id="activities" style="display:none">

                                    <h3>Choix des activités</h3>
                                    <select name="activities" id="activitie">
                                        <option value=""> - </option>

                                    @if(!empty($activities))
                                        @foreach($activities as $activity)

                                            <option value="{{ $activity->id }}">{{ $activity->name }} </option>
                                            
                                        @endforeach
                                    @else
                                        NOT fOUND
                                    @endif
                                       
                                    </select>

                                </div>

                                 
                         
                            <div id="days" style="display:none">
                                
                                <h3>Choix du jour de présence</h3>
                                 <select name="days" id="day">
                                     <option value=""> - </option>
                                     <option value="Lundi">Lundi</option>
                                     <option value="Mardi">Mardi</option>
                                     <option value="Mercredi">Mercredi</option>
                                     <option value="Jeudi">Jeudi</option>
                                     <option value="Vendredi">Vendredi</option>
                                     <option value="Samedi">Samedi</option>
                                     <option value="Dimanche"></option>
                                 </select>
                            </div>
                            
                            
                            
                                <input type="submit" value="Visualiser">
                            
                            </div>    
                        
                    </form>
                    <div class="col-md-8">
                    
                        @if(!empty($dataRequest['type']))
                      
                         @if($dataRequest['type']==='1')

                                <table class="table table-hover">

                                    <tr>
                                        <td><b>Nombre d'adhérent :</b></td>
                                    </tr>

                                    <tr>
                                        
                                    </tr>

                                    <tr>
                                        <td><b>Nom</b></td>
                                        <td><b>Prenom</b></td>
                                        <td><b>Age</b></td>
                                        <td><b>Instrument</b></td>
                                        <td><b>Jour(s) de présence</b></td>
                                    </tr>
                                    

                                   
                                        @foreach($dataExtract as $data)

                                        <tr>
                                            <td>{{ $data->mem_name }}</td>

                                            <td>{{ $data->mem_family_name }}</td>

                                            <td>{{ $data->mem_birthday }}</td>

                                            <td>{{ $data->ins_name }}</td>

                                            <td>{{ $data->act_day }}</td>   
                                        
                                            
                                        </tr>
                                        @endforeach
                                       
                                </table>
                                    
                                
                            @endif
                             @if($dataRequest['type']==='2')

                                <table class="table table-hover">

                                    <tr>
                                        <td><b>Nombre d'adhérent :</b></td>
                                    </tr>

                                    <tr>
                                        
                                    </tr>

                                    <tr>
                                        <td><b>Activité</b></td>
                                        <td><b>Types</b></td>
                                        <td><b>Jour</b></td>
                                        <td><b>Heure de début</b></td>
                                        <td><b>Heure de fin</b></td>
                                        <td><b>Année</b></td>
                                        <td><b>Total membre</b></td>
                                        <td><b>Instrument</b></td>
                                    </tr>
                                    

                                   
                                        @foreach($dataExtract as $data)

                                        <tr>
                                            <td>{{ $data->act_name }} /</td>

                                            <td>{{ $data->typ_name }}</td>

                                            <td>{{ $data->act_day }}</td>

                                            <td>{{ $data->act_hour_start }}</td>

                                            <td>{{ $data->act_hour_end }}</td>

                                            <td>{{ $data->act_year }}</td>    
                                          
                                            <td>{{ $data->nbMembre }}</td>
                                            
                                            <td>{{ $data->ins_name }}</td>
                                        
                                            
                                        </tr>
                                        @endforeach
                                       
                                </table>
                                    
                                
                            @endif
                             @if($dataRequest['type']==='3')

                                <h3>Liste des professeurs</h3>

                                <table class="table table-hover">


                                    <tr>
                                        <td><b>Nom</b></td>
                                        <td><b>Prenom</b></td>
                                        <td><b>Jour</b></td>
                                        <td><b>activité</b></td>
                                    </tr>
                                    

                                   
                                        @foreach($dataExtract as $data)

                                        <tr>
                                            <td>{{ $data->peo_name }}</td>

                                            <td>{{ $data->peo_family_name }}</td>
                                            
                                            <td>{{ $data->act_day }}</td>
                                            
                                            <td>{{ $data->act_name }} /</td>

                                        </tr>
                                        @endforeach
                                       
                                </table>
                                    
                                
                            @endif
                            @if($dataRequest['type']==='4')
                                <h3>Liste des professeurs</h3>

                                <table class="table table-hover">

                                    <tr>
                                        
                                    </tr>

                                    <tr>
                                        <td><b>Activité</b></td>
                                        <td><b>Types</b></td>
                                        <td><b>Jour</b></td>
                                        <td><b>Heure de début</b></td>
                                        <td><b>Heure de fin</b></td>
                                        <td><b>Année</b></td>
                                        <td><b>Professeur</b></td>
                                        <td><b>Membre</b></td>
                                        <td><b>Total membre</b></td>
                                        <td><b>Instrument</b></td>
                                    </tr>
                                    

                                   
                                        @foreach($dataExtract as $data)

                                        <tr>
                                            <td>{{ $data->act_name }} /</td>

                                            <td>{{ $data->typ_name }}</td>

                                            <td>{{ $data->act_day }}</td>

                                            <td>{{ $data->act_hour_start }}</td>

                                            <td>{{ $data->act_hour_end }}</td>

                                            <td>{{ $data->act_year }}</td>    
                                          
                                            <td>{{ $data->peo_name }} {{ $data->peo_family_name }}</td>

                                            <td>{{ $data->mem_name }} {{ $data->mem_family_name }}</td>

                                            <td>{{ $data->nbMembre }}</td>
                                            
                                            <td>{{ $data->ins_name }}</td>
                                        
                                            
                                        </tr>
                                        @endforeach
                                       
                                </table>
                                    
                                
                            @endif
                        @endif
                        <form method="get" action="/admin/export" >
                         @if(!empty($dataRequest))
                            @foreach ($dataRequest as $key => $value)
                                <input  type="text" style="display:none" name="{{ $key }}"  value="{{$value}}">
                                    
                            @endforeach
                            <input type="submit" name="Exporter">
                        @endif
                        </form>
                         
                    </div>    
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function displayFilter(champs){
            if(champs.value == 1 ){
                document.getElementById("age").style.display = 'block';
                document.getElementById("districts").style.display = 'block';
                document.getElementById("activities").style.display = 'block';
                document.getElementById("instruments").style.display = 'block';
                document.getElementById("days").style.display = 'block';
                document.getElementById("agemin").value = '';
                document.getElementById("agemax").value = '';
                document.getElementById("district").value = '';
                document.getElementById("activitie").value = '';
                document.getElementById("instrument").value = '';
                document.getElementById("day").value = '';
                
            }else if( champs.value == 2  ){
                document.getElementById("age").style.display = 'none';
                document.getElementById("districts").style.display = 'none';
                document.getElementById("activities").style.display = 'none';
                document.getElementById("instruments").style.display = 'block';
                document.getElementById("days").style.display = 'block';
                document.getElementById("agemin").value = '';
                document.getElementById("agemax").value = '';
                document.getElementById("district").value = '';
                document.getElementById("activitie").value = '';
                document.getElementById("instrument").value = '';
                document.getElementById("day").value = '';
            }else if( champs.value == 3  ){
                document.getElementById("age").style.display = 'none';
                document.getElementById("districts").style.display = 'none';
                document.getElementById("activities").style.display = 'none';
                document.getElementById("instruments").style.display = 'none';
                document.getElementById("days").style.display = 'block';
                document.getElementById("agemin").value = '';
                document.getElementById("agemax").value = '';
                document.getElementById("district").value = '';
                document.getElementById("activitie").value = '';
                document.getElementById("instrument").value = '';
                document.getElementById("day").value = '';
            }
            
            //document.forms["form"].getElementsByName("hidden").style.visibility = 'hidden';
        }
    </script>
@endsection
