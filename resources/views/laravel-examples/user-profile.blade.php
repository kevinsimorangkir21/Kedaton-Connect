@extends('layouts.user_type.auth')

@section('content')

@php
    $currentHour = (new \DateTime('now', new \DateTimeZone('Asia/Jakarta')))->format('H');

    if ($currentHour >= 5 && $currentHour < 10) {
        $greeting = 'Selamat Pagi';
    } elseif ($currentHour >= 10 && $currentHour < 15) {
        $greeting = 'Selamat Siang';
    } elseif ($currentHour >= 15 && $currentHour < 18) {
        $greeting = 'Selamat Sore';
    } else {
        $greeting = 'Selamat Malam';
    }
@endphp

<div>
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/gambar3.png'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h3>{{ $greeting }}, <b>{{ Auth::user()->name }}</b></h3>
                        <h5>Unit {{ Auth::user()->location }} | {{ Auth::user()->phone }}</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Profile Information') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="/user-profile" method="POST" role="form text-left">
                    @csrf
                    @if($errors->any())
                        <div class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white">{{ $errors->first() }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="m-3 alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                            <span class="alert-text text-white">{{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label" role="label">{{ __('Full Name') }}</label>
                                <span class="text-danger">*</span>
                                <div class="@error('user.name')border border-danger rounded-3 @enderror" role="group">
                                    <input class="form-control" value="{{ auth()->user()->name }}" type="text" placeholder="Full Name" required id="user-name" name="name">
                                    @error('name')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-email" class="form-control-label" role="label">{{ __('Email') }}</label>
                                <span class="text-danger">*</span>
                                <div class="@error('email')border border-danger rounded-3 @enderror" role="group">
                                    <input class="form-control" value="{{ auth()->user()->email }}" type="email" required placeholder="@telkomakses.com" id="user-email" name="email">
                                    @error('email')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-phone" class="form-control-label" role="label">{{ __('Phone') }}</label>
                                <div class="@error('user.phone')border border-danger rounded-3 @enderror" role="group">
                                    <div class="input-group">
                                        <span class="input-group-text">+62</span>
                                        <input class="form-control" type="tel" placeholder="XXXXXXXXXX" id="number" name="phone" value="{{ auth()->user()->phone }}">
                                    </div>
                                    @error('phone')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-location" class="form-control-label" role="label">{{ __('Unit') }}</label>
                                <span class="text-danger">*</span>
                                <div class="@error('user.location') border border-danger rounded-3 @enderror" role="group">
                                    <input class="form-control" type="text" placeholder="Location" id="name" required name="location" value="{{ auth()->user()->location }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4" role="button">{{ 'Save Changes' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
