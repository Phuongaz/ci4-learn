<html>
    <body>
        <link rel="stylesheet" type="text/css" href="css/nhantien.css">
        <div class="container">
        <title>Nhận ngay 100k</title>
       	<button id="nhan" type="button" class="btn-abc">
       		Nhận 100.000 VND
       	</button>
        <script language="javascript">
            var button = document.getElementById("nhan");
			button.onmouseover = function() {
			    if (screen.width <= 600) {
			      var x = Math.random() * 300;
			      var y = Math.random() * 500;
			    } else {
			      var x = Math.random() * 500;
			      var y = Math.random() * 500;
			    }
			    var x = Math.random() * 500;
			    var y = Math.random() * 500;
			    var left = x + "px";
			    var top = y + "px";
			    document.getElementById('nhan').style.top= x + "px";
			    document.getElementById('nhan').style.left= y + "px";
			  }
        </script>        	
        </div>
    </body>
</html>