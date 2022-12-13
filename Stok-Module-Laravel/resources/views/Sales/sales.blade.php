@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <h2 class="p-3">

                        <b class="me-5 fs-2"> Total Kazanç {{$data['totalPrice']}} TL</b>
                        <b class="ms-5 fs-2"> Kasa {{$data['casing']}} TL</b>

                        <a href="{{route('sales.day')}}" class="btn btn-warning me-2 float-right">Bugünkü Satışlar</a>
                        <a href="{{route('sales.month')}}" class="btn btn-warning me-2 float-right">Aylık Satışlar</a>
                        <a href="{{route('sales.year')}}" class="btn btn-warning me-2 float-right">Yıllık Satışlar</a>

                    </h2>
                </div>
                <div class="p-2">

                    <table id="example" class="display" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Ürün Adı</th>
                                <th>Alış Fiyatı</th>
                                <th>Satış Fiyatı</th>
                                <th>Satış Miktarı</th>
                                <th>Satış Tarihi</th>
                                <th width="20">Sil</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach( array_reverse ($data['salesProduct']) as $sale)
                            <tr id="item-{{$sale['id']}}">
                                <td>{{$sale['name']}}</td>
                                <td>{{$sale['buy_price']}}</td>
                                <td>{{$sale['sell_price']}}</td>
                                <td>{{$sale['quantity']}}</td>
                                <td>{{$sale['sale_date']}}</td>
                                <td>
                                    <a id="{{$sale['id']}}" href="javascript:void(0)" class="btn btn-danger deleteButton">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>

                            </tr>



                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Ürün Adı</th>
                                <th>Alış Fiyatı</th>
                                <th>Satış Fiyatı</th>
                                <th>Satış Miktarı</th>
                                <th>Satış Tarihi</th>
                                <th>Sil</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'pdfHtml5'
            ]
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".deleteButton").click(function() {
        destroy_id = $(this).attr('id');
        alertify.confirm('Silme işlemini onaylayın', 'Bu işlem geri alınamaz',
            function() {
                $.ajax({
                    type: "GET",
                    url: "sales/delete/" + destroy_id,
                    success: function(msg) {
                        if (msg) {
                            $("#item-" + destroy_id).remove();
                            alertify.success("Silme İşlemi Tamamlandı");
                        } else {
                            alertify.error("İşlem Tamamlanamadı");
                        }
                    }
                });
            },
            function() {
                alertify.error('Silme İşlemi İptal Edildi');
            }
        )
    });
</script>
@endsection
