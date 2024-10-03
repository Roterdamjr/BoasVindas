<h3>Show</h3>

@auth
    <p>Bem-vindo, {{ Auth::user()->name }}!</p>
@endauth

<!-- Verifica se o usuário não está autenticado -->
@guest
    <p>Você não está autenticado. <a href="/login">Login</a></p>
@endguest