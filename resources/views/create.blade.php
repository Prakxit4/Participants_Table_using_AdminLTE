@extends('adminlte')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Participant</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Participant</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('participants.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                </div>

                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob') }}">
                                </div>

                                <div class="form-group">
                                    <label for="tenth_offering">Tenth Offering</label>
                                    <input type="text" name="tenth_offering" id="tenth_offering" class="form-control" value="{{ old('tenth_offering') }}">
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control-file">
                                </div>

                                <div class="form-group">
                                    <label for="document_type_id">Document Type</label>
                                    <select name="document_type_id" id="document_type_id" class="form-control">
                                        <option value="">Select Document Type</option>
                                        <option value="1" {{ old('document_type_id') == '1' ? 'selected' : '' }}>GML</option>
                                        <option value="2" {{ old('document_type_id') == '2' ? 'selected' : '' }}>SGML</option>
                                        <option value="3" {{ old('document_type_id') == '3' ? 'selected' : '' }}>XML</option>
                                        <option value="4" {{ old('document_type_id') == '4' ? 'selected' : '' }}>HTML</option>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="document_file">Document File</label>
                                    <input type="file" name="document_file" id="document_file" class="form-control-file">
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Create Participant</button>
                                    <a href="{{ route('participants.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
