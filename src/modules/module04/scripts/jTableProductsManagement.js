$(document).ready(function () {
    $('#ProductsTableContainer').jtable({
        sorting: true, //Tabla ordenable
        multiSorting: true,
        defaultSorting: 'IDP ASC', //Set default sorting
        messages: {
            addNewRecord: '+ Añadir producto',
            serverCommunicationError: 'Error en la comunicación con el servidor.',
            loadingMessage: 'Cargando productos...',
            noDataAvailable: 'No hay datos disponibles',
            editRecord: 'Editar producto',
            areYouSure: '¿Está seguro?',
            deleteConfirmation: 'Este producto se eliminará. ¿Está seguro?',
            save: 'Guardar',
            saving: 'Guardando...',
            cancel: 'Cancelar',
            deleteText: 'Eliminar producto',
            deleting: 'Eliminando...',
            error: 'Error',
            close: 'Cerrar',
            cannotLoadOptionsFor: 'No se pueden cargar las opciones para el campo {0}',
            pagingInfo: 'Mostrando {0}-{1} de {2}',
            pageSizeChangeLabel: 'Contar filas',
            gotoPageLabel: 'Ir a la página',
            canNotDeletedRecords: 'No se pueden borrar {0} de {1} entrada/s!',
            deleteProggress: 'Borrado/s {0} de {1} entrada/s, procesando...'
        },
        title: 'Productos',
        actions: { /* Aquí relaciono el nombre de cada acción (la que hacen los boyones de editar, borrar, etc.) con el método que le corresponde en el backend */
            listAction: '../modules/module04/products.php?action=productsList',
            createAction: '../modules/module04/products.php?action=addProduct',
            updateAction: '../modules/module04/products.php?action=modifyProduct',
            deleteAction: '../modules/module04/products.php?action=removeProduct'
        },
        fields: { // Con esto se crean las columnas de la tabla
            IDP: { // IDP es el nombre de un campo del JSON
                key: true, // key está a true por lo que quiere decir que este campo es la clave primaria
                list: true, // list está a true, por lo que quiere decir que este campo se va a mostrar en la tabla
                title: 'Id',
                width: '5%'
            },
            nombre: { // nombre es el nombre de un campo del JSON
                title: 'Nombre', //Nombre es el nombre de la columna que alberga el contenido del campo de la BBDD nombre
                width: '60%'
            },
            precio: { // precio es el nombre de un campo del JSON
                title: 'Precio (€)', //Precio es el nombre de la columna que alberga el contenido del campo de la BBDD precio
                width: '20%'
            }
       }
    });
    $('#ProductsTableContainer').jtable('load'); //Carga la tabla en el identificador del body. En este caso será PersonTableContainer
});

