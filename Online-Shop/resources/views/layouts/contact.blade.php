@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_styles.css')}}">


  <div class="contact_form">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="contact_form_container">
            <div class="contact_form_title">Contuct Customer Care</div>

            <form action="{{route('store.contact')}}" method="post" id="contact_form">
            @csrf
              <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                
                <input type="text" name="name" id="contact_form_name" class="contact_form_name input_field" placeholder="Your name" required="required" data-error="Name is required.">

                <input type="text" name="email" id="contact_form_email" class="contact_form_email input_field" placeholder="Your email" required="required" data-error="Email is required.">

                <input type="text" name="phone" id="contact_form_phone" class="contact_form_phone input_field" placeholder="Your phone number">

              </div>


              <div class="contact_form_text">
                <textarea id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
              </div>


              <div class="contact_form_button">
                <button type="submit" class="button contact_submit_button">Send Message Admin</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
    <div class="panel"></div>
  </div>



  <script src="{{asset('public/frontend/js/contact_custom.js')}}"></script>
@endsection
