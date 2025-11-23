@extends('layouts.app')

@section('content')
<h1>Lost Items</h1>
<a href="{{ route('lost-items.create') }}">Report Lost Item</a>

@foreach($items as $item)
  <div>
    <h3><a href="{{ route('lost-items.show', $item) }}">{{ $item->title }}</a></h3>
    <p>{{ Str::limit($item->description, 120) }}</p>
    <small>Posted by {{ $item->user->name }} - {{ $item->created_at->diffForHumans() }}</small>
  </div>
@endforeach

{{ $items->links() }}
@endsection
