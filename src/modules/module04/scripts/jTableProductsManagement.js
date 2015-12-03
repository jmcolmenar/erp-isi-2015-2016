$(document).ready(function () {
    $('#ProductsTableContainer').jtable({
        title: 'Tabla de datos de los productos',
        actions: { /* Aquí relaciono el nombre de cada acción (la que hacen los boyones de editar, borrar, etc.) con el método que le corresponde en el backend */
            listAction: 'module.php?action=productsList',
            createAction: 'module.php?action=addProduct',
            updateAction: 'module.php?action=modifyProduct',
            deleteAction: 'module.php?action=removeProduct'
        },
        fields: { // Con esto se crean las columnas de la tabla
            IDP: { // IDP es el nombre de un campo del JSON
                key: true, // key está a true por lo que quiere decir que este campo es la clave primaria
                list: true, // list está a true, por lo que quiere decir que este campo se va a mostrar en la tabla
                title: 'Id',
                width: '10%'
            },
            nombre: { // nombre es el nombre de un campo del JSON
                title: 'Nombre', //Nombre es el nombre de la columna que alberga el contenido del campo de la BBDD nombre
                width: '60%'
            },
            precio: { // precio es el nombre de un campo del JSON
                title: 'Precio', //Precio es el nombre de la columna que alberga el contenido del campo de la BBDD precio
                width: '20%'
            }
       }
    });
    $('#ProductsTableContainer').jtable('load'); //Carga la tabla en el identificador del body. En este caso será PersonTableContainer
});

