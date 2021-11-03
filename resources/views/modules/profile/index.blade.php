@extends('layouts.app')

@section('content')
   <div class="row mt--7">
   <div class="col">
      <div class="card shadow">
         <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    <strong>Success!</strong> Profile has been saved!
                </div>
                @endif
                @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <strong>Error!</strong> Please correct fields below!
                </div>
                @endif
            <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
            <div class="row">
               <div class="col-md-3 border-right">
                  <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">{{ auth()->user()->name }}</span><span class="text-black-50">{{ auth()->user()->email }}</span><span> </span></div>
                  <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="Full name" value="{{ old('name') ? old('name') : $user->name ?? '' }}" name="name">
                        </div>
                  </div>
                  <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Password</label><input type="text" class="form-control" placeholder="***********" value="" name="password"></div>  
                        <div class="col-md-12"><label class="labels">Confirm Password</label><input type="text" class="form-control" placeholder="***********" value="" name="confirm_password"></div> 
                  </div>  
               </div>

               <div class="col-md-5 border-right">
                  <div class="p-3 py-5">
                     <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                     </div>
                     <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="Enter phone number" value="{{ old('mobile_number') ? old('mobile_number') : $user->mobile_number ?? '' }}" name="mobile_number"></div>
                        <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="Enter address" value="{{ old('address') ? old('address') : $user->address ?? '' }}" name="address"></div>
                        <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="Enter postcode" value="{{ old('postcode') ? old('postcode') : $user->postcode ?? '' }}" name="postcode"></div>
                        <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="Enter area" value="{{ old('area') ? old('area') : $user->area ?? '' }}" name="area"></div>
                     </div>
                     <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="{{ old('country') ? old('country') : $user->country ?? '' }}" name="country"></div>
                        <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="{{ old('state') ? old('state') : $user->state ?? '' }}" placeholder="state" name="state"></div>
                     </div>
                     <div class="mt-5 text-center"><button class="btn btn-primary btn-lg btn-block" type="Submit" name="Submit"><i class="fa fa-check"></i> Save</button></div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="p-3 py-5">
                     <div class="d-flex justify-content-between align-items-center experience">
                        <h4>Subcription Details</h4>
                     </div>
                     <br>
                     <div class="col-md-12"><label class="labels">Current Plan</label><input type="text" class="form-control" placeholder="" value=""></div>
                     <br>
                     <div class="col-md-12"><label class="labels">Payment Duration</label><input type="text" class="form-control" placeholder="" value=""></div>
                     <div class="col-md-12"><label class="labels">Next Renewal Date</label><input type="text" class="form-control" placeholder="" value=""></div>
                     <div class="col-md-12"><label class="labels">Plan Expiration Date</label><input type="text" class="form-control" placeholder="" value=""></div>
                  </div>
               </div>
            </div>
         </form>
         </div>
      </div>
   </div>
</div>
@endsection
