(function(){var a=$("body"),b=$("form[name=makeMessage]");b.on("submit",function(a){a.preventDefault();var b=$(this),c=b.find("textarea[name=fancyMessage]"),d=c.val(),e=b.find("input[name=messageTheme]:checked"),f=e.val();$.ajax({type:"POST",url:"/process/make-it-fancy.php",data:{fancyMessage:d,messageTheme:f,type:"ajax"},cache:!1,dataType:"json",success:function(a){console.log("success");console.log(a)},error:function(a){alert("My form seems to be malfunctioning. :( Try emailing me instead?");console.log(a)}})})})(jQuery);