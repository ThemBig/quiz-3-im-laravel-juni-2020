@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
  <div class="d-flex justify-content-between">
    <h1>Desain ERD</h1> <a href="/items" class="btn btn-primary btn-lg" title="list artikel">list artikel</a>
  </div>
  <img src="{{asset('/image/erd-quiz-3.svg')}}" alt="">
@endsection

@push('scripts')
  <script src="{{asset('/sbadmin2/js/swal.min.js')}}" charset="utf-8"></script>
  <script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    })
</script>
@endpush
