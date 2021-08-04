@push('css')
<link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<style>
.select2{width:100%!important;}
</style>
@endpush
@extends('layouts.app')

@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            Home </h3>
        <!-- <span class="kt-subheader__separator kt-subheader__separator--v"></span> -->
        <div class="kt-subheader__breadcrumbs">
            <!-- <a href="#" class="btn btn-label-success btn-bold btn-sm btn-icon-h kt-margin-l-10">
                Add New
            </a> -->
        </div>
        
    </div>
     <div class="kt-subheader__toolbar">
        <div class="kt-subheader__wrapper">
            <button class="btn kt-subheader__btn-daterange" id="kt_absen_daterangepicker" data-toggle="kt-tooltip"
                title="" data-placement="left" data-original-title="Pilih Range Tanggal">
                <span class="kt-subheader__btn-daterange-title" id="kt_absen_daterangepicker_title"></span>&nbsp;
                <span class="kt-subheader__btn-daterange-date" id="kt_absen_daterangepicker_date"></span>
                <i class="flaticon2-calendar-1"></i>
            </button>
        </div>
    </div>
</div>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="row">
       
        <div class="col-xl-6 col-md-6 col-sm-12">
     
            <!--begin:: Widgets/Order Statistics-->
            <div class="kt-portlet kt-portlet--height-fluid ">
                <div class="kt-portlet__body kt-portlet__body--fluid mt-3">
                    <div class="kt-widget12">
                        <div class="kt-widget12__content">
                                <div class="kt-widget12__item">
                                
                                    <div class="kt-widget12__info">
                                        <span class="kt-widget12__desc">Saldo Total</span>
                                        <span class="kt-widget12__value" id="total"></span>
                                    </div>
                                    <div class="kt-widget12__info">
                                        <span class="kt-widget12__desc">Saldo Sesuai Tanggal</span>
                                        <span class="kt-widget12__value" id="total_sesuai"></span>
                                    </div>
                                </div>
                                <div class="kt-widget12__item">
                                
                                    <div class="kt-widget12__info">
                                        <span class="kt-widget12__desc">Total Pemasukan</span>
                                        <span class="kt-widget12__value" id="pemasukan"></span>
                                    </div>
                                    <div class="kt-widget12__info">
                                        <span class="kt-widget12__desc">Total Pengeluaran</span>
                                        <span class="kt-widget12__value" id="pengeluaran"></span>
                                    </div>
                                </div>
                                
                           
                            
                        </div>
                    </div>
                </div>
            </div>
    
            <!--end:: Widgets/Order Statistics-->
        </div>
</div>
<!-- Modal -->
@endsection
@push('js')
<script src="{{ asset('/assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
         
         var awal = moment().startOf('month'),
            akhir = moment().endOf('month');
            $('#kt_absen_daterangepicker_date').text(awal.format('D MMM')+" - "+akhir.format('D MMM'));
             var data = {
                    'absen_dari' : awal.format('YYYY-MM-DD'),
                    'absen_sampai' : akhir.format('YYYY-MM-DD'),
                    'absen_rangeLabel' : t,
                };
                console.log(data)
            fill_datatable(data);    
        $('#kt_absen_daterangepicker').daterangepicker({
            @if(Session::get('absen_dari') && Session::get('absen_sampai') && Session::get('absen_rangeLabel'))
                startDate: "{{Session::get('absen_dari')}}",
                endDate: "{{Session::get('absen_sampai')}}",
            @else
                startDate: awal.format('YYYY-MM-DD'),
                endDate: akhir.format('YYYY-MM-DD'),
            @endif
            
            buttonClasses: ' btn',
            applyClass: 'btn-primary',
            cancelClass: 'btn-secondary',
            showDropdowns: true,
            opens: "right",
            locale: {
                "format": "YYYY-MM-DD",
                "separator": " - ",
                "applyLabel": "Sumbit",
                "cancelLabel": "Batal",
                "fromLabel": "Dari",
                "toLabel": "Sampai",
                "customRangeLabel": "Pilih Tanggal",
                "daysOfWeek": [
                    "Min",
                    "Sen",
                    "Sel",
                    "Rab",
                    "Kam",
                    "Jum",
                    "Sab"
                ],
                "monthNames": [
                    "Januari",
                    "Februari",
                    "Maret",
                    "April",
                    "Mei",
                    "Juni",
                    "Juli",
                    "Agustus",
                    "September",
                    "Oktober",
                    "November",
                    "Desember"
                ],
                "firstDay": 1
            },
            ranges: {
                'Hari Ini': [moment(), moment()],
                '7 Hari Lalu': [moment().subtract(6, 'days'), moment()],
                '30 Hari Lalu': [moment().subtract(29, 'days'), moment()],
                'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
                'Bulan Kemarin': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, i);
        function i(e, a, t, r=true) {
            var i = "",
                n = "";
            n = e.format("D MMM") + " - " + a.format("D MMM");
            $("#kt_absen_daterangepicker_date").html(n);
            $("#kt_absen_daterangepicker_title").html(i);
            if (r==true) {
                var data = {
                    'absen_dari' : e.format('YYYY-MM-DD'),
                    'absen_sampai' : a.format('YYYY-MM-DD'),
                    'absen_rangeLabel' : t,
                };
                console.log(data)
                fill_datatable(data);
            }
        }
           var t;
        function fill_datatable(filler){
            $.ajax({
                    type: "POST",
                    url: "{{ route('data.home') }}",
                    dataType: 'json',
                    data: filler,
                    cache: false,
                    success: function (data) {
                        var obj = jQuery.parseJSON(JSON.stringify(data));
                        $("#total").html(obj.total);
                        $("#total_sesuai").html(obj.total_range);
                        $("#pemasukan").html(obj.pemasukan);
                        $("#pengeluaran").html(obj.pengeluaran);
                    },
                    error: function (data) {
                        Swal.fire({
                            title: "Gagal",
                            text: 'Gagal Mengubah Range',
                            type: "error",
                            onClose: () => {
                                location.reload();
                            }
                        });
                    }
                });
        }
    
     
        
    });
</script>
@endpush