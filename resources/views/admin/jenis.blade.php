@extends('admin.admin_assets')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manage Jenis Table</h1>
    <div class="card mt-4 mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Table Example
        </div>
        <div class="card-body">
            <div class="pull-right mb-3">
                <a class="btn btn-success" href="{{ route('jenis.create') }}">Create New Jenis</a>
            </div>

            <table class="table table-bordered" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Jenis</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenis as $jns)
                        <tr>
                            <td>{{ $jns->id }}</td>
                            <td>{{ $jns->nama_jenis }}</td>
                            <td>
                                <a class="btn btn-primary" href="sessionedit/{{ $jns->id }}">Edit</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delmodal-{{ $jns->id }}">Delete</button>
                            </td>
                        </tr>

                        {{-- Modal for Delete Confirmation --}}
                        <div class="modal fade" id="delmodal-{{ $jns->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="del">Data Will be Permanently Deleted</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('jenis.destroy', $jns->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection