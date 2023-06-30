@extends('layout.main')

@section('title', 'Akun Pegawai')

@section('css')
    {{-- Custom CSS --}}
@endsection

@section('breadcumb')
<!-- PAGE-HEADER Breadcrumbs -->
<div class="breadcrumb-header justify-content-between">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Akun Pegawai</li>
            </ol>
        </nav>
    </div>
</div>
<!-- PAGE-HEADER Breadcumbs END -->
@endsection

@section('content')
<!-- Row -->
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Akun Pegawai</h3>
            </div>
            <div class="card-body">
                <a class="btn btn-primary modal-effect mb-3 data-table-btn ms-4" data-bs-effect="effect-super-scaled" onclick="create()">
                    <span class="fe fe-plus"> </span>Tambah data baru
                </a>
                <table id="datatable" class="table table-bordered text-nowrap border-bottom">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- COL END -->

    <div class="modal fade" id="modal_form">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Tambah data baru</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                        <form id="form" method="POST">
                            @csrf
                        <div class="form-group">
                            <input type="hidden" id="id" name="id">
                            <h6 class="title">ID KARTU</h6>
                            <div class="mb-3">
                                <input type="text" placeholder="Id kartu.." value="" name="card_id" class="form-control" id="card_id">
                            </div>
                            <hr class="mt-4 bg-secondary">
                            <h6 class="title">DATA AKUN</h6>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" placeholder="Username.." value="" name="username" class="form-control" id="username">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" placeholder="email@example.com" value="" name="email" class="form-control" id="email">
                            </div>
                            <hr class="mt-4 bg-secondary">
                            <h6 class="title">DATA KENDARAAN</h6>
                            <div class="mb-3">
                                <label for="brand" class="form-label label">Merek</label>
                                <input type="text" placeholder="Ex: Yamaha, Honda dsb." value="" name="brand" class="form-control" id="brand">
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label label">Tipe</label>
                                <input type="text" placeholder="Ex: Yamaha All New Nmax 155, Honda Beat dsb." value="" name="type" class="form-control" id="type">
                            </div>
                            <div class="mb-3">
                                <label for="vehycle_number" class="form-label label">Nomor Kedaraan</label>
                                <input type="text" placeholder="Ex: E 1234 EF" value="" name="vehycle_number" class="form-control" id="vehycle_number">
                            </div>
                            <div class="mb-3">
                                <label for="chassis_number" class="form-label label">Nomor Rangka</label>
                                <input type="text" placeholder="Ex: MHY3210406B508937" value="" name="chassis_number" class="form-control" id="chassis_number">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label label">Foto Kendaraan</label>
                                <input id="image" class="dropify" type="file" accept=".jpg,.png,.svg,.jpeg,.webp" name="image" data-allowed-file-extensions="jpeg jpg png webp svg" />
                                <small class="text-danger label">Ukuran foto maksimal 1MB</small>
                            </div>
                        </div>
                    </div>
                </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button  id="btnSave" class="btn btn-primary">Simpan</button>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
@endsection

@section('script')

<!-- DATA TABLE JS-->
<script src="{{ asset('virtual/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('virtual/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>

<script src="{{ asset('virtual/assets/js/script.js') }}"></script>

<script src="{{ asset('virtual/assets/plugins/fileuploads/js/fileupload.js') }}"></script>


