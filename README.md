### Gestor de productos PHP, MYSQL, HTML y Bootstrap

![Logo](logo.png)

Este es un software para almacenar información de un inventario de productos, el cual lee, actualiza, borra y crea productos usando MVC, con PHP, MySQL, HTM y Bootstrap.

#### Tecnologías utilizadas

1. PHP: Lenguaje de programación utilizado para la lógica del lado del servidor.
2. HTML: Lenguaje de marcado utilizado para la estructura y el contenido de las páginas web.
3. Bootstrap: Framework de CSS utilizado para la creación de interfaces y estilos responsivos.
4. MySQL: Sistema de gestión de bases de datos relacional utilizado para el almacenamiento y recuperación de datos.
5. phpMyAdmin: Herramienta de administración de bases de datos basada en web utilizada para la gestión y configuración de la base de datos MySQL.

#### Configuración de la Base de datos

1. Asegúrate de tener instalado XAMPP, WAMP o MAMP, que proporcionan un entorno de desarrollo completo con Apache, MySQL/MariaDB y PHP.
2. Descarga el proyecto desde GitHub y descomprímelo en la carpeta correspondiente de tu servidor web local. Por ejemplo, si estás utilizando XAMPP, coloca el proyecto descomprimido en la carpeta "htdocs".
3. Abre phpMyAdmin (generalmente puedes acceder a través de http://localhost/phpmyadmin en tu navegador) y crea una nueva base de datos para el proyecto. Asegúrate de recordar el nombre de la base de datos que creaste.
4. Dentro del proyecto descargado, busca un archivo que contenga la configuración de la conexión a la base de datos (Ruta: model/conexion.php)
5. Abre el archivo de configuración de la conexión a la base de datos con un editor de texto.
6. Busca las variables de configuración de la conexión, como el nombre de host, el nombre de usuario, la contraseña y el nombre de la base de datos.
7. Edita las variables de configuración según tus propias credenciales y la base de datos que creaste en el paso 3.
8. Guarda los cambios en el archivo de configuración de la conexión a la base de datos.
9. Abre tu navegador web y accede al proyecto a través de la URL correspondiente (por ejemplo, http://localhost/nombre-del-proyecto). Si todo está configurado correctamente, el proyecto debería conectarse a la base de datos y funcionar correctamente.

#### Uso

##### Crear producto

El proyecto proporciona un formulario que te permite registrar productos en la base de datos. Sigue estos pasos para utilizarlo:

1. Abre la página web correspondiente a este formulario en tu navegador.
2. Completa todos los campos del formulario:
        Nombre del Producto: Ingresa el nombre del producto que deseas registrar.
        Referencia: Ingresa la referencia del producto.
        Precio: Ingresa el precio del producto.
        Peso: Ingresa el peso del producto.
        Categoría: Ingresa la categoría del producto.
        Stock: Ingresa la cantidad de stock disponible para el producto.
        Fecha de Creación: Selecciona la fecha de creación del producto.

3. Haz clic en el botón "Registrar" para enviar los datos del formulario.

El controlador asociado al formulario procesará los datos enviados y los insertará en la base de datos.
* Si todos los campos están completos, se realizará una inserción en la base de datos con los datos proporcionados.
* Si algún campo está vacío, se mostrará una advertencia indicando que todos los campos deben ser diligenciados.
* Si la inserción en la base de datos es exitosa, se redireccionará automáticamente a la página principal del proyecto (index.php).
* Si ocurre algún error durante la inserción en la base de datos, se mostrará un mensaje de error.

Recuerda que debes tener configurada correctamente la conexión a la base de datos en el archivo de configuración correspondiente. Asegúrate de que los nombres de las tablas y columnas en el controlador coincidan con los de tu base de datos.

Si deseas utilizar este formulario para registrar varios productos, simplemente repite los pasos anteriores para cada producto adicional que desees agregar.

##### Ver producto

La página de inicio del proyecto muestra una tabla con todos los productos en línea. Sigue estos pasos para ver los productos:

1. Abre la página web correspondiente a la página de inicio (index) en tu navegador.
2. En la página de inicio, encontrarás una tabla que muestra los productos en línea. Los productos se presentan en filas, y cada columna representa un atributo del producto, como el ID, nombre, referencia, precio, peso, categoría, stock, fecha de creación y fecha de última venta.
3. Observa la información de los productos en la tabla. Cada fila de la tabla corresponde a un producto distinto.
4. En la columna "Gestión" de cada fila, encontrarás dos botones:

* El botón con el icono de un lápiz (ícono de edición) te permite actualizar la información del producto. Al hacer clic en este botón, se redirigirá a la página de actualización (update.php) donde podrás modificar los datos del producto seleccionado.
* El botón con el ícono de un bote de basura (ícono de eliminación) te permite eliminar el producto de la base de datos. Al hacer clic en este botón, se eliminará el producto seleccionado de forma permanente. Ten en cuenta que se mostrará una ventana de confirmación antes de proceder con la eliminación.

##### Editar producto

El proyecto permite editar un producto existente mediante la siguiente acción:

1. En la tabla de productos en línea, ubicada en la página de inicio (index), encuentra el producto que deseas editar.
2. En la columna "Gestión" correspondiente a ese producto, haz clic en el botón de edición. Este botón se identifica con un ícono de lápiz.
3. Al hacer clic en el botón de edición, serás redirigido a la página de actualización que te permite modificar la información del producto seleccionado.
4. En la página de actualización, encontrarás un formulario prellenado con los datos actuales del producto. Los campos del formulario corresponden a los atributos del producto, como nombre, referencia, precio, peso, categoría, stock y fecha de creación.
5. Realiza los cambios necesarios en los campos del formulario para actualizar la información del producto.
6. Una vez que hayas realizado los cambios, haz clic en el botón "Modificar" para enviar los datos actualizados.
7. El controlador asociado al formulario de actualización procesará los datos enviados y ejecutará una consulta SQL para actualizar el producto en la base de datos:

* Si todos los campos están completos, se realizará la actualización en la base de datos con los nuevos datos proporcionados.
* Si algún campo está vacío, se mostrará una advertencia indicando que todos los campos deben ser diligenciados.
* Si la actualización en la base de datos es exitosa, se redireccionará automáticamente a la página principal del proyecto donde podrás ver el producto actualizado.
* Si ocurre algún error durante la actualización en la base de datos, se mostrará un mensaje de error.

##### Eliminar producto

El proyecto permite eliminar un producto existente a través de la siguiente acción:

1. En la tabla de productos en línea, ubicada en la página de inicio, encuentra el producto que deseas eliminar.
2. En la columna "Gestión" correspondiente a ese producto, haz clic en el botón de eliminación. Este botón se identifica con un ícono de bote de basura.
3. Al hacer clic en el botón de eliminación, se activará una función llamada "eliminar()", que te pedirá confirmación antes de proceder con la eliminación.
4. Si confirmas la eliminación, se ejecutará el código de eliminación correspondiente.
5. El controlador asociado a la eliminación recibirá el parámetro "id" a través de la URL y ejecutará una consulta SQL para eliminar el producto de la base de datos.

* Si la eliminación en la base de datos es exitosa, se redireccionará automáticamente a la página principal del proyecto, donde podrás ver la tabla actualizada sin el producto eliminado.
* Si ocurre algún error durante la eliminación en la base de datos, se mostrará un mensaje de error.

#### Modulo Ventas

El módulo de ventas permite realizar la compra de productos seleccionados. A continuación se detalla cómo utilizar este módulo:

1. En la pagina de inicio le das click al boton ventas y te redireccionara a la pagina de ventas de productos.
2. En la sección "Adicionar Compra", encontrarás un formulario con los siguientes elementos:
    * Campo de selección de productos: En este campo podrás elegir un producto de la lista desplegable.
    * Campo de cantidad: Aquí puedes indicar la cantidad de unidades del producto que deseas comprar.
    * Botón "Agregar": Al hacer clic en este botón, el producto y la cantidad seleccionados se añadirán a la lista de productos seleccionados.

3. Repite el paso anterior para agregar más productos a la lista de productos seleccionados.
4. En la sección "Productos Seleccionados", verás la lista de productos que has agregado junto con la cantidad correspondiente.
5. Si estás satisfecho con los productos seleccionados, haz clic en el botón "Comprar". Este botón enviará la información de los productos seleccionados al servidor para su procesamiento.

* El código verificará si se ha enviado el parámetro "listado" a través de la solicitud POST. Este parámetro contiene un arreglo JSON con los productos seleccionados y sus cantidades.
* Para cada producto en el listado, se llamará a la función actualizarStock() para actualizar el stock en la base de datos.
* La función actualizarStock() verificará el stock actual del producto y restará la cantidad vendida.
* Si la operación de actualización es exitosa, se mostrará un mensaje de éxito. De lo contrario, se mostrará un mensaje de error.

#### Contacto

Si tienes alguna duda escribe al correo mboadaro@ibero.edu.co y con gusto atenderé cualquier inquietud.