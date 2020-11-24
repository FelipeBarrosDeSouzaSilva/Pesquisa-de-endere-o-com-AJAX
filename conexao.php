	<!DOCTYPE html>
	<html>
		<head>
			<style>
				* {
					padding: 0;
					margin: 0;
				}
				.cor-padrao {
					color: #055585;
				}
				.borda-padrao {
					border: solid #009688 1px;
				}
				font-padrao {
					
				}
				body {
					background: white;
				}
				form input {
					display: block;
					margin: 20px auto 5px auto;
					box-shadow: 2px 2px 2px gray;
					border: none;
					padding: 5px;
					outline: 0;
					font-size: 20px;
					width: 330px;
				}
				h1 ,h2, h3 {
					text-align: center;
					font-weight: bold;
					margin: 50px auto 0px auto;
				}
				hr {
					width: 60%;
					margin: 50px auto 50px auto;
				}
			</style>
			<script>
				function getEndereco(cep){
					
					let url = "http://viacep.com.br/ws/" + cep + "/json/unicode/";
					
					
					let xmlHttp = new XMLHttpRequest();
					xmlHttp.open('GET', url);
					
					xmlHttp.onreadystatechange = () => {
						
						if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
							
							let jsonText = xmlHttp.responseText;
							
							let jsonObj = JSON.parse(jsonText);
							
							console.log(jsonObj['cep']);
							console.log(jsonObj['logradouro']);
							console.log(jsonObj['complemento']);
							console.log(jsonObj['bairro']);
							console.log(jsonObj['localidade']);
							
							document.getElementById('endereco').value = jsonObj['logradouro']
							
							document.getElementById('bairro').value = jsonObj['bairro']
							
							document.getElementById('cidade').value = jsonObj['localidade']
							
							document.getElementById('uf').value = jsonObj['uf']
							
						}
						
					}
					
					xmlHttp.send();
				}
			</script>
		</head>
		<body>
			 
			<h1 class="cor-padrao">CADASTRO</h1>
			<form>
				<br>
				<input placeholder="CEP" id="cep" onblur="getEndereco(this.value)" >
				<input placeholder="Endereço" id="endereco" readonly> 
				<input placeholder="Bairro" id="bairro" readonly>
				<input placeholder="Cidade" id="cidade" readonly>
				<input placeholder="UF" id="uf" readonly>
			</form>
			<br>
			<hr>
			
		</body>
	</html>
