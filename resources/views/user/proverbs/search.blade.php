@extends('layouts.app')

@section('content')
    <h1>Search Results</h1>

    <form action="{{ route('user.proverbs.search') }}" method="GET">
        <input type="text" name="query" placeholder="Search proverbs..." value="{{ request('query') }}">
        <button type="submit">Search</button>
    </form>

    @if($proverbs->count() > 0)
        <ul>
            @foreach($proverbs as $proverb)
                <li><a href="{{ route('user.proverbs.show', $proverb->id) }}">{{ $proverb->content }}</a></li>
            @endforeach
        </ul>
        {{ $proverbs->links() }}
    @else
        <p>No proverbs found.</p>
    @endif
@endsection
