

<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>plugins/adminlte.min.js"></script>

<!-- Data table plugin-->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/jquery.dataTables.min.js"></script>


<script>
  $(document).ready(function (){
    var base_url= "<?php echo base_url();?>";
    $(".btn-remove").on("click",function(e){
      e.preventDefault();
      var ruta = $(this).attr("href");
      //alert("Desea Eliminar ?");
      $.ajax({
        url:ruta,
        type:"POST",
        success:function(resp){
          window.location.href = base_url + resp;
        }

      });

    });

    $(".btn-view-marca").on("click",function(){
        var id= $(this).val();
        $.ajax({
            url: base_url + "Marcas/view/" + id,
            type: "POST",
            success:function(resp){
              $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }
        });
    });


  $(function () {
    $("#example1").DataTable();
  });

 /*=============================================
TODOS LOS JS DE VENTAS
=============================================*/

/*=============================================
LLAMA A NUMERO DE SERIE
=============================================*/
     $("#comprobantes").on("change",function(){
        option = $(this).val();

        if (option != "") {
            infocomprobante = option.split("*");

            $("#idcomprobante").val(infocomprobante[0]);
            $("#igv").val(infocomprobante[2]);
            $("#serie").val(infocomprobante[3]);
            $("#numero").val(generarnumero(infocomprobante[1]));
        }
        else{
            $("#idcomprobante").val(null);
            $("#igv").val(null);
            $("#serie").val(null);
            $("#numero").val(null);
        }

        sumar();
    })
/*=============================================
BOTON AGREGAR CLIENTES EN VENTAS
=============================================*/
 $(document).on("click",".btn-check",function(){
        cliente = $(this).val();
        infocliente = cliente.split("*");
        $("#idcliente").val(infocliente[0]);
        $("#cliente").val(infocliente[1]);
        $("#modal-default").modal("hide");
    });
 /*=============================================
BOTON AGREGAR PROVEEDOR EN COMPRAS
=============================================*/
$(document).on("click",".btn-check-proveedor",function(){
        proveedor = $(this).val();
        infocliente = proveedor.split("*");
        $("#idproveedor").val(infocliente[0]);
        $("#proveedor").val(infocliente[1]);
        $("#modal-default").modal("hide");
    });
 
/*=============================================
BOTON AGREGAR PRODUCTOS EN VENTAS
=============================================*/

 $(".btn-checkproductos").on("click",function(){
        data = $(this).val();
        if (data !='') {
            infoproducto = data.split("*");
            html = "<tr>";
            html += "<td><input type='hidden' name='idproductos[]' value='"+infoproducto[0]+"'>"+infoproducto[1]+"</td>";
            html += "<td>"+infoproducto[2]+"</td>";
            html += "<td><input type='hidden' name='precios[]' value='"+infoproducto[3]+"'>"+infoproducto[3]+"</td>";
            html += "<td>"+infoproducto[4]+"</td>";
            html += "<td><input type='text' name='cantidades[]' value='1' class='cantidades'></td>";
            html += "<td><input type='hidden' name='importes[]' value='"+infoproducto[3]+"'><p>"+infoproducto[3]+"</p></td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbventas tbody").append(html);
            sumar();
            $("#btn-agregar").val(null);
            $("#producto").val(null);
        }else{
            alert("seleccione un producto...");
        }
    });
 /*=============================================
BOTON ELIMINAR PRODUCTOS EN VENTAS
=============================================*/
 $(document).on("click",".btn-remove-producto", function(){
        $(this).closest("tr").remove();
        sumar();
    });


    
/*=============================================
FUNCION CALCULAR CANTIDADES PRODUCTOS EN VENTAS
=============================================*/
    $(document).on("keyup","#tbventas input.cantidades", function(){
        cantidad = $(this).val();
        precio_venta = $(this).closest("tr").find("td:eq(2)").text();
        importe = cantidad * precio_venta;
        $(this).closest("tr").find("td:eq(5)").children("p").text(importe.toFixed(2));
        $(this).closest("tr").find("td:eq(5)").children("input").val(importe.toFixed(2));
        sumar();
    });

/*=============================================
BOTON VIEW DE VENTAS
=============================================*/
     $(document).on("click",".btn-view-venta",function(){
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "ventas/view",
            type:"POST",
            dataType:"html",
            data:{id:valor_id},
            success:function(data){
                $("#modal-default .modal-body").html(data);
            }
        });
    });


/*=============================================
BOTON VIEW DE PROVEEDOR
=============================================*/
     $(document).on("click",".btn-view-proveedor",function(){
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "compras/view",
            type:"POST",
            dataType:"html",
            data:{id:valor_id},
            success:function(data){
                $("#modal-default .modal-body").html(data);
            }
        });
    });
  })

   
/*=============================================
GENERA EL NUMERO DE SERIE
=============================================*/

   function generarnumero(numero){
    if (numero>= 99999 && numero< 999999) {
        return Number(numero)+1;
    }
    if (numero>= 9999 && numero< 99999) {
        return "0" + (Number(numero)+1);
    }
    if (numero>= 999 && numero< 9999) {
        return "00" + (Number(numero)+1);
    }
    if (numero>= 99 && numero< 999) {
        return "000" + (Number(numero)+1);
    }
    if (numero>= 9 && numero< 99) {
        return "0000" + (Number(numero)+1);
    }
    if (numero < 9 ){
        return "00000" + (Number(numero)+1);
    }

}
/*=============================================
SUMAR TODAS LAS VENTAS
=============================================*/
    function sumar(){
    subtotal = 0;
    $("#tbventas tbody tr").each(function(){
        subtotal = subtotal + Number($(this).find("td:eq(5)").text());
    });
    $("input[name=subtotal]").val(subtotal.toFixed(2));
    porcentaje = $("#igv").val();
    igv = subtotal * (porcentaje/100);
    $("input[name=igv]").val(igv.toFixed(2));
    descuento = $("input[name=descuento]").val();
    total = subtotal + igv - descuento;
    $("input[name=total]").val(total.toFixed(2));

}
</script>