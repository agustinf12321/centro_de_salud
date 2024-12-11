<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <title>Centro de Salud</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else

    @endif
</head>

<body>

    @if (Route::has('login'))
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('appointments.request')" :active="request()->routeIs('dashboard')">
                            {{ __('Consultar Turnos') }}
                        </x-nav-link>
                        @auth
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('specialities.index')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        @else
                        <x-nav-link :href="route('login')" :active="request()->routeIs('offices.index')">
                            {{ __('Login') }}
                        </x-nav-link>
                        @if (Route::has('register'))
                        <x-nav-link :href="route('register')" :active="request()->routeIs('offices.index')">
                            {{ __('Register') }}
                        </x-nav-link>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>
    @endif


    <div
        id="carouselExampleCaptions"
        class="relative"
        data-twe-carousel-init
        data-twe-ride="carousel">
        <!--Carousel indicators-->
        <div
            class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
            data-twe-carousel-indicators>
            <button
                type="button"
                data-twe-target="#carouselExampleCaptions"
                data-twe-slide-to="0"
                data-twe-carousel-active
                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[400ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                aria-current="true"
                aria-label="Slide 1"></button>
            <button
                type="button"
                data-twe-target="#carouselExampleCaptions"
                data-twe-slide-to="1"
                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[400ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                aria-label="Slide 2"></button>
            <button
                type="button"
                data-twe-target="#carouselExampleCaptions"
                data-twe-slide-to="2"
                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[400ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                aria-label="Slide 3"></button>
        </div>

        <!--Carousel items-->
        <div
            class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
            <!--First item-->
            <div
                class="relative float-left -mr-[100%] w-full transition-transform duration-[400ms] ease-in-out motion-reduce:transition-none"
                data-twe-carousel-active
                data-twe-carousel-item
                style="backface-visibility:hidden">
                <img
                    src="https://images.unsplash.com/photo-1516549655169-df83a0774514?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="block w-full"
                    style="height: 600px; object-fit: cover;"
                    alt="..." />
                <div
                    class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                    <h5 class="text-xl"></h5>
                    <p>

                    </p>
                </div>
            </div>
            <!--Second item-->
            <div
                class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[400ms] ease-in-out motion-reduce:transition-none"
                data-twe-carousel-item
                style="backface-visibility: hidden">
                <img
                    src="https://images.unsplash.com/photo-1550792436-181701c71f63?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="block w-full"
                    style="height: 600px; object-fit: cover;"
                    alt="..." />
                <div
                    class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                    <h5 class="text-xl"></h5>
                    <p>

                    </p>
                </div>
            </div>
            <!--Third item-->
            <div
                class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[400ms] ease-in-out motion-reduce:transition-none"
                data-twe-carousel-item
                style="backface-visibility: hidden">
                <img
                    src="https://images.unsplash.com/photo-1512677859289-868722942457?q=80&w=2074&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="block w-full"
                    style="height: 600px; object-fit: cover;"
                    alt="..." />
                <div
                    class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                    <h5 class="text-xl"></h5>
                    <p>

                    </p>
                </div>
            </div>
        </div>

        <!--Carousel controls - prev item-->
        <button
            class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
            type="button"
            data-twe-target="#carouselExampleCaptions"
            data-twe-slide="prev">
            <span class="inline-block h-8 w-8">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-6 w-6">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </span>
            <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
        </button>
        <!--Carousel controls - next item-->
        <button
            class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
            type="button"
            data-twe-target="#carouselExampleCaptions"
            data-twe-slide="next">
            <span class="inline-block h-8 w-8">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-6 w-6">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </span>
            <span
                class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
        </button>
    </div>

    <!-- Sobre Nosotros -->
    <section id="about" class="bg-gray-200 py-12">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Sobre Nosotros</h2>
            <p class="max-w-4xl mx-auto text-lg mb-8">En nuestro Centro de Salud, contamos con más de 20 años de experiencia brindando atención médica de calidad a nuestra comunidad. Nuestro objetivo es ofrecer un espacio donde cada paciente reciba un trato humano y profesional. Nos enorgullece ser un lugar confiable para cuidar tu salud y la de tus seres queridos.</p>
            <!-- Servicios -->
            <section id="services" class="py-12">
                <div class="container mx-auto text-center">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="p-6 bg-white shadow-lg rounded-lg">
                            <img src="https://www.ospaca.com/upload/novedades/ospaca-novedades-conoce-nuestros-prestadores-img-home-v2.jpg" alt="Servicio 1" class="mx-auto mb-4"
                                style="width:150px; height: 150px;">
                            <h3 class="text-xl font-bold">Consulta General</h3>
                            <p class="mt-2">Atención médica personalizada para todas tus necesidades.</p>
                        </div>
                        <div class="p-6 bg-white shadow-lg rounded-lg">
                            <img src="https://www.ospaca.com/upload/novedades/ospaca-novedades-Nuevo-Canal-Comu-Formu-img-home.jpg" alt="Servicio 2" class="mx-auto mb-4"
                                style="width:150px; height: 150px;">
                            <h3 class="text-xl font-bold">Diagnósticos</h3>
                            <p class="mt-2">Equipos avanzados para estudios y análisis médicos.</p>
                        </div>
                        <div class="p-6 bg-white shadow-lg rounded-lg">
                            <img src="https://www.ospaca.com/upload/novedades/ospaca-novedades-sist-carga-online_act%20dic22-img-home.jpg" alt="Servicio 3" class="mx-auto mb-4"
                                style="width:150px; height: 150px;">
                            <h3 class="text-xl font-bold">Emergencias</h3>
                            <p class="mt-2">Atención inmediata y profesional 24/7.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <!-- Hero Section -->
    <section class="bg-cover bg-center h-[60vh] flex items-center justify-center" style="background-image: url('https://plus.unsplash.com/premium_photo-1681843129112-f7d11a2f17e3?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
        <div class="text-center text-white bg-black bg-opacity-50 p-6 rounded-lg">
            <h1 class="text-4xl font-bold">Cuidamos tu salud, cuidamos de vos</h1>
            <p class="mt-4 text-lg">Tu bienestar es nuestra prioridad. Vení a conocernos.</p>
            <a href="#contact" class="mt-6 inline-block bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">¡Contactanos ahora!</a>
        </div>
    </section>



    <!-- Blog de Salud -->
    <section id="blog" class="py-12 bg-blue-50">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Blog de Salud</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="p-6 bg-white shadow-lg rounded-lg">
                    <img src="https://www.am.com.mx/u/fotografias/m/2023/1/11/f776x436-453071_501422_5050.jpeg" alt="Blog 1" class="mx-auto rounded-lg mb-4"
                        style="width:300px; height: 200px;">
                    <h3 class="text-xl font-bold">Consejos para una vida saludable</h3>
                    <p class="mt-2">Aprendé cómo mantener una alimentación balanceada y mejorar tu calidad de vida.</p>
                    <a href="#" class="text-blue-500 hover:underline">Leer más</a>
                </div>
                <div class="p-6 bg-white shadow-lg rounded-lg">
                    <img src="https://portada.com.ar/files/image/12/12566/6688646f9cf46_800_450!.jpg?s=286014f108fc60bdbc6f56f52d86b84e&d=1720217475" alt="Blog 2" class="mx-auto rounded-lg mb-4"
                        style="width:300px; height: 200px;">
                    <h3 class="text-xl font-bold">Importancia de los chequeos médicos</h3>
                    <p class="mt-2">Descubrí por qué es esencial realizar controles periódicos para tu salud.</p>
                    <a href="#" class="text-blue-500 hover:underline">Leer más</a>
                </div>
                <div class="p-6 bg-white shadow-lg rounded-lg">
                    <img src="https://hic.fcv.org/co/images/blog/2024/agosto/6-tecnicas-de-relajacion-y-manejo-del-estres-para-pacientes-y-cuidadores.jpg" alt="Blog 3" class="mx-auto rounded-lg mb-4"
                        style="width:300px; height: 200px;">
                    <h3 class="text-xl font-bold">Cómo manejar el estrés</h3>
                    <p class="mt-2">Estrategias efectivas para reducir el estrés en tu vida diaria.</p>
                    <a href="#" class="text-blue-500 hover:underline">Leer más</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonios -->
    <section id="testimonials" class="bg-gray-200 py-12">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Testimonios</h2>
            <div class="flex flex-col md:flex-row justify-center items-center gap-8">
                <div class="p-6 bg-white shadow-lg rounded-lg max-w-md">
                    <img src="https://www.clarin.com/img/2024/07/04/uteodLeuh_600x600__1.jpg" alt="Persona 1" class="w-16 h-16 mx-auto rounded-full mb-4">
                    <blockquote class="italic">"El mejor lugar para cuidar mi salud. Excelente atención y equipo médico."</blockquote>
                    <footer class="mt-4 text-right">- María López</footer>
                </div>
                <div class="p-6 bg-white shadow-lg rounded-lg max-w-md">
                    <img src="https://i0.wp.com/lamiradafotografia.es/wp-content/uploads/2014/07/foto-perfil-juego.jpg" alt="Persona 2" class="w-16 h-16 mx-auto rounded-full mb-4">
                    <blockquote class="italic">"Gracias por su dedicación y amabilidad. 100% recomendado."</blockquote>
                    <footer class="mt-4 text-right">- Juan Pérez</footer>
                </div>
            </div>
        </div>
    </section>

    <!-- Contacto -->
    <section id="contact" class="py-12 bg-blue-50">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Contacto</h2>
            <form action="#" method="POST" class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
                @csrf
                <div class="mb-4">
                    <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg" placeholder="Tu nombre">
                </div>
                <div class="mb-4">
                    <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg" placeholder="Tu correo">
                </div>
                <div class="mb-4">
                    <textarea name="message" class="w-full px-4 py-2 border rounded-lg" rows="4" placeholder="Tu mensaje"></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">Enviar</button>
            </form>
        </div>
    </section>

    @include ('layouts.footer')

</body>

</html>