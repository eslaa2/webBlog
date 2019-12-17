@extends('layouts.app')
@section('content')
           
<div class="container">
    <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                <div class="card-header">
                    <div class="card-title"> Update </div>
                </div>

                <div class="card-body">
        <form id="post" method="post" action="{{route('post.update',$post->id)}}" >
            @csrf
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group row">
                        <label for="Name" class="col-sm-2 control-label">Title</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="title" placeholder="title"
                                   value="{{$post->title}}">
                        </div>
                        <span class="text-danger">{{$errors->first('title')}}</span>
                   </div>
                   <div class="form-group row">
                    <label for="Name" class="col-sm-2 control-label">Category</label>
                        <div class="col-md-8">
                            <select name="category_id" id="category_id" class="form-control" >
                                <option value="@if($post){{$post->category_id}}@endif"></option>
                                @foreach($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                                @endforeach
                            </select>
                        </div>
                         <span class="text-danger">{{ $errors->first('category_id') }}</span>
                   </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 control-label">Body</label>
                       <textarea name="body" class="form-control" placeholder="Enter post here">{{$post->body}}</textarea>
                        <span class="text-danger">{{ $errors->first('body') }}</span>
                    </div>
                    <div class="form-group row">
                        <label for="Name" class="col-sm-2 control-label">Image</label>
                        <div class="col-md-4">
                            <input type="file" class="thumbnail" name="image" placeholder="name" value="">
                        </div>
                        <span class="text-danger">{{ $errors->first('images') }}</span>
                    </div> 
              <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="" class="btn btn-default pull-right">Cancel</a>
                </div>
             </div>
            </form>
                </div>
                

    </div>
</div>
</div>
</div>

@endsection
