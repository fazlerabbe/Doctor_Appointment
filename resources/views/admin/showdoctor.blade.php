<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <div align="center" style="padding-left:40px;">
                <table>
                    <tr>
                        <th style="padding:10px; font-size:20px">Doctor Name</th>
                        <th style="padding:10px; font-size:20px">Phone</th>
                        <th style="padding:10px; font-size:20px">speciality</th>
                        <th style="padding:10px; font-size:20px">Room Number</th>
                        <th style="padding:10px; font-size:20px">Image</th>

                        <th style="padding:10px; font-size:20px">Delete</th>
                        <th style="padding:10px; font-size:20px">Update</th>

                    </tr>
                    @foreach($data as $doctor)

                    <tr align="center">
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->number}}</td>
                        <td>{{$doctor->speciality}}</td>
                        <td>{{$doctor->room}}</td>
                        <td><img hight="100" width="100" src="doctorimage/{{$doctor->image}}" alt=""></td>

                        <td><a class="btn btn-danger" onclick="return confirm('are you sure to delete this')"
                                href="{{url('deletedoctor',$doctor->id)}}">Delete</a></td>

                        <td><a class="btn btn-primary" href="{{url('updatedoctor',$doctor->id)}}">Update</a></td>




                    </tr>
                    @endforeach


            </div>

        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
</body>

</html>