
    $(document).ready(function(){
        $('#deporte').on('change',function(){
            var deporteID = $(this).val();
            if(deporteID){
                $.ajax({
                type:'POST',
                url:'../ajaxData/cargaPista.php',
                data:'deporte='+deporteID,
                success:function(html){
                    $('#pistas').html(html);
                }
                });
            }else{
                $('#pistas').html('<option value="">Selecciona un Deporte primero</option>');
            }
        });

        $('#pistas').on('click',function(){
            var pistaID = $(this).val();
            if(pistaID){
                $.ajax({
                type:'POST',
                url:'../ajaxData/cargaClub.php',
                data:'pistas='+pistaID,
                success:function(html){
                    $('#clubDeportivo').html(html);
                }
                });
            }else{
                $('#clubDeportivo').html('<option value="">Selecciona una Pista primero</option>');
            }
        });

        $('#clubDeportivo').on('click',function(){
            var clubDeportivoID = $(this).val();
            if(clubDeportivoID){
                $.ajax({
                type:'POST',
                url:'../ajaxData/cargaMunicipio.php',
                data:'clubDeportivo='+clubDeportivoID,
                success:function(html){
                    $('#municipio').html(html);
                }
                });
            }else{
                $('#municipio').html('<option value="">Selecciona un Club Deportivo primero</option>');
            }
        });

        $('#deporte').on('click',function(){
            var deporteID = $(this).val();
            if(deporteID){
                $.ajax({
                type:'POST',
                url:'../ajaxData/cargaJugadores.php',
                data:'deporte='+deporteID,
                success:function(html){
                    $('#jugadores').html(html);
                }
                });
            }else{
                $('#jugadores').html('<option value="">Selecciona un Deporte primero</option>');
            }
        });

        $('#pistas').on('click',function(){
            var pistaID = $(this).val();
            if(pistaID){
                $.ajax({
                type:'POST',
                url:'../ajaxData/cargaPrecioTotal.php',
                data:'pistas='+pistaID,
                success:function(html){
                    $('#precio').html(html);
                }
                });
            }else{
                $('#precio').html('<option value="">Selecciona una Pista primero</option>');
            }
        });

        
        $('#precio').on('click',function(){
            var precioTotal = $(this).val();
                var jugadoresTotales = $('#jugadores').val();
                if(precioTotal && jugadoresTotales){
                $.ajax({
                type:'POST',
                url:'../ajaxData/cargaPrecioUnitario.php',
                data:'jugadoresTotales='+jugadoresTotales+'&precio='+precioTotal,
                success:function(html){
                    $('#preciojugador').html(html);
                }
                });
            }else{
                $('#preciojugador').html('<option value="">Selecciona una Pista primero</option>');
            }
        });

        $('#deporte').on('click',function(){
            var deporteID = $(this).val();
            if(deporteID){
                $.ajax({
                type:'POST',
                url:'../ajaxData/cargaPlazas.php',
                data:'deporte='+deporteID,
                success:function(html){
                    $('#plazas').html(html);
                }
                });
            }else{
                $('#plazas').html('<option value="">Selecciona un Deporte primero</option>');
            }
        });
    });