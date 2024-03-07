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
				<form action="" method="POST">
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
									<livewire:airport />

								</div>
								<label class="" for="inputDate">Destinition</label>
								<div class="p-2">
									<livewire:airport />

								</div>
								<label class="" for="inputDate">departure time</label>
								<div class="p-2">
									<input class="form-control" name="departure_time" type="time">
								</div>
								<label class="" for="inputDate">price</label>
								<div class="input-group mb-3">
									<span class="input-group-text">$</span>
									<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
									<span class="input-group-text">.00</span>
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
					<th scope="col">Nom</th>
					<th scope="col">email</th>
					<th scope="col">Numéro de téléphone</th>
					<th scope="col">rôle</th>
					<th scope=""></th>
				</tr>
			</thead>
			<tbody>
				@if ($flights)
				@foreach ($flights as $flight)
				<tr>
					<th scope="row">{{ $flight->id }}</th>
					<td>{{ $flight->name }}</td>
					<td>{{ $flight->email }}</td>
					<td>{{ $flight->phone_number }}</td>
					<td>{{ $flight->role }}</td>
					{{-- <td>
						<form action="/flight/{{ $flight->id }}" method="POST"
							onsubmit="return confirm('Are you sure you want to delete this flight?');">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit">Supprimer</button>
						</form>
					</td> --}}
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