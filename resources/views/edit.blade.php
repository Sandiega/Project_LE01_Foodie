@extends('layouts.userlogined')

@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <div class="contentkiri">
        <div class="kiriatas">
            <h1>Menu Makanan</h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Nama Makanan</th>
                    <th scope="col">Harga</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($data as $d)
                    <tr>
                        <td>
                            {{$d->id}}
                        </td>
                        <td>
                         {{$d->nama_makanan}}
                        </td>

                        <td>
                            {{ $d->harga}}
                        </td>
                    </tr>
                    @empty
                        <td>Makanan lagi kosong</td>
                    @endforelse
                </tbody>
              </table>
        </div>

        <div class="kiribawah">
            @foreach ($edit_now as $e)
            <form action="/home/edit/{id}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$e->id}}">
                <input type="hidden" name="user_id" value="{{$e->user_id}}">
              <div class="form-group row">
                <label for="text1" class="col-4 col-form-label">Nomor Makanan</label>
                <div class="col-8">
                  <input id="text1" name="makanan" type="text" class="form-control" value="{{$e->makanan_id}}">
                </div>
              </div>
              <div class="form-group row">
                <label for="text" class="col-4 col-form-label">Quantity</label>
                <div class="col-8">
                  <input id="text" name="quantity" type="text" class="form-control" value="{{$e->quantity}}">
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-4 col-8">
                  <button name="submit" type="submit" class="btn btn-primary">Edit</button>
                </div>
              </div>
            </form>
            @endforeach

        </div>

    </div>
</div>



@endsection
