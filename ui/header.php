<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Rawat Jalan</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="ui/css/bootstrap.min.css" rel="stylesheet" media="screen">		
		<link href="ui/css/crud.css" rel="stylesheet" media="screen">
		
		<script src="ui/js/jquery.js"></script>
		<script src="ui/js/bootstrap.min.js"></script>
		
		<!-- jqwidgets -->
		
		<link rel="stylesheet" href="./ui/assets/jqwidgets/styles/jqx.base.css" type="text/css" />
    	<!--<script type="text/javascript" src="./ui/assets/jqwidgets/scripts/jquery-1.11.1.min.js"></script>
	     <script type="text/javascript" src="/uiassets/jqwidgets/scripts/demos.js"></script> -->
	    <script type="text/javascript" src="./ui/assets/jqwidgets/jqxcore.js"></script>
	    <script type="text/javascript" src="./ui/assets/jqwidgets/jqxmenu.js"></script>
	    <script type="text/javascript" src="./ui/assets/jqwidgets/jqxbuttons.js"></script>
	    <script type="text/javascript" src="./ui/assets/jqwidgets/jqxscrollbar.js"></script>
	    <script type="text/javascript" src="./ui/assets/jqwidgets/jqxpanel.js"></script>
		<script type="text/javascript" src="./ui/assets/jqwidgets/jqxtree.js"></script>
    	<script type="text/javascript" src="./ui/assets/jqwidgets/jqxcheckbox.js"></script>
	    <script type="text/javascript">
	    	$(document).ready(function(){
	    		$("#jqxMenu").jqxMenu({ width: '100%', mode: 'horizontal'});
            	$("#jqxMenu").css('visibility', 'visible');
	    	})
	    	
	    </script>
	   <style>
	   	.title
{
    display: block;
    float: left;
    text-align: left;
    width: auto;
}
.header
{
    position: relative;
    margin: 0px;
    padding: 0px;
    background:#2f4e79;
    width: 100%;
}

.header h1
{
    font-weight: 700;
    margin: 0px;
    padding: 0px 0px 0px 20px;
    color: white;
    border: none;
    line-height: 2em;
    font-size: 2em;
}
.Pager span
    {
        color: #333;
        background-color: #F7F7F7;
        font-weight: bold;
        text-align: center;
        display: inline-block;
        width: 20px;
        margin-right: 3px;
        line-height: 150%;
        border: 1px solid #ccc;
    }
    .Pager a
    {
        text-align: center;
        display: inline-block;
        width: 20px;
        border: 1px solid #ccc;
        color: #fff;
        color: #333;
        margin-right: 3px;
        line-height: 150%;
        text-decoration: none;
    }
    .highlight
    {
        background-color:  #f5ec3a;
    }
    .pagination{
  width:600px;
  margin:0px auto;
  }
  .pagination .current{
  padding: 4px 10px;
color: black;
margin: 1px 0px 9px 6px;
display: block;
text-decoration:none;
float: left;
text-transform: capitalize;
background: whitesmoke;
  }
  .pagination .page-numbers{
  padding: 4px 10px;
color: white !important;
margin: 1px 0px 9px 6px;
display: block;
text-decoration:none;
float: left;
text-transform: capitalize;
background: #00b4cc;
  }
.loginDisplay
{
    font-size: 1.1em;
    display: block;
    text-align: right;
    padding: 20px;
    color: White;
}
.loginDisplay a:link
{
    color: white;
}

.loginDisplay a:visited
{
    color: white;
}

.loginDisplay a:hover
{
    color: white;
}
	   </style>
	</head>
	
<body>
	<div class="page">
        <div class="navbar navbar-fixed-top" >
            <div class="navbar-inner" >
                <div class="header">
                    <div class="title">
                        <h1>
                            Rawat Jalan Interface
                        </h1>

                    </div>
                    <div class="loginDisplay">
                        LOGO HERE
                    </div>

                </div>

				<div id='jqxMenu' style='width: 110px;'>
					<div id='jqxMenu'>
					<?php 
						
						
						if($_SESSION['user'] !=''){
							include('/models/admin/menu.php');
							$oData = new menu();
							$oData->getmenu(0,1);
							$oData = NULL;
						}							
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br />
    <br />
    <br />
    <br />
    <br />
    <div>
    	<?php 
    	
    		if($_SESSION['user'] == ''){
				include('/login.php');
			}
    	?>
    </div>
	</body>
</html>