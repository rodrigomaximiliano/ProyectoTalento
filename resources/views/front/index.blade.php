@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include ('front.partials.msg')
            @foreach ($products as $item)
            <div class="col-3">
                <div class="card">
                    <img src="/img/{{$item->image}}"  class="card-img-top">
                    <div class="card-body text-center">
                        <h2>{{$item->name}}</h2>
                        <p>$ {{$item->price}}</p>
                    </div>
                    <div class="card-footer">
                        <form action="{{route('add')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <input type="submit" name="btn" class="btn btn-success w-100" value="Agregar">
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</div>
@endsection


