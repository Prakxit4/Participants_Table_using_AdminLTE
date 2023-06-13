@extends('adminlte')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Participant</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Participant</li>
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
                            <form action="{{ route('participants.update', $participant->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $participant->name) }}">
                                </div>

                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob', $participant->dob) }}">
                                </div>

                                <div class="form-group">
                                    <label for="tenth_offering">Tenth Offering</label>
                                    <input type="text" name="tenth_offering" id="tenth_offering" class="form-control" value="{{ old('tenth_offering', $participant->tenth_offering) }}">
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control-file">
                                    @if ($participant->image)
                                        <img src="{{ asset('uploads/' . $participant->image) }}" alt="Participant Image" class="img-thumbnail mt-2" width="200">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="document_type_id">Document Type</label>
                                    <select name="document_type_id" id="document_type_id" class="form-control">
                                        @foreach ($documentTypes as $documentType)
                                            <option value="{{ $documentType->id }}" {{ old('document_type_id', $participant->document_type_id) == $documentType->id ? 'selected' : '' }}>
                                                {{ $documentType->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="document_file">Document File</label>
                                    <input type="file" name="document_file" id="document_file" class="form-control-file">
                                    @if ($participant->document_file)
                                        <a href="{{ asset('uploads/' . $participant->document_file) }}" target="_blank">View Document</a>
                                    @endif
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Update Participant</button>
                                    <a href="{{ route('participants.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
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
