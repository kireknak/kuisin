@extends('layouts.clean')
@section('content')
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Log in</h2>
                    <p class="w-lg-50"></p>
                </div>
            </div>

            <div class="row d-flex justify-content-center " style="box-shadow: 0px 0px;">
                <div class="col-md-6 col-xl-4 border rounded">

                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center"
                            style="margin-bottom: 10px;margin-top: 10px;padding: 16px;">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg class="bi bi-person"
                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z">
                                    </path>
                                </svg></div>
                            <form class="text-center" method="post" action="{{ route('akun.store') }}">
                                @csrf
                                @if (count($errors) > 0)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    <div>{{ $error }}</div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <input class="form-control" type="text" name="nama" placeholder="Nama" />
                                </div>


                                <div class="mb-3">
                                    <input class="form-control" type="email" name="email" placeholder="Email"  required/>
                                </div>
                                <div class="mb-3"><input class="form-control" type="password" name="password"
                                        placeholder="Password" required/></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password_confirmation"
                                        placeholder="Konfirmasi Password" /></div>
                                <div class="container mb-3"><span class="d-xl-flex justify-content-xl-start"
                                        style="position: relative;margin-left: 0;">Daftar Sebagai </span>
                                    <div class="form-check"><input id="formCheck-1" name="role" class="form-check-input"
                                            type="radio" value="pengajar" required/><label
                                            class="form-check-label d-xl-flex justify-content-xl-start"
                                            for="formCheck-1">Pengajar</label></div>
                                    <div class="form-check"><input id="formCheck-2" name="role" class="form-check-input" value="peserta"
                                            type="radio" /><label
                                            class="form-check-label d-xl-flex justify-content-xl-start"
                                            for="formCheck-2">Peserta</label></div>
                                </div>
                                <div class="mb-3 ms-sm-0"></div>
                                <div class="mb-3"></div><button class="btn btn-primary d-block w-100"
                                    type="submit">Daftar</button>
                            </form>
                        </div>
                    </div>
                    <p class="text-muted">Sudah Punya Akun? <a href="#">Masuk Disini</a></p>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
