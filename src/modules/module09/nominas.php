<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of nominas
 *
 * @author Naugh
 * 
 * nombre apellido codigo comercial? sueldo
 */
//put your code here  
$empleados = array();

    $e1 = ["Pedro", "Lopez", 1, FALSE, 1000.0];
    $e2 = ["Jonny", "Mentero", 2, TRUE, 1200.0];
    $e3 = ["Armando", "Casas", 1, FALSE, 1050.0];
    $e4 = ["Sole", "Dolio", 1, FALSE, 1000.0];
    $e5 = ["Encarna", "Vales", 1, TRUE, 1150.0];
    $empleados=[$e1,$e2,$e3,$e4,$e5];
function dameEmpleados() {
    $e1 = ["Pedro", "Lopez", 1, FALSE, 1000.0];
    $e2 = ["Jonny", "Mentero", 2, TRUE, 1200.0];
    $e3 = ["Armando", "Casas", 1, FALSE, 1050.0];
    $e4 = ["Sole", "Dolio", 1, FALSE, 1000.0];
    $e5 = ["Encarna", "Vales", 1, TRUE, 1150.0];
    $empleados=[$e1,$e2,$e3,$e4,$e5];
   
}
 
 print json_encode($empleados);
 
 
$columnas = 5;
$filas    = 5;

print "<table border=\"1\">\n";            // Abre la tabla
print "  <caption>Tabla</caption>\n";      // Crea la leyenda <caption>
print "  <tbody>\n";                       // Abre el cuerpo de tabla <tbody>

print "    <tr>\n";                        // Abre la primera fila
print "      <th></th>\n";                 // Crea la primera celda <th> de la primera fila (sin número)
for ($j = 1; $j <= $columnas; $j++) {      // Bucle 1 se ejecuta tantas veces como columnas tenga la tabla
    print "      <th>$j</th>\n";           // Crea las celdas <th> de la primera fila (con número)
}   
print "    </tr>\n";                       // Cierra la primera fila

for ($i = 1; $i <= $filas; $i++) {         // Bucle 2 (genera el resto de filas de la tabla)
    print "    <tr>\n";                    // Abre la fila
    print "      <th>$i</th>\n";           // Crea la primera celda <th> de cada fila (con número)
    for ($j = 1; $j <= $columnas; $j++) {  // Bucle 3 se ejecuta tantas veces como columnas tenga la tabla
        print "      <td>$empleados[$i]</td>\n";     // Crea el resto de celdas <td> de cada fila (con números)
    } 
    print "    </tr>\n";                   // Cierra la fila
}

print "  </tbody>\n";                      // Cierra el cuerpo de tabla <tbody>
print "</table>\n";
 
 ?>