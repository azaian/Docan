<script>
    
       var username=$("#username").val();
        
        if( (username=='') ||(username.length<4)||(username.length>10)){
            alert('error');
            $("#username").parent().append(' <i class="false">خطـا</i>');
            
        }
        else{
              $("#username").parent().prepend(' <i class="true">صحيح</i>');
        }
    
</script>

