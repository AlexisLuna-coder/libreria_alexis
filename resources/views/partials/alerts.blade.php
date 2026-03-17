@if(session('success'))

    <div id="alerta" class="alert alert-success alert-dismissible d-flex align-items-center fade show">
        <i class="fa-solid fa-circle-check"></i>
        <strong class = "mx-2"> ¡Éxito! </strong>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        
    </div>
    <script>
        setTimeout(function() {
            let alerta = document.getElementById('alerta'); //Manejará el obj. del documento (div)

            alerta.classList.remove('show'); //Obtener las clases que tiene esta
            alerta.classList.add('fade');
            setTimeout(() => alerta.remove(), 500); //Cuanto tiempo tardará en desaparecer
        }, 4000); //Cuanto tiempo va a estar el elemento activo
    </script>
@endif
