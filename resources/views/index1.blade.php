<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
    <!-- Include SweetAlert2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 3px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .pagination {
            margin-top: 10px;
        }

        .pagination li a, .pagination li span {
            font-size: 14px;
            padding: 6px 12px;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        a:hover {
            color: #FF0000;
        }
    </style>
</head>
<body class="container-fluid">
    @csrf
    <h3>Users</h3>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="mb-2">
        <a href="{{ route('newuser') }}" class="btn btn-primary btn-sm" style="float: right;">
            Add User
        </a>
    </div>
    <table id="myTable" class="table table-bordered">
        <thead class="font-weight-bold">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($users as $user)
                @if($user->name === 'admin')
                    @continue
                @else
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td><a href="{{ url('profile/' . $user->id) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td><a href="{{ url('edit/' . $user->id) }}"><i class="fa fa-edit"></i></a></td>            
                        <td><a href="{{ url('delete', $user->id) }}" class="delete-user" data-id="{{ $user->id }}" data-username="{{ $user->name }}"><i class="fa fa-trash"></i></a></td>
                        <td><a href="{{ url('sendemail/'. $user->id) }}"><i class="fa fa-mail-bulk"></i></a></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <script>
        // Ensure that the DOM is fully loaded before running the code
        $(document).ready(function() {
            // Initialize the DataTable
            $('#myTable').DataTable();

            // Handle delete action with SweetAlert
            $('.delete-user').on('click', function (e) {
                e.preventDefault();
                const userId = $(this).data('id');
                const deleteUrl = $(this).attr('href');
                const username = $(this).data('username');
                
                Swal.fire({
                    title: 'Are you sure to remove ' + username + '?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {                        
                        
                    }
                });
            });
        });
    </script>
</body>
</html>
