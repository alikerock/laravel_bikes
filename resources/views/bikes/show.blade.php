@extends('layout')


@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">



            <?php
            $current =  url()->current();
            ?>
    <div>
        <h3>
            {{$bike['name']}}
        <h3>
        <h2>
            {{$bike['price']}}
        <h2>
        <div>
            - Made by : {{$bike['brand']}}
        </div>
       <hr>
       <p>
            <a href="{{route('bikes.index')}}">bike List</a> /
            <a href="<?= $current?>/edit">Edit</a> / 
            <a href="{{route('bikes.index')}}/create">create</a>

       </p>

    </div>


</div>
@endsection
