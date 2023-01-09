@extends('template.layout')
@section('link')
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- <link href="../css/sb-admin-2.min.css" rel="stylesheet"> -->

@endsection
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{route('data.store')}}" method="post">
                @csrf
                    <div class="mb-3">
                        <label for="id" class="form-label">Student ID</label>
                        <input type="number" class="form-control" name="id" id="id">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Name</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="tugas1" class="form-label">Task 1</label>
                        <input type="number" class="form-control" name="tugas1" id="tugas1">
                    </div>
                    <div class="mb-3">
                        <label for="uts" class="form-label">Midterm Exam</label>
                        <input type="number" class="form-control" name="uts" id="uts">
                    </div>
                    <div class="mb-3">
                        <label for="tugas2" class="form-label">Task 2</label>
                        <input type="number" class="form-control" name="tugas2" id="tugas2">
                    </div>
                    <div class="mb-3">
                        <label for="kuis" class="form-label">Quiz</label>
                        <input type="number" class="form-control" name="kuis" id="kuis">
                    </div>
                    <div class="mb-3">
                        <label for="uas" class="form-label">Final Exam</label>
                        <input type="number" class="form-control" name="uas" id="uas">
                    </div>
                 
                    <a href="{{route('data.index')}}" class="btn btn-primary">Back</a>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

</div>
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
