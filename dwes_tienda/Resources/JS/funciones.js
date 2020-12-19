$(function(){
    $( "input[type='number']" ).change(function() {
        let id = $(this).attr("id");
        let unidades = $(this).val();
        let precioUnidad =  $('#precioUnidad_'+id).val();
        $('#precioTotal_'+id).text((unidades*precioUnidad)+'€');
        var sum = 0;
        $(".precios").each(function(index) {
            let val = $(this).text();
            val = parseInt(val.substring(0,val.length-1));
            sum += val;
            
        });
        $("#subtotal_id").text("Subtotal "+sum+" €");
    });
});
function sumaItems(){
    var sum = 0;
    $(".precios").each(function(index) {
        let val = $(this).text();
        val = parseInt(val.substring(0,val.length-1));
        sum += val;
        
    });
    $("#subtotal_id").text("Subtotal "+sum+" €");
}
function despliegaModal(id){
    
    let data = document.getElementById('articuloCompleto_'+id).value;
    data = data.split(",")
    console.log(data)
    let modal ="<form action='#' method='post' id='"+data[5]+"'>"+
                "<input type='hidden' name = 'idArticulo' value='"+data[6]+"'>"+
                "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' style='margin-top:12%'"+
                "aria-hidden='true'>"+
                "<div class='modal-dialog modal-lg' role='document'>"+
                "<div class='modal-content'>"+
                "   <div class='modal-body'>"+
                "       <div class='row'>"+
                "       <div class='col-lg-5'>"+
                "       <img src='../Resources/img/"+data[1]+"' style='width:250px; height:250px;'>"+          
                "       </div>"+
                "       <div class='col-lg-7'>"+
                "           <h2 class='h2-responsive product-name'>"+
                "           <strong>"+data[0]+"</strong>"+
                "           </h2>"+
                "           <h4 class='h4-responsive'>"+
                "           <span class='green-text'>"+
                "               <strong>"+data[5]+"€</strong>"+
                "           </span>"+
                "           </h4>"+
                "           <div class='accordion md-accordion' id='accordionEx' role='tablist' aria-multiselectable='true'>"+
                ""+
                "           <div class='card'>"+
                "           <div class='card-header' role='tab' id='headingThree3'>"+
                "               <a class='collapsed' data-toggle='collapse' data-parent='#accordionEx' href='#collapseThree3'"+
                "                   aria-expanded='false' aria-controls='collapseThree3'>"+
                "                   <h5 class='mb-0'>"+
                "                   Detalles <i class='fas fa-angle-down rotate-icon'></i>"+
                "                   </h5>"+
                "               </a>"+
                "               </div>"+
                "               <div id='collapseThree3' class='collapse' role='tabpanel' aria-labelledby='headingThree3'"+
                "               data-parent='#accordionEx'>"+
                "               <div class='card-body'>"+
                "                       "+data[2]+
                "               </div>"+
                "               </div>"+
                ""+
                "           </div>"+
                ""+
                "           </div>"+
                "           <div class='card-body'>"+
                ""+
                "           <div class='text-center'>"+
                ""+
                "               <button type='button' class='btn btn-secondary' data-dismiss='modal' onclick='eliminaModal("+data[5]+")'>Cerrar</button>"+
                "               <button class='btn btn-primary' name='nuevoItemCesta'>Comprar"+
                "               <i class='fas fa-cart-plus ml-2' aria-hidden='true'></i>"+
                "               </button>"+
                "           </div>"+
                "           </div>"+
                "       </div>"+
                "       </div>"+
                "   </div>"+
                "   </div>"+
                "</div>"+
                "</div></form>";

                $("body").append(modal);
                $('#myModal').modal('show');
        }
    
function eliminaModal(id){
    let mod = document.getElementById(id);
    mod.remove();
}