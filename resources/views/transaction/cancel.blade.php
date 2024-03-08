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
                        <th scope="col">Bank</th>
                        <th scope="col">Balnace</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Flight</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Terminated at</th>
                        <th scope="col">Status</th>


                    </tr>
                </thead>
                <tbody>
                    @if (count($transactions) > 0)
                    @foreach ($transactions as $transaction)
                    <tr>
                        <th scope="row"><a href="/transaction/{{ $transaction->id }}">{{ $loop->iteration }}</a></th>
                        <td>{{ $transaction->transaction_id }}</td>
                        <td>{{ $transaction->bank->Sb_name }}</td>


                        <td>{{ $transaction->flight->balance }}
                            <button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal"
                                data-bs-target="#basicModal" title="Info">
                                <i class="bi bi-info-circle"></i>
                            </button>
                            <div class="modal fade" id="basicModal" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Flight Price</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Price: {{ $transaction->flight->price }}</h4>
                                            <h4>Amount Before Tax: {{ $transaction->flight->amount_before_tax }}</h4>
                                            <h4>Balance: {{ $transaction->flight->balance }}</h4>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td>{{ $transaction->user->first_name ." ".$transaction->user->last_name }} </td>
                        <td>{{ $transaction->phone_number }}</td>
                        <td>
                            {{ $transaction->flight->code }} <button type="button" class="btn btn-primary btn-sm "
                                data-bs-toggle="modal" data-bs-target="#basicModal" title="Info">
                                <i class="bi bi-info-circle"></i>
                            </button>
                            <div class="modal fade" id="basicModal" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Flight Information</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Code: {{ $transaction->flight->code }}</h4>
                                            <h4>Airline: {{ $transaction->flight->airline->name }}</h4>
                                            <h4>From: {{ $transaction->flight->airportFrom->name ." - ".
                                                $transaction->flight->airportFrom->city }}</h4>
                                            <h4>To: {{ $transaction->flight->airportTo->name." - ".
                                                $transaction->flight->airportTo->city }}
                                            </h4>
                                            <h4>Price: {{ $transaction->flight->price }}</h4>
                                            <h4>Departure Time: {{ $transaction->flight->departure_time }}</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $transaction->created_at->format('Y-m-d H:i') }}</td>
                        <td>{{ $transaction->action_date }}</td>
                        <td>
                            <span class="text-danger">&#11044;</span>
                        </td>

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