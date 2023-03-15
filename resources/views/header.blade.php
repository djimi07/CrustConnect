
<div class="container-fluid" id="header">
    <div class="row">

        <div class="col-3">
            <h1> TP </h1>
        </div>

        <div id="icons" class="col-3 offset-6">

            @if (Session::has('type'))

                @if (Session::get('type') == 'user')
                 
                    <h1 style="margin-left:10px;"><a href="/home" id="list_head"><i class="fas fa-home"> </i> <span> Home </span> </a></h1>
                    <h1><a href="/pizzas_list" id="list_head"><i class="fas fa-pizza-slice"> </i> <span> Liste </span> </a></h1>
                    <h1><a href="/cart" id="cart_head"><i class="fas fa-shopping-cart"></i> <span> Panier </span> <span class="total"> 

                        @if (Session::has('total'))

                            {{ Session::get('total') }}

                        @endif
                        
                    <span> </a></h1>

                    <h1><a href="/logout" id="cart_head"><i class="fas fa-times"></i> <span> Déconnexion </span> </a></h1>

                @elseif (Session::get('type') == 'cook')

                    <h1><a href="/cook" id="list_head"><i class="fas fa-utensils"> </i> <span> Cook </span> </a></h1>
                    <h1><a href="/logout" id="cart_head"><i class="fas fa-times"></i><span> Déconnexion </span> </a></h1>

                
                @elseif (Session::get('type') == 'admin')

                    <h1><a href="/admin" id="cart_head"><i class="fas fa-user-tie"></i> <span> Admin </span> </a></h1>
                    <h1><a href="/logout" id="cart_head"><i class="fas  fa-times"></i> <span> Déconnexion </span> </a></h1>


                @endif

            @endif
        </div>

    </div>
</div>