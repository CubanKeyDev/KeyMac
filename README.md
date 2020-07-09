# Proyecto KeyMac - Anti-Cheat Steam para la Comunidad de SNET
Este proyecto tiene como objetivo brindar un servicio de Anticheat para
la comunidad de SNET. Ya era hora que un anticheat pueda ser escalable.
Este producto es libre de uso y comercio, por lo que pueden hacer lo que
quieran con el sin reclamaciones por parte del autor: MacKey-255.

El código estará cerrado al público para evitar hacking por partes externas.


## Instalación:
1. Creamos una carpeta con el KeyMac_Server.exe dentro.
2. Activamos el Firewall de Windows con las reglas de bloqueo activadas.
3. Abrimos el KeyMac_Server.exe y configuramos todo desde el panel del servidor.
4. El cliente lo abrimos y lo configuramos con el IP y puerto de nuestro servidor.
5. Listo! A disfrutar.


## Caracteristicas:

* Detector de Procesos y Mouses

    - Extrae información de cada proceso abierto y lo analiza:
    
        ProductName, FilePath, FileOriginalName, LastModified, FileSize, Checksum,
        WindowsTitle, FileDescription, FileVersion, CompanyName, LegalCopyright
        
    - Detecta todos los procesos que contengan alguna amenaza como:
    
        "Hack", "Aimbot", "Cheat", "Bloody", "AntiRecoil", "Wonder",
        "PacketCheat", "VAMemory", "WriteMemory",  "WriteProcessMemory",
        "Injector", "LocalPlayer", ...
        
    - Analiza todos los DLL asociados a cada Proceso abierto.
    
* Whitelist de Procesos y Mouses

    - CompanyName
    
        Contiene los nombres de las compañías que crean software,
        libres de ser analizadas o detectadas como parches.
        
    - Programs
    
        Contiene los nombres de los programas que puede o no ser
        maliciosos, muchos contienen algún código que es detectado
        como amenaza por lo cual es necesario agregarlos al whitelist.
        
    - Exe
    
        Contiene los Programas.exe que son sensibles ya que muchos
        no contienen más información que el nombre del archivo, es
        necesario excluir archivos especiales del sistema windows
        (No recomiendo utilizarlo porque pueden pasar varios Hacks).
        
    - Checksum
    
        Contiene todos los ID únicos de los archivos analizados que
        pueden ser detectados como amenazas, recomendado usar para
        agregar juegos o excepciones muy precisas de algunos usuarios.
        
    - Mouses
    
        Contiene todos los Mouses con Bloody que pueden perjudicar
        y las excepciones de algunos. Se identifican por su VID y su
        PID los cuales identifica la empresa y el producto (El Mouse).
        No significa que detectara 100% Mouses con Bloody sino que
        detectara potenciales marcas que desarrollen estos mouses y
        podemos buscar información más detallada del producto para
        saber si es un Bloody o algún Mouse que se le pueda inyectar
        Macros o algún tipo de Hacks.
        
        Recomendado buscar en: https://the-sz.com/products/usbid/
        
* Registro / Login

    Permite controlar a los usuarios, donde se autentica, de que IP
	o con que MAC. Mantiene un control exclusivo de las cuentas.
    Tienes permitido controlar el # de cuentas por IP o MAC en
    dependencia de la configuración de Anclaje de IP.
    Se validan los registros igual que lo hace el propio Steam:
    Contraseña con mínimo 8 caracteres y el usuario en minúscula.
    
* Firewall

    Para poder limitar el acceso a los servicios o juegos que están
    cubiertos por el anticheat es necesario algún tipo de bloqueo
    y que mejor que un Firewall para ello. El firewall se encarga
    de Bloquear las conexiones de los clientes y permitir a aquellos
    que estén autenticados. Así podemos obligar a los usuarios a utilizar
    el anticheat y no acceder al servicio sin el control del mismo.
    
* ScreenShot e información sensible (Modulo Chismoseo)

    El Anticheat permite recolectar Screenshot del usuario cada un
    tiempo, muy útil para la detección de Hacks que tienen una interfaz
    visual en el cliente del juego o servicio que esten utilizando.
    Aparte recolecta todos los procesos / dispositivos HID del usuario
    lo cual te permitirá detectar algún proceso sospechoso (Hacks).
    En la sección de Usuarios puedes pedir la información de ellos de
    forma totalmente discreta (El usuario nunca se dará cuenta cuando
    se le ha extraído estos datos). Eso sí, si estas revisando mucho
    las fotos de usuario, te recomiendo no hacerlo muy a menudo porque
    puedes encontrar muchas cosas personales del usuario: fotos
    comprometedoras, fotos familiares, conversaciones, videos de
    pornografía o contenido de otra índole que al final es muy privado.
    PD: He visto personas viendo nopor mientras juegan :| lamentable.
    
* Integración con Steam o API Externa

    Es posible que tu Steam o servicio de registro de usuarios este
    creado en un sistema ya previo, puedes integrarlo fácilmente
    desarrollando un API con el tutorial "README_API" el cual explica
    todo al detalle de cómo crearlo. Una vez el API este anclado
    el Anticheat no utilizara los datos del Steam (Ósea no buscara las
    bases de datos .db3 que están en la carpeta del TINServer).
    
