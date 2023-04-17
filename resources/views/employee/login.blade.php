@extends('layouts.auth')

@section('content')
<div class="row w-100 mx-0 auth-page">
    <div class="col-md-6 col-xl-5 mx-auto">
        <div class="card">
            <div class="auth-form-wrapper px-4 py-5">
                <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                <form class="forms-sample" method="post" action="{{ route('employee.login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password"
                            autocomplete="current-password" placeholder="Password">
                    </div>
                    <div class="form-check mb-3">
                        <input name="remember_me" type="checkbox" class="form-check-input" id="authCheck">
                        <label class="form-check-label" for="authCheck">
                            Remember me
                        </label>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop