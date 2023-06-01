$(document).ready( function() {
    $('#bntUpload').click(function(){
        $("#so_file").click();
    });
    
    $('#so_file').change(function() {
        $('#selected_filename').text($('#so_file')[0].files[0].name);
    });
});