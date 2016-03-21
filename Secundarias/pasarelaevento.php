<!DOCTYPE html>
<?php require_once '..\BD\eventoBD.php'; ?>
	<html>
	
		<head>
			<title> Pasarela evento</title>
			 <link rel="stylesheet" type="text/css" href="pasarela.css" />
		</head>
		<body>

				<div id="logo">
					<a href="../principal.html" id="imagen"> <img src="../img/logoeve.png" /> </a> 
				</div>
				
				<form id="pasarela" method="post" name="pasarela" action="pasarela_form.php">
					<div>
						<ul>
							<li>
								<h1>¿Preparado para poner su evento?</h1> 
							</li>
							
							<li>
								<h4>Precio: 50€</h4> 
							</li>
							
							<li>
								<label for="numtarjeta">Número de tarjeta:<span class="required">*</span> </label> 
								<input type="number" name="numtarjeta" max="16" min="16" placeholder="Número tarjeta" autofocus required />
							</li>
							<li> 
								<label for="fechacaduca">Fecha de caducidad:<span class="required">*</span> </label>
								<input type="month" name="fechacaduca" min="2015-06" max="2019-12" step="1" value="2015-06" required />
							 </li> 	
 							<li>
								<label for="codseg">Cod. Seguridad:<span class="required">*</span> </label> 
								<input type="number" name="codseg" max="3" min="3" autofocus required />
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
								<a href="pasarela_form.php"> <button id="submit" name="submit" type="submit">Enviar</button></a>
								<button id="reset" type="reset">Empieza de nuevo</button>
							</li>
						</ul>
					</div>
				</form>
		</body>
	</html>