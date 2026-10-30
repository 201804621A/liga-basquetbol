# Desarrollo de una aplicación web para la gestión de una liga de básquetbol
## 1. Introducción
El presente proyecto consiste en el desarrollo de una aplicación web para la gestión de una liga de básquetbol. La finalidad fue crear un sistema que permita organizar la información de los equipos, jugadores y partidos, además de llevar un control de los resultados y las estadísticas básicas de la competición.
El desarrollo se realizó por etapas, comenzando con la configuración del entorno de trabajo y la creación del proyecto en Laravel. Posteriormente, se fueron implementando los diferentes módulos hasta conseguir una aplicación que reúne las principales funciones solicitadas en la práctica.
## 2. Inicio y configuración del proyecto
Como primer paso se creó el proyecto utilizando Laravel, que fue el framework seleccionado para desarrollar la aplicación. Se preparó el entorno de trabajo con PHP, Composer, MySQL y Visual Studio Code.
También se configuró la conexión con la base de datos MySQL, creando una base de datos denominada `liga_basquetbol`. Después de comprobar que la conexión funcionaba correctamente, se comenzó a organizar la estructura del proyecto y sus primeras rutas.
## 3. Desarrollo de los módulos
El desarrollo de las funcionalidades se realizó de manera progresiva, trabajando cada módulo por separado.
Primero se implementó la gestión de equipos, permitiendo registrar, visualizar, editar y eliminar equipos de la liga. Para esto se crearon sus respectivos modelos, controladores, migraciones y vistas.
Después se desarrolló el módulo de jugadores, donde se implementó el registro y administración de los jugadores, relacionándolos con los equipos correspondientes. De esta manera, cada equipo puede tener asociados sus propios integrantes.
Posteriormente se trabajó en la gestión de partidos, permitiendo registrar los encuentros entre los equipos y administrar la información de cada partido.
Una vez desarrollados estos módulos, se implementó la autenticación de usuarios. Se agregaron las funciones de registro, inicio de sesión y cierre de sesión, además de proteger las rutas principales para que el acceso a la administración requiera iniciar sesión.
Finalmente, se desarrolló el módulo de resultados y estadísticas. En esta sección se pueden visualizar los resultados de los partidos finalizados y una tabla de posiciones que muestra el rendimiento de los equipos según los encuentros registrados.
## 4. Base de datos
Para almacenar la información se utilizó MySQL. Se crearon las tablas principales mediante las migraciones de Laravel, entre ellas `users`, `equipos`, `jugadors` y `partidos`.
También se establecieron relaciones entre los datos para vincular a los jugadores con sus equipos y registrar los encuentros correspondientes. El uso de migraciones facilitó la creación y organización de la estructura de la base de datos durante el desarrollo.
## 5. Control de versiones y trabajo con GitHub
Durante el desarrollo se utilizó Git para llevar un registro de los cambios realizados en el código y GitHub para almacenar el repositorio del proyecto.
Se trabajó con ramas independientes para desarrollar los módulos de equipos, jugadores, partidos, autenticación, resultados y estadísticas, y posteriormente el rediseño visual. Cada avance importante se registró mediante commits y se integró a la rama principal utilizando Pull Requests.
Este proceso permitió mantener un historial del desarrollo y organizar mejor los cambios realizados en cada etapa.
## 6. Diseño y presentación del sistema
Después de implementar las funcionalidades principales, se realizó una mejora en la apariencia visual de la aplicación. Se buscó darle un estilo deportivo relacionado con el básquetbol, tomando como referencia algunos diseños utilizados en páginas deportivas.
También se separaron los estilos CSS del archivo principal de la vista para mantener una mejor organización del código y facilitar futuras modificaciones del diseño.
## 7. Conclusiones y mejoras futuras
Con este proyecto se logró desarrollar una aplicación web que permite administrar los principales elementos de una liga de básquetbol. Durante el trabajo se aplicaron conocimientos de programación con Laravel, manejo de bases de datos y control de versiones con Git y GitHub.
El desarrollo por etapas permitió comprender mejor cómo se organiza un proyecto web y la importancia de probar cada módulo antes de continuar con el siguiente.
Como mejoras futuras se podría implementar la carga de escudos para los equipos y fotografías para los jugadores, además de incorporar estadísticas individuales más completas. Estas características permitirían ampliar las posibilidades del sistema.
En conclusión, la práctica permitió desarrollar una aplicación funcional y adquirir experiencia en el proceso de construcción de un sistema web, desde su configuración inicial hasta la integración de sus diferentes módulos.