@extends('layouts.app')
@section('content')          
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">ALl POST</div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>Id</th>
                        <th>category</th>
                        <th>Title</th>
                        <th>Author Name</th>
                        <th>Status</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($allPost as $post)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$post->cat->title}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->info->name}}</td>
                                <td>@if($post->isPublish==1)
                                     Published
                                    @else Not Published
                                    @endif
                                </td>
                                <td>
                                    
                                     <div class="btn-group">
                                        <a title="view" href="{{route('post.view',$post->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    </div>
                                   <div class="btn-group">
                                    <form  class="myAction" method="post" action="{{route('post.destroy')}}">
                                        @csrf
                                        <input type="hidden" name="hidden" value="{{$post->id}}">
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                            <i class="fa  fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
