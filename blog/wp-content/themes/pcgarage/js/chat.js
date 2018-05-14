$(document).ready(function ()
{
 
 
 setInterval(function() {
       var orderId = $('.order_id').val();
    var lastId = $('.lastId').val();
    var url = $('.url').val();
  
       $.ajax({
        url: url + "repair/chat1/" + orderId +'/'+lastId,
        type: "get",
        async : false,
        success: function (result)
        {
            console.log(result);
            var data = $.parseJSON(result);
            
            console.log(data);
                 $.each(data, function (i, v)
            {
                
                   var html = '';
                   lastId = v.id;
                if(v.is_client == '1')
                {
               
             html+= '<li class="self">';
             html+= '<div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>';
              html+='<div class="msg">';
              html+="<p style='font-size: 12px;'>"+v.message+"</p>";
              html+='<time style="font-size: 11px;">'+v.time+'</time>';
              html+='</div></li>';
          }
          else
          {
              html+= '<li class="other">';
              html+= '<div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>';
              html+='<div class="msg">';
             html+="<p style='font-size: 12px;'>"+v.message+"</p>";
              html+='<time style="font-size: 11px;">'+v.time+'</time>';
              html+='</div></li>';
          }
              $(".chat").append(html);
            });
            $('.lastId').val(lastId);
          
        }
    });
    
    }, 5000);
 
    
       $("#chat_form").submit(function (event) {
        event.preventDefault();
        var pic = $("#profilePic").val();
       
        var $form = $(this),
        url = $form.attr("action");
        var posting = $.post(url, $("#chat_form").serialize());
        posting.done(function (result) 
         {
			  var data = $.parseJSON(result);
              $('.lastId').val(data.id);
              var msg = $(".chat_form_input").val()
              var html = '';
              html+= '<li class="self">';
              html+= '<div class="avatar"><img src="https://i.imgur.com/HYcn9xO.png" draggable="false"/></div>';
              html+='<div class="msg">';
              html+="<p style='font-size: 12px;'>"+msg+"</p>";
              html+="<time style='font-size: 11px;'>"+data.time+"</time>";
              html+='</div></li>';
              $(".chat_form_input").val('');
              $(".chat").append(html);
            
             
         }); 
         
    });
    
    
  
   
    });
    
    function saveChat()
    {
        $("#chat_form").submit();
    }
