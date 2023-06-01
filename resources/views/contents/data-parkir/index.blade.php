@extends('layout.main')

@section('title', 'Data Parkir')

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
                <li class="breadcrumb-item active" aria-current="page">Data Parkir</li>
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
                <h3 class="card-title">List Data Parkir</h3>
            </div>
            <div class="card-body">
                {{-- <a class="btn btn-primary modal-effect mb-3 data-table-btn ms-4" data-bs-effect="effect-super-scaled" onclick="create()">
                    <span class="fe fe-plus"> </span>Add new data
                </a> --}}
                <table id="datatable" class="table table-bordered text-nowrap border-bottom">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th>Tanggal</th>
                            <th>Waktu Masuk</th>
                            <th>Waktu Keluar</th>
                            <th>Pemilik</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- COL END -->

    <div class="modal fade" id="modal_detail">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Detail Data Pengguna Parkiran</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 mb-2 text-center" id="foto_user">
                            
                        </div>
                        <div class="col-md-9">
                            <div class="row py-1 bg-light me-1">
                                <div class="col-md-3">
                                    Nama&emsp;&emsp;&emsp;&emsp;&emsp;:
                                </div>
                                {{-- <div class="col-md-1">
                                    :
                                </div> --}}
                                <div class="col-md-9" id="name">
                                    Hanny Berlianty
                                </div>
                            </div>
                            <div class="row py-1 bg-secondary me-1">
                                <div class="col-md-3">
                                    NIP/NIM &ensp;&emsp;&emsp;&emsp;:
                                </div>
                                {{-- <div class="col-md-1">
                                    :
                                </div> --}}
                                <div class="col-md-9" id="nip_nim">
                                    2003072
                                </div>
                            </div>
                            <div class="row py-1 bg-light me-1">
                                <div class="col-md-3">
                                    Gender&ensp;&emsp;&emsp;&emsp;&emsp;:
                                </div>
                                {{-- <div class="col-md-1">
                                    :
                                </div> --}}
                                <div class="col-md-9" id="gender">
                                    Perempuan
                                </div>
                            </div>
                            <div class="row py-1 bg-secondary me-1">
                                <div class="col-md-3">
                                    No.Hp&ensp;&emsp;&emsp;&ensp;&emsp;&nbsp;&ensp;:
                                </div>
                                {{-- <div class="col-md-1">
                                    :
                                </div> --}}
                                <div class="col-md-9" id="no_hp">
                                    0838618920
                                </div>
                            </div>
                            <div class="row py-1 bg-light me-1">
                                <div class="col-md-3">
                                    Card Id&ensp;&ensp;&ensp;&emsp;&emsp;&emsp;:
                                </div>
                                {{-- <div class="col-md-1">
                                    :
                                </div> --}}
                                <div class="col-md-9" id="card_id">
                                    29368192
                                </div>
                            </div>
                            <div class="row py-1 bg-secondary me-1">
                                <div class="col-md-3">
                                    Alamat&ensp;&emsp;&emsp;&ensp;&emsp;&nbsp;&nbsp;:
                                </div>
                                {{-- <div class="col-md-1">
                                    :
                                </div> --}}
                                <div class="col-md-9" id="address">
                                    Desa lobener
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="bg-secondary">
                    <h6 class="modal-title">Data Kendaraan</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Tipe</th>
                                        <th scope="col">Nomor Kendaraan</th>
                                    </tr>
                                </thead>
                                <tbody id="t-body">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
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

<!--moment JS -->
<script src="{{ asset('virtual/assets/plugins/moment/moment.js') }}"></script>

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
            ajax: "{{ route('park.datatable') }}",
            columnDefs: [
                {
                    targets: 0,
                    render: function(data, type, full, meta) {
                        return (meta.row + 1);
                    }
                }, 
                {
                    targets: 2,
                    render: function(data, type, full, meta) {
                        if(data != null ){
                            return moment(data).format('H:mm:ss');
                        }else{
                            return '-';
                        }
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, full, meta) {
                        if(data != null ){
                            return moment(data).format('H:mm:ss');
                        }else{
                            return '-';
                        }
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, full, meta) {
                        let owner = '';
                        data.map(function(item){
                            owner += `<span class="badge bg-primary me-1" href="javascript:void(0);">${item.user.user_profile.name}</span>`;
                        })
                        return owner;
                    }
                },
                {
                    targets: -1,
                    className: 'text-center',
                    render: function(data, type, full, meta) {
                        let id = '';
                        data.map(function(item){
                            id += `
                                <div class="btn-list">
                                    <a href="javascript:void(0)" onclick="detail('${item.user.id}')" class="btn btn-sm btn-info modal-effect px-4 btn-edit" data-bs-effect="effect-super-scaled"><span class="fe fe-eye"> </span></a>
                                </div>
                                `;
                        })
                        return id;
                    },
                }, 
            ],
            columns: [
                { data: null },
                { data: 'date'},
                { data: 'time_in'},
                { data: 'time_out'}, 
                { data: 'vehycles' }, 
                { data: 'vehycles' }, 
            ]
        });

    });

    function detail(id){

        console.log(id);
        var url = "{{ route('park.show',":id") }}";
        url = url.replace(':id', id);
        
        $.get(url, function (response) {

            response = response.data;

            console.log(response.user_profile.image);
            
            $('#foto_user').html(`<img src="{{ asset('${response.user_profile.image}') }}" width="150px" height="200px" style="border-radius: 5px;" alt="">`);
            $('#name').text(response.user_profile.name);
            $('#nip_nim').text(response.user_profile.nip_nim);
            $('#gender').text(response.user_profile.gender);
            $('#card_id').text(response.user_profile.card_id == null? '-' : response.user_profile.card_id);
            $('#address').text(response.user_profile.address);
            $('#no_hp').text(response.user_profile.phone_number);

            response.vehycles.map(function(item){
                $('#t-body').html(`
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="{{ asset('${item.image}') }}" width="150">
                        </td>
                        <td>${item.brand}</td>
                        <td>${item.type}</td>
                        <td>${item.vehycle_number}</td>
                    </tr>
                `);
            })

            $('#modal_detail').modal('show');

        });

    }
    
</script>
@endsection