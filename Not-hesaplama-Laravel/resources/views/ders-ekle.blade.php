@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ders Ekle</div>

                <div class="card-body">
                    <form method="POST" action="/ders-ekle">
                        @csrf

                        <div class="row mb-3">
                            <label for="ders" class="col-md-4 col-form-label text-md-end">Ders Adı</label>

                            <div class="col-md-6">
                                <input id="ders" type="text" class="form-control " name="ders" required autofocus>

                                @if(session()->has('danger'))
                                <div id="mesagge" class="mesagge mt-4 p-3 col-12 alert alert-danger">{{session('danger')}}</div>
                                @endif

                                <script>
                                    function gizle() {
                                        setTimeout(function() {
                                            document.getElementById('mesagge').style.display = "none";
                                        }, 1000);
                                    }
                                    gizle()
                                </script>
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Ders Ekle
                                </button>


                                <a class="btn btn-warning" href="/">
                                    Geri Dön
                                </a>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection