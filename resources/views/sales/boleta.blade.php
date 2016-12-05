<!DOCTYPE html>
<html>
<head>
    <title>Factura</title>
</head>




<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
     //Limite
    
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
        margin-top: 87px;
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
        
        width: 30%; 
        background-color: blue; 
        float:left;
        text-align: right;
    }
    .part1>.cliente{
        margin-left: 80px;
    }
    .part1>.direccion{
        margin-left: 80px;
    }
    .part1>.ruc{
        margin-left: 55px;
    }
    
    .table1>.cant{
        width: 150px !important;
    }
    .contentTable{
        margin-left: 18px;
        width: 97%;
        height: 174px;
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
<body class="todo" >
    <div class="part1">
           <label class="cliente"><b>{{$factura->cliente}}</b></label> </br>       
           
           <label class="direccion" style="margin-top:5px;"><b>{{$factura->direccion_cliente}}</b></label>
           
   </div>
   <div class="part2">
           <label class="ruc" style="margin-right:60px;font-size:12px;" ><b>73067121</b></label> </br>
           <label class="fecha" style="margin-right:7px;font-size:12px;"><label style="margin-right:40px;"><b>{{$factura->dia}}</b></label> <label style="margin-right:20px;"><b>{{$factura->mes}}</b></label> <label><b>{{$factura->anio}}</b></label></label>
  </div></br>
  <div class="contentTable" style="margin-top:-12px;">
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
    <input class="campo" >
</div>
<div class="totales">
<label><b>{{$factura->Total}}</b></label></br>
</div>


</body>
</html>  