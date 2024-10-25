@extends('layouts/layoutMaster')
@section('title', 'TIMESHEET MANAGEMENT')
@section('vendor-style')
@vite('resources/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.scss')
@endsection

@section('page-style')
  @vite('resources/assets/vendor/scss/pages/app-chat.scss')
@endsection

@section('vendor-script')
@vite('resources/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js')
@endsection
@section('page-script')
@vite('resources/assets/js/app-chat.js')
@endsection
@section('content')
  <div class="">
    <div class="card">
      <div class="card-datatable table-responsive">
        <table class="datatables-projects table border-top">
          <thead>
            <tr>
           <th>Employee Id</th>
              <th>Total Hours Worked</th>
              <th>Overtime Hours</th>
              <th>Comments</th>
            </tr>
          </thead>
 <tbody>
        @foreach($timesheet as $claim)
        <tr class="contents">
          <td>{{$claim->employee_id}}</td>
           
         <td>          <?php 
           $host="localhost"; // Host name 
           $username="root"; // Mysql username 
           $password=""; // Mysql password 
           $db_name="database_01"; // Database name 
           $tbl_name="information"; // Table name 
           $conn = mysqli_connect("$host","$username","$password")or die("cannot connect"); 
           mysqli_select_db($conn,"$db_name")or die("cannot select DB");
             $update=" SELECT *,SUM(total_hrs) as  total,sum(over_time) as  overtime FROM `hr3_attendance`  WHERE date_time_in BETWEEN '2024-1-23' AND '2024-30-23' and attendance_id='$claim->attendance_id'";
               $query=mysqli_query($conn,$update);
               $row=mysqli_fetch_assoc($query);
               echo $row['total'];
          ?>hrs
        </td>

        <td><?php echo $row['overtime']?>hrs</td>
</tr>
@endforeach
</tbody>

        </table>
      </div>
    </div>
  </div>

@endsection
