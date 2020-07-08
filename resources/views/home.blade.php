@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gracias por elegirnos!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Somos Retromundo. Una página que no quiere que el tiempo pase...<br>
                    Pero como eso es imposible, aquí conmemoramos algunos de los muchísimos clásicos en el mundo musical y cinematográfico. <br>
                    <br>
                    Bajo la pestaña de Discos si adivinás lo que vas a encontrar te ganás un billete de 2 pesos <br>
                    Ni hablar si te pregunto por la de Peliculas, no? <br>
                    <br>
                    Sentite libre de reservar lo que quieras, total...que se jodan los otros, vos ya lo tenés reservado. <br>
                    Para eso, tenes que clickear el producto y vas a encontrar el botón que buscas. <br>
                    También, vas a encontrar en la pestaña donde aparece tu nombre(o lo que hayas puesto): <br>
                    > Una pestaña que te va a permitir ver tus reservas, vas a encontrar un botón para cancelarlas. <br>
                    > Otra pestaña que la podes usar para cambiar tu contraseña si no te gustó cuando te la hiciste <br>
                    > Token? Si estás interesado, podes usar el token para comunicarte con la API, detalles en Github <br>
                    > La ultima, te permite deslogear de Retromundo! <br>
                    <br>
                    Espero que disfrutes usando mi App <br>
                    Saludos!<br>

                        

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
