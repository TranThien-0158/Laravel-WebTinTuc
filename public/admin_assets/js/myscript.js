$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
});
$(document).ready(function() {
	$("#TheLoai").change(function() {
		var TheLoai_ID = $(this).val();
		$.get("admin/ajax/loaitin/"+TheLoai_ID, function(data){
            $("#LoaiTin").html(data);
		});
	});
});

$("div.alert").delay(2000).slideUp();

function CheckDelete(msg)
{
    if(window.confirm(msg))
    {
        return true;
    }
    return false;
}

