@extends('layouts.master')

@section('title', $artikel->judul)

@section('content')
  <div class="row">
    <div class="col-sm-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h3><strong>{{$artikel->judul}}</strong></h3>
          <small>slug : {{$artikel->slug}}</small>
        </div>
        <div class="card-body">
          <p>{{$artikel->isi}}</p>
        </div>
        <div class="card-footer">
          Tag :
          @foreach($tags as $key => $tag)
          <a href="#" class="btn btn-success">{{$tag}}</a>
          @endforeach

        </div>
      </div>
      <div class="title">
      </div>
      <div class="content">
      </div>
      <div class="footer">
      </div>
    </div>
  </div>
@endsection

@push('scripts')
@endpush
