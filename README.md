# Proyecto KeyMac - Anti-Cheat Steam para la Comunidad de SNET
Es un proyecto AntiCheat independiente que tiene como objetivo
brindar un servicio de Anticheat para la comunidad de SNET. Un AntiCheat
facil de instalar, libre, escalable, gratuito y robusto.
Este producto es libre de uso y el autor "MacKey-255" no se hará
responsable del mal uso que se le pueda dar a este producto.

El código estará cerrado al público para evitar hacking por partes externas.


## Requisitos:

* WINDOWS 8 o superior

* .NET FRAMEWORK 4.7 o superior

## Instalación:

1. Creamos una carpeta con el KeyMac_Server.exe dentro.
2. Activamos el Firewall de Windows con las reglas de bloqueo activadas.
3. Abrimos el KeyMac_Server.exe y configuramos todo desde el panel del servidor.
4. Agregamos la ruta del Cliente desde el panel del servidor.
5. El cliente lo abrimos y lo configuramos con la direccion y puerto de nuestro servidor.
6. Listo! A disfrutar.

## Caracteristicas:

* Detector de Procesos y Mouses.

    - Extrae información de cada proceso activo.
    - Detecta todos los procesos que contengan codigo sospechoso.
    - Analiza todos los DLL asociados a cada Proceso abierto.
	- Proteccion de Procesos protegidos que esten agregados.
    
* Whitelist/Blacklist de Procesos y Mouses.

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
        
* Registro / Autenticacion de Usuarios.
    
* Baneo y Expulsión de Usuarios.
    
* Sistema de Actualizacion del Cliente.
    
* Interfaz Moderna y Amigable.
    
* Firewall como control de Acceso.

    El firewall se encarga de Bloquear las conexiones de los clientes
	y permitir solo aquellos que estén conectados al AntiCheat.
    
* Integración con Steam o API Externa.

    Es posible que tu Steam o servicio de registro de usuarios este
    creado en un sistema ya previo, puedes integrarlo fácilmente
    desarrollando un API con el tutorial "README_API" el cual explica
    todo al detalle de cómo crearlo. Una vez el API este anclado
    el Anticheat no utilizara los datos del Steam (Ósea no buscara las
    bases de datos .db3 que están en la carpeta del TINServer).
    
* Detector de Hackers.

    Muestra en consola que IP/Mac esta intentando enviar nformación
	sospechosa y que envia, muy útil para detectar anomalias, ya sea
	alguien intentando usar algun tipo de cliente falso para burlar
	el anticheat.
    
* Recolector de información no sensible.

	- Extrae información de cada proceso ejecutado, instalado o activo.
	- Captura todos los dispositivos HID conectados.
    
* Avisos de Procesos/Mouses Sospechosos.

	- Monitorea usuarios antes de conectarse al servicio.
	- Permite Agregar Procesos/Mouses al Whitelist/Blacklist.
    
* Sistema de Logs y Salva de Información.

	- Logs de todo lo que ocurre en el Sistema.
	- Información del usuario almacenada de forma escalonada.
    
* Servidor Web interno.

	- Muestra que es el KeyMac y las reglas establecidas.
	- Permite descargar el Cliente de forma facil.
	- Contiene un Sistema de Administracion de usuarios.
    
* Anclaje por IP o Mac.

	- Mantiene enlazado las cuentas de usuario a la IP o Mac.
    
* Facil y Portable.

	- Facil de montar y administrar.
	- Solo necesitas Windows y el Firewall activado.


## Versiones y Cambios:

- Las version con 4 digitos (1.0.1.1) son versiones Alpha y poseen errores.
- Las versiones de 3 digitos (1.0.1) son versiones Beta con pocos errores.
- Las versiones de 2 digitos (1.0) son Estables y han sido testeadas.
- En los ChangeLogs pueden ver todos los cambios y su seguimiento.


## Agradecimientos

Gracias ACENTO y Ghostwarrior por permitir testear las versiones
Alpha y Beta en sus servidores. A LedFull y Chika_Gamer por brindar
el nombre de la Aplicación.


## Donaciones

Si alguien está interesado en donar horas nautas para poder seguir
mejorando y expandiendo este proyecto puede escribirme por correo.
Espero que mi primer proyecto en C# (KeyMac) se expanda por toda SNET.

Gracias por el apoyo :) nos vemos por la SNET. (TS GNTK)
