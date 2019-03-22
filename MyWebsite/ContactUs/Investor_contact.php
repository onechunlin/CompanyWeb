<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
	嘉腾科技
	</title>
	<link rel="stylesheet" type="text/css" href="Investor_contact.css">
	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body style="background-color: rgb(218,231,241);">
<?php
	// 定义变量并设置为空值
	$nameErr = $emailErr = $companyErr = $telephoneErr = $subjectErr = $contentErr = "";
	$name = $email = $company = $telephone = $subject = $content = "";
	$checked=true;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//为了点击提交后不清除text内容，具体实现在input的value的默认值中
	  	$name = $_POST["name"];
		$email = $_POST["email"];
		$company = $_POST["company"];
		$telephone = $_POST["telephone"];
		$subject = $_POST["subject"];
		$content = $_POST["content"];
	
	  if (empty($name)) {
	    $nameErr = "姓名不能为空";
	    $checked = false;
	  }
	  else{
		  $name = test_input($_POST["name"]);
		  if (!preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$name)) {
		    $nameErr = "只允许纯中文！"; 
		    $checked = false;
		  }
		 
	  }
	  if (empty($email)) {
	    $emailErr = "邮箱不能为空";
	    $checked = false;
	  }
	  else{
	      $email = test_input($_POST["email"]);
	      //验证邮箱格式
		  if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
			  $emailErr = "无效的邮箱格式！"; 
			  $checked = false;
		  }
	  }
	  if (empty($company)) {
	    $companyErr = "机构不能为空";
	    $checked = false;
	  } 
	  else{
	  $company = test_input($_POST["company"]);
	  }
	  if (empty($telephone)) {
	    $telephoneErr = "电话不能为空";
	    $checked = false;
	  }
	  else{
	  	$telephone = test_input($_POST["telephone"]);
	  }
	  if (empty($subject)) {
	    $subjectErr = "主题不能为空";
	    $checked = false;
	  }
	  else{
	  $subject = test_input($_POST["subject"]);
	}
	  if (empty($content)) {
	    $contentErr = "内容不能为空";
	    $checked = false;
	  }
	  else{
	  $content = test_input($_POST["content"]);
	  }
	}
	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	if($checked == true){
		$server_name="localhost";
		$user_name="root";
		$password="";
		$db_name="test";
		mysql_query("set names 'utf8'");
		$conn = new mysqli($server_name, $user_name, $password,$db_name);
		if ($conn->connect_error) {
		    die("连接失败: " . $conn->connect_error);
		}
		else{
			$name = $_POST["name"];
			$company = $_POST["company"];
			$email = $_POST["email"];
			$telephone = $_POST["telephone"];
			$subject = $_POST["subject"];
			$content = $_POST["content"];

			$sql="insert into investor_contact values('$name','$company','$email','$telephone','$subject','$content');";
			if($conn->query($sql)==TRUE){
				echo "<script>alert('提交成功');</script>";
			 }else{
			   echo "<script>alert('数据插入失败');
			   window.location.href='investor_contact.php'</script>";
			 }
		}
		

	}
?>
<div class="nav">
	<a href="../Main/Main.html"><img src="../Main/images/logo.png" class="logo";></a>
	<ul>
    	<li class="dropdown">
    		<span>关于我们</span>
        	<div class="dropdown-content">      		           	
                <ul>
                	<li><a href="../AboutUs/CompanyIntroduce/CompanyIntroduce.html" >公司简介</a></li>
	            	<li><a href="../AboutUs/Business_Category/Business_Category.html">业务范畴</a></li>
	            	<li><a href="#">历史及里程碑</a></li>
	            	<li><a href="#">领导团队</a></li>
	            	<li><a href="../AboutUs/Commen_problem/Commen_problem.html">常见问题</a></li>
				</ul>		
			</div>
		</li>
		<li class="dropdown">
			<span>产品展示</span>
			<div class="dropdown-content">      		           	
                <ul >
                	<li><a href="#" >手机</a></li>
	            	<li><a href="#">电脑</a></li>
	            	<li><a href="#">新能源科技</a></li>
				</ul>		
			</div>
		</li>
		<li class="dropdown">
			<span>投资者关系</span>
			<div class="dropdown-content">      		           	
                <ul >
                	<li><a href="#" >投资者关系主页</a></li>
	            	<li><a href="#">投资者新闻及活动</a></li>
	            	<li><a href="#">投资者日</a></li>
	            	<li><a href="#">季度业绩</a></li>
				</ul>		
			</div>
		</li>
		<li class="dropdown">
			<span>联系我们</span>
			<div class="dropdown-content">      		           	
                <ul >
                	<li><a href="#">办公地点</a></li>
	            	<li><a href="../ContactUs/Investor_contact.html">投资者联系</a></li>
	            	<li><a href="#">媒体联系</a></li>
	            	<li><a href="#">客户联系</a></li>
				</ul>		
			</div>
		</li>		
	</ul>
