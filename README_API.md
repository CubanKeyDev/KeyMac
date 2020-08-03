# Tutorial API-REST
Tutorial para la Creación de una API que se integre con el KeyMac - Steam Anticheat:

1.	Una vez Activada la Opción "Forzar API" en el Panel del Servidor agregamos el "API Url".
	Esta URL es donde se enviará todo el tráfico del KeyMac. Todas las peticiones serán POST.

2.	Revisamos la configuración del servidor "KeyMac_Server.ini" y encontraremos un parámetro
	llamado "apiHash" el cual siempre se envía al API para evitar manipulaciones externas.
	Se enviará siempre a la URL como "security_hash" vía POST.

3. Para identificar la operación del AntiCheat se enviará un parámetro "action" el cual será
	la tarea a realizar ("register", "login", "is_ban", "ban", "unban", "games", "nickname")
	Existen estas que son opcionales pero importantes ("addWhitelist", "removeWhitelist")
	
	Estas últimas son para mejorar la seguridad de tu sistema, ya que si varias personas
	tienen un solo IP por la infraestructura de red, el Firewall agregará solo un IP, entonces
	con un solo cliente abierto pueden acceder libremente los demás, puedes controlarlo con un
	Whitelist propio en tu servidor dado esta API. Recomiendo usar algún plugins para Whitelist.

4.	Las respuestas del API siempre deben ser json y en esta estructura:
	{
		status : boolean
		message: text | json
	}

5. A continuación los Parámetros a cada Action y que debe devolver:
	
        Action: login
        Parámetros: username, password, ip, mac
        Respuesta JSON {
            status -> Si se pudo autenticar el usuario
            message -> OK | Mensaje de Error
        }
        
        Action: register
        Parámetros: username, password, ip, mac
        Respuesta JSON {
            status -> Si se puede registrar o no (Si tienes un sistema de registro vía web poner por defecto en false)
            message -> Steam_id del usuario registrado (Obtener de la tabla "CMServer"."player" de Steam) | Mensaje de Error (¡Registro no permitido!)
        }
        
        Action: ban
        Parámetros: username, ip|mac, reason
        Respuesta JSON {
            status -> Si se pudo banear al usuario
            message -> OK | Error de ban (Usuario no existe)
        }
        
        Action: unban
        Parámetros: username, ip|mac
        Respuesta JSON {
            status -> Si se pudo desbanear al usuario
            message -> OK | Error de Desbaneando (Usuario no esta baneado | Usuario no existe)
        }
        
        Action: is_ban
        Parámetros: username, ip|mac
        Respuesta JSON {
            status -> Si esta baneado el Usuario o no
            message -> OK | Razón del ban
        }
        
        Action: nickname
        Parámetros: username
        Respuesta JSON {
            status -> Si pudo realizar la operación (Si no se pudo, automáticamente, el AntiCheat utiliza el username como nickname)
            message -> Nick del Usuario (Obtener de la tabla "CMServer"."player" de Steam)
        }
        
        Action: games
        Respuesta JSON {
            status -> Si hay lista de servidores o no (Obtener de la tabla "CMServer"."player" de Steam)
            message -> Lista JSON de los Servidores [{
                string : server -> Nombre del Servidor (Ej: Agario SNET)
                string : name -> Nombre del Juego (Ej: Agario)
                string : url -> Url del Servidor (Ej: url Agario, url xnova, pag estadisticas, etc ...)
                int : max_players -> Max cantidad de jugadores
                int : players -> Jugadores Online
            }]
        }
        
        [OPTIONAL]
        
        Action: addWhitelist
        Parámetros: username, ip, mac
        Respuesta JSON {
            status -> Si pudo realizar la operación
            message -> OK | Mensaje de error
        }
        
        Action: removeWhitelist
        Parámetros: username, ip, mac
        Respuesta JSON {
            status -> Si pudo realizar la operación
            message -> OK | Mensaje de error
        }

6.	Ya con esto puedes integrar el AntiCheat con tu sistema si tienes el Steam por MySQL u otro
	gestor de base de datos. Dejaré un ejemplo en PHP para guiarte en la creación de tu API.
	Es la base, pero te será suficiente para entender cómo hacerlo. 
	Les recomiendo no tener errores en el código del API porque va a funcionar mal el anticheat.
	Mostrará el error => message: "Error de Conexión", status : false. Si ven en el cliente este
	error es porque fallo la conexión, error de código o no devuelve el JSON correspondiente.
	Utilice alguna herramienta de Peticiones como el Postman para testear a fondo su API.

7.	Se feliz y juega limpio ;)
