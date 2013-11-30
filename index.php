<!DOCTYPE html>
<html>
	<head>
		<title>Minecraft Skinmaker!</title>
		<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Prosto+One" rel="stylesheet" type="text/css">
		<script>
			function displaySkin() {
				var username = document.getElementById("getName").value;
				document.getElementById("skinImg").innerHTML="<img src=\"SkinPreview.php?name="+username+"\"/>";
				document.getElementById("mergedSkin").innerHTML="<img src=\"SkinPreview.php?name="+username+"\"/>";
			}
			function allowSec() {
				document.getElementById("getSec").removeAttribute("disabled");
			}
			function displayMergedSkin() {
				var username = document.getElementById("getName").value;
				var skinType = document.getElementById("getSec").value;
				document.getElementById("skinImg2").innerHTML="<img src=\"SkinPreview.php?name=&skin="+skinType+"\"/>";
				document.getElementById("mergedSkin").innerHTML="<img src=\"SkinPreview.php?name="+username+"&skin="+skinType+"\"/>";
				document.getElementById("DLButton").setAttribute("href","SkinMerger.php?name="+username+"&skin="+skinType+"");
				document.getElementById("DLButton").setAttribute("class","btn");
			}
		</script>
	</head>
	<body>
		<div class="nav">
			<div class="nav-title">
				<a style="color:#000;text-decoration:none;" href="./">Skinmaker!</a>
			</div>
		</div>
		<div class="container">
			<div class="content">
				<h1>Make your skin!</h1>
				<hr>
				<div class="skinpanel left">
					<h3>Primary Skin</h3>
					<input autofocus id="getName" onChange="displaySkin(); allowSec();" type="text" placeholder="Player">
					<div id="skinImg" class="preview">
						<img src="SkinPreview.php?name=bla">
					</div>
				</div>
				<div class="skinpanel">
					<h3>Secondary Skin</h3>
					<select disabled id="getSec" onChange="displayMergedSkin();">
						<option disabled selected>Select Secondary</option>
						<option value="christmas">Christmas One</option>
						<option value="christmas2">Christmas Two</option>
						<option value="elf">Elf</option>
						<option value="headset">Headset</option>
						<option value="blueonesie">Blue Dinosaur Onesie</option>
						<option value="dinoonesie">Red Dinosaur Onesie</option>
					</select>
					<div id="skinImg2" class="preview">
						<img src="SkinPreview.php">
					</div>
				</div>
				<div class="skinpanel right">
					<h3>Result</h3>
					<a class="btn disabled" id="DLButton" target="_blank" href='#'>Download</a>
					<div id="mergedSkin" class="preview">
						<img src="">
					</div>
				</div>
			</div>
		</div>
		<div class="bedrock">
			<small>website coded and designed by <a href="mailto:censink@live.nl">censink</a><a href="https://github.com/theboywithtrains">zacharycraft</a><a href="https://github.com/pigdevil2010">pigdevil</a>, with help from <a href="http://youtube.com/user/matic0basle">matic0basle</a>!</small>
		</div>
	</body>
</html>
