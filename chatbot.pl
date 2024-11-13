% Definición de conocimientos básicos
enfermedad('dolor de cabeza', 'El dolor de cabeza puede ser causado por estrés, tensión o migrañas. Si persiste, consulte a un médico.').
enfermedad('fiebre', 'La fiebre puede ser un signo de infección. Mantente hidratado y descansa. Si la fiebre es alta o persistente, busca atención médica.').
enfermedad('nauseas', 'Las náuseas pueden ser causadas por diversos factores, como indigestión, mareos o infecciones. Consulta a un médico si persisten o son severas.').
enfermedad('tos', 'La tos puede ser causada por resfriados, alergias o infecciones respiratorias. Bebe líquidos y descansa. Si la tos persiste, consulta a un médico.').
enfermedad('dolor muscular', 'El dolor muscular puede ser causado por ejercicio excesivo, tensión o lesiones. Descansa y aplica calor en la zona afectada. Si el dolor persiste, busca atención médica.').
enfermedad('ronchas','Felicidades tienes la viruela del Mono :)').

% Respuesta de bienvenida
responder('hola', '¡Hola! Bienvenido al asistente de enfermería. ¿En qué puedo ayudarte hoy?').

% Regla para responder a una pregunta sobre enfermedades
responder(Enfermedad, Respuesta) :-
    enfermedad(Enfermedad, Respuesta).

% Mensaje predeterminado
responder(_, 'Lo siento, no tengo información sobre eso.').
