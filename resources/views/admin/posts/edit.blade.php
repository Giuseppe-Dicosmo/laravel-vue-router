@extends('layouts.app')

@section('content')

<div class="container">
  <h1>Modifica il post</h1>

  <form action="{{ route('admin.posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?: $post->title }}">
      @error('title')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="content">Testo</label>
      <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3">{{ old('content') ?: $post->content }}</textarea>
      @error('content')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="publisheder_at">Data di pubblicazione</label>
      <input type="date" class="form-control @error('date') is-invalid @enderror" value=" {{old('publisheder_at')?: $post->publisheder_at}} " name="publisheder_at" id="publisheder_at">
      @error('publisheder_at')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="category_id">Categoria</label>
      <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
        <option value="">Seleziona</option>

        @foreach($categories as $value)
        <option {{ old('category_id', optional($post->category)->id ) == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
        @endforeach

      </select>

      @error('category_id')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>


    <label>Tag</label>
    <div class="d-flex" style="gap: 15px;">
      @foreach($tags as $index => $value)
      <div class="form-group form-check">
        <input name="tags[ {{ $index }} ]" value="{{ $value->id }}" type="checkbox" class="form-check-input" id="tags-{{ $value->id }}" {{ $post->tags->contains( $value->id ) ? 'checked' : '' }}>
        <label class="form-check-label" for="tags-{{ $value->id }}">{{ $value->name }}</label>
      </div>

      @error('tags.{{ $index }}')
      <div class="text-danger">{{ $message }}</div>
      @enderror

      @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

  </form>

  <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
    @csrf
    @method('DELETE')

    <button class="btn btn-danger">Elimina</button>
  </form>

</div>

@endsection