<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistente Virtual de Salud</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .chat-container {
            width: 360px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            border: 1px solid #dee2e6;
        }

        .chat-header {
            background-color: #007bff;
            color: #ffffff;
            padding: 15px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            border-bottom: 1px solid #dee2e6;
        }

        .chat-box {
            height: 350px;
            padding: 15px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 8px;
            background-color: #f8f9fa;
        }

        .user-message {
            background-color: #d1ecf1;
            text-align: right;
        }

        .bot-message {
            background-color: #d4edda;
            text-align: left;
        }

        .input-box {
            display: flex;
            padding: 10px;
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
        }

        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            margin-left: 10px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            Asistente Virtual de Salud
        </div>
        <div class="chat-box" id="chat-box">
            <!-- Aquí aparecerán las respuestas -->
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $message = $_POST['message'];

                // Sanitizar el input para evitar inyección de comandos
                $safe_message = str_replace("'", "\\'", $message); // Escapamos comillas simples

                // Construir el comando con las comillas adecuadas
                $command = '"C:\\Program Files\\swipl\\bin\\swipl.exe" -s "C:\\Apache24\\htdocs\\Chatbot\\chatbot.pl" -g "responder(\'' . $safe_message . '\', Response), write(Response), halt." 2>&1';
                $response = shell_exec($command);

                // Mostrar la respuesta del chatbot si no está vacía
                if ($response) {
                    echo "<div class='message user-message'>Usuario: " . htmlspecialchars($message) . "</div>";
                    echo "<div class='message bot-message'>Chatbot: " . htmlspecialchars($response) . "</div>";
                } else {
                    echo "<div class='message bot-message'>Chatbot: No se recibió ninguna respuesta de Prolog.</div>";
                }
            }
            ?>
        </div>
        <div class="input-box">
            <form method="POST">
                <input type="text" name="message" id="user-input" placeholder="Escribe tu pregunta...">
                <button type="submit"><i class="fas fa-paper-plane"></i> Enviar</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
