Puedes agregar el texto de "Agregar"  que se encuentra en el botón en la parte superior del diseño:
como se crea un botón personalizado con un símbolo de mas en medio, con html y ccs.
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<style>
			.btn {
				display: inline-block;
				padding: 8px 16px;
				font-size: 16px;
				font-weight: bold;
				text-align: center;
				color: #ffffff;
				background-color: #3366cc;
				border: none;
				border-radius: 4px;
				cursor: pointer;
			}
			
			.btn::before {
				content: "+";
				display: inline-block;
				width: 20px;
				height: 20px;
				line-height: 20px;
				font-size: 14px;
				font-weight: bold;
				text-align: center;
				margin-right: 10px;
				background-color: #ffffff;
				border-radius: 50%;
				color: #3366cc;
				box-shadow: 0 0 0 2px #3366cc, 0 0 0 4px #ffffff;
			}

			.btn-text {
				margin-right: 5px;
			}
			
		</style>
	</head>
	<body>
		<button class="btn">Agregar</button>
		
	</body>
</html>
