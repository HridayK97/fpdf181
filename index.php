<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>


    <script type="text/javascript" src="typeahead.js"></script>
  <style>
  .typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;max-width: 300px;min-width: 290px;background: rgba(66, 52, 52, 0.5);color: #FFF;}
  .tt-menu { width:300px; }
  ul.typeahead{margin:0px;padding:10px 0px;}
  ul.typeahead.dropdown-menu li a {padding: 10px !important;  border-bottom:#CCC 1px solid;color:#FFF;}
  ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
  .bgcolor {max-width: 550px;min-width: 290px;max-height:340px;background:url("world-contries.jpg") no-repeat center center;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
  .demo-label {font-size:1.5em;color: #686868;font-weight: 500;color:#FFF;}
  .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
    text-decoration: none;
    background-color: #1f3f41;
    outline: 0;
  }
  </style>
  
  </head>
  <body>
<div class=" hero is-light is-fullheight">
  <div>
    <div class="columns">
    <div class="container column is-half">
      <h1 class="title is-2">My Form
      </h1>
    </div>
  </div>
  <div class=" columns">
      <div class="column is-half is-centered container">

        <form class="box" class="container" method='post' action='/fpdf181/tutorial/tuto2.php'>

          <div class="field">
          <label class="label">Name of Candidate</label>
          <div class="control">
            <input class="input" name="txtCountry" id="txtCountry" type="text" placeholder="Candidate" class="typeahead">
          </div>
          </div>

          <div class="field">
          <label class="label">Client Name</label>
          <div class="control">
            <input class="input" name="leshope" id="leshope" type="text" placeholder="Client" class="typeahead">
          </div>
          </div>

          <div class="field">
          <label class="label">Company Name</label>
          <div class="control">
            <input class="input" name="companyname" id="companyname" type="text" placeholder="Company" class="typeahead">
          </div>
          </div>

          <div class="field">
          <label class="label">Amount</label>
          <div class="control">
            <input class="input" type="number" placeholder="0.0" c>
          </div>
          </div>


          <div class="field">
          <label class="label">Rate of Interest</label>
          <div class="control">
            <input class="input" type="number" placeholder="0.0">
          </div>
          </div>

          <a type="submit" class="button is-link">Submit</a>


        </form>

      </div>

        </div>
    </div>
</div>
</body>



<script>
    $(document).ready(function () {
        $('#txtCountry').typeahead({
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
<script>
    $(document).ready(function () {
        $('#leshope').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "server2.php",
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
<script>
    $(document).ready(function () {
        $('#companyname').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "server3.php",
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