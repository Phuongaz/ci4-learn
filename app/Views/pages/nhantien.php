<html>
    <title>Nhận ngay 100k</title>
    <body>
        <link rel="stylesheet" type="text/css" href="css/nhantien.css">
        <div class="container">
		<form>
		  <div class="mb-3">
		    <label for="ct-ip" class="form-label">Số tiền muốn nhận</label>
		    <input type="text" class="form-control" id="ct-ip">
		  </div>
		  <div class="mb-3">
		    <label for="ptn" class="form-label">Nhập số tài khoản momo</label>
		    <input type="text" class="form-control" id="ptn">
		  </div>
		  <button type="button" id="nhan" class="btn btn-primary">Nhận tiền</button>
		</form>

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
			button.onmousemove = function() {
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