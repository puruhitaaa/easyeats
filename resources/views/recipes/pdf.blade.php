<!DOCTYPE html>
<html>
<head>
    <title>Recipes List</title>
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
    <h1>Recipes List</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Cooking time</th>
                <th>Servings</th>
                <th>Ingredients</th>
                <th>Instructions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->name }}</td>
                    <td>{{ $recipe->cooking_time }}</td>
                    <td>{{ $recipe->servings }}</td>
                    <td>
                        <ul>
                            @foreach($recipe->recipe_ingredients as $recipe_ingredient)
                                <li>{{ $recipe_ingredient->ingredient->name . " " . $recipe_ingredient->quantity . " " . $recipe_ingredient->ingredient->unit }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $recipe->instructions }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
