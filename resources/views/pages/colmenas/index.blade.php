<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colmenast</title>
</head>
<body>
    <head>
        <h1>Lista de colmenas</h1>
    </head>
    <main>
        <table>
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Nombre
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($colmenas as $colmena )
                    <tr>
                        <td>
                            {{ $colmena->id }}
                        </td>
                        <td>
                            {{ $colmena->nombre }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            No hay colmenas
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
</body>
</html>