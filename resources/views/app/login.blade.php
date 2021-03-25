<div class="text-center">
    <form method="post">
        @csrf
        @if(Session::has('message'))
        <div class="error">
            {{Session::get('message')}}
        </div>
        @endif
        <input class="form-control" type="email" placeholder="email" name="email" /><br><br>
        <input type="password" placeholder="Senha" name="password" /><br><br>
        <input type="submit" value="Entrar" />
    </form>
</div>