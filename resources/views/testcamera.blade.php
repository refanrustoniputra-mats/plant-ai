<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<h2>Test Kamera</h2>

<video id="video" autoplay playsinline style="width:100%"></video>

<script>

navigator.mediaDevices.getUserMedia({

video:{
facingMode:"environment"
}

})

.then(function(stream){

document.getElementById("video").srcObject=stream;

})

.catch(function(err){

alert(err);

});

</script>

</body>
</html>