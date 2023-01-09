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
                <div>
                    <a href="{{route('data.create')}}" class="btn btn-primary mb-3"> Add Data</a>
                    <a href="{{route('data_export')}}" class="btn btn-primary mb-3"> Export Data</a>
                    <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"> Import
                        Data</a>
                </div>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <small><thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Task 1</th>
                            <th>Midterm</th>
                            <th>Task 2</th>
                            <th>Quiz</th>
                            <th>Final</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </small>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Task 1</th>
                            <th>Midterm</th>
                            <th>Task 2</th>
                            <th>Quiz</th>
                            <th>Final</th>
                            <th>Total</th>
                            <th>Action</th>
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
                            <td>{{$item->total}}</td>
                            <td>
                                <div class="d-inline-flex">
                               
                                <a href="{{route('data.edit', $item->id)}}" class="btn btn-success btn-sm mr-2">Edit</a>
                                <form name="delete" action="{{route('data.destroy', $item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" name='delete'>Delete</button>
                                </form>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="card-body">
            <div class="table-responsive">


                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <small><thead>
                        <tr>
                            <th>Minimal</th>
                            <th>Maximal</th>
                            <th>Mean</th>
                            <th>Count</th>
                            
                        </tr>
                    </thead>
                </small>
                   
                    <tbody>
                        {{-- @foreach($data2 as $item) --}}
                        <tr>
                            <td>{{$min}}</td>
                            <td>{{$max}}</td>
                            <td>{{$avg}}</td>
                            <td>{{$count}}</td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
    </div>
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
