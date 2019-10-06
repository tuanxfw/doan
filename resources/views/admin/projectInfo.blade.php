@extends("admin.admindb")
@section("content")
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Projects Information</li>
</ol>
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Projects Information</div>
  <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-responsive-lg" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Owner</th>
            <th>Subject</th>
            <th>Species</th>
            <th>Language</th>
            <th>Availability</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tbody-pi"></tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted updateDT">Updated yesterday at 11:59 PM</div>
</div>
<script>
  $(function(){
    var dt = new Date();
    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    var month = dt.getMonth()+1;
    var day = dt.getDate();
    var date = ((''+day).length<2 ? '0' : '') + day + '/' + ((''+month).length<2 ? '0' : '') + month + '/' + dt.getFullYear();
    $(".updateDT").text("Updated at " + time + " on "+ date);
    $.get("{!! route('admin.tp') !!}", function(data){
      $("#tbody-pi").append(
        $.map(data, function(v,i){
          return $("<tr>").append(
            $("<td>", { text: i+1 }),
            $("<td>", { text: v.title }),
            $("<td>", { text: v.user_id }),
            $("<td>", { text: v.subject }),
            $("<td>", { text: v.species }),
            $("<td>", { text: v.language }),
            $("<td>", { text: v.availability }),
            $("<td>").append(
              $("<button>", { class: "btn btn-danger", text: "Delete"}),
            ),
          );
        }),
      );
      $("#dataTable").DataTable();
    });
  });
</script>
@endsection