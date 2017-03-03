<div class="m-t-10 m-b-10 p-l-10 p-r-10 p-t-10 p-b-10">
	<div class="row">
		<div class="col-md-6">
			<table class="table table-hover">
				<tr>
					<td><b>Membre</b></td>
					<td>
					@if(!empty($data['member_activities']))
						@foreach($data['member_activities'] as $member_activity)

				            	<li><a href="http://127.0.0.1:8000/admin/person/{{ $member_activity->id }}/edit">{{ $member_activity->name }} {{ $member_activity->family_name }}</a></li>

				        	@endforeach
				    @else
						NOT FOUND
					@endif
			        </td>
			        
				</tr>
			</table>
		</div>
		<div class="col-md-6">
			<table class="table table-hover">
				<tr>
					<td><b>Professeur</b></td>
					<td>
					@if(!empty($data['teachers_activities']))
						@foreach($data['teachers_activities'] as $teachers_activity)

				            	<li><a href="http://127.0.0.1:8000/admin/person/{{ $teachers_activity->id }}/edit">{{ $teachers_activity->name }} {{ $teachers_activity->family_name }}</a></li>

				        	@endforeach
				    @else
						NOT FOUND
					@endif
			        </td>
			        
				</tr>
			</table>
		</div>
		<div class="col-md-6">
			<table class="table table-hover">
				<tr>
					<td><b>Instruments</b></td>
					<td>
					@if(!empty($data['instruments']))
						@foreach($data['instruments'] as $instrument)

				            	<li><a href="http://127.0.0.1:8000/admin/instrument/{{ $instrument->id }}/edit"> {{ $instrument->name }}</a></li>
			            	
				        @endforeach
			        @else
			        	NOT FOUND
		        	@endIf
			        </td>
			        
				</tr>
			</table>
		</div>
		<div class="col-md-6">
			<table class="table table-hover">
				
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
	</div>
</div>
<div class="clearfix"></div>