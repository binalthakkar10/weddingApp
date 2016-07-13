<html>
<?php //p($data); ?>
<head>
        <script>
		var a=1;
			$(document).ready(function(){
			  $(".button").click(function(){
			     var v=$("#email").val();
				 if(v.trim()!='')
				 {
				   
				 var v1=v.split(",");
				 var len=v1.length;
				// alert(len);
					 for(i=0;i<len;i++)
					 {
					    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(v1[i]))
						{
						 $("p").append("<div id='"+a+"'><input onclick='del("+a+")'  type='button' value='Delete'><input type='hidden' value='"+v1[i]+"' name='user_email[]' >"+v1[i]+"<br /></div>");
						 a=a+1;
						 $("#email").val("");
					    }
						else
						{
						    alert("enter valid email");
						}
					 }
			    }
                else
                {
				     alert("please enter email");
					 b=0;
                }				
			  });
			});
			
			function del(b)
			{
			    $("#"+b).remove();
			}
        </script>
</head>
<body>
		<div style="margin-left:400px;margin-top:200px;">
				
				<form name="form1"  id="form1">
					  <table>
							  <tr>
								   <td><input type="email" id="email" size="50" name="email"></td>
								   <td><input type="button" class="button" value="add"></td>
							  </tr>
					  </table>
					  <p></p>
					  <input type="button" value="Submit" class="insert_email" />
				</form>
		</div> <br /><br />
		<div id="div" style="margin-left:400px;" id="refresh-this-div">
		       
		</div>
</body>
</html>

<script>
  $(document).ready(function(){
    $(".insert_email").click(function(){
    	
				$.ajax({
					 url: '<?php echo Yii::app()->getBaseUrl(true); ?>/wedding/Invite/insert_other',
					 data: $("#form1").serialize(),
					 dataType: 'html',
					 type: 'POST',
					 success: function(data){
						 //alert(data);
						 //$('#refresh-this-div').html(html);
						 $("#div").empty();
						 $("p").empty();
						 $("#div").append(data);
						 
					 }
				});  
	 });
	
});
</script>