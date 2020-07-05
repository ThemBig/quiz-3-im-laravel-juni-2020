@extends('layouts.master')

@section('title', 'Index Artikel');

@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Artikel</h6>
      <a href="/items/create" class="btn btn-primary">Create Artikel</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Judul</th>
              <th>Tag</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Judul</th>
              <th>Tag</th>
              <th>Actions</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($artikels as $key => $artikel)
              <tr>
                <td>{{$key + 1}}</td>
                <td>{{$artikel->judul}}</td>
                <td>
                  @foreach ($tags[$key] as $tag)
                   <a href="#" class="btn btn-success">{{$tag}}</a>
                  @endforeach

                </td>
                <td class="d-flex">
                  <a href="/items/{{$artikel->id}}" title="show">
                    <button type="button" class="btn btn-success mx-1">
                      <i class="far fa-eye"></i>
                    </button>
                  </a>
                  <a href="/items/{{$artikel->id}}/edit" title="edit">
                    <button type="button" class="btn btn-warning mx-1" >
                      <i class="fas fa-edit"></i>
                    </button>
                  </a>
                  <form onsubmit="confirmDelete(event, {{$artikel->id}})" class="mx-1">
                    <button type="submit" class="btn btn-danger" title="delete"><i class="fas fa-trash-alt"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
  <!-- Page level plugins -->
  <script src="{{asset('/sbadmin2/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <script type="text/javascript">
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });

    function confirmDelete(e, id) {
      e.preventDefault();
      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Tidak akan bisai diulang jika  sudah terhapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: "/items/" + id,
            method: "DELETE",
            dataType: 'json',
            data: {
              "_token": "{{@csrf_token()}}",
            },
            success: function(res) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              );
              location.reload();
            }
          })
        }
      })
    }
  </script>

@endpush
