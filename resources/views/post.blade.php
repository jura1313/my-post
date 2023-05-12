@extends('template4')


@section('content')





<div class="container text-center mt-5">

    <table class="table table-dark table-striped">

        <thead class="table-dark">
            <tr>
                <th scope="col"></th>
            <th scope="col" colspan="5" class="fs-4">Data Barang Dari Gudang</th>
            <th scope="col"><button type="button" class="btn-sm btn btn-outline-light  fw-bolder tambahData" data-bs-target="#formTambah" data-bs-toggle="modal">Tambah</button></th>
            </tr>
            <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah Barang</th>
                <th scope="col">Satuan Barang</th>
                <th scope="col">Harga Barang</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
                </tr>
        </thead>

        @if(count($store)>0)

        <tbody class="alldata">
            <?php $nomor=1 ?>
            @foreach ($store as $item)


                    <tr>
                    <th scope="row"><?= $nomor ?></th>
                    <td>{{ $item->namabarang }}</td>
                    <td>{{ $item->jumlahbarang }}</td>
                    <td>{{ $item->satuanbarang }}</td>
                    <td>{{ $item->hargabarang }}</td>
                    <td>
                        <button class="badge btn btn-success ModalUbah" data-bs-target="#formTambah" data-bs-toggle="modal" data-id="{{ $item->id }}">Update</button>
                        {{-- <a href="edit/{{ $item->id }}"><button type="button" class="badge btn btn-success">Update</button></a> --}}

                    </td>
                    <td>
                        <a href="delete/{{ $item->id }}"><button type="button" class="badge btn btn-danger">Hapus</button></a>
                    </td>
                    </tr>

            <?php $nomor++; ?>
            @endforeach

        @else

            <tr>
                <td class="text-center" colspan="7"> Tidak Ada Barang! </td>
            </tr>';

        @endif

        </tbody>


    {{-- AJAX --}}
        <tbody id="Content" class="table table-dark table-striped searchdata"></tbody>

    </table>

</div>



{{-- SCRIPT AJAX --}}

<script type="text/javascript">

    $('#search').on('keyup',function()
    {
        $value=$(this).val();

        if($value) {
            $('.alldata').hide();
            $('.searchdata').show();
        }
        else{
            $('.alldata').show();
            $('.searchdata').hide();

        }

        $.ajax({

           type:'get' ,
           url:'{{URL::to('search')}}',
           data:{'search':$value},

           success:function(data)
           {
            console.log(data);
            $('#Content').html(data);
           }

        });
    })

</script>



<!-- Modal -->
<div class="modal fade" id="formTambah" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="judulModal">Tambah Barang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="{{ url("/create") }}" method="post">
            @csrf
              <div class="mb-3">
                  <label for="namabarang" class="form-label">Nama Barang</label>
                  <input type="text" class="form-control" id="namabarang" name="namabarang" placeholder="Nama Barang">
              </div>

              <div class="mb-3">
                  <label for="jumlahbarang" class="form-label">Jumlah Barang</label>
                  <input type="number" class="form-control" id="jumlahbarang" name="jumlahbarang" placeholder="Jumlah Barang">
              </div>

              <div class="mb-3">
                  <label for="hargabarang" class="form-label">Harga Barang</label>
                  <input type="number" class="form-control" id="hargabarang" name="hargabarang" placeholder="Harga Barang">
              </div>

              <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Satuan</label>
                <select class="form-select" id="inputGroupSelect01" name="satuanbarang">
                  <option selected disabled>Choose...</option>
                  <option value="Kilogram">Kilogram</option>
                  <option value="Piece">Piece</option>
                  <option value="Liter">Liter</option>
                  <option value="Lembar">Lembar</option>
                  <option value="Karton">Karton</option>
                  <option value="Krat">Krat</option>
                </select>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Tambah Data</button>


          </form>

        </div>
      </div>
    </div>
</div>

@endsection

