<h1>Autenticazione</h1>
<form action="<?=$actionUtils->resolve('auth/loginAction','main', 'login')?>" method="post">
	<p>
		<label>Username</label>
		<input name="username" type="text"/>
	</p>
	<p>
		<label>Password</label>
		<input name="password" type="password"/>
	</p>
	<button type="submit">Login</button>
</form>

<p>La sessione viene memorizzata per 24 minuti, a meno che non si effettui la connessione da un'altra postazione.</p>