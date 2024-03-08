@extends('dashbored')

@section('inner_content')
<div class="card">


	<div class="card-body">
		<h5 class="card-title">AirPorts</h5>
		<div>
			<button class="btn btn-primary" data-bs-target="#basicModal" data-bs-toggle="modal" type="button">
				Ajouter un AirPort
			</button>
			<div class="modal fade" id="basicModal" tabindex="-1">
				<form action="{{route('create_airport')}}" method="POST">
					@csrf
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ajouter un AirPorts</h5>
								<button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
							</div>
							<div class="modal-body">
								<label class="" for="inputDate">name</label>
								<div class="p-2">
									<input class="form-control" name="name" type="text">
								</div>
								<label class="" for="inputDate">city</label>
								<div class="p-2">
									<input class="form-control" name="city" type="text">

								</div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Fermer</button>
								<button class="btn btn-primary" type="submit">Sauvegarder</button>
							</div>
						</div>
					</div>
				</form>
			</div><!-- End Basic Modal-->
		</div>

		<!-- Table with stripped rows -->
		<table class="table datatable">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Code</th>
					<th scope="col">Name</th>
					<th scope="col">city</th>
					<th scope="col"></th>
					{{-- <th scope=""></th> --}}
				</tr>
			</thead>
			<tbody>
				@if ($airports)
				@foreach ($airports as $airport)
				<tr>
					<th scope="row">{{ $airport->id }}</th>
					<td>{{ $airport->code }}</td>
					<td>{{ $airport->name }}</td>
					<td>{{ $airport->city }}</td>

					<td>
						<form action="{{ route('delete_airport', ['id' => $airport->id]) }}" method="POST"
							onsubmit="return confirm('Are you sure you want to delete this airport?');">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit"><i class="bi bi-trash-fill"></i></button>
						</form>
					</td>
				</tr>
				@endforeach
				@else
				<td class="text-center" colspan="8">Aucun airport trouvé.</td>
				@endif
			</tbody>
		</table>
		<!-- End Table with stripped rows -->
	</div>
</div>
@endsection