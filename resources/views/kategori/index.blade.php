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
            Kategori </h3>
        <!-- <span class="kt-subheader__separator kt-subheader__separator--v"></span> -->
        <div class="kt-subheader__breadcrumbs">
            <!-- <a href="#" class="btn btn-label-success btn-bold btn-sm btn-icon-h kt-margin-l-10">
                Add New
            </a> -->
        </div>
    </div>

</div>
<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-list-1"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Data Kategori
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <button class="btn btn-success btn-elevate btn-icon-sm" id="tambah-data">
                            <i class="la la-plus"></i>
                            Tambah
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="mytable">
                <thead>
                    <tr>
                        <th style="width: 25px;">No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>

            <!--end: Datatable -->
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-form-title">Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
               <form class="kt-form" id="form-modal">
            <div class="modal-body">
                    <div class="form-group form-group-last">
                        <label for="nama" class="form-label">Nama</label>
                        <input class="form-control" type="text" name="nama" id="nama"
                            placeholder="Nama Kategori">
                    </div>
                    <div class="form-group form-group-last">
                        <label for="nama" class="form-label">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori" placeholder="kategori">
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>    
                        </select>
                    </div>
                    <div class="form-group form-group-last">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" type="text" name="deskripsi" id="deskripsi"
                                      placeholder="Deskripsi"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="id_kategori" name="id_kategori">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-batal">Batal</button>
                <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
            </div>
            </form>

        </div>
    </div>
</div>


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
        $('#tambah-data').on( 'click', function (e) {
            $("#modal-form").modal("show");
            $("#form-modal").trigger("reset");
            $("#modal-form-title").text("Tambah Kategori");
            $("#btn-simpan").val("tambah");
        });
        $("#form-modal").on("submit", (function (e) {
            e.preventDefault();
            // var data = new FormData(this);
            KTApp.block('#modal-form .modal-content', {message: 'Mohon Tunggu...'});
            var data = {
                'nama' : $("#nama").val(),
                'kategori' : $("#kategori").val(),
                'deskripsi' : $("#deskripsi").val(),
            };
            var type = "POST";
            var url = "{{ route('kategori.store') }}";
            if ($("#btn-simpan").val() == "edit") {
                var id= $("#id_kategori").val();
                type = "PUT";
                url = "{{ route('kategori.update',':id') }}";
                url = url.replace(":id",id);
            }
            $.ajax({
                type: type,
                url: url,
                data: data,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    KTApp.unblock('#modal-form .modal-content')
                    var obj = jQuery.parseJSON(JSON.stringify(data));
                    if (obj.status) {
                        Swal.fire({
                            title: "Sukses",
                            text: obj.pesan,
                            icon: "success",
                            timer: 3000,
                            type: "success"
                        });
                        $("#mytable").DataTable().ajax.reload(null, false);
                        $("#form-modal").trigger("reset");
                        $("#modal-form").modal("hide");
                    }else{
                        var error="";
                        $.each(obj.pesan, function(index, value) {
                            error+=value+"<br>";
                        });
                        Swal.fire({
                            title: "Gagal",
                            html: error,
                            type: "error"
                        });
                    }
                },
                error: function (data) {
                    KTApp.unblock('#modal-form .modal-content')
                    Swal.fire({
                        title: "Gagal",
                        text: "Gagal menyimpan data.",
                        timer: 3000,
                        type: "error"
                    });
                }
            });
        }));
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };
        var t= $("#mytable").DataTable({
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $("td:eq(0)", row).html(index);
            },
            processing: true,
            serverSide: true,
            scrollX: true,
            scrollCollapse: true,
            ajax: {
                "url": "{{ route('get.datatables.kategori') }}",
                "type": "POST"
            },
            columns: [
                {
                    data: "id_jabatan",
                    class: "text-center",
                     orderable: false,
                    render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                           } 
                },
                {
                    data: "nama"
                },
                {
                    data: "kategori"
                },
                {
                    data: "deskripsi"
                },
                {
                    data: "action",
                    name: "action",
                    class: "text-center action-column",
                    orderable: false,
                    searchable: false
                },
            ],
            order: [[1, "desc"]],
        });
        
        $("#mytable tbody").on( "click", "button.delete-data", function () {
            var id = $(this).val();
            var url = "{{ route('kategori.destroy',':id') }}";
            url = url.replace(":id",id);
             Swal.fire({
                title: "Anda yakin ingin menghapus?",
                text: "Data akan dihapus",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus",
                cancelButtonText: "Tidak, Batal",
                closeOnConfirm: false,
                closeOnCancel: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: url,
                    success: function (data) {
                        Swal.fire({
                            title: "Sukses",
                            text: "Data berhasil dihapus.",
                            timer: 3000,
                            type: "success"
                        });
                        $("#mytable").DataTable().ajax.reload(null, false);
                    },
                    error: function (data) {
                        Swal.fire({
                            title: "Gagal",
                            text: "Data gagal dihapus.",
                            timer: 3000,
                            type: "error"
                        });
                    }
                });
                }
            })
        });
        $('#mytable tbody').on( 'click', 'button.update-data', function () {
            var data = t.row( $(this).parents('tr') ).data();
            $("#form-modal").trigger("reset");
            $("#modal-form").modal("show"); 
            $("#id_kategori").val(data.id_kategori);
            $("#nama").val(data.nama);
            $("#deskripsi").val(data.deskripsi);
            $("#modal-form-title").text("Edit Kategori");
            $("#btn-simpan").val("edit");

            $("#modal-form").on('shown.bs.modal', function(){
                if ($('#kategori').find("option[value='" + data.kategori + "']").length) {
                    $('#kategori').val(data.kategori).trigger('change');
                } else { 
                    var newOption = new Option(data.kategori, data.kategori, true, true);
                    $('#kategori').append(newOption).trigger('change');
                } 
            });

        } );
        
    });
</script>
@endpush