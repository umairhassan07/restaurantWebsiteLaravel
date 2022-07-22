
//book reservation using ajax
$(document).ready(function(){
    $('#contact').on('submit', function(e){
        e.preventDefault();
       
        var form = $('#contact');

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type : form.attr('method'),
            url : form.attr('action'),
            data : form.serialize(),
            success: function(data){
                $('alert-success').show();
                $('#alert-success').html(data.message);
                $("#alert-success").fadeTo(4000, 500).slideUp(500, function(){
                    $("#alert-success").slideUp(500);
                });
                $("#contact").trigger("reset");
                
            },
        });
    });
});