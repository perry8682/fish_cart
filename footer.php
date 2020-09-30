<footer class="page-footer">
		<div class="container">
		  <div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12">
			  <h4>煞氣水族館總部基本資料</h4>
			  <p>秘密研究室
			  <br/>設備：主機、CPanel虛擬主機管理系統、Plesk虛擬主機管理系統
			  <br/>地址：43302臺中市沙鹿區正德路230巷7號</p>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
			  <h4>聯絡資訊</h4>
			  <p> 蘇信誠
			  <br/>w200806.stu.fgchen.com
			  <br/>+886 4 26320059
			  <br/>fax: 886 0907220205</p>
			</div>
		</div>
		<div class="footer-copyright text-center">Copyright © 2020 - 煞氣水族館總部. All Rights Reserved.</div>
	</footer>	

	<!-- Modal -->
	<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">購物車</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<table class="show-cart table">
			</table>
			<div>總金額: $<span class="total-cart"></span></div>
			</div>
			<div class="modal-footer">
			<div style="display:flex;justify-content:center;align-items:center;">
				<div class="font">學號(或姓名)：</div>
				<textarea id="orderPeople" class="font" name="order" style="resize:none;height:30px;" autofocus>請填寫</textarea>
			</div>		
			<button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
			<button type="button" class="btn btn-primary" onclick="submitOrder();">確認下單</button>
			</div>
		</div>
		</div>
	</div>	

	<script src="js\cart.js"></script>
	<script src="https://smtpjs.com/v3/smtp.js"></script>	
	<script>
		var request;
		function submitOrder(){
			console.log("訂單送出處理…");
			var cartObjects = shoppingCart.listCart();
			// console.log(cartObjects);
			var order = $('#orderPeople').val();
			// console.log("訂購人：" + order);
			var orderMailBody = "訂購人：" + order + "\r\n";
			var money = 0;
			for (var i = 0; i < cartObjects.length; i++){
				money = money + Number(cartObjects[i]['total']);
				orderMailBody =  orderMailBody + 
				     "第" + (i+1) + "筆：" +
				     cartObjects[i]['name'] + 
				     " 單價：" + cartObjects[i]['price'] +
					 " 數量：" + cartObjects[i]['count'] +
					 " 金額小計：" + cartObjects[i]['total'] +
					 " \r\n";
			}
			orderMailBody =  orderMailBody + "本訂單總金額：" + money;
			console.log(orderMailBody);

			request=new XMLHttpRequest();
			request.open("POST", "mailOrder.php");
			request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			
			request.send("orderMailBody=" + orderMailBody);			
		
			$(".clear-cart").click(); //觸發"清除購物車按鈕"
			$("#cart").modal('hide'); //隱藏購物車對話方塊
		}	

	
		
	</script>
</body>
</html>