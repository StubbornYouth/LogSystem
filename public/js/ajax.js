function noFreshPage(page){
  $.ajax({  
    type:"get",  
    url:"perPage",  
    data:{  
      page:page  
    },  
    success:function(msg){  
     if(msg){  
        $("#person").html(msg);  
      }  
    }  
  })  
}
