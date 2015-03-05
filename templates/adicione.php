<section id="adicone">

<h1>Adicione um novo local</h1>

<form id="formAdicione" action="http://localhost/trem/adicione" >
	<label>
		Nome: <input type="text" name="nome" placeholder="Bar da Maria">
	</label>
	<br>
	<label>
		Endereço: <input type="text" name="endereco" placeholder="Rua dos Bobos">
	</label>
	<br>
	<label>
		Site: <input type="text" name="site" placeholder="www.bardamaria.com.br">
	</label>
	<br>
	<label>
		Categoria
		<input type="radio" name="categoria" value="bar">
		<input type="radio" name="categoria" value="restaurante">
		<input type="radio" name="categoria" value="espaco-cultural">
		<input type="radio" name="categoria" value="evento">
	</label>
	<br>
	<label>
		Você comeu algo?
		<input type="radio" name="comeu_no_local" value="1"> Sim 
		<input type="radio" name="comeu_no_local" value="0"> Não 
	</label>
	<br>
	<label>
		Você bebeu algo?
		<input type="radio" name="bebeu_no_local" value="1"> Sim 
		<input type="radio" name="bebeu_no_local" value="0"> Não 
	</label>
	<br>
	<label>
		Tem música?
		<input type="radio" name="tem_musica" value="1"> Sim 
		<input type="radio" name="tem_musica" value="0"> Não 
	</label>
	<br>
	<label>
		Como você avalia o serviço?
		<input type="radio" name="nota_servico" value="1"> 1 
		<input type="radio" name="nota_servico" value="2"> 2 
		<input type="radio" name="nota_servico" value="3"> 3 
		<input type="radio" name="nota_servico" value="4"> 4 
		<input type="radio" name="nota_servico" value="5"> 5 
	</label>
	<br>
	<label>
		Como você avalia os preços?
		<input type="radio" name="nota_preco" value="1"> 1 
		<input type="radio" name="nota_preco" value="2"> 2 
		<input type="radio" name="nota_preco" value="3"> 3 
		<input type="radio" name="nota_preco" value="4"> 4 
		<input type="radio" name="nota_preco" value="5"> 5 
	</label>
	<br>
	<label>
		O que achou das redondezas?
		<input type="radio" name="nota_redondezas" value="1"> 1 
		<input type="radio" name="nota_redondezas" value="2"> 2 
		<input type="radio" name="nota_redondezas" value="3"> 3 
		<input type="radio" name="nota_redondezas" value="4"> 4 
		<input type="radio" name="nota_redondezas" value="5"> 5 
	</label>
	<br>
	<label>
		Como são as instalações?
		<input type="radio" name="nota_instalacoes" value="1"> 1 
		<input type="radio" name="nota_instalacoes" value="2"> 2 
		<input type="radio" name="nota_instalacoes" value="3"> 3 
		<input type="radio" name="nota_instalacoes" value="4"> 4 
		<input type="radio" name="nota_instalacoes" value="5"> 5 
	</label>
	<br>
	<label>
		Como é o astral?
		<input type="radio" name="nota_astral" value="1"> 1 
		<input type="radio" name="nota_astral" value="2"> 2 
		<input type="radio" name="nota_astral" value="3"> 3 
		<input type="radio" name="nota_astral" value="4"> 4 
		<input type="radio" name="nota_astral" value="5"> 5 
	</label>
	<br>
	<label>
		Nota geral
		<input type="text" name="nota_geral">
	</label>
	<br>
	<input type="submit">
</form>

</section>