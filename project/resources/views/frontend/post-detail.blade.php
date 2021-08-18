@extends('frontend.layout.layout')

@section('contents')

<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>Post</span></li>
				</ul>
			</div>
			<div class="row">
                <h2 style="text-align: center; font-weight:bolder; padding-left:100px; padding-right:100px">{!!$post->title!!}</h2>
                <p style="text-align: right; padding-right:20px">By <i>{{$post->author}}</i></p>
                <p style="text-align: right; padding-right:20px"><i>Post day: {{$post->created_at -> format('d/m/Y')}}</i></p>
                <div class="col-md-12">
                   {!!$post->contents!!}
                </div>
			</div><!--end row-->
		</div><!--end container-->
@endsection
