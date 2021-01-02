@extends('layout.adminLayout')

@section('content')
<div style="height: 65px"></div>

<div class="container">
    <div style="width: 700px; margin: auto; background-color: #EEEEEE">
        <div style="width: 500px; margin: auto; padding: 70px">
            <!--Section: Block Content-->
        <section class="mb-5 text-center">

            <h3>Set a new password</h3>
            <br><br>
            <form action="{{ route('changePassword') }}" method="POST">
                @csrf
                <div class="md-form md-outline">
                    <input type="password" id="newPass" name="password" class="form-control" placeholder="New Password">
                    @error('password')
							<span style="color: red; font-size: 14px;">*{{ $message }}</span>
					@enderror
                    <br>
                </div>
            
                <div class="md-form md-outline">
                    <input type="password" id="newPassConfirm" name="repassword" class="form-control" placeholder="Confirm password">
                    @error('repassword')
							<span style="color: red; font-size: 14px;">*{{ $message }}</span>
					@enderror
                    <br>
                </div>
            
                <a href="{{ route('adminDashboard') }}" type="button" class="btn btn-success mb-4" style="margin-right: 10px">Cancel</a>
                <button type="submit" class="btn btn-success mb-4">Change password</button>
        
            </form>
        
        </section>
        <!--Section: Block Content-->
    </div>
    </div>
    

</div>
@endsection