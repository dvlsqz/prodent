<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>psdtowebreciboSProdent.psd</title>
		<link href="styles.css" rel="stylesheet" type="text/css">

      <style type="text/css">
      body {
       margin: 0;
       padding: 0;
      }

      #background
     {
        left: 0px;
        top: 0px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        width: 680px;
        height: 312px;
        overflow: hidden;
        z-index:0;
       }

      #Fondo
     {
        left: 0px;
        top: 0px;
        position: absolute;
        width: 680px;
        height: 312px;
        z-index:1;
     }

      #Capa1
     {
        left: 0px;
        top: 0px;
        position: absolute;
        width: 81px;
        height: 312px;
        z-index:2;
     }

      #Fecha
     {
        left: 95px;
        top: 27px;
        position: relative;
        width: 49px;
        height: 11px;
        z-index:3;

     }

      #ReciboNo
     {
        left: 430px;
        top: 29px;
        position: absolute;
        width: 81px;
        height: 11px;
        z-index:4;
     }

      #Rectnguloredondeado2
     {
        left: 529px;
        top: 16px;
        position: absolute;
        width: 141px;
        height: 32px;
        z-index:5;
     }

      #Rectnguloredondeado1
     {
        left: 160px;
        top: 15px;
        position: absolute;
        width: 220px;
        height: 37px;
        z-index:6;
     }

      #Rectnguloredondeado3
     {
        left: 160px;
        top: 54px;
        position: absolute;
        width: 511px;
        height: 38px;
        z-index:7;
     }

      #Rectnguloredondeado7
     {
        left: 166px;
        top: 182px;
        position: absolute;
        width: 504px;
        height: 88px;
        z-index:8;
     }

      #Rectnguloredondeado4
     {
        left: 183px;
        top: 98px;
        position: absolute;
        width: 183px;
        height: 37px;
        z-index:9;
     }

      #Rectnguloredondeado5
     {
        left: 183px;
        top: 142px;
        position: absolute;
        width: 183px;
        height: 37px;
        z-index:10;
     }

      #Rectnguloredondeado5_0
     {
        left: 487px;
        top: 98px;
        position: absolute;
        width: 183px;
        height: 37px;
        z-index:11;
     }

      #Nombre
     {
        left: 95px;
        top: 69px;
        position: absolute;
        width: 63px;
        height: 11px;
        z-index:12;
     }

      #Descuento
     {
        left: 96px;
        top: 114px;
        position: absolute;
        width: 85px;
        height: 11px;
        z-index:13;
     }

      #Total
     {
        left: 437px;
        top: 114px;
        position: absolute;
        width: 43px;
        height: 11px;
        z-index:14;
     }

      #Estado
     {
        left: 96px;
        top: 155px;
        position: absolute;
        width: 56px;
        height: 11px;
        z-index:15;
     }

      #Detalles
     {
        left: 96px;
        top: 220px;
        position: absolute;
        width: 66px;
        height: 11px;
        z-index:16;
     }

      #Firma
     {
        left: 462px;
        top: 292px;
        position: absolute;
        width: 207px;
        height: 12px;
        z-index:17;
     }

      </style>
	</head>
	<body>
		<div id="background">
			<div id="Fondo"><img src="images/recibo/Fondo.png"></div>
			<div id="Capa1"><img src="images/recibo/Capa1.png">
				<SPAN style="position: absolute; top: 18 px; left: 200 px;">{{$venta->fecha}}</span>
				<SPAN style="position: absolute; top: 16 px; left: 525  px;">{{$venta->serie}}</span>
			</div>
			<div id="Fecha"><img src="images/recibo/Fecha.png"></div>
			<div id="ReciboNo"><img src="images/recibo/ReciboNo.png"></div>
			<div id="Rectnguloredondeado2"><img src="images/recibo/Rectnguloredondeado2.png"></div>
			<div id="Rectnguloredondeado1"><img src="images/recibo/Rectnguloredondeado1.png"></div>
			<div id="Rectnguloredondeado3"><img src="images/recibo/Rectnguloredondeado3.png"></div>
			<div id="Rectnguloredondeado7"><img src="images/recibo/Rectnguloredondeado7.png"></div>
			<div id="Rectnguloredondeado4"><img src="images/recibo/Rectnguloredondeado4.png"></div>
			<div id="Rectnguloredondeado5"><img src="images/recibo/Rectnguloredondeado5.png"></div>
			<div id="Rectnguloredondeado5_0"><img src="images/recibo/Rectnguloredondeado5_0.png"></div>
			<div id="Nombre"><img src="images/recibo/Nombre.png"></div>
			<div id="Descuento"><img src="images/recibo/Descuento.png"></div>
			<div id="Total"><img src="images/recibo/Total.png"></div>
			<div id="Estado"><img src="images/recibo/Estado.png"></div>
			<div id="Detalles"><img src="images/recibo/Detalles.png"></div>
			<div id="Firma"><img src="images/recibo/Firma.png"></div>
		</div>
 </body>
 </html>
