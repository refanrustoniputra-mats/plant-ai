<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>PlantAI</title>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#F5F7F2;
color:#333;
}

.container{
max-width:500px;
margin:auto;
padding:20px;
}

.card{
background:white;
border-radius:20px;
overflow:hidden;
box-shadow:0 15px 30px rgba(0,0,0,.08);
}

.header{
background:linear-gradient(135deg,#2E7D32,#66BB6A);
color:white;
padding:35px;
text-align:center;
}

.header h1{
font-size:30px;
}

.header p{
margin-top:10px;
opacity:.9;
}

.content{
padding:25px;
}

.footer{
padding:20px;
text-align:center;
color:#777;
font-size:14px;
}

button:hover{
opacity:.9;
}

input{
outline:none;
}

</style>

</head>

<body>

<div class="container">

@yield('content')

</div>

<script src="https://unpkg.com/html5-qrcode"></script>

</body>

</html>