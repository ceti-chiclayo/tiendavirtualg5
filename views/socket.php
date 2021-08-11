<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion socket</title>
</head>
<h1>Prueba de socket</h1>
<script>
    // crear una conexion
    var conn = new WebSocket('ws://localhost:8080/private/id');
    conn.onopen = function(e) {
        console.log("Connection established!");
    };

    conn.onmessage = function(e) {
        console.log(e.data);
        if(data === 'ERROR'){
            alert('sucedio error')
        }
    };
</script>

<body>

</body>

</html>