</div>
<div class="container">
	<form action="" method="post" >
		<div class="rowItem">
			<div class="title">姓名:</div>
			<div class="field">
				<input type="text"  name="name"  id="name" value="<?php echo $name;?>" class="formInputField"  autocomplete="off">
				<span class="error">*<?php echo $nameErr;?></span>
			</div>
		</div>
		<div class="rowItem">
			<div class="title">机构:</div>
			<div class="field">
				<input type="text"  name="company" id="company" value="<?php echo $company;?>" class="formInputField"  autocomplete="off">
				<span class="error">*<?php echo $companyErr;?></span>
			</div>
		</div>
		<div class="rowItem">
			<div class="title">邮箱:</div>
			<div class="field">
				<input type="text"  name="email"  id="email" value="<?php echo $email;?>" class="formInputField"  autocomplete="off">
				<span class="error">*<?php echo $emailErr;?></span>
			</div>
		</div>
		<div class="rowItem">
			<div class="title">电话:</div>
			<div class="field">
				<input type="text"  name="telephone"  id="telephone" value="<?php echo $telephone;?>" class="formInputField"  autocomplete="off">
				<span class="error">*<?php echo $telephoneErr;?></span>
			</div>
		</div>
		<div class="rowItem">
			<div class="title">主题:</div>
			<div class="field">
				<input type="text"  name="subject" id="subject" value="<?php echo $subject;?>" class="formInputField"  autocomplete="off">
				<span class="error">*<?php echo $subjectErr;?></span>
			</div>
		</div>
		<div class="rowItem" style="height: 150px;">
			<div class="title">内容:</div>
			<div class="field">
				<textarea name="content" id="content"><?php echo $content;?></textarea>
				<span class="error">*<?php echo $contentErr;?></span>
			</div>
		</div>
		<div class="rowItem">
			<div class="title"><br></div>
			<div class="field">
				<input type="submit"  value="提交" class="formSubmit" autocomplete="off" onclick="tst();">
			</div>
		</div>
		
	</form>
</div>
<div class="footerWrapper">
	<div class="sitemap">
		<div>
			<span><strong>关于我们</strong></span>     		           	
                <ul >
                	<li><a href="../AboutUs/CompanyIntroduce/CompanyIntroduce.html" >公司简介</a></li>
	            	<li><a href="../AboutUs/Business_Category/Business_Category.html">业务范畴</a></li>
	            	<li><a href="#">历史及里程碑</a></li>
	            	<li><a href="#">领导团队</a></li>
	            	<li><a href="../AboutUs/Commen_problem/Commen_problem.html">常见问题</a></li>
				</ul>		
		</div>
		<div>
			<span><strong>产品展示</strong></span>   		           	
            <ul >
            	<li><a href="#" >手机</a></li>
            	<li><a href="#">电脑</a></li>
            	<li><a href="#">新能源科技</a></li>
			</ul>		
		</div>
		<div>
			<span><strong>投资者关系</strong></span>			      		           	
            <ul >
            	<li><a href="#" >投资者关系主页</a></li>
            	<li><a href="#">投资者新闻及活动</a></li>
            	<li><a href="#">投资者日</a></li>
            	<li><a href="#">季度业绩</a></li>
			</ul>				
		</div>
		<div>
			<span><strong>联系我们</strong></span>      		           	
            <ul >
            	<li><a href="#" >办公地点</a></li>
            	<li><a href="../ContactUs/Investor_contact.html">投资者联系</a></li>
            	<li><a href="#">媒体联系</a></li>
            	<li><a href="#">客户联系</a></li>
			</ul>	
		</div>
	</div>
	<div class="copyright">
		<a href="#" style="margin-left: 15%;">加入我们</a>
		<span class="separator">|</span>
		<a href="#">免责声明</a>
		<span class="separator">|</span>
		<a href="#">隐私政策</a>
		<span class="separator">|</span>
		<span style="color: #fff">
			版权公告 © 1999-2018 嘉腾科技有限公司及／或其关联公司及特许人。版权所有。
		</span>
	</div>
</div>
</body>
</html>