@extends('layout.main')

@section('title', 'Akun Admin')

@section('css')
    {{-- Custom CSS --}}
@endsection

@section('breadcumb')
<!-- PAGE-HEADER Breadcrumbs -->
<div class="breadcrumb-header justify-content-between">
    <div>
    <h4 class="content-title mb-2">Tambah data akun</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a   href="javascript:void(0);"></a></li>
                <li class="breadcrumb-item active" aria-current="page"> Akun Admin</li>
            </ol>
        </nav>
    </div>
</div>
<!-- PAGE-HEADER Breadcumbs END -->
@endsection

@section('content')
<!-- Row -->
<div class="row">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row row-sm">
                    <div class="col-lg">
                        <div class="mb-3">
                            <label for="idc"><b>ID Kartu</b></label>
                            <input id="idc" class="form-control mg-b-20" placeholder="ID Kartu" type="text">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">Identitas diri</div>
                <div class="row row-sm mt-3">
                    <div class="col-lg">
                    <div class="mb-3">
                            <label for="usr">Username</label>
                            <input id="usr" class="form-control mg-b-20" placeholder="Username" type="text">
                        </div>
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input id="nama" class="form-control mg-b-20" placeholder="Nama" type="text">
                        </div>
                        <div class="mb-3">
                            <label for="nn">NIP/NIM</label>
                            <input id="nn" class="form-control mg-b-20" placeholder="NIP/NIM" type="text">
                        </div>
                        <div class="row mg-t-10">
                            <label for="usr">Gender</label>
                            <div class="col-lg-3">
                                <label class="rdiobox"><input name="rdio" type="radio"> <span>Laki-laki</span></label>
                            </div>
                            <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                <label class="rdiobox"><input checked name="rdio" type="radio"> <span>Perempuan</span></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
            <div class="main-content-label mg-b-5">Informasi diri</div>
                <div class="row row-sm mt-3">
                    <div class="col-lg">
                        <div class="mb-3">
                            <label for="eml">Email</label>
                            <input id="eml" class="form-control mg-b-20" placeholder="Email" type="text">
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Phone:
                                    </div>
                                </div><!-- input-group-prepend -->
                                <input class="form-control" id="phoneMask" placeholder="" type="number">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alm">Alamat</label>
                            <input id="alm" class="form-control mg-b-20" placeholder="Alamat" type="text">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
            <div class="main-content-label mg-b-5">Detail Kendaraan</div>
                <div class="row row-sm mt-3">
                    <div class="col-lg">
                        <div class="mb-3">
                            <label for="mrk">Merek</label>
                            <input id="mrk" class="form-control mg-b-20" placeholder="Merek" type="text">
                        </div>
                        <div class="mb-3">
                            <label for="tp">Tipe</label>
                            <input id="tp" class="form-control mg-b-20" placeholder="Tipe" type="text">
                        </div>
                        <div class="mb-3">
                            <label for="nk">Nomor Kendaraan</label>
                            <input id="nk" class="form-control mg-b-20" placeholder="Nomor Kendaraan" type="text">
                        </div>
                    </div>
                </div>
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

<script>
    var $table;

    $(document).ready(function() {
        // Contoh Inisiator datatable severside
        table = $("#datatable").DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: "{{ route('admin.datatable') }}",
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
            submit();
        })
        
        $('#form').on('submit', function(e){
            e.preventDefault();

            submit();
        })
    });

    function create(){
        submit_method = 'create';

        $('#id').val('');
        $('#form')[0].reset();

        $('#modal_form').modal('show');
        $('.modal-title').text('Tambah data akun');
    }
    
    function edit(id){
        submit_method = 'edit';

        $('#form')[0].reset();
        var url = "{{ route('admin.edit',":id") }}";
        url = url.replace(':id', id);
        
        $.get(url, function (response) {
            response = response.data;
            
            $('#id').val(response.id);
            $('#username').val(response.username);
            $('#email').val(response.email);
            $('#modal_form').modal('show');
            $('.modal-title').text('Edit data akun admin');

            $('#name').val(response.name);
        });
    }

    function submit() {
        var id          = $('#id').val();
        var username        = $('#username').val();
        var email        = $('#email').val();
        // console.log();
        var url = "{{ route('admin.store') }}";
    
        $('#btnSave').text('Menyimpan...');
        $('#btnSave').attr('disabled', true);

        if(submit_method == 'edit'){
            url = "{{ route('admin.update',":id") }}";
            url = url.replace(':id', id);
        }

        $.ajax({
            url: url,
            type: submit_method == 'create' ? 'POST' : 'PUT',
            dataType: 'json',
            data: {
                id: id,
                username: username,
                email: email
            },
            success: function (data) {
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
                }
                else{
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
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
    }
    
    function destroy(id) {
        var url = "{{ route('admin.destroy',":id") }}";
        url = url.replace(':id', id);
    
        Swal.fire({
            title: "Yakin ingin menghapus data ini?",
            text: "Ketika data terhapus, anda tidak bisa mengembalikan data tersbut!",
            icon: "warning",
            showCancelButton  : true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor : "#d33",
            confirmButtonText : "Ya, Hapus!",
            cancelButtonText : "Batal"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url    : url,
                    type   : "delete",
                    data: { "id":id },
                    dataType: "JSON",
                    success: function(data) {
                        table.ajax.reload();
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                })
            }
        })
    } 

</script>
@endsection