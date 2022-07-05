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

                    Öğretmen sayfası

                    <a type="button" class="btn btn-primary float-end" href="/ders-ekle">Ders Ekle</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">


        <div class="col-9">
            <h1 class="p-2 ">Verilen Dersler</h1>
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
                        <th width="20" scope="col">Sil</th>
                        <th scope="col">Dersi Alan Öğrenciler</th>

                    </tr>
                </thead>
                <tbody>



                    @foreach($lessons as $lesson )
                    <tr>
                        <th scope="row">{{ $loop->index}}</th>
                        <td>{{$lesson->lesson_name}}</td>
                        <td><a class="btn btn-danger" href="/ders-sil/{{$lesson->id}}">Sil</a></td>
                        <td>
                            <?php $taking_student  =  explode(",", $lesson->taking_student);
                            foreach ($taking_student as $tak) {   ?>
                                @if(App\Models\User::where('id', $tak)->value('name') !="" )
                                <span class=" btn btn-success">{{ App\Models\User::where('id', $tak)->value('name')}}</span>
                                @endif
                            <?php   }  ?>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection