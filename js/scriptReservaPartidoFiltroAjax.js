
    $(document).ready(function(){
        $('#deporte').on('change',function(){
            var deporteID = $(this).val();
            if(deporteID){
                $.ajax({
                type:'POST',
                url:'../ajaxData/cargaDeportes.php',
                data:'deporte='+deporteID,
                success:function(html){
                    $('#listaFiltro').html(html);
                }
                });
            }else{
                $('#listaFiltro').html('<option value="">Selecciona un Deporte primero</option>');
            }
        });

        $('#plazas').on('change',function(){
            var plazas = $(this).val();
                var deporte = $('#deporte').val();
                if(plazas && deporte){  
                $.ajax({
                type:'POST',
                url:'../ajaxData/cargaDeportesYplazas.php',
                data:'deporte='+deporte+'&plazas='+plazas,
                success:function(html){
                    $('#listaFiltro').html(html);
                }
                });
            }else{
                $('#listaFiltro').html('<option value="">Selecciona un Deporte y Plazas primero</option>');
            }
        });


    });