@extends('layouts/template')

@section('estilos')
    <link rel="stylesheet" href="/css/home.css">
@endsection

@section('nav')
    <header>
        <nav class="bg-white py-6 relative">
            <div class="container mx-auto flex px-8 xl:px-0">
                {{-- Aquí va la imagen con link --}}
                {{-- <a href="#">
                    <img src="/images/marco.svg" alt="">
                </a> --}}
                {{-- Aquí va la imagen con link --}}
                <div class="flex flex-grow pl-20 items-center">
                    <a href="#">
                        <img src="/images/logo.svg">
                    </a>

                </div>
                <div class="flex lg:hidden">
                    <img src="/images/menu.svg" onclick="openMenu();">
                </div>
                <div id="menu"
                    class="lg:flex hidden flex-grow justify-end absolute lg:relative lg:top-0 top-28 left-0 bg-white w-full lg:w-auto items-center py-14 lg:py-0 px-8 sm:px-24 lg:px-0 ">
                    <div class="flex flex-col lg:flex-row mb-8 lg:mb-0">
                        <a href="" class="text-black lg:mr-9 mb-8 lg:mb-0 justify-items-end">Nosotros</a>
                    </div>
                    <div class="flex flex-col lg:flex-row text-center">
                        <a href="#"
                            class="text-black bg-amber-100 py-4 px-5 rounded-lg hover:bg-amber-300 hover:text-white transition duration-500 case-in-out lg:mr-5 mb-8 lg:mb-0">Registrarse</a>
                        <a href="#"
                            class="text-black bg-gradient-to-b from-amber-400 to-amber-100 py-4 px-5 rounded-lg hover:bg-amber-300 hover:text-white transition duration-500 case-in-out mb-8 lg:mb-0">Iniciar
                            Sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
@endsection

@section('contenido')
    <section class="wrapper1">
        <div class="wrapper2">
            <h1 class="text1 text-3xl">
                <strong>En cada colmena, una historia.<br>Monitoreamos, cosechamos<br> y cuidamos la vida.</strong>
            </h1>
            <div class="abeja1"></div>
            <div class="abeja2"></div>
            <div class="circulo"></div>
        </div>



    </section>
@endsection

@section('footer')
    {{-- w-max h-fit --}}
    <footer>
        <div class="p-10  bg-gradient-to-b from-amber-400 to-amber-100 text-gray-200">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap2">
                    <div class="flex flex-grow items-center bg-center ">
                        <a href="#">
                            <img src="/images/logo.svg" class="h-32">
                        </a>
                    </div>
                    <div class="mb-5">

                        <strong class="text-2xl">UBICACIÓN</strong><br>
                        <p class="text-gray-900 pt-12 text-xl">
                            Calle 5 #5-55 <br>
                            Centro <br>
                            Popayán <br>
                            Cauca <br><br>
                            <strong>Telefono:</strong> 3152680986 <br>
                            <strong>Email:</strong> empabee@apicultura.com
                        </p>
                    </div>

                    <div>
                        <strong class="text-2xl">SABER MÁS</strong><br>
                        <ul class="grid gap-y-4 pt-4 text-gray-900">
                            {{-- <li class="pb-4 text-xl"><i class="fa fa-chevron-right texgray-700"></i><a href="#"
                                    class="hover:text-white"> Licencia</a> </li> --}}
                            <li class="pb-4 text-xl"><i class="fa fa-chevron-right text-gray-700"></i><a href="#"
                                    class="hover:text-white"> Sobre nosotros</a> </li>
                            <li class="pb-4 text-xl"><i class="fa fa-chevron-right text-gray-700"></i><a href="#"
                                    class="hover:text-white"> Ayuda</a> </li>
                        </ul>
                    </div>

                    <div class="mb-5">
                        <strong class="text-2xl">RECURSOS</strong><br>
                        <ul class="grid gap-y-4 pt-4 text-gray-900">
                            <li class="pb-4 text-xl"><i class="fa fa-chevron-right text-gray-700"></i><a href="#"
                                    class="hover:text-white"> Descargar ahora</a></li>
                        </ul>
                        <div class="pt-8 w-max h-fit">
                            <a href="#">
                                <img src="/images/play2.svg" class="h-18">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full bg-gray-800 text-gray-500 px-18 ">
            <div class="max-w-7xl flex flex-col sm:flex-row py-4 mx-auto justify-between items-center">
                <div class="text-center">
                    <div>
                        © 2024 <strong>Empabee UI Kit.</strong> All rights reserved
                    </div>
                </div>
                <div class="text-center text-xl text-white mb-2   lg:py-0 px-8 sm:px-24 lg:px-0">
                    <a href="https://twitter.com/?lang=es"
                        class="w-10 h-10 rounded-full bg-amber-400 hover:bg-amber-600 mx-1 inline-block pt-1"><i
                            class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/"
                        class="w-10 h-10 rounded-full bg-amber-400 hover:bg-amber-600 mx-1 inline-block pt-1"><i
                            class="fa fa-facebook"></i></a>
                    <a href="https://www.instagram.com/"
                        class="w-10 h-10 rounded-full bg-amber-400 hover:bg-amber-600 mx-1 inline-block pt-1"><i
                            class="fa fa-instagram"></i></a>
                </div>

            </div>
        </div>
    </footer>
@endsection


@section('javascript')
    <script src="/js/home.js"></script>
@endsection
