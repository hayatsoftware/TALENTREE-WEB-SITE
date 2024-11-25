@extends('ContentPanel::inc.module_main')
@push('styles')
    <style>
        table td,table th,#dtBasicExample > thead > tr > th.th-sm {
            padding: 20px !important;
        }
    </style>
@endpush
@section('content')
    @include('MPCorePanel::inc.breadcrumb')
    <div class="page-content p-0">
        @include("MPCorePanel::inc.errors")
        <div class="topPage">
            <div class="float-left">
                <div class="title m-0">Başvurular</div>
            </div>
        </div>
        <div class="p-30">
            <div class="table-field">
                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Form Adı
                        </th>
                        <th class="th-sm">İşlem
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($forms as $form)
                        <tr>
                            <td>{{$form['name']}}</td>
                            <td><a href="/mp-admin/form-results/{{$form['page_id']}}" target="_blank" class="btn btn-sm btn-success text-white">Dışarı Aktar</a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <style>
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
            bottom: .5em;
        }
    </style>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#dtBasicExample').DataTable({
                "searching": false // false to disable search (or any other option)
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>

@endpush
