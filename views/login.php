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
				<input name="password" size="26" type="password"/>
			</td>
		</tr>
		<tr>
			<td colspan=2 align="center">
				<input type="submit" value="Entra"/>
			</td>
		</tr>
	</table>
	
	<p align="center">L'inserimento di una utenza errata prevede il giro attraverso un circuito pubblicitario per evitare sovraccarichi per flood.</p>
	<p align="center">La sessione viene memorizzata per 30 minuti, a meno che non si effettui la connessione da un'altra postazione.</p>
</form>