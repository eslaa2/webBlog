@extends('layouts.app')
@section('content')          
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">ALl User</div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>Id</th>
                        <th>Names</th>
                        <th>Role</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($user as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                  <td>{{$user->name}}</td>
                                    <td>{{$user->role}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a title="view" href="{{route('user.edit')}}"  class="btn btn-info btn-sm" data-toggle="modal"
                                           data-target="#view" ><i class="fa fa-eye"></i>
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
