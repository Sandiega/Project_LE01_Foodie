@extends('layouts.app')

@section('content')

<div class="container">
        <div class="contentkiri">
        @if(Auth::user()->level==0)
        <div class="kiriatas">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif

            @if(session()->has('update_success'))
            <div class="alert alert-success">
                {{ session()->get('update_success') }}
            </div>
            @endif
            <h1>Your Order</h1>
        </div>

        <a href="/home/order"><p>Add Order</p></a>
        <br>

        <div class="kiribawah">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nama Makanan</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Quantity</th>
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

                            <a class="btn btn-primary" href="/kurang/{{$d->id}}" role="button">-</a>
                            {{ $d->quantity}}
                            <a class="btn btn-primary" href="/tambah/{{$d->id}}" role="button">+</a>

                        </td>
                        <td>
                            <a href="/home/delete/{{$d->id}}">Delete</a>
                        </td>
                    </tr>
                    @empty
                        <td>No Order...</td>
                    @endforelse
                </tbody>
              </table>
              {{ $data->links() }}

        </div>

    </div>

        @else
        @if(session()->has('insert_success'))
        <div class="alert alert-success">
            {{ session()->get('insert_success') }}
        </div>
        @endif

        @if(session()->has('kirim_success'))
        <div class="alert alert-success">
            {{ session()->get('kirim_success') }}
        </div>
        @endif
        <div class="kiriatas">
            <h1>Ongoing Order</h1>
        </div>


        <div class="kiribawah">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Nama Makanan</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($data as $d)
                    <tr>
                        <td>
                            {{$d->user->name}}
                        </td>

                        <td>
                            {{$d->nama_makanan}}
                        </td>
                        <td>
                            {{ $d->quantity}}
                        </td>
                        <td>

                            <a class="btn btn-primary" href="/kirim/{{$d->id}}" role="button">Kirim Masakan</a>

                        </td>
                    </tr>
                    @empty
                        <td>No Onging Order...</td>
                    @endforelse
                </tbody>
              </table>

        </div>

    </div>

        @endif

</div>
@endsection
