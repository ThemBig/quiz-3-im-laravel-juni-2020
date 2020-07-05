@extends('layouts.master')

@section('title', 'Edit Artikel');

@section('content')
<h1>Edit Artikel</h1>
<form action="/items/{{$artikel->id}}" id="form" method="post">
  @method('PUT')
  @csrf
  <div class="form-group">
    <label for="judul">Judul :</label>
    <input type="text" class="form-control" id="judul" placeholder="Masukan Judul Pertanyaan" name="judul" value="{{$artikel->judul}}" required>
  </div>
  <div class="form-group">
    <label for="isi">Isi :</label>
    <textarea name="isi" id="isi" class="textarea form-control" required>{{$artikel->isi}}</textarea>
  </div>
  <div class="form-group">
    <label for="tag">Tag :</label>
    <input type="text" name="tag" value="{{$artikel->tag}}" class="form-control" id="tag" placeholder="Pisahkan Tag dengan tanda koma (,) Ex: info,web,laravel">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

@push('scripts')
@endpush
