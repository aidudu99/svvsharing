<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='http://puertokhalid.com/up/demos/puerto-Mega_Menu/css/normalize.css'>

<link rel="stylesheet" href="css/admin.css" media="screen" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<title>SVV Project Information</title>

<script type="text/javascript">

/*
 * 对选中的标签激活active状态，对先前处于active状态但之后未被选中的标签取消active
 * （实现左侧菜单中的标签点击后变色的效果）
 */
$(document).ready(function () {
    $('ul.nav > li').click(function (e) {
        //e.preventDefault();    加上这句则导航的<a>标签会失效
        $('ul.nav > li').removeClass('active');
        $(this).addClass('active');
    });
});

/*
 * 解决ajax返回的页面中含有javascript的办法：
 * 把xmlHttp.responseText中的脚本都抽取出来，不管AJAX加载的HTML包含多少个脚本块，我们对找出来的脚本块都调用eval方法执行它即可
 */
function executeScript(html)
{
    
    var reg = /<script[^>]*>([^\x00]+)$/i;
    //对整段HTML片段按<\/script>拆分
    var htmlBlock = html.split("<\/script>");
    for (var i in htmlBlock) 
    {
        var blocks;//匹配正则表达式的内容数组，blocks[1]就是真正的一段脚本内容，因为前面reg定义我们用了括号进行了捕获分组
        if (blocks = htmlBlock[i].match(reg)) 
        {
            //清除可能存在的注释标记，对于注释结尾-->可以忽略处理，eval一样能正常工作
            var code = blocks[1].replace(/<!--/, '');
            try 
            {
                eval(code) //执行脚本
            } 
            catch (e) 
            {
            }
        }
    }
}

/*
 * 利用div实现左边点击右边显示的效果（以id="content"的div进行内容展示）
 * 注意：
 *   ①：js获取网页的地址，是根据当前网页来相对获取的，不会识别根目录；
 *   ②：如果右边加载的内容显示页里面有css，必须放在主页（即例中的index.jsp）才起作用
 *   （如果单纯的两个页面之间include，子页面的css和js在子页面是可以执行的。 主页面也可以调用子页面的js。但这时要考虑页面中js和渲染的先后顺序 ）
*/
function showAtRight(url) {
    var xmlHttp;
    alert("showAtRight begin!!");
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlHttp=new XMLHttpRequest();    //创建 XMLHttpRequest对象
    }
    else {
        // code for IE6, IE5
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlHttp.onreadystatechange=function() {        
        //onreadystatechange — 当readystate变化时调用后面的方法
        
        if (xmlHttp.readyState == 4) {
            //xmlHttp.readyState == 4    ——    finished downloading response
            
            if (xmlHttp.status == 200) {
                //xmlHttp.status == 200        ——    服务器反馈正常            
                
                document.getElementById("content").innerHTML=xmlHttp.responseText;    //重设页面中id="content"的div里的内容
                executeScript(xmlHttp.responseText);    //执行从服务器返回的页面内容里包含的JavaScript函数
            }
            //错误状态处理
            else if (xmlHttp.status == 404){
                alert("error   （error code: 404 Not Found),……！"); 
                /* 对404的处理 */
                return;
            }
            else if (xmlHttp.status == 403) {  
                alert("error   （error code: 403 Forbidden),……"); 
                /* 对403的处理  */ 
                return;
            }
            else {
                alert("error   （error code: " + request.status + "),……"); 
                /* 对出现了其他错误代码所示错误的处理   */
                return;
            }   
        } 
            
      }
    
    //把请求发送到服务器上的指定文件（url指向的文件）进行处理
    xmlHttp.open("GET", url, true);        //true表示异步处理
    xmlHttp.send();
}        
</script>




</head>
<body>

<style>
</style>



<table width="100%" height="100%" valign="bottom">
  <tr height="15%">
    <th></th>
    <th colspan="8"><font size="10">SVV Sharing project-admin</font></th>
    <th valign="bottom">
      <a href="./index.php" style="test-decoration:none;" title="Dashboard" data-href="./index.php">DashBoard</a>
    </th>
    <th valign="bottom">
      <a href="./admin.php" style="test-decoration:none;" title="Admin" data-href="./admin.php">Admin</a>
    </th>
  </tr>
  <tr height="600px" width="100%">
    <td width="160px">
       <ul  class="mcd-menu">
			<li>
				<a href="" onclick="showAtRight('component.jsp')>
					<i class="edit-component"></i>
					<strong>Components</strong>
				</a>
			</li>           
			<li>
				<a href="" onclick="showAtRight('componentFunction.jsp')>
					<i class="edit-comp-page"></i>
					<strong>Component Function</strong>
				</a>
			</li>
			<li>
				<a href="" onclick="showAtRight('certLoad.jsp')>
					<i class="edit-comp-page"></i>
					<strong>Cert Loads</strong>
				</a>
			</li>
            
			<li class="float">
				<a class="search">
					<input type="text" value="search ...">
					<button><i class="fa fa-search"></i></button>
				</a>
				<a href="" class="search-mobile">
					<i class="fa fa-search"></i>
				</a>
			</li>
        </ul>
    
    </th>
    <td colspan="10">
        <!-- 载入左侧菜单指向的jsp（或html等）页面内容 -->
        <div id="content">

            <h4>    				
                <strong>使用指南：</strong><br>
                <br><br>默认页面内容……
            </h4>         						
            
        </div>  
        
    </th>
  </tr>
</table>
<!--
<tr>
    <td id="pageHeader" width="100%" border="0">&nbsp;SVV Project Sharing
        
&nbsp;

        <td align="right">
            <a href="./index.php" style="test-decoration:none;" title="Dashboard" data-href="./index.php">
            <span class="HeaderLinks" alt border="0" height="16" width="16" align="top" border="0">DashBoard</span>
            </a>
            <a href="./admin.php" style="test-decoration:none;" title="Admin" data-href="./admin.php">
            <span class="HeaderLinks" alt border="0" height="16" width="16" align="top" border="0">Admin</span>
            </a>
        </td>
    </td>
</tr>
<tr>
<td id="pageHeader" width="100%"></td>
</tr>
</table>
-->
	
<!--<tbody>
</tbody>	
<div id="main" align="center">
	<div id="header">SVV Project Information</div>	
	<div id="navig">
        <div id="dashboard"><a href="./index.php">Dashboard</a>
        
        </div>
        <div id="admin"><a href="./admin.php">Admin</a>
        
        </div>
    </div>	    
	<div id="index">
		<div id="index_top">
			<div id="indexText" align="left">projects index</div>
			<input id="addButton" type="button" align="right" value="Add">

		
		</div>
	  <div id="index_bottom">project name</div>
	</div>
	<div id="contain">show project detail information here</div>	
</div>
-->
</body>
</html>