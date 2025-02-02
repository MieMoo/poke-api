<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pokemon['name'] ?? 'Pokémon Search' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        .search-container {
            margin-bottom: 20px;
        }
        .pokemon-card {
            display: inline-block;
            padding: 20px;
            border: 2px solid #333;
            border-radius: 10px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
        }
        img {
            width: 150px;
            height: 150px;
        }
    </style>
</head>
<body>

    <!-- Search Form -->
    <div class="search-container">
        <form action="{{ url('/pokemon') }}" method="GET">
            <input type="text" name="name" placeholder="Enter Pokémon name..." required>
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Pokémon Display -->
    @if(isset($pokemon))
        <div class="pokemon-card">
            <h1>{{ $pokemon['name'] }}</h1>
            <img src="{{ $pokemon['sprite'] }}" alt="{{ $pokemon['name'] }}">
            <p><strong>Type(s):</strong> {{ implode(', ', $pokemon['types']) }}</p>
        </div>
    @endif

</body>
</html>
