@extends('layouts.app')

@section('content')
<h1>Report Lost Item</h1>

<form action="{{ route('lost-items.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <label>Title</label>
  <input type="text" name="title" value="{{ old('title') }}" required>

  <label>Category</label>
  <input type="text" name="category" value="{{ old('category') }}">

  <label>Description</label>
  <textarea name="description">{{ old('description') }}</textarea>

  <label>Image</label>
  <input type="file" name="image">

  <label>Date Lost</label>
  <input type="date" name="date_lost">

  <button type="submit">Submit</button>
</form>
@endsection
