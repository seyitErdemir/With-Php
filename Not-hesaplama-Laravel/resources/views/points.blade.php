@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    Notlar sayfası
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">

        @if( Illuminate\Support\Facades\Auth::user()->type == 1 )
        <div class="col-9">
            <h1 class="p-2 ">Dersin Öğrenci Notları <a class="btn btn-secondary" href="/">Geri</a></h1>

            @if(session()->has('danger'))
            <div id="mesagge" class="mesagge col-3 alert alert-danger">{{session('danger')}}</div>
            @endif
            @if(session()->has('success'))
            <div id="mesagge" class="mesagge col-3 alert alert-success">{{session('success')}}</div>
            @endif
            @if(session()->has('secondary'))
            <div id="mesagge" class="mesagge col-3 alert alert-secondary">{{session('secondary')}}</div>
            @endif
            <script>
                function gizle() {
                    setTimeout(function() {
                        document.getElementById('mesagge').style.display = "none";
                    }, 1000);
                }
                gizle()
            </script>


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ders Adı</th>
                        <th scope="col">Öğrenci Adı</th>
                        <th width="100" scope="col text-center">Vize %40</th>
                        <th width="100" scope="col">Final %60</th>
                        <th width="100" scope="col text-center ">Ortalama</th>


                        <th width="150" scope="col">Notları Güncelle</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach($points as $point )
                    <tr>
                        <form method="POST" action="/not-guncelle/{{$point->student_id}}/{{$point->lesson_id}}">
                            @csrf
                            <th scope="row">{{ $loop->index}}</th>
                            <td>{{$point->lesson_name}}</td>

                            <td>{{$point->name}}</td>

                            <td> <input class="form-control" placeholder="GR" value="{{$point->vize}}" name="vize" type="number" min="1" max="100"> </td>
                            <td> <input class="form-control" placeholder="GR" value="{{$point->final}}" name="final" type="number" min="1" max="100"> </td>

                            <td class="text-center">{{($point->vize * 40 / 100) + ($point->final*60 /100) }}</td>
                            <td><button class="btn btn-warning">Güncelle</button></td>
                        </form>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif


        @if( Illuminate\Support\Facades\Auth::user()->type == 0 )
        <div class="col-9">
            <h1 class="p-2 ">Dersin Öğrenci Notları <a class="btn btn-secondary" href="/">Geri</a></h1>

            @if(session()->has('danger'))
            <div id="mesagge" class="mesagge col-3 alert alert-danger">{{session('danger')}}</div>
            @endif
            @if(session()->has('success'))
            <div id="mesagge" class="mesagge col-3 alert alert-success">{{session('success')}}</div>
            @endif
            @if(session()->has('secondary'))
            <div id="mesagge" class="mesagge col-3 alert alert-secondary">{{session('secondary')}}</div>
            @endif
            <script>
                function gizle() {
                    setTimeout(function() {
                        document.getElementById('mesagge').style.display = "none";
                    }, 1000);
                }
                gizle()
            </script>


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ders Adı</th>
                        <th width="100" scope="col text-center">Vize %40</th>
                        <th width="100" scope="col">Final %60</th>
                        <th width="100" scope="col text-center ">Ortalama</th>



                    </tr>
                </thead>
                <tbody>
                    @foreach($points as $point )
                    <tr>
                        <form method="POST" action="/not-guncelle/{{$point->student_id}}/{{$point->lesson_id}}">
                            @csrf
                            <th scope="row">{{ $loop->index}}</th>
                            <td>{{$point->lesson_name}}</td>

                            <td>{{$point->vize}}</td>
                            <td>{{$point->final}} </td>

                            <td class="text-center">{{($point->vize * 40 / 100) + ($point->final*60 /100) }}</td>

                        </form>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

    </div>
</div>
@endsection