@extends('dashbored')

@section('inner_content')
<div class="card">
	<div class="card-body">
		<h5 class="card-title">airlines</h5>
		<div>
			<button class="btn btn-primary" data-bs-target="#basicModal" data-bs-toggle="modal" type="button">
				Ajouter un airline
			</button>
			<div class="modal fade" id="basicModal" tabindex="-1">
				<form action="{{ route('create_airline') }}" method="POST">
					@csrf
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Ajouter un Airline</h5>
								<button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
							</div>
							<div class="modal-body">
								<label class="" for="inputDate">name</label>
								<div class="p-2">
									<input class="form-control" name="name" type="text">
								</div>
								<label class="" for="inputDate">Code</label>
								<div class="p-2">
									<input class="form-control" name="code" type="text"
										value="{{ substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3) . rand(100, 999) }}" readonly>
									<!-- Hidden input to store the code value -->
									<input type="hidden" name="hidden_code"
										value="{{ substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3) . rand(100, 999) }}">
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

					<th scope=""></th>
				</tr>
			</thead>
			<tbody>
				@if ($airlines)
				@foreach ($airlines as $airline)
				<tr>
					<th scope="row">{{ $airline->id }}</th>
					<td>{{ $airline->code }}</td>
					<td>{{ $airline->name }}</td>
					<td>
						<form action="{{ route('delete_airline', ['id' => $airline->id]) }}" method="POST"
							onsubmit="return confirm('Are you sure you want to delete this airline?');">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit"><i class="bi bi-trash-fill"></i></button>
						</form>
					</td>
				</tr>
				@endforeach
				@else
				<td class="text-center" colspan="8">Aucun airline trouvé.</td>
				@endif
			</tbody>
		</table>

		<!-- End Table with stripped rows -->

	</div>
</div>
@endsection