@extends('dashbored')

@section('inner_content')
<div class="card">
	<div class="card-body">
		<h5 class="card-title">flights</h5>
		<div>
			<button class="btn btn-primary" data-bs-target="#basicModal" data-bs-toggle="modal" type="button">
				Ajouter un Flight
			</button>
			<div class="modal fade" id="basicModal" tabindex="-1">
				<form action="{{route('create_flight')}}" method="POST">
					@csrf
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ajouter un Flight</h5>
								<button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
							</div>
							<div class="modal-body">
								<label class="" for="inputDate">Airlines</label>
								<div class="p-2">
									<livewire:airlines />

								</div>
								<label class="" for="inputDate">Depart</label>
								<div class="p-2">
									<livewire:airports name="airport_from_id" />

								</div>
								<label class="" for="inputDate">Destinition</label>
								<div class="p-2">
									<livewire:airports name="airport_to_id" />

								</div>
								<label class="" for="inputDate">departure time</label>
								<div class="p-2">
									<input class="form-control" name="departure_time" type="datetime-local">
								</div>
								<label class="" for="inputDate">price</label>
								<div class="input-group mb-3">
									<span class="input-group-text">$</span>
									<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="price">
									<span class="input-group-text">.00</span>
								</div>
								<label class="" for="inputDate">Code</label>
								<div class="p-2">
									<input class="form-control" name="code" type="text"
										value="{{ substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2) . rand(100, 999) }}" readonly>
									<!-- Hidden input to store the code value -->
									<input type="hidden" name="hidden_code"
										value="{{ substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 2) . rand(100, 999) }}">
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
					<th scope="col">Airline</th>
					<th scope="col">From</th>
					<th scope="col">To</th>
					<th scope="col">Departure Time</th>
					<th scope="col">Price</th>
					<th scope=""></th>
				</tr>
			</thead>
			<tbody>
				@if ($flights)
				@foreach ($flights as $flight)
				<tr>
					<th scope="row">{{ $flight->id }}</th>
					<td>{{ $flight->code }}</td>
					< <td>{{ $flight->airline->name }}</td>
						<td>{{ $flight->airportFrom->name ." - ". $flight->airportFrom->city }}</td>
						<td>{{ $flight->airportTo->name." - ". $flight->airportFrom->city }}</td>
						<td>{{ $flight->departure_time }}</td>
						<td>{{ $flight->price }}</td>
						<td>
							<form action="{{ route('delete_flight', ['id' => $flight->id]) }}" method="POST"
								onsubmit="return confirm('Are you sure you want to delete this flight?');">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger" type="submit"><i class="bi bi-trash-fill"></i></button>
							</form>
						</td>
				</tr>
				@endforeach
				@else
				<td class="text-center" colspan="8">Aucun flight trouvé.</td>
				@endif
			</tbody>
		</table>

		<!-- End Table with stripped rows -->

	</div>
</div>
@endsection