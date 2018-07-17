
<script type="text/javascript">
$(".btn_delete").click(delete_click);
function delete_click(){
    var id = $(this).attr('id');
    $.ajax({
      url:"{{url('orders/modeldelete')}}"+"/"+id,
      type:'get',
      success: function(data){
            $("#delet_model").html(data);
            $("#delete").modal('show');
    //    btn1.parent().find("img").remove();
      },
      error:function(data){
        alert('برجاء المحاوله مره اخره');
      },

});
};
</script>
