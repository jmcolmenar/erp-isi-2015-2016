4. Gestión de catálogo de productos.
---------------------------
Catálogo de productos disponibles para su venta.

### Requisitos
 1. Alta, baja y edición de productos.
 2. Listado de productos.
  1. Ordenación de productos por los diferentes campos.
  2. Filtrado / búsqueda de productos.

### Módulo desarrollado por:
https://github.com/jvicentem (José Vicente)

Este módulo está compuesto por los siguientes archivos:

### Front-end
 - index.html (https://github.com/jvicentem/erp-isi-2015-2016/blob/master/src/modules/module04/index.html): 
Se trata de un fichero html que contiene el código html del módulo.
 - jTableProductsManagement.js (https://github.com/jvicentem/erp-isi-2015-2016/blob/master/src/modules/module04/scripts/jTableProductsManagement.js):
Se trata de un script en JavaScript que configura la tabla jTable.org especificando rutas de direcciones, si es ordenable o no, el nombre de las columnas, etc.
 - favicon.png (https://github.com/jvicentem/erp-isi-2015-2016/blob/master/src/modules/module04/assets/favicon.png):
Se trata del favicon del módulo.
 - module.php (https://github.com/jvicentem/erp-isi-2015-2016/blob/master/src/modules/module04/products.php):
 Este archivo php de lo único que se encarga es de cargar el código html del módulo.
 
### Back-end
 - products.php (https://github.com/jvicentem/erp-isi-2015-2016/blob/master/src/modules/module04/products.php)
Este archivo php se encarga de manejar las peticiones que se hacen a través de la página Web. Las peticiones se realizan utilizando API Rest y por tanto las respuestas del servidor estarán codificadas en formato JSON. Concretamente, gestionará estas peticiones:
	 - productsList: Al realizar esta petición, se devuelve una lista de todos los productos. Esta lista puede estar ordenada de manera ascendente o descendente en función de alguno de los atributos de los productos (id, nombre y precio).
	 - addProduct: Permite añadir productos a la base de datos.Recibe como parámetros el nombre del producto y el precio.
	 - modifyProduct: Modifica un producto. Recibe como parámetros el id del producto a modificar, el nuevo nombre del producto (o el original si no se modifica) y el nuevo precio del producto (o el original si no se modifica).
	 - removeProduct: Elimina un producto. Recibe como parámetro el id del producto a ser modificado.
 - ProductsSqliteUtils.inc (https://github.com/jvicentem/erp-isi-2015-2016/blob/master/src/database/ProductsSqliteUtils.inc)
Esta clase implementa métodos para listar (de manera ordenada o no), añadir, modificar y borrar productos en una base de datos SQlite. Esta misma clase se encarga de abrir el archivo de base de datos de los productos.
 - products.db (https://github.com/jvicentem/erp-isi-2015-2016/blob/master/src/database/products.db):
Es la base de datos de productos. La sentencia SQL utilizada para su creación ha sido la siguiente:

        CREATE TABLE `productos` (
    	`IDP`	INTEGER,
    	`nombre`	text,
    	`precio`	REAL,
    	PRIMARY KEY(IDP) 
    	);

Diagrama de clases UML del diseño de este módulo:
![Diagrama de clases UML del diseño de este módulo](https://raw.githubusercontent.com/jvicentem/erp-isi-2015-2016/master/src/modules/module04/dise%C3%B1o%20m%C3%B3dulo%20productos.png)
