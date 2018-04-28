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

function allPage(page){
  $.ajax({  
    type:"get",  
    url:"allPage",  
    data:{  
      page:page  
    },  
    success:function(msg){  
     if(msg){  
        $("#all").html(msg);  
      }  
    }  
  })  
}
