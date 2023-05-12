@extends('template4')



@section('content')


<div class="container">
    <table class="table table-dark table-hover">

        <?php $nomor=1 ?>

    @foreach ($users as $user)
        {{-- <ul>
            <td>{{ $user->username }}</td>
            <td>{{ $user->fullname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
        </ul> --}}

        @if($user->role !== 'admin')

        <tr>
            <th scope="row"><?= $nomor ?></th>
            <td>{{ $user->username }}</td>
            <td>{{ $user->fullname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <button class="badge btn btn-success ModalUbah" data-bs-target="#formTambah" data-bs-toggle="modal" data-id="{{ $user->id }}">Update</button>
                {{-- <a href="edit/{{ $item->id }}"><button type="button" class="badge btn btn-success">Update</button></a> --}}

            </td>

            <td>
                <a href="users/{{ $user->id }}"><button type="button" class="badge btn btn-danger">Hapus</button></a>
            </td>
            </tr>

            <?php $nomor++; ?>

        @endif


    @endforeach
</table>
</div>



@endsection
