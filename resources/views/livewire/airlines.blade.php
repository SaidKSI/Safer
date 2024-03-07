<!-- resources/views/livewire/airline.blade.php -->

<div>
    @if ($airlines && count($airlines) > 0)
    <select class="form-select" aria-label="Airline select">
        <option selected>Choose an airline</option>
        @foreach ($airlines as $airline)
        @if ($airline)
        <option value="{{ $airline->id }}">{{ $airline->name }} - {{ $airline->code }}</option>
        @endif
        @endforeach
    </select>
    @else
    <p>No airlines available.</p>
    @endif
</div>