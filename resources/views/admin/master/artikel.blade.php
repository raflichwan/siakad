@extends('layout.admin') @section('content') <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Artikel</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="#">Home</a>
          </li>
          <li class="breadcrumb-item active">Artikel</li>
        </ol>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-tambah">
            Tambah
          </button>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Action</th>
                <th class="d-none">Isi Artikel</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $value)
              <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->judul }}</td>
                <td>
                  <a href="artikeladmindelete/{{ $value->id }}" class="btn btn-danger float-right">Delete</a>

                  <button type="button" class="mr-1 btn btn-primary float-right" data-toggle="modal" data-target="#modal-edit">
                    Edit
                  </button>


                </td>
                <td class="d-none">{{ $value->description }}</td>
              </tr>
              @endforeach
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- ./row -->
      <!-- ./row -->
</section>

<div class="modal fade" id="modal-tambah">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form method="POST" enctype='multipart/form-data' action="artikeladmin">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Tambah Artikel</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-1 col-form-label">Judul</label>
            <div class="col-sm-11">
              <input type="text" name="judul" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-1 col-form-label">Foto</label>
            <div class="col-sm-11">
              <input type="file" name="url" class="form-control">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-1 col-form-label">Isi Artikel</label>
            <div class="col-sm-11">
              <textarea id="summernote" name="isiartikel"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between bg-light">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save </button>
        </div>

      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-edit">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <form method="POST" id="saveEdit" enctype='multipart/form-data' action="artikeladmin">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Edit Artikel</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-1 col-form-label">Judul</label>
            <div class="col-sm-11">
              <input type="text" name="judul" id="judul" class="form-control">
              <input type="text" name="id" id="id" class="d-none">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-1 col-form-label">Foto</label>
            <div class="col-sm-11">
              <input type="file" name="url" class="form-control">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-1 col-form-label">Isi Artikel</label>
            <div class="col-sm-11">
              <textarea id="summernoteedit" name="isiartikel"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between bg-light">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="edit" class="btn btn-primary">Save </button>
        </div>

      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection

@section('script')
<script>
  $('#example1 tbody').on('click', 'tr', function() {
    $('#summernoteedit').summernote('code', '');
    var table = $('#example1').DataTable();
    var data = table.row(this).data();
    $("#id").val(data[0]);
    $("#judul").val(data[1]);
    $("#summernoteedit").summernote('editor.pasteHTML', data[3].replace(/&lt;/g, '<').replace(/&gt;/g, '>'));
  });
</script>
@endsection