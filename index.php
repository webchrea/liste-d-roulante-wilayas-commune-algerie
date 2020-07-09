<?php
require_once('database_connect.php');
$db = new DB();
$query ="SELECT * FROM wilayas";
$results = $db->runQuery($query);
?>
    <html>
    <head>
        <title>Liaison entre deux liste déroulante pays et ville</title>
        <head>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		
            <style>
                body {
                  
                    font-family: Georgia, serif;
                }
                
                .form {
                    border: 1px solid #7ddaff;
                    background-color: #C8EEFD;
                    margin: 2px 0px;
                    padding: 40px;
                    border-radius: 4px;
                }
                
                .boxInput {
                    padding: 10px;
                    border: #bdbdbd 1px solid;
                    border-radius: 4px;
                    background-color: #FFF;
                    width: 50%;
                }
                
                .row {
                    padding-bottom: 15px;
                }
				

			  
				
            </style>
            <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
            <script>
				function getVille(val) {
					$.ajax({
					type: "POST",
					url: "get_ville.php",
					data:'id_pays='+val,
					success: function(data){
						$("#list-ville").html(data);
					}
					});
				}

                function selectCountry(val) {
                    $("#search-box").val(val);
                    $("#suggesstion-box").hide();
                }
            </script>
        </head>

        <body>
		<div class="row FORM">
  <div class="col-md-6 mb-3">
         
                
                    <label>Wilayas:</label>
                    <br/>
                    <select name="pays" id="liste-pays" class="boxInput form-control form-control-lg" onChange="getVille(this.value);">
                        <option value="">Sélectionnez la wilayas</option>
						<?php
						foreach($results as $pays) {
						?>
							<option value="<?php echo $pays["id"]; ?>"><?php echo $pays["nom"]; ?></option>
						<?php
						}
						?>
					</select>
					
		   </div>				
					
                   <div class="col-md-6 mb-3">
  	<label for="validationCustom04">Commune:</label>
     <select class="form-control form-control-lg"name="ville" id="list-ville"  name="ville" required>

	 <option value="">Sélectionnez la commune</option></select>
  </div>

		
			   
            </div>    
				
        </body>
    </html>
	
	