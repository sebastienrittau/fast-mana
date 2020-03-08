@extends('layouts.app')

@section('title', 'Add Cards to Collection')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h1>All the Cards in Your Collection</h1>
        </div>
        <div class="row justify-content-center">
        <table id="cardShowTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Converted Mana Cost</th>
                    <th>Colours</th>
                    <th>Type</th>
                    <th>Image</th>
                    <th>Remove Card</th>
                </tr>
            </thead>
        </table>
        </div>
    </div>
    <script>
    var page = 'collection.cards.show';
    </script>
@stop