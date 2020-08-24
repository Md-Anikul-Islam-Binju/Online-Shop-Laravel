@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/blog_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/blog_responsive.css')}}">

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-speed="0.8"><img src="{{URL::to($blog->post_image)}}" style="height: 250px; width: 1350px;"></div>
	</div>

	<!-- Single Blog Post -->

	<div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title"><h3>

					@if(session()->get('lang') == 'bangla')
                    {{ $blog->post_title_bn}}
                    @else
                    {{ $blog->post_title_en}}
                    @endif






					</h3>
				   </div>



					<div class="single_post_text">
						<p>

						@if(session()->get('lang') == 'bangla')
                        {{ $blog->details_bn}}
                        @else
                        {{ $blog->details_en}}
                        @endif
						
						</p>
					</div>

				</div>
			</div>
		</div>
	</div>

		<!-- Recently Viewed -->
	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Blog Comment</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="">						
							<ul class="nav nav-tabs" id="myTab" role="tablist">

							  <li class="nav-item">
							    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Blog Review Or Comment box</a>
							  </li>
							</ul><br>

							<div class="tab-content" id="myTabContent">


							  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

							  	<div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="8"></div>

							  </div>
							  
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v5.0"></script>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5dff5c0e258810001231d9cc&product=inline-share-buttons&cms=sop' async='async'></script>
<script src="{{asset('public/frontend/js/blog_custom.js')}}"></script>


@endsection