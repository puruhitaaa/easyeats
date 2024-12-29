<!DOCTYPE html>
<html>
<head>
    <title>Restaurants List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Restaurants List</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($restaurants as $restaurant)
                <tr>
                    <td>{{ $restaurant->name }}</td>
                    <td>{{ $restaurant->address }}</td>
                    <td>{{ $restaurant->phone }}</td>
                    <td>{{ $restaurant->email }}</td>
                    <td>{{ $restaurant->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
