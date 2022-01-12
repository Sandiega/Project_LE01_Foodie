@extends('layouts.app')

@section('content')

<div class="container">
        <div class="contentkiri">
            <div class="kiriatas">
                <h1>Update Makanan</h1>
            </div>

            <div class="kiribawah">
                <form method="POST" action="/updated" enctype="multipart/form-data">
                    @csrf
                    @foreach ($data as $d)
                    <input type="hidden" name="id" value="{{$d->id}}">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Makanan :') }}</label>

                        <div class="col-md-6">
                            <input id="makanan" type="text" class="form-control @error('makanan') is-invalid @enderror" name="makanan" value="{{$d->nama_makanan}}" required autocomplete="makanan" autofocus>

                            @error('makanan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Price :') }}</label>

                        <div class="col-md-6">
                            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$d->harga}}" required autocomplete="price" autofocus>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Image :') }}</label>
                        <div class="col-md-6">
                            <input type="file" name="image" value="" class="@error('image') is-invalid @enderror" autofocus>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    </div>



                    <div class="row mb-0 pb-3">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                    @endforeach
                </form>

            </div>

        </div>
</div>
@endsection
