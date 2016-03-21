<!DOCTYPE html>
<?php require_once '..\BD\eventoBD.php'; ?>
	<html>
	
		<head>
			<title> Pasarela compra entrada</title>
			 <link rel="stylesheet" type="text/css" href="pasarela.css" />
			<script>
			  function validarSiNumero(numero){
				if (!/^([0-9])*$/.test(numero))
				  alert("El valor " + numero + " no es un número");
			  }

			</script>
			<script>
			  function numdigitos16(numero){
				longitud = numero.length;
				if (longitud != '16')
					alert("El valor tiene que ser de 16 digitos");
				}
			</script>
			<script>
			  function numdigitos3(numero){
				longitud = numero.length;
				if (longitud != '3')
					alert("El valor tiene que ser de 3 digitos");
				}
			</script>
		</head>
		<body>

				<div id="logo">
					<a href="../principal.html" id="imagen"> <img src="../img/logoeve.png" /> </a> 
				</div>
				

					<?php 
						$idE = $_GET['idE'];
						$num = $_REQUEST['numeroE'];
								
						$arr = array();
						$arr = getEvento($idE); 
						
							
					?>
				
				<form id="pasarela" method="post" <?php echo "action='pasarela_form.php?idE=$idE&num=$num'";?>>
					<div>
						<ul>
							<li>
								<h1>¿Preparado para pagar su entrada?</h1> 
							</li>
							
							<li>
								<h4>Precio: <?php echo $arr[6] ?> € </h4> 
							</li>
							
							<li>
								<label for="numtarjeta">Número de tarjeta:<span class="required">*</span> </label> 
								<input type="text" name="numtarjeta" onkeyup="validarSiNumero(this.value)" onchange="numdigitos16(this.value)" size="16"  placeholder="Número tarjeta" autofocus required />
							</li>
							<li> 
								<label for="fechacaduca">Fecha de caducidad:<span class="required">*</span> </label>
								<input type="month" name="fechacaduca" min="2015-06" max="2019-12" step="1" value="2015-06" required />
							 </li> 	
 							<li>
								<label for="codseg">Cod. Seguridad:<span class="required">*</span> </label> 
								<input type="text" onkeyup="validarSiNumero(this.value)" onchange="numdigitos3(this.value)" size="3" name="codseg" autofocus required />
							</li>
							
							<li>
								<label for="tipotarjeta">Tipo de tarjeta: <span class="required">*</span></label><br/><br/>
								<input type="radio" name="tipo_tarjeta" value="Visa" required>Visa</input> <img src="../img/visa.jpg" id="tarjeta"/>
									<br/>
								<input type="radio" name="tipo_tarjeta" value="Maestro"required>Maestro</input> <img src="../img/Maestro.png" id="tarjeta"/>
									<br/>
								<input type="radio" name="tipo_tarjeta" value="Mastercard" required>Mastercard</input> <img src="../img/MasterCard.png" id="tarjeta"/>
									<br/>
								<input type="radio" name="tipo_tarjeta" value="American Express" required>American Express</input> <img src="../img/Amex.jpg" id="tarjetax"/>
									<br/>
							</li>
							
							<li>
								<button type="submit" id="submit">Comprar</button>
								<button id="reset" type="reset">Empieza de nuevo</button>
							</li>
						</ul>
					</div>
				</form>
		</body>
	</html>