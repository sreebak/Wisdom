@extends('admin.dashboard')
@section('pagetitle')
Tutor List
@endsection
@section('pagebc')
@can('create-data')
<a href="{{ route('admin.tutors.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
@endcan
@cannot('create-data')
<li class="breadcrumb-item"><a href="{{ route('admin.tutors.index') }}">Manage tutor</a></li>
<li class="breadcrumb-item active">Tutor List</li>
@endcannot

@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable"
                        class="table table-bordered dt-responsive nowrap table-striped dataTable no-footer dtr-inline"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                @can('edit-data')
                                <th style="width:5%"></th>
                                @endcan
                                @can('delete-data')
                                <th style="width:5%"></th>
                                <th style="width:5%"></th>
                                @endcan
                                <th style="width:5%">#</th>
                                <th>Name</th>
                                <th>About</th>
                                <th>image</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach($tutors as $tutor)
                            <tr id="tr_{{ $tutor->id }}" class="@if($tutor->status == 0)  deactive @endif">
                                @can('edit-data')
                                <td class="align-middle">
                                    <a href="{{ route('admin.tutors.edit',$tutor->id) }}" data-toggle="tooltip"
                                        data-placement="top" title="Edit"><i class="bx bx-edit font-size-18"></i></a>
                                </td>
                                @endcan
                                @can('delete-data')
                                <td class="align-middle">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Remove" onclick="event.preventDefault();
                                                     deleteRecord({{ $tutor->id }});"><i
                                            class="bx bx-trash-alt font-size-18"></i></a>
                                    <form id="delete-form-{{ $tutor->id }}"
                                        action="{{ route('admin.tutors.destroy',$tutor->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        {{ method_field('DELETE')}}
                                    </form>
                                </td>
                                <td class="align-middle">
                                    <div class="custom-control custom-switch mb-2" dir="ltr">
                                        <input type="checkbox" class="custom-control-input" id="recdis_{{ $tutor->id }}"
                                            @if($tutor->status == 1) checked @endif value="1"
                                        onclick="disableRecord({{ $tutor->id }},this);">
                                        <label class="custom-control-label" for="recdis_{{ $tutor->id }}"></label>
                                    </div>
                                </td>
                                @endcan
                                <td class="align-middle">{{ $tutor->id }}</td>
                                <td class="align-middle">{{  $tutor->name }}</td>
                                <td class="align-middle">{!! $tutor->about !!}</td>
                                <td class="align-middle">
                                    @if($tutor->image1)
                                    <a href="{{ url('../storage/tutors/'.$tutor->image1) }}" target="_blank"><img src="{{ url('../storage/tutors/'.$tutor->image1) }}" class="img-thumbnail" style="width: 50px;"></a>
                                    @endif
                                </td>
                                {{-- <td class="align-middle text-center">{{ $tutor->disp_order }}</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('Success'))
<div class="alert alert-success" role="alert">
    {{ session('Success') }}
</div>
@endif
@if(session('Error'))
<div class="alert alert-error" role="alert">
    {{ session('Error') }}
</div>
@endif

@endsection

@section("footerscript")

<script>
    function deleteRecord(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: "Yes, delete it!"
        }).then(function (t) {
            if (t.value) {
                document.getElementById("delete-form-" + id).submit();
            }
        })
    }

    function disableRecord(id, chkbox) {
        var status = 1;
        var _token = "{{ csrf_token() }}";

        if ($(chkbox).is(":checked")) {
            status = 1;
        } else if ($(chkbox).is(":not(:checked)")) {
            status = 0;
        }

        $.ajax({
            url: "{{ route('admin.tutor_status_change') }}",
            method: "POST",
            data: {
                id: id,
                status: status,
                _token: _token
            },
            success: function (result) {
                if (result == "Success") {
                    if (status == 1) {
                        $("#tr_" + id).removeClass("deactive");
                    } else {
                        $("#tr_" + id).addClass("deactive");
                    }
                }
            },
            error: function (ts) {

            }
        });
    }

</script>

@endsection
