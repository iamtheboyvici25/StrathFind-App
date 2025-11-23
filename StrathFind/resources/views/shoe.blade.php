@extends('layouts.app')

@section('content')
<h1>{{ $item->title }}</h1>
<p>{{ $item->description }}</p>

@if($item->image)
  <img src="{{ asset('storage/' . $item->image) }}" alt="item image" style="max-width:300px;">
@endif

<p>Category: {{ $item->category }}</p>
<p>Posted by: {{ $item->user->name }}</p>

@auth
  @if(auth()->id() === $item->user_id)
    <a href="{{ route('lost-items.edit', $item) }}">Edit</a>
    <form action="{{ route('lost-items.destroy', $item) }}" method="post" style="display:inline">
      @csrf
      @method('DELETE')
      <button type="submit">Delete</button>
    </form>
  @else
    <a href="{{ route('claims.create', ['item_id' => $item->id]) }}">Claim Item</a>
  @endif
@endauth

@endsection
