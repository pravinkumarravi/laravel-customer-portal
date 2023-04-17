@extends('layouts.auth')

@section('content')
<div class="row w-100 mx-0 auth-page">
    <div class="col-md-6 col-xl-5 mx-auto">
        <div class="card">
            <div class="auth-form-wrapper px-4 py-5">
                <h5 class="text-muted fw-normal mb-4">Create your account.</h5>
                <form class="forms-sample" method="post" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="Phone" class="form-label">Phone number</label>
                        <input name="phone" type="phone" class="form-control" id="Phone" placeholder="Phone">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password"
                            autocomplete="current-password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input name="confirm-password" type="confirm-password" class="form-control" id="confirmPassword"
                            autocomplete="confirm-current-password" placeholder="Confirm Password">
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white" value="Register">
                    </div>
                    <a href="{{ route('customer.login') }}" class="d-block mt-3 text-muted">Already have an account?
                        Sign in</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop