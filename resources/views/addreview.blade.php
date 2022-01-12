@extends('layouts.userlogined')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
        <div class="contentkiri">
            <div class="kiriatas">
                <h1>Add Review</h1>
            </div>



            <form action="reviewus" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="textarea" class="col-4 col-form-label">Description</label>
                <div class="col-8">
                <textarea id="textarea" name="description" cols="40" rows="5" class="form-control"></textarea>
                </div>
            </div>
            <input type="file" name="image">
            <div class="form-group row">
                <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </form>

        </div>
</div>
@endsection
