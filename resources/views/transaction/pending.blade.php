@extends('dashbored')

@section('inner_content')
<div>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title"></h5>

      <!-- Table with stripped rows -->
      <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Transaction ID</th>
            <th scope="col">Full Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Flight</th>
            <th scope="col">Created at</th>
            <th scope="col">Date of Birth</th>


          </tr>
        </thead>
        <tbody>
          @if (count($transactions) > 0)
          @foreach ($transactions as $transaction)
          <tr>
            <th scope="row"><a href="/transaction/{{ $transaction->id }}">{{ $loop->iteration }}</a></th>
            <td>{{ $transaction->transaction_id }}</td>
            <td>{{ $transaction->phone_number }}</td>
            <td>{{ $transaction->phone_number }}</td>
            <td>{{ $transaction->date_of_birth }}</td>

          </tr>
          @endforeach
          @else
          <td colspan="8" class="text-center">No transactions found.</td>
          @endif
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>
</div>
@endsection