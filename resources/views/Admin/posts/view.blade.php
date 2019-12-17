@extends('layouts.app')
@section('content')          
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">{{$post->title}}</div>
                </div>
                <form method="post" action="{{route('approve',$post->id)}}">
                    @csrf
                <div class="card-body">
                    
                    <p>{{$post->body}}</p>
                </div>
                <div class="card-footer">
                    <a  href="{{route('post.edit',['id'=>$post->id])}}"type="button" class="btn btn-primary ">Edit</a>
                    <button type="submit" class="btn btn-primary pull-right">Approve</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection