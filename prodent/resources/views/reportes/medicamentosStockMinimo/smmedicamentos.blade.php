 <html>
     <head>

         <title>Medicamentos</title>
 <style type="text/css">
         table.blueTable {
   border: 1px solid #1C6EA4;
   background-color: #EEEEEE;
   width: 100%;
   text-align: left;
   border-collapse: collapse;
 }
 table.blueTable td, table.blueTable th {
   border: 1px solid #AAAAAA;
   padding: 3px 2px;
 }
 table.blueTable tbody td {
   font-size: 13px;
 }
 table.blueTable tr:nth-child(even) {
   background: #D0E4F5;
 }
 table.blueTable thead {
   background: #1C6EA4;
   background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
   background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
   background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
   border-bottom: 2px solid #444444;
 }
 table.blueTable thead th {
   font-size: 15px;
   font-weight: bold;
   color: 	#000000;
   border-left: 2px solid #D0E4F5;
 }
 table.blueTable thead th:first-child {
   border-left: none;
 }

 table.blueTable tfoot {
   font-size: 14px;
   font-weight: bold;
   color: 	#000000;
   background: #D0E4F5;
   background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
   background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
   background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
   border-top: 2px solid #444444;
 }
 table.blueTable tfoot td {
   font-size: 14px;
 }
 table.blueTable tfoot .links {
   text-align: right;
 }
 table.blueTable tfoot .links a{
   display: inline-block;
   background: #1C6EA4;
   color: #FFFFFF;
   padding: 2px 8px;
   border-radius: 5px;
 }
  </style>
     </head>
     <body>

       <img src="imagenes/sprodentt.png"  height="100" width="400">
       <SPAN style="position: absolute; top: 0 px; right: : 0 px;"><b> Reporte de Medicamentos Proximos a Desabastecerse</b> </span>
         <SPAN style="position: absolute; top: 15 px; right: : 0 px;">  (Por agotarse las existencias) </span>
       <table class="blueTable">
 <thead>
 <tr>
   <th>Codigo</th>
   <th>Nombre</th>
   <th>Stock</th>
   <th>Fecha de Caducidad</th>
   <th>Presentacion</th>
 </tr>
 </thead>
 <tfoot>

   @foreach($medicamentos as $med)
     @if ($med->stock == $med->stock_minimo || $med->stock < $med->stock_minimo)
       <tr>
         <td>{{$med->codigo}}</td>
         <td>{{$med->nombre}}</td>
         <td>{{$med->stock}}</td>
         <td>{{$med->fecha_cad}}</td>
         <td>{{$med->presentacion}}</td>
       </tr>
     @endif

   @endforeach
 </tbody>
 </table>



  </body>
  </html>
