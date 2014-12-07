function comboMunicipio(url){
    $(".estado").change(function(event){
        var id= $(".estado").find(":selected").val();
        if(id == 0){
            $(".municipio").empty();
            $(".municipio").append('<option value="0">---Seleccione un Estado---</option>');

            $(".parroquia").empty();
            $(".parroquia").append('<option value="0">---Seleccione un Municipio---</option>');
        }else{
            $.ajax({
                type:"GET",
                url: url+"/"+id,
                success:function(data){
                    $(".municipio").empty();
                    $(".parroquia").empty();
                    $(".parroquia").append('<option value="0">---Seleccione un Municipio---</option>');
                    $.each(data,function(index,valor){
                        $(".municipio").append('<option value="'+index+'">'+valor+'</option>');
                    })
                }
            })
        }

    });   
}

function comboParroquia(url){
    $(".municipio").change(function(event){
        var id= $(".municipio").find(":selected").val();
        if(id == 0){
            $(".parroquia").empty();
            $(".parroquia").append('<option value="0">---Seleccione un Municipio---</option>');
        }else{
            $.ajax({
                type:"GET",
                url: url+"/"+id,
                success:function(data){
                    $(".parroquia").empty();
                    $.each(data,function(index,valor){
                        $(".parroquia").append('<option value="'+index+'">'+valor+'</option>');
                    })
                }
            })  
        }

    });   
}


