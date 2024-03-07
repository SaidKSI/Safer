<!-- resources/views/livewire/airport.blade.php -->
<div>
    @if ($airports && count($airports) > 0)
    <select class="form-select" aria-label="Airport select">
        <option selected>Choose an airport</option>
        @foreach ($airports as $airport)
        @if ($airport)
        <option value="{{ $airport->id }}">{{ $airport->name }} - {{ $airport->city }}</option>
        @endif
        @endforeach
    </select>
    @else
    <p>No airports available.</p>
    @endif
</div>