<!DOCTYPE html>
<html>
    <head>
        <title>Gestion de Pedidos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="../modules/module07/themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
        <link href="scripts/jtable/themes/metro/lightgray/jtable.css" rel="stylesheet" type="text/css" />
        <link href="common/main.css" rel="stylesheet" type="text/css" />

        <script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
        <script src="scripts/jtable/jquery.jtable.js" type="text/javascript"></script>

        <script type="text/javascript">
                    $(document).ready(function () {
            $('#PersonTableContainer').jtable({
            title: 'Tabla de pedidos',
                    paging: true, //Enable paging
                    pageSize: 10, //Set page size (default: 10)
                    sorting: true, //Enable sorting

                    defaultSorting: 'ID DSC', //Set default sorting

                    actions: {
                    listAction: '../modules/module07/backend.php?action=listar',
                            createAction: '../modules/module07/backend.php?action=nuevo',
                            updateAction: '../modules/module07/backend.php?action=actualizar',
                            deleteAction: '../modules/module07/backend.php?action=borrar'

                    },
                    fields: {
                    ID: {
                    key: true,
                            list: false,
                            title: 'Id',
                            width: '14%'
                    },
                            NUMERO_PEDIDO: {
                            title: 'Numero',
                                    width: '14%'
                            },
                            FECHA_PEDIDO: {
                            title: 'Fecha',
                                    width: '14%',
                                    displayFormat: 'yy-mm-dd'

                            },
                            PROVEEDOR: {
                            title: 'Proveedor',
                                    width: '14%'
                            },
                            CLIENTE: {
                            title: 'Cliente',
                                    width: '14%'
                            },
                            IMPORTE: {
                            title: 'Importe',
                                    width: '14%'
                            },
                            DTO: {
                            title: 'Dto',
                                    width: '14%'
                            }

                    }
            });
                    $('#PersonTableContainer').jtable('load');
            });
        </script>    
    </head>
    <body>
        <br>
        <div id="module07-outer-wrap">


            <div id="moudle07-top" role="banner">
                <h1 class="block-title">Gesti&oacute;n de pedidos</h1>
            </div>

            <!--/#inner-wrap-->
        </div>
        <div id="module07-principal" role="main"> 
            <div>
                <form>
                    Pedido: <input type="text" name="name" id="name" value="Buscar pedido"/>
                    <select id="cityId" name="cityId">
                        <option selected="selected" value="0">Todos</option>
                        <option value="1">Lenovo</option>
                        <option value="2">El corte ingles</option>
                        <option value="3">Pccomponentes</option>
                        <option value="4">Amazon</option>
                    </select>    
                    <button type="submit" id="LoadRecordsButton">Cargar resultados</button>
                </form>
            </div>
            <br>
            <div id="PersonTableContainer"></div>
        </div>
        <!--/#outer-wrap-->

    </body>
</html>