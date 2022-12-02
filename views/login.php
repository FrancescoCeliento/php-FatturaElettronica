<h1>Autenticazione utenti</h1>
<form action="<?=$actionUtils->resolve('auth/loginAction','main', 'login')?>" method="post">
	<table align="center">
		<tr>
			<td>Username</td>
			<td>
				<input name="username" size="25" type="text"/>
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input name="password" size="25" type="password"/>
			</td>
		</tr>
		<tr>
			<td colspan=2 align="center">
				<input type="submit" value="Entra"/>
			</td>
		</tr>
	</table>
	
	<p align="center">La sessione viene memorizzata per 24 minuti, a meno che non si effettui la connessione da un'altra postazione.</p>
</form>