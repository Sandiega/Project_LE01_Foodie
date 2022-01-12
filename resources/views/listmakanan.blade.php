@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <div class="contentkiri">
        <div class="kiriatas">
            <h1>Menu Makanan</h1>
            @if(session()->has('deletemakanan_success'))
            <div class="alert alert-success">
                {{ session()->get('deletemakanan_success') }}
            </div>
            @endif

            @if(session()->has('updatemakanan_success'))
            <div class="alert alert-success">
                {{ session()->get('updatemakanan_success') }}
            </div>
            @endif

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nama Makanan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($data as $d)
                    <tr>
                        <td>
                         {{$d->nama_makanan}}
                        </td>

                        <td>
                            {{ $d->harga}}
                        </td>
                        <td>
                            <a class="btn btn-danger" href="/delete_makanan/{{$d->id}}" role="button">Delete</a>
                            <a class="btn btn-danger" href="/update_makanan/{{$d->id}}" role="button">Update</a>
                        </td>
                    </tr>
                    @empty
                        <td>No data...</td>
                    @endforelse
                </tbody>
              </table>

        </div>

    </div>
</div>



@endsection
