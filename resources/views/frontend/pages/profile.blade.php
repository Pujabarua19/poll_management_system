<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>


	
</head>
<body>
	<form id="profile-form" `method="POST" >
<input type="text" name="firstname">
<input type="text" name="secondname">
<button type="submit" name="submit" >Join</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
  $("#profile-form").submit(function(event){
    
    alert(test);
    return false;
  })
  // var postdata=$("#payment-form").serialize();
  // $.post("stripe.post", postdata,function(response){
  //   $("#resp").show().html("submited");
  // })
  //  return false;
  // })
})
</script>

</body>
</html>