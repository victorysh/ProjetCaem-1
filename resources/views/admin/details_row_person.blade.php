<div class="m-t-10 m-b-10 p-l-10 p-r-10 p-t-10 p-b-10">
	<div class="row">
		<div class="col-md-6">
			<!-- {{ trans('backpack::crud.details_row') }} -->
			<table class="table table-hover">

				<tr>
					<td><b>Responsable légal</b></td>
					<td>
					@if(!empty($data['people_people']))
						@foreach($data['people_people'] as $people_people)

				            	<a href="http://127.0.0.1:8000/admin/person/{{ $people_people->id }}/edit">{{ $people_people->name }} {{ $people_people->family_name }}</a>

				        	@endforeach
				    @else
						NOT FOUND
					@endif
			        </td>
			        
				</tr>
				<tr>
					<td><b>Date de naissance</b></td>
					<td>{{ date('d/m/Y',strtotime($data->birthday)) }}</td>
				</tr>
				<tr>
					<td><b>Observation</b></td>
					<td>{{ $data->observation }}</td>
				</tr>
				<tr>
					<td><b>Droit à l'image</b></td>
					<td>{{ $data->image_right }}</td>
				</tr>
				<tr>
					<td><b>Code analytique</b></td>
					<td>{{ $data->code_analytique }}</td>
				</tr>
				<tr>
					<td><b>Ville</b></td>
					<td>{{ $data->city->name }}</td>
				</tr>
				<tr>
					<td><b>Quartier</b></td>
					<td>{{ $data->district->name }}</td>
				</tr>
				<tr>
					<td><b>Code postal</b></td>
					<td>{{ $data->postal_code }}</td>
				</tr>
				<tr>
					<td><b>Adresse</b></td>
					<td>{{ $data->adress }}</td>
				</tr>
				

				<tr>
					<td><b>Types</b></td>
					<td>
					@if(!empty($data['type_people']))
						@foreach($data['type_people'] as $type)

			            	<li>{{ $type->name }}</li>
		            	
			        	@endforeach
				    @else
				    	NOT fOUND
				    @endif

			        </td>

				</tr>
				

				<tr>
					<td><b>Activité</b></td>
					<td>
					@if(!empty($data['people_activities']))
						@foreach($data['people_activities'] as $activity)

				            	<li><a href="http://127.0.0.1:8000/admin/activity/{{ $activity->id }}/edit"> {{ $activity->name }}</a></li>
			            	
				        @endforeach
			        @else
			        	NOT FOUND
		        	@endIf
			        </td>
			        
				</tr>

				<tr>
					<td><b>Inscription</b></td>
					<td>
					@if(!empty($data['membership']))
							

						@foreach($data['membership'] as $membership)



				            	<li>Date de début : {{ $membership->date_start }}</li>
				            	<li>Date de fin : {{ $membership->date_end }}</li>
			            	
				        	@endforeach
				        
				    @else
						NOT FOUND
					@endif
			        </td>
				</tr>
				<tr>
					<td><b>Date de création</b></td>
					<td>{{ date('d/m/Y H:i',strtotime($data->created_at)) }}</td>
				</tr>
				<tr>
					<td><b>Date de mise à jour</b></td>
					<td>{{ date('d/m/Y H:i',strtotime($data->updated_at)) }}</td>
				</tr>


				
				

			</table>
			</div>
			<div class="col-md-6">

							<b>Activité</b>	
				<table class="table table-hover">
					<thead>
						<tr>
					      <th>#</th>
					      <th>Nom</th>
					      <th>Professeur</th>
					      <th>Heure de début</th>
					      <th>Heure de fin</th>
					      <th>Jour</th>
					    </tr>
					</thead>
					
						@if(!empty($data['people_activities']))
							@foreach($data['people_activities'] as $activity)
								<tr>
									<td>
										{{ $activity->id }}
									</td>
									<td>
					            		<a href="http://127.0.0.1:8000/admin/activity/{{ $activity->id }}/edit"> {{ $activity->name }}</a>
					            	</td>
					            	<td>
					            		@foreach($data['teachers_'.$activity->id] as $teachers_activities)
					            		<li><a href="http://127.0.0.1:8000/admin/activity/{{ $activity->id }}/edit"> {{ $teachers_activities->name }} {{ $teachers_activities->family_name }}</a></li>
					            		@endforeach
					            	</td>
					            	<td>
					            		{{ $activity->hour_start }}
					            	</td>
					            	<td>
					            		{{ $activity->hour_end }}
					            	</td>
					            	<td>
					            		{{ $activity->day }}
					            	</td>
				            	</tr>
					        @endforeach
				        @else
				        	Aucune
			        	@endIf

				</table>

			</div>
	
			

	        
		
	</div>
</div>

<div class="clearfix"></div>