<!DOCTYPE html>
<!--
ERP-ISI-2015-2016

  This file is part of ERP-ISI-2015-2016.

    ERP-ISI-2015-2016 is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    ERP-ISI-2015-2016 is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with ERP-ISI-2015-2016.  If not, see <http://www.gnu.org/licenses/>.

 @license     http://www.gnu.org/licenses/gpl.txt
 @source code https://github.com/jmcolmenar/erp-isi-2015-2016
-->
<html>
    <head>
        <title>Modulo 07 - Gestion de pedidos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <link href="themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
        <link href="scripts/jtable/themes/metro/lightgray/jtable.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
        <script src="scripts/jtable/jquery.jtable.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#PersonTableContainer').jtable({
                    title: 'Tabla de pedidos',
                    actions: {
                        listAction: 'backend.php',
                        createAction: 'backend.php?action=nuevo',
                        updateAction: 'backend.php?action=actualizar',
                        deleteAction: 'backend.php?action=borrar'
                    },
                    /*
                     fields: {
                     IDU: {
                     key: true,
                     list: false
                     },
                     campo1: {
                     title: 'Cdigo',
                     width: '10%'
                     },
                     campo2: {
                     title: 'Fecha Pedido',
                     width: '10%'
                     },
                     campo3: {
                     title: 'Realizado por',
                     width: '10%'
                     },
                     campo4: {
                     title: 'Proveedor',
                     width: '10%'
                     },
                     campo5: {
                     title: 'Importe',
                     width: '10%'
                     },
                     campo6: {
                     title: '%Dto',
                     width: '10%'
                     }, */
                    fields: {
                        IDU: {
                            key: true,
                            list: false
                        },
                        usu: {
                            title: 'Usuario',
                            width: '60%'
                        },
                        pass: {
                            title: 'Password',
                            width: '20%'
                        }
                    }
                });
                $('#PersonTableContainer').jtable('load');
            });
        </script>    
    </head>
    <body>
        <div>
            <div id="outer-wrap">
                <div id="inner-wrap">

                    <header id="top" role="banner">
                        <div class="block">
                            <h1 class="block-title">Gestión de pedidos</h1>
                            <a class="nav-btn" id="nav-open-btn" href="#nav">Menu</a>
                        </div>
                    </header>
                    <nav id="nav" role="navigation">
                        <div class="block">
                            <h2 class="block-title">Menu</h2>
                            <ul>
                                <li class="is-active">
                                    <a href="#">Nuevo Pedidos</a>
                                </li><!--
                                --><li>
                                    <a href="#">Listado Pedidos</a>
                                </li>
                                <li>
                                    <a href="#">Funcionalidad 3</a>
                                </li>
                                <li>
                                    <a href="#">Funcionalidad 4</a>
                                </li>
                                <li>
                                    <a href="#">Funcionalidad 5</a>
                                </li>
                            </ul>
                            <a class="close-btn" id="nav-close-btn" href="#top">Return to Content</a>
                        </div>
                    </nav>

                    <div id="main" role="main">
                        <article class="block prose">

                            <h1></h1>
                            <div>  <form method="post" action="form.php" >
                                    <br>
                                    <input type="text" name="nombre_formulario" value="busqueda de pedido">
                                </form>
                                <br>
                            </div>
                            <div id="PersonTableContainer"></div>

                        </article>
                    </div>

                    <footer role="contentinfo">
                        <div class="blFtr">
                            <div class="block prose">
                                <p class="small">ERP-ISI-2015-2016 Módulo 07-Gestión de pedidos</p>
                            </div>
                        </div>
                    </footer>

                </div>
                <!--/#inner-wrap-->
            </div>
            <!--/#outer-wrap-->

    </body>  
</div>
</html>