<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>SVV Project Information</title>

<link href="./CSS/main.css" rel="stylesheet" type="text/css">
</head>
<body>

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}
td {
    border: 1px solid #00ee00;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
ul a{
  display: block;
  width: 200px;
  height: 40px;
  line-height: 40px;
  background: #f8f8f8;
  border-radius: 3px;
  border: 1px solid #e7e7e7;
  padding: 0 15px;
  margin-bottom: -1px;
}
ul li:last-child a{
  margin-bottom: 0;
}
ul .active a, ul a:hover{
  background: #e7e7e7;
}
ul li{
  float: left;
}
ul{
  float: left;
}
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
       <ul>
        <li><a>First Item</a></li>
        <li><a>Second Item</a></li>
        <li class="active"><a>Third Item</a></li>
        <li><a>Fourth Item</a></li>
      </ul>
    
    </th>
    <td colspan="10">content</th>
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