
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Puebla - Juntas Auxiliares</title>
    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color:rgba(228, 221, 221, 0.87); /* color fondo */
        }

        /* Encabezado con escudo */
        .encabezado {
            display: flex;
            align-items: center;
            background-color:rgb(4, 128, 0); /* color arriba */
            padding: 10px 30px;
            color: white;
        }

        .encabezado img {
            width: 50px;
            margin-right: 15px;
        }

        .encabezado h1 {
            margin: 0;
            font-size: 24px;
        }

        /* Contenedor central */
        .container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .container h2 {
            text-align: center;
            color: #333;
        }

        /* Buscador */
        .search-box {
            margin-top: 30px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 2px solidrgb(128, 0, 85);
            border-radius: 5px;
            outline: none;
        }

        .suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background-color: white;
            border: 1px solid #ccc;
            border-top: none;
            max-height: 200px;
            overflow-y: auto;
            z-index: 999;
        }

        .suggestions div {
            padding: 10px;
            cursor: pointer;
        }

        .suggestions div:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

<!-- Encabezado institucional -->
<div class="encabezado">
    <img src="escudo_puebla.png" alt="Escudo de Puebla">
    <h1>Puebla - Juntas Auxiliares</h1>
</div>

<!-- Contenido principal -->
<div class="container">
    <h2>Consulta tu Junta Auxiliar</h2>

    <div class="search-box">
        <input type="text" id="buscador" placeholder="Escribe el nombre de tu junta auxiliar...">
        <div id="sugerencias" class="suggestions"></div>
    </div>
</div>

<!-- Script de autocompletado -->
<script>
    const juntas = [
        "San Baltazar Campeche",
        "San Felipe Hueyotlipan",
        "San Francisco Totimehuacan",
        "San Jerónimo Caleras",
        "San Miguel Canoa",
        "San Pablo Xochimehuacan",
        "Santa María Xonacatepec",
        "La Resurrección",
        "San Sebastián de Aparicio",
        "Santo Tomás Chautla"
    ];

    const input = document.getElementById("buscador");
    const sugerencias = document.getElementById("sugerencias");

    input.addEventListener("input", () => {
        const valor = input.value.toLowerCase();
        sugerencias.innerHTML = "";

        if (valor.length === 0) return;

        const filtradas = juntas.filter(junta =>
            junta.toLowerCase().startsWith(valor)
        );

        filtradas.forEach(junta => {
            const div = document.createElement("div");
            div.textContent = junta;
            div.addEventListener("click", () => {
                input.value = junta;
                sugerencias.innerHTML = "";
            });
            sugerencias.appendChild(div);
        });
    });

    // Ocultar sugerencias si se hace clic fuera
    document.addEventListener("click", e => {
        if (!e.target.closest(".search-box")) {
            sugerencias.innerHTML = "";
        }
    });
</script>

</body>
</html>
