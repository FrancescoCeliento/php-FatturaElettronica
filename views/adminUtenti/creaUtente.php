<section>
    <h1>Creazione nuovo utente</h1>
    <form action="<?=$actionUtils->resolve('adminUtenti/creaUtenteAction','adminUtenti/utentiList', 'adminUtenti/creaUtente')?>" method="post">
        <p>
        <label>Username</label>
        <input name="username" type="text"/>
        </p>
        <p>
        <label>Nome</label>
        <input name="nome" type="text"/>
        </p>
        <p>
        <label>Password</label>
        <input name="password" type="password"/>
        </p>
        <p>
        <label>Posta elettronica</label>
        <input name="email" type="text"/>
        </p>
        <p>
        <label>Amministratore</label>
        <input name="isadmin" type="checkbox"/>
        </p>
        <button type="submit">Crea</button>
        <button type="reset">Reset</button>
    </form>
    
    <a href="<?=$actionUtils->resolveView('adminUtenti/utentiList')?>"><button>Annulla</button></a>
</section>