<script>
    var $table;

    $(document).ready(function() {
        // Contoh Inisiator datatable severside

        table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('pegawai.datatable') }}",
            dom: 'lBfrtip',
            buttons: [
                
                {
                    extend: 'csv',
                    className: 'btn btn-info',
                    text: `<i class="fe fe-file-text me-1"></i>
                        <span>CSV</span>`,
                        exportOptions: {
                        columns: [0,1,5,6,7]
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn btn-success',
                    text: `<i class="si si-layers me-1"></i>
                        <span>Excel</span>`,
                    exportOptions: {
                        columns: [0,1,5,6,7]
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-danger',
                    text: `<i class="si si-printer me-1"></i>
                        <span>PDF</span>`,
                        exportOptions: {
                        columns: [0,1,5,6,7]
                    }
                },
            ],
            columnDefs: [
            {
                targets: 0,
                render: function(data, type, full, meta) {
                    return (meta.row + 1);
                }
            }, 
            {
                targets: -1,
                render: function(data, type, full, meta) {
                    return `
                    <div class="btn-list">
                        <a href="javascript:void(0)" onclick="edit('${data}')" class="btn btn-sm btn-primary modal-effect btn-edit" data-bs-effect="effect-super-scaled"><span class="fe fe-edit"> </span></a>
                        <a href="javascript:void(0)" onclick="destroy('${data}')" class="btn btn-sm btn-danger btn-delete"><span class="fe fe-trash-2"> </span></a>
                    </div>
                    `;
                },
            }, ],
            columns: [
                { data: null },
                { data: 'username'},
                { data: 'email'},
                { data: 'id'}, 
            ]
        });

        $('#btnSave').on('click', function () {
            $('#form').submit();
        })
        
        $('#form').on('submit', function(e){
            e.preventDefault();
            const _form = this
            const data = new FormData(_form);

            var url = "{{ route('pegawai.store') }}";
    
            $('#btnSave').text('Menyimpan...');
            $('#btnSave').attr('disabled', true);

            if(submit_method == 'edit'){
                url = "{{ route('pegawai.update',':id') }}";
                url = url.replace(':id', id);
            }

            $.ajax({
                url: url,
                type: submit_method == 'create' ? 'POST' : 'PUT',
                dataType: 'json',
                data: data,
                processData: false,
                contentType: false,
                processData:false,
                success: function (data) {
                    console.log(data)
                    if(data.status) {
                        $('#modal_form').modal('hide');
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        table.ajax.reload();

                        $('#btnSave').text('Simpan');
                        $('#btnSave').attr('disabled', false);
                    }else{
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'ERROR !',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                    
                    $('#btnSave').text('Simpan');
                    $('#btnSave').attr('disabled',false); //set button enable 
                }, 
                error: function(data){
                    var error_message = "";
                    error_message += " ";
                    
                    $.each( data.responseJSON.errors, function( key, value ) {
                        error_message +=" "+value+" ";
                    });

                    let errors = data.responseJSON?.errors
                    if(errors){
                        for(const [key, value] of Object.entries(errors)){
                            $(`[name='${key}']`).parent().append(`<sp class="text-danger text-small">${value}</sp>`)
                            $(`[name='${key}']`).addClass('is-invalid')
                        }
                    }

                    error_message +=" ";
                    Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'ERROR !',
                            text: error_message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    $('#btnSave').text('Simpan');
                    $('#btnSave').attr('disabled', false);
                },
            });
        })
    });

    function create(){
        submit_method = 'create';
        $('#image').show();
        var df = "";
        df = $('#image').dropify();
        df = df.data('dropify');

        $('#id').val('');
        $('#form')[0].reset();

        $('#brand, #type, #card_id, #chassis_number, .label ,#vehycle_number, .title, hr').show();
        $('#card_id').parent().show();
        $('.modal-dialog').addClass('modal-dialog-scrollable');
        $('.modal-dialog').addClass('modal-lg');
        $('.modal-dialog').removeClass('modal-dialog-centered');

        $('#modal_form').modal('show');
        $('.modal-title').text('Tambah data akun');
    }
    
    function edit(id){
        submit_method = 'edit';
        $('#form')[0].reset();
        var url = "{{ route('pegawai.edit',':id') }}";
        url = url.replace(':id', id);
        console.log(url);

        var df = "";
        df = $('#image').dropify();
        
        df = df.data('dropify');
        df.destroy();

        $.get(url, function (response) {
            response = response.data;
            
            $('#id').val(response.id);
            $('#username').val(response.username);
            $('#email').val(response.email);
            $('#brand, #type, #card_id, #chassis_number, .label ,#vehycle_number, #image, .title, hr').hide();
            $('#card_id').parent().hide();
            $('#modal_form').modal('show');
            $('.modal-dialog').removeClass('modal-dialog-scrollable');
            $('.modal-dialog').removeClass('modal-lg');
            $('.modal-dialog').addClass('modal-dialog-centered');
            $('.modal-title').text('Edit data akun pegawai');

        });
    }

    // function submit() {
    //     var id          = $('#id').val();
    //     var username        = $('#username').val();
    //     var email        = $('#email').val();
    //     var card_id        = $('#card_id').val();
    //     var brand        = $('#brand').val();
    //     var type        = $('#type').val();
    //     var type        = $('#type').val();
    //     // console.log();
    //     var url = "{{ route('mahasiswa.store') }}";
    
    //     $('#btnSave').text('Menyimpan...');
    //     $('#btnSave').attr('disabled', true);

    //     if(submit_method == 'edit'){
    //         url = "{{ route('mahasiswa.update',":id") }}";
    //         url = url.replace(':id', id);
    //     }

    //     $.ajax({
    //         url: url,
    //         type: submit_method == 'create' ? 'POST' : 'PUT',
    //         dataType: 'json',
    //         data: {
    //             id: id,
    //             username: username,
    //             email: email
    //         },
    //         success: function (data) {
    //             if(data.status) {
    //                 $('#modal_form').modal('hide');
    //                 Swal.fire({
    //                     toast: true,
    //                     position: 'top-end',
    //                     icon: 'success',
    //                     title: data.message,
    //                     showConfirmButton: false,
    //                     timer: 1500
    //                 });
    //                 table.ajax.reload();

    //                 $('#btnSave').text('Simpan');
    //                 $('#btnSave').attr('disabled', false);
    //             }
    //             else{
    //                 for (var i = 0; i < data.inputerror.length; i++) 
    //                 {
    //                     $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
    //                     $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
    //                 }
    //             }
                
    //             $('#btnSave').text('Simpan');
    //             $('#btnSave').attr('disabled',false); //set button enable 
    //         }, 
    //         error: function(data){
    //             var error_message = "";
    //             error_message += " ";
                
    //             $.each( data.responseJSON.errors, function( key, value ) {
    //                 error_message +=" "+value+" ";
    //             });

    //             error_message +=" ";
    //             Swal.fire({
    //                     toast: true,
    //                     position: 'top-end',
    //                     icon: 'error',
    //                     title: 'ERROR !',
    //                     text: error_message,
    //                     showConfirmButton: false,
    //                     timer: 2000
    //                 });
    //             $('#btnSave').text('Simpan');
    //             $('#btnSave').attr('disabled', false);
    //         },
    //     });
    // }
    
    // function destroy(id) {
    //     var url = "{{ route('mahasiswa.destroy',":id") }}";
    //     url = url.replace(':id', id);
    
    //     Swal.fire({
    //         title: "Yakin ingin menghapus data ini?",
    //         text: "Ketika data terhapus, anda tidak bisa mengembalikan data tersbut!",
    //         icon: "warning",
    //         showCancelButton  : true,
    //         confirmButtonColor: "#3085d6",
    //         cancelButtonColor : "#d33",
    //         confirmButtonText : "Ya, Hapus!",
    //         cancelButtonText : "Batal"
    //     }).then((result) => {
    //         if (result.value) {
    //             $.ajax({
    //                 url    : url,
    //                 type   : "delete",
    //                 data: { "id":id },
    //                 dataType: "JSON",
    //                 success: function(data) {
    //                     table.ajax.reload();
    //                     Swal.fire({
    //                         toast: true,
    //                         position: 'top-end',
    //                         icon: 'success',
    //                         title: 'Data berhasil dihapus',
    //                         showConfirmButton: false,
    //                         timer: 1500
    //                     });
    //                 }
    //             })
    //         }
    //     })
    // } 

</script>
@endsection