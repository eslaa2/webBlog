@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($post!==null)
            <div class="card card">
                <div class="card-header">
                    <small class="card-title">Latest New</small>/ <small class="card-title"></small>
                </div>
                <div class="card-body">
                    @foreach($post as $post)
                    <ul>
                        <li> 
                            <a style="color: red" href="{{route('full.post',$post->id)}}">
                                {{$post->title}} ({{$post->created_at}}) by{{$post->info->name}}
                            </a>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
            @else
            <div class="card card">
                <div class="card-header">
                    <small class="card-title">{{$fullPost->title}}</small>
                </div>
                <div class="card-body">

                    <div class="card" style="min-height:100px;">{{$fullPost->body}} <!-- VIEW FULL POST-->
                    </div>
                    @foreach($Comments as $comment)
                    <div class="card" ">{{$comment->body}} 
                        <p style="color:green;">by :{{$comment->post->info->name}} </p></div>
                    @endforeach
                    @if(auth::check()) <!--CHECK IF USER IS LOGINED IN TO COMMENT-->
                    <form method="POST" action="{{route('comments')}}">
                        @csrf
                        <input type="text"  name="body"class="col-sm-2 control-label"
                          placeholder="Enter comment"> 
                    <input type="hidden" name="post_id" value="{{$fullPost->id}}">
                    <button>sent</button>  
                    </form>
                            @else
                            <span style="color:green">Login in to comment</span>
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
        @endsection
        @section('script')<!-- 
        <script>
            $(document).ready(function () {
        
                var post_id = $('#comment').data('id');
                $(':button').on('click', function () {
                    var body = $('#comment').val();
                    var user_id=$("#user_id").val();
                    $.ajax({
                         type: 'post',
                         url: '{{route('comments')}}',
                        processData: true,
                        data: {body: body, post_id: post_id ,_token:'{!!csrf_token()!!}' ,
                                user_id:user_id
                            },
                        success: function (response) {
                            console.log(response);
                            $("#message").html('comment sent');
                            $("#new").html(response.body);
                            
                        }
                    });
                });
            });

        </script> -->
        @endsection