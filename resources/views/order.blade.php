@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <div class="contentkiri">
        <div class="kiriatas">
            <h1>Menu Makanan</h1>
            <form class="form-inline" action="/productfound" method="get">
                @csrf
                <span class="pr-2">Search : </span>

              <input class="form-control mr-sm-2" type="search" aria-label="Search" name="search" style="width: 700px">
              <button class="btn btn-primary" type="submit" style="width: 100px">Search</button>
            </form>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="container">
                        <div class="row row-cols-3">
                            @forelse($data as $d)
                            <div class="col p-3">
                                <div class="card h-100">
                                    <img width="200px" height="200px" src="{{Storage::url($d->image)}}" class="card-img-top" alt="Not Found">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{$d->nama_makanan}}</h5>
                                            <p class="card-text">{{$d->harga}}</p>
                                            <a href="/order/{{$d->id}}" class="btn btn-primary mt-auto">Order</a>
                                        </div>
                                </div>
                            </div>
                            @empty
                            <td>Makanan lagi kosong</td>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>



@endsection
