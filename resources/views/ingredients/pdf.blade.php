<!DOCTYPE html>
<html>
<head>
    <title>Ingredients List</title>
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
    <h1>Ingredients List</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Unit</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->name }}</td>
                    <td>{{ $ingredient->unit }}</td>
                    <td>{{ $ingredient->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
