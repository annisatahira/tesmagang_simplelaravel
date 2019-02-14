@extends('base')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Anak IT -  Tambah Data</h1>
            <hr>
            <form action="{{ route('tes.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="_from ">From:</label>
                    <input type="txt" class="form-control" id="_from" name="_from">
                </div>
                <div class="form-group">
                    <label for="_to">To</label>
                    <input type="text" class="form-control" id="_to" name="_to">
                </div>
                <div class="form-group">
                    <label for="_amount">Amount:</label>
                    <input type="txt" class="form-control" id="_amount" name="_amount">
                </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection