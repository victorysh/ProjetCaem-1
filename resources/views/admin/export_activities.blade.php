<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Export</title>
	</head>
	<body>
		@if(!empty($dataRequest['type']))
                      
                         @if($dataRequest['type']==='1')

                                <table>

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

                                            <td>{{ $data->age }}ans</td>

                                            <td>{{ $data->ins_name }}</td>

                                            <td>{{ $data->act_day }}</td>   
                                        
                                            
                                        </tr>
                                        @endforeach
                                       
                                </table>
                                    
                                
                            @endif
                             @if($dataRequest['type']==='2')

                                <table>

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

                                <table>


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

                                <table>

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
	</body>
</html>