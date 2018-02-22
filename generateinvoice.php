<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="typeahead.js"></script>
	<style>
	.typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;max-width: 300px;min-width: 290px;background: rgba(66, 52, 52, 0.5);color: #FFF;}
	.tt-menu { width:300px; }
	ul.typeahead{margin:0px;padding:10px 0px;}
	ul.typeahead.dropdown-menu li a {padding: 10px !important;	border-bottom:#CCC 1px solid;color:#FFF;}
	ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
	.bgcolor {max-width: 550px;min-width: 290px;max-height:340px;background:url("world-contries.jpg") no-repeat center center;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
	.demo-label {font-size:1.5em;color: #686868;font-weight: 500;color:#FFF;}
	.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
		text-decoration: none;
		background-color: #1f3f41;
		outline: 0;
	}
	</style>	
<body>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-3">Generate an invoice :-</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <p class="lead">Enter the details required below.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row"> </div>
      <form method='post' action='/fpdp181/tutorial/tuto2.php'> <label for="fname" class="w-25">Client Name </label>
        <input type="text" id="name" name="name" placeholder="Your name.." class="typeahead">
        <br> <label for="address1" class="w-25">Address 1</label>
        <input type="text" id="address1" name="address1" placeholder="Address 1.">
        <br> <label for="address2" class="w-25">Address 2</label>
        <input type="text" id="address2" name="address2" placeholder="Address 2.">
        <br> <label for="city" class="w-25">City</label>
        <input type="text" id="city" name="city" placeholder="City.">
        <br> <label for="comname" class="w-25">Name of organization</label>
        <input type="text" id="comname" name="comname" placeholder="Name of the company invoice is being genrated by." class="w-50">
        <br> <label for="payterm" class="w-25">Payment Terms</label>
        <input type="text" id="payterm" name="payterm" placeholder="Payment Terms.">
        <br> <label for="duedate" class="w-25">Due Date</label>
        <input type="date" id="dudate" placeholder="due date." name="duedate">
        <br> <label for="itemname" class="w-25">Item Name</label>
        <input type="text" id="itemname" placeholder="Item Name." name="itemname">
        <br> <label for="itemquantity" class="w-25">Item Quantity</label>
        <input type="number" name="itemquantity" placeholder="Item Quantity." id="itemquantity" class="">
        <br> <label for="itemcost" class="w-25">Item Cost</label>
        <input type="number" id="itemcost" name="itemcost" placeholder="Item Cost." class="">
        <br> <label for="tax" class="w-25">Tax</label>
        <input type="number" id="tax" name="tax" placeholder="Tax." class="">
        <br> <label for="notes" class="w-25">Notes</label>
        <input type="text" id="notes" name="notes" placeholder="Notes(if any)." class="h-50 w-50">
        <br> <label for="terms" class="w-25">Terms</label>
        <input type="text" id="terms" name="terms" placeholder="terms." class="">
        <br>
        <br>
        <input type="submit" value="Submit"> </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:110px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">made with&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo>
</body>
<script>
    $(document).ready(function () {
        $('#name').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "server.php",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>

</html>