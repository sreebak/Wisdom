@extends('admin.dashboard')
@section('pagetitle')
Question Paper Users List
@endsection
@section('pagebc')

@cannot('create-data') 
<li class="breadcrumb-item"><a href="{{ route('admin.questionPapersUsers') }}">Manage Question Papers</a></li>
<li class="breadcrumb-item active">Question Papers Users List</li>
@endcannot

@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                
                                                <th style="width:5%">#</th>
                                                <th>Question Paper</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Message</th>
                                                
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @foreach($questionpapers_users as $qpusers)
                                            <tr id="tr_{{ $qpusers->id }}" class="@if($qpusers->status == 0)  deactive @endif">
                                                
                                                
                                                <td class="align-middle">{{ $qpusers->id }}</td>
                                                <td class="align-middle">{{ $qpusers->questionpapers->title }}</td>
                                                <td class="align-middle">{{ $qpusers->qd_name }}</td>
                                                <td class="align-middle">{{ $qpusers->qd_email }}</td>
                                                <td class="align-middle">{{ $qpusers->qd_phone }}</td>
                                                <td class="align-middle">{{ $qpusers->message }}</td>
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
<div class="alert alert-success" role="alert" >
    {{ session('Success') }}
</div>
@endif
@if(session('Error'))
<div class="alert alert-danger" role="alert" >
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
            }).then(function(t) {
                if(t.value) {
                    document.getElementById("delete-form-" + id).submit(); 
                }
            })
    }

    function disableRecord(id,chkbox) {
        var status = 1;
        var _token = "{{ csrf_token() }}";

        if($(chkbox).is(":checked")){
            status = 1;
        }
        else if($(chkbox).is(":not(:checked)")){
            status = 0;
        }

        $.ajax({
            url:"{{ route('admin.galcatg_status_change') }}",
            method: "POST",
            data: {id:id, status:status , _token:_token},
            success: function (result) {
                if(result=="Success") {
                    if(status ==1) {
                        $("#tr_"+id).removeClass("deactive");
                    }
                    else {
                        $("#tr_"+id).addClass("deactive");
                    }
                }
            },
            error: function (ts) {

            }
        });
    }
    
</script>

@endsection