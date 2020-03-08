@extends('layouts.app')

@section('title', 'Add Cards to Collection')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header text-center">Search Cards to Add to Your Collection</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="searchName" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="searchName" type="text" class="form-control @error('searchName') is-invalid @enderror" name="searchName" value="{{ old('searchName') }}" required autocomplete="name" autofocus>

                                @error('searchName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" id="searchCards" class="btn btn-primary">
                                   Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <div class="row justify-content-center">
        <table id="cardAddTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Converted Mana Cost</th>
                    <th>Colours</th>
                    <th>Type</th>
                    <th>Image</th>
                    <th>Add Card</th>
                </tr>
            </thead>
        </table>
        </div>
    </div>
    <script>
    var page = 'collection.cards.add';
    </script>
@stop
