$(function(){
	$("#stuname").focus();
	$("#lgbtn").live('click',function(){		
		var user = $("#stuname").val();
		var pass = $("#stupwd").val();
		var vcode = $("#vcode").val();
		if(user==""){
			alert("用户名不能为空！");
			$("#stuname").focus();
			return false;
		}
		if(pass==""){
			alert("密码不能为空！");
			$("#stupwd").focus();
			return false;
		}
			if(vcode==""){
			alert("验证码不能为空！");
			$("#vcode").focus();
			return false;
		}
		$.ajax({
			type: "POST",
			url: "login.php?action=login",
			dataType: "json",
			data: {"user":stuname,"pass":stupwd,"vcode":vcode},
			beforeSend: function(){
				$("#lgbtn").attr({"value":"登录中..."});
			},
			success: function(json){
				if(json.success==1){
					location.href ="main.php";   
				}
				
				if(json.success==0){
					$("#lgbtn").attr({"value":"登录"});
					alert(json.msg);   
				}
				
			}
		});
	});
});