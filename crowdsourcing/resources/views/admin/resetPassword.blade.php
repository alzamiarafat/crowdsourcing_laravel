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
                    <br>
                </div>
            
                <div class="md-form md-outline">
                    <input type="password" id="newPassConfirm" name="repassword" class="form-control" placeholder="Confirm password">
                    <br>
                </div>
            
                <button type="submit" class="btn btn-success mb-4">Change password</button>
        
            </form>
        
            <div class="d-flex justify-content-between align-items-center mb-2">
        
            <u><a href="/logout">Back to Log In</a></u>
        
            <u><a href="/registration">Register</a></u>
        
            </div>
        
        </section>
        <!--Section: Block Content-->
    </div>
    </div>
    

</div>
@endsection