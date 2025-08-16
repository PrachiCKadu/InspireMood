<h1>Quotes</h1>

@foreach($quotes as $quote)
    <p>{{ $quote->quote }} — <em>{{ $quote->category }}</em></p>
@endforeach
