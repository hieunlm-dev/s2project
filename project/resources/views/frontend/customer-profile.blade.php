@extends('frontend.layout.layout')

@section('contents')
    

<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>Customer Profile</span></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
            <div class=" main-content-area">
                <div class="wrap-login-item ">
                    @if ($errors->any()) 
                        <!--hiển thị thông báo lỗi-->  
                        <div class="card">
                            <div class="wrap-login-item">
                                <ul class='error'>
                                    @foreach($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="register-form form-item ">
                        <form class="form-stl" action="{{route('customer-update',$customer->id)}}" name="frm-login" method="post" >
                            @csrf
                            {{-- @method('PUT') --}}
                            <input type="hidden" value="{{$customer->id}}" name="id">
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Update Profile</h3>
                                <h4 class="form-subtitle">Personal infomation</h4>
                            </fieldset>					
                            
                            <fieldset class="wrap-input">
                                <label for="frm-reg-email">First name</label>
                                <input type="text" id="frm-reg-email" name="firstname" value="{{ $customer->firstname }}" placeholder="First name">
                            </fieldset>	
                            <fieldset class="wrap-input">
                                <label for="frm-reg-email">Last name</label>
                                <input type="text" id="frm-reg-email" name="lastname" value="{{ $customer->lastname }}" placeholder="Last name">
                            </fieldset>	
                            <fieldset class="wrap-input">
                                <label for="frm-reg-email">Phone</label>
                                <input type="text" id="frm-reg-email" name="phone" value="{{ $customer->phone }}" placeholder="Phone">
                            </fieldset>	
                            <fieldset class="wrap-input">
                                <label for="frm-reg-email">Address</label>
                                <input type="text" id="frm-reg-email" name="address" value="{{ $customer->address }}" placeholder="Address">
                            </fieldset>			
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Password Change?</h3>
                            </fieldset>
                            <fieldset class="wrap-input item-width-in-half left-item ">
                                <label for="frm-reg-pass">Password *</label>
                                <input type="text" id="frm-reg-pass" name="password" placeholder="Password">
                            </fieldset>
                            <fieldset class="wrap-input item-width-in-half ">
                                <label for="frm-reg-cfpass">Confirm Password *</label>
                                <input type="text" id="frm-reg-cfpass" name="password_confirmation" placeholder="Confirm Password">
                            </fieldset> <br> <br>
                            <input type="submit" class="btn btn-sign" value="Update" name="register">
                        </form>
                        
                    </div> 
                </div>
                
            </div><!--end main products area-->		
        </div>
    </div><!--end row-->
    		

</div>

@endsection