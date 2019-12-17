@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@if($cat) Update @else Add New @endif</h3>
                </div>
<form novalidate id="entryForm"  action="@if($cat){{route('category.update')}}@else{{route('category.store')}}@endif" method="post">
                        @csrf
                <div class="card-body">
                    
                        <div class="form-group row">
                            <label for="Name" class="col-sm-2 control-label">Title</label>
                            <div class="col-md-4">
        <input type="text" class="form-control" name="title"
               placeholder="name" value="@if($cat){{$cat->title}}@else{{old('title')}}@endif">
                            </div>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" name="description" placeholder="Description" value="">
                            </div>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                </div>
                         <div class="card-footer">
                    <button type="submit" class="btn btn-info pull-right "></i> @if($cat) Update @else Add @endif</button>
                    <a href="" class="btn btn-default pull-right">Cancel</a>
                </div>

            </form>
                </div>
               
        </div>
    </div>

    @endsection