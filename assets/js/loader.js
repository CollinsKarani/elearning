$('document').ready(function() {


//checking the selection of the faculties and departments
$('#class_id').change(function(){
        var country_id = $(this).val();
        $("#subject_id > option").remove();
        $.ajax({
            type: "POST",
            url: "populate_programmes.php",
            data: "fid=" + country_id,
            success:function(opt){
                $('#subject_id').html(opt);

            }
        });
    });

});