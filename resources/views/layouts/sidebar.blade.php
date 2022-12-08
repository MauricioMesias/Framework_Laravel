<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>{{ config('app.name', 'Laravel') }}</h3>
            <strong>CS</strong>
        </div>

        <ul class="list-unstyled components">
            <li class="{{'home' ==request()->path()?'active':'' }}">          
                <a href="{{ url('/home') }}">
                    <i class="fas fa-home"></i>
                    Home
                </a>            
            </li>
            <li class="{{'proveedores'==Request::is('proveedores*')?'active':''}}">
                <a href="{{route('proveedores.index')}}">
                    <i class="fas fa-handshake"></i>
                    Proveedores 
                </a>
            </li>
            <li class="{{'productos'==Request::is('productos*')?'active':''}}">
                <a href="{{route('productos.index')}}">
                    <i class="fas fa-cubes"></i>
                    Productos
                </a>
            </li>
            <li class="{{'clientes'==Request::is('clientes*')?'active':''}}">
                <a href="{{route('clientes.index')}}">
                    <i class="fas fa-users"></i>
                    Clientes
                </a>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <!--<div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    
                </div>
            </nav>

            
        </div> -->
</div>

<!-- jQuery CDN - Slim version (=without AJAX) SIDEBAR BOTON DESPEGABLE-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>

<!-- Bootstrap JS (ARCHIVO PARA QUE FUNCIONE EL SIDEBAR DESPEGABLE)-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