* Baneo y Expulsión

    El Sistema posee un mini sistema de baneo que permite tener un
    limite X de veces baneado al usuario, lo cual es bueno para darle
    una oportunidad a los usuarios que se abrieron algún programa
    indebido. Al sobrepasa este límite es baneado definitivamente.
    El Usuario vera la razón del ban si esta sobrepasa el límite.
    
* Avisos de Parcheros

    El Anticheat una vez ejecutado empieza a escanear los procesos
    si encuentra algún programa malicioso o mouse bloody envía al
    servidor que mouse o proceso es el detectado, muy útil si el
    usuario intenta ingresar con algún cheat, el administrador sabrá
    cuando intento hacerlo aunque el sistema no le dio acceso.
    Te permite saber quién está testeando algún Parche para banearlo
    por ello, ya que los usuarios pueden estar probando que parche
    detecta o no el anticheat y poder aprovechar la brecha de seguridad.
    O puedes agregar dicho programa que fue detectado como malicioso
    porque a veces el usuario no puede cerrar programas importantes
    de Windows o de uso típico.
    
* Sistema de Logs y Salva de datos

    El Servidor almacena los Logs de la consola en la carpeta logs, allí
    estará todo el monitoreo del usuario. Los screenshot se almacenan en la
    carpeta "data" con su respectivo usuario. Tambien la información  recolectada
    del usuario, ya sea los procesos como los dispositivos HID conectados.
    Los Procesos están en formato Excel, solo necesitas llevar de texto
    a columnas en Excel agregando el "," como separador. Los datos se dividen
    según el orden correspondiente en la Estructura de información.
    
* Estructuras de Información:

    Los procesos tienen un orden de estructura para su lectura efectiva
    en la consola del Servidor, la cual es la siguiente:
    
        ProductName|FilePath|FileOriginalName|LastModified|FileSize|WindowsTitle|
        FileDescription|FileVersion|CompanyName|LegalCopyright|Checksum|reason
        
    Usualmente la razón es que palabra fue detectada como amenaza (ej: Hack, Inject, ...)
    Tener muy en cuenta esto en la lectura de la Consola o los Logs del Sistema.
    
* Detector de Hackers

    Este modo simplemente te muestra en consola que IP intento enviar
    información  errónea y que información envió, muy útil para detectar
    anomalias, ya sea alguien intentando enviar peticiones anónimas y
    hacer algún tipo de cliente falso para burlar el anticheat. Es
    necesario una alta actividad por parte de los administradores del
    servicio para detectar esto. Al final el usuario puede ver las
    peticiones que son enviadas si posee las herramientas correctas.
    Toda anomalía hará que el cliente sea expulsado del servidor.
    
* Auto-Update

    El cliente incorpora un auto-update el cual es super útil para no
    tener que estar descargando, de un URL desconocida, el cliente
    manualmente. Automático, simple y fácil :)
    
* Anclaje por IP

    La relación Usuario - IP estará activada, por lo que si los usuarios
    posee varias cuentas con un mismo IP puede dar conflicto entre ellas
    (Puede deberse a la infraestructura de la red - JC). Sin el Anclaje, el
    sistema funciona por Mac-Address. Identificando por PC al usuario
    generando menos conflicto, pero si un usuario tiene baneada una cuenta
    en su PC puede afectar otra registrada en su misma PC (Esto es positivo y
    negativo, puede permitir que todas las cuentas de una PC estén baneadas)
    
* Portabilidad

    El Anticheat puede ser montado en cualquier host que posea Windows
    y el firewall activado. Con solo configurar el cliente con el IP
    o dns de dicho servidor, ya es posible realizar la conexión. El
    puerto del anticheat es variable, libre elección. Muchas opciones
    son modulares, como el mensaje de baneado o la versión que el
    cliente puede utilizar (Está hecho para poder utilizar versiones
    anteriores que son estables mientras las actuales están en proceso
    de arreglo o mejora, no siempre todo está al detalle, necesita testing).
    
* Interfaz Moderna y Amigable

    Antes de crear la interfaz del servidor, era por consola lo cual
    era muy complejo realizar tareas de mayor complejidad. Si te fijas
    el Servidor contiene muchas opciones útiles a la hora de administrar
    y monitorearlos a los usuarios. Intente crearla lo más moderna
    posible y fácil de utilizar, espero que sea de su agrado :)
    Si tienes alguna sugerencia de que mejoras pueden ser agregadas no
    dudes en contactarme vía Correo, mi correo está en mi cuenta de GitHub.


## Proximas mejoras:

- Agregar Protección de Memoria a los Servicios/Juegos del anticheat
- Detector anomalías en el Recoil (Dado las coordenadas del Mouse)
- Encriptar Fuerte la Comunicación con el Cliente-Servidor (Evitar versiones piratas)
- Mejorar integración con el TINServer (TINApiServer y SteamApiCommunicator)
- Desarrollar un Coordinador o Base para uno (Integrado con el KeyMac)


## Agradecimientos

Gracias ACENTO por permitir testear las versiones Alpha y Beta
en su servidor. A LedFull y Chika_Gamer por brindar el nombre
de la Aplicación.


## Donaciones

Si alguien está interesado en donar horas nautas para poder seguir
mejorando y expandiendo este proyecto puede escribirme por correo.
Espero que mi primer proyecto en C# (KeyMac) se expanda por toda SNET.

Gracias por el apoyo :) nos vemos por la SNET.
