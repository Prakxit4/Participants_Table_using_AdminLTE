
@extends('adminlte')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Participants List</h3>
                            <div class="card-tools">
                                <a href="{{ route('participants.create') }}" class="btn btn-primary">Add Participant</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Date of Birth</th>
                                        <th>Tenth Offering</th>
                                        <th>Image</th>
                                        <th>Document Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participants as $participant)
                                        <tr>
                                            <td>{{ $participant->id }}</td>
                                            <td>{{ $participant->name }}</td>
                                            <td>{{ $participant->dob }}</td>
                                            <td>{{ $participant->terth_offering }}</td>
                                            <td>
                                                @if ($participant->image)
                                                    <img src="{{ asset('uploads/' . $participant->image) }}" alt="Participant Image" class="img-thumbnail" width="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $participant->documentType->name }}</td>
                                            <td>
                                                <a href="{{ route('participants.show', $participant->id) }}" class="btn btn-info">View</a>
                                                <a href="{{ route('participants.edit', $participant->id) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('participants.destroy', $participant->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this participant?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
