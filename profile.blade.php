<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }

    </style>

</head>

<body>

    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>Read Users </h1>
            <br>

            {{ session()->get('Message') }}
            <br>
      
            <a href='{{url('/task/' .$row->id)}}' class='btn btn-primary m-r-1em'>Add Task</a>
       
      {{ 'Welcome , '.auth('admin')->user()->name }}  <a href="{{ url('/logOut') }}">LogOut</a>

        </div>
        <!-- PHP code to read records will be here -->
        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Image</th>
                <th>action</th>

            </tr>

          @foreach ($raw as $row)

                <tr>

                    <td>{{ $row->id }}</td>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->description }}</td>
                    <td>{{ $row->startdate }}</td>
                    <td>{{ $row->enddate }}</td>
                    <td>{{ $row->image }}</td>

                    <td>
                        <a data-toggle="modal" data-target="#modal_single_del{{ $row->id }}"
                            class='btn btn-danger m-r-1em'>Delete</a>
                        <a href='{{ url('/admin/' . $row->id . '/edit') }}' class='btn btn-primary m-r-1em'>Edit</a>
                    </td>

                </tr>
              

                <div class="modal" id="modal_single_del{{ $row->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">delete confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                Delete {{ $row->name }} !!!!
                            </div>
                            <div class="modal-footer">
                                <form action="{{ url('Admins/' . $row->id) }}" method="post">

                                    @method('delete') {{-- <input type="hidden" value="delete" name="_method"> --}}
                                    @csrf {{-- <input type="hidden" value="{{ csrf_tokken() }}" name="_token"> --}}

                                    <div class="not-empty-record">
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
          
            @endforeach

            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- confirm delete record will be here -->

</body>

</html>
