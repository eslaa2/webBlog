@extends('layouts.app')
@section('content')          
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               
                <div class="card-header">
                     <div align="right"><a href="{{route('category.create')}}" class="btn btn-info"> Create New</div></a>
                    <div class="card-title">ALl User</div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>action</th>
                        </thead>
                        <tbody>
                            @foreach($cat as $cat)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                  <td>{{$cat->title}}</td>
                                    <td>{{$cat->description}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a title="view" href=""  class="btn btn-info btn-sm" data-toggle="modal"
                                           data-target="#view" data-post_id="" ><i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <a title="delete" href="" class="btn btn-info btn-sm"><i class="fa fa-delete"></i></a>
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
