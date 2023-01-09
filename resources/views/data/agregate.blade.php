@extends('template.layout')
@section('link')
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Statistic 3rd Semester</h1>
    <p>Class    : IKI</p>
    <p>Lecturer : Komang Setemen</p>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Student Data</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <small><thead>
                        <tr>
                            <th>Total Data</th>
                            <th>Min Score</th>
                            <th>Max Score</th>
                            <th>Average</th>
                            
                        </tr>
                    </thead>
                </small>
                    <tfoot>
                        <tr>
                            <th>Total Data</th>
                            <th>Minimum</th>
                            <th>Maximum</th>
                            <th>Mean</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->tugas1}}</td>
                            <td>{{$item->uts}}</td>
                            <td>{{$item->tugas2}}</td>
                            <td>{{$item->kuis}}</td>
                            <td>{{$item->uas}}</td>
                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <!-- Button trigger modal -->
    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('data_import_excel')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="file" name="file" required="required">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    {{-- modal --}}
    <!-- Modal -->

    {{-- end modal --}}
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection

@section('footer-link')
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

@endsection
