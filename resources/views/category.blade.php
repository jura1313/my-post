@extends('template4')


@section('content')

<div class="container">
<table class="table table-dark table-hover">

@foreach ($category as $category)

    <tr>
        <th scope="row"><?= $category->id ?></th>
        <td><a href="/categories/{{ $category->slug }}" style="text-decoration: none;">{{ $category->category }}</a></td>
    </tr>


@endforeach
</table>

<div class="container">
    <button class="badge btn btn-success ModalUbah" data-bs-target="#formTambah" data-bs-toggle="modal" data-id="">Update</button>
    <button type="button" class="btn-sm btn btn-outline-dark  fw-bolder tambahData" data-bs-target="#formTambah" data-bs-toggle="modal">Tambah</button>

</div>

</div>


<!-- Modal -->
<div class="modal fade" id="formTambah" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="judulModal">Tambah Kategori Baru</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="{{ url("new_category") }}" method="post">
            @csrf
              <div class="mb-3">
                  <label for="namabarang" class="form-label">Kategori Baru</label>
                  <input type="text" class="form-control" id="category" name="category" placeholder="Nama Kategori">
              </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Tambah Kategori</button>


          </form>

        </div>
      </div>
    </div>
</div>
@endsection
