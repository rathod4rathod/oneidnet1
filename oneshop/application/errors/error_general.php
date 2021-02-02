<!DOCTYPE html>
<html lang="en">
<head>
<title>Error</title>
<style type="text/css">
::selection {
background-color: #E13300;
color: white;
}
::moz-selection {
background-color: #E13300;
color: white;
}
::webkit-selection {
background-color: #E13300;
color: white;
}
body {
	font: 13px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
	background: rgba(0, 0, 0, 0) linear-gradient(to right, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 0%, rgba(209, 209, 209, 1) 51%, rgba(254, 254, 254, 1) 94%, rgba(254, 254, 254, 1) 99%) repeat scroll 0 0;
}
a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}
h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}
code {
	font-family:Arial, Helvetica, sans-serif;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}
#container {
	margin: 10px;
}
p {
	margin: 12px 15px 12px 15px;
}
.mainwrapper {
	margin: 0 auto;
	width: 100%;
}
.header {
	overflow: hidden;
	width: 100%;
}
.header .figcaption {
	font-size: 22px;
	font-weight: 300;
	margin: 0 auto;
	text-align: center;
}
.header img {
	margin: 10px auto;
        display: table;
}
.left-wrapper {
	float: left;
	overflow: hidden;
	width: 50%;
}
.left-wrapper-box {
	overflow: hidden;

}
.left-wrapper-box .heading {
	color: #070842;
	font-family:Arial, Helvetica, sans-serif;
	font-size: 170px;
    font-weight: bold;
    text-align: center;
    line-height: 154px;
}
.left-wrapper-box .subhead {
	color: #de8a0d;
	font-size: 25px;
	font-weight: normal;
	text-align: center;
}
.left-wrapper .border-img {
	float: right;
	right: 0;
}
.right-wrapper {
	float: right;
	overflow: hidden;
	width: 50%;
}
.right-head {
	color:#46477b;
	font-weight:bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	text-transform: uppercase;
}
.right-options {
	overflow: hidden;
}
.right-options ul {
	color: #414141;
	font-size: 16px;
	list-style:inside none none;
	margin:0 30px;
}
.right-options ul li {
	line-height: 28px;
}
.option-head {
	color: #46477b;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight:bold;
	margin-top: 20px;
	padding: 15px 0;
	text-transform: uppercase;
}
.middlecontainer{display:flex;margin:40px 0 50px;min-height:350px;}
.middlecontainer wrap{flex:1;}
.link{text-decoration:none; color:#003399;font-size:16px;text-decoration:underline;}
</style>
</head>
<body>
<div id="container">
  <div class="mainwrapper">
    <div class="header"> <img src="<?php echo base_url();?>assets/images/oneidlogo.png">
      <p class="figcaption">Internet System</p>
    </div>
    <div class="middlecontainer"><div class="wrap left-wrapper">
      <div class=" left-wrapper-box">
        <p class="heading">404</p>
        <p class="subhead">Sorry, we couldn't find that page</p>
      </div>
    </div>
    <div class="wrap right-wrapper">
      <p class="right-head">You may not be able to visit this page because of:</p>
      <div class="right-options">
        <div class="right-options">
          <ul>
            <li>1. An out-of-date bookmark/favorite. </li>
            <li>2. A search engine that has an out-of-date listing for the system.</li>
            <li>3. A mistyped domain or URL address.</li>
            <li>4. The requested resource was not found.</li>
            <li>5. An error was encountered while processing your request.</li>
          </ul>
          <p class="option-head">please try one of the following pages:</p>
          <p><a class="link" href="#">Home</a></p>
        </div>
      </div>
    </div></div>
  </div>
</div>
</body>
</html>