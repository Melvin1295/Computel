<!DOCTYPE html>
<html>
<head>
	<title>Factura</title>
</head>




<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
	 //Limite
	 function llamar(valor){
	 	var cadena=valor.toString().split('.');
	 	if(valor%1 > 0){
	 		var cadenaCompleta=doThings(Math.floor(valor))+ " CON 100/"+cadena[1];
	 	}else{
	 		var cadenaCompleta=doThings(Math.floor(valor))+ " CON 100/00";
	 	}
	 	
	 	$('#valor').val(cadenaCompleta);

	 }
    
	 function doThings(valor){
        if(valor >2000000)
            {return "DOS-MILLONES";}
        
        switch(valor){
            case 0: return "CERO";
            case 1: return "UNO"; //UNO
            case 2: return "DOS ";
            case 3: return "TRES ";
            case 4: return "CUATRO ";
            case 5: return "CINCO "; 
            case 6: return "SEIS ";
            case 7: return "SIETE ";
            case 8: return "OCHO ";
            case 9: return "NUEVE ";
            case 10: return "DIEZ ";
            case 11: return "ONCE "; 
            case 12: return "DOCE "; 
            case 13: return "TRECE ";
            case 14: return "CATORCE ";
            case 15: return "QUINCE ";
            case 20: return "VEINTE ";
            case 30: return "TREINTA ";
            case 40: return "CUARENTA ";
            case 50: return "CINCUENTA ";
            case 60: return "SESENTA ";
            case 70: return "SETENTA ";
            case 80: return "OCHENTA ";
            case 90: return "NOVENTA ";
            case 100: return "CIEN ";
            
            case 200: return "DOSCIENTOS ";
            case 300: return "TRESCIENTOS ";
            case 400: return "CUATROCIENTOS ";
            case 500: return "QUINIENTOS ";
            case 600: return "SEISCIENTOS ";
            case 700: return "SETECIENTOS ";
            case 800: return "OCHOCIENTOS ";
            case 900: return "NOVECIENTOS ";
            
            case 1000: return "MIL ";
            
            case 1000000: return "UN-MILLON ";
            case 2000000: return "DOS-MILLONES ";
        }
        if(valor<20){
            //System.out.println(">15");
            return "DIECI "+ doThings(valor-10);
        }
        if(valor<30){
            //System.out.println(">20");
            return "VEINTI " + doThings(valor-20);
        }
        if(valor<100){
            //System.out.println("<100"); 
            //alert((Math.floor(valor/10))*10);
            return doThings((Math.floor(valor/10))*10) + "Y " + doThings(valor%10);
        }        
        if(valor<200){
            //System.out.println("<200"); 
            return "CIENTO " + doThings( valor - 100 );
        }         
        if(valor<1000){
            //System.out.println("<1000");
            return doThings((Math.floor(valor/100))*100) + " " + doThings(valor%100);
        } 
        if(valor<2000){
            //System.out.println("<2000");
            return "MIL " + doThings( valor % 1000 );
        } 
        if(valor<1000000){
            descri="";
            //System.out.println("<1000000");
            descri = doThings(Math.floor(valor/1000)) + "MIL " ;
            if(valor % 1000!=0){
                //System.out.println(var);
               // alert(valor % 1000);
                descri += " " + doThings(valor % 1000);
            }
            return descri;
        }
        if(valor<2000000){
            return "UN-MILLON " + doThings( valor % 1000000 );
        } 

        return "";
    }
    	window.onload = function() {
				window.print();
				setTimeout(function() {
					window.close();
				}, 1);
			}
</script>
<style>
	.todo{
		width: 100%;
		height: 100%; 
		font-size: 10px;
		margin-top: 90px;
		font-family: "Times New Roman", Helvetica,Arial,sans-serif; 
		text-rendering: auto;
    letter-spacing: normal;
    word-spacing: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;
    font: 12px Arial;
	}
	.part1{
		background-color: red;
		width: 70%;
		float: left;
	}
	.part2{
		margin-top: 15px;
		width: 30%;	
		background-color: blue;	
		float:left;
		text-align: right;
	}
	.part1>.cliente{
		margin-left: 65px;
	}
	.part1>.direccion{
		margin-left: 65px;
	}
	.part1>.ruc{
		margin-left: 55px;
	}
	
	.table1>.cant{
		width: 150px !important;
	}
	.contentTable{
		margin-left: 10px;
		width: 98%;
		height: 338px;
		background-color: black;
	}
	table{
		background-color: yellow;
		width: 100%;
		margin-top: 40px;
	}
	table>td{
         margin-right: 50px;
	}
	.descriLetra{
		width: 80%;
		float: left;
	}
	.totales{
		float: left;
		width: 19%;
		text-align: right;
	}
	.campo{
		font-size: 12px;
		width: 95%;
		font-style: bold;
		margin-left: 7%;
		margin-top:-8px;
		outline:0px;
		border:solid 0px;
	}
</style>
<body class="todo" onload="llamar({{$factura->Total}})">
    <div class="part1">
           <label class="cliente"><b>{{$factura->cliente}}</b></label> </br>       
           <div style="width:100%; height:4px;"></div>
           <label class="direccion" style="margin-top:5px;"><b>{{$factura->direccion}}</b></label></br>
           <div style="width:100%; height:4px;"></div>
           <label class="ruc" ><b>{{$factura->ruc}}</b></label> 
   </div>
   <div class="part2">
           <label class="fecha" style="margin-right:7px;font-size:12px;"><label style="margin-right:25px;"><b>{{$factura->dia}}</b></label> <label style="margin-right:18px;"><b>{{$factura->mes}}</b></label> <label><b>{{$factura->anio}}</b></label></label>
  </div></br></br>
  <div class="contentTable" style="margin-top:-10px;">
<table class="tabla1">

@foreach ($detFactura as $det)
	<tr>
		<td class="cant" style="width:100px;"><b>{{$det->cantidad}}</b></td>
		<td class="descri" style="width:70%;"><b>{{$det->descripcion}}</b></td>
		<td class="preuni" style="width:150px;"><b>{{$det->PrecioUnit}}</b></td>
		<td class="preven"><b>{{$det->PrecioVent}}</b></td>
	</tr>
@endforeach
</table></div>
<div class="descriLetra">
  <input class="campo" id="valor">
</div>
<div class="totales">
<label><b>{{$factura->subTotal}}</b></label></br>
<label><b>{{$factura->igv}}</b></label></br>
<label><b>{{$factura->Total}}</b></label></br>
</div>


</body>
</html>  