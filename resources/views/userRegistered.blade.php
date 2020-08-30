@component('mail::message')

# Olá {{$user->name}}!

A coordenação do seu curso cadastrou-lhe em nosso sistema. 

Sua senha é:
@component('mail::panel')
    <center>
        <font size='8'>    
            {{$user->password}}
        </font>
    </center>
@endcomponent
Para entrar no sistema clique no botão abaixo:
@component('mail::button', ['url' => 'http://127.0.0.1:8000', 'color' => 'green'])
    Clique aqui
@endcomponent

@component('mail::subcopy')
Por favor, não responda esse email.

Em caso de dúvidas contate a coordenação do seu curso através:

Email: coinf.aju@ifs.edu.br

Telefone: 3711-3160
@endcomponent

@endcomponent