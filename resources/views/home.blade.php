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
                <div class="logonav flex flex-grow pl-20 items-center">
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
                            class="text-black bg-amber-200 py-4 px-5 rounded-lg hover:bg-amber-300 hover:text-white transition duration-200 case-in-out lg:mr-5 mb-8 lg:mb-0">Registrarse</a>
                        <a href="#"
                            class="text-black bg-gradient-to-b from-amber-600 to-amber-100 py-4 px-5 rounded-lg hover:bg-amber-300 hover:text-white transition duration-200 case-in-out mb-8 lg:mb-0">Iniciar
                            Sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
@endsection

@section('hero')
    <section class="wrapper1">
        <div class="wrapper2">
            <h1 class="text1 text-5xl">
                <strong>En cada colmena, una historia.<br>Monitoreamos, cosechamos<br> y cuidamos la vida.</strong>
            </h1>
            <div class="abeja1"></div>
            <div class="abeja2"></div>
            <div class="circulo"></div>
        </div>
    </section>
@endsection


@section('beneficio')
    <section class="ben bg-blue-400">
        <div>
            <h1 class="titulo">Beneficios de Nuestra Plataforma</h1>
            <h2 class="subt">Potencia tu producción de miel con nuestro monitoreo en tiempo real. Maximiza eficiencia,
                protege abejas y garantiza sostenibilidad.</h2>
        </div>

    </section>
@endsection


@section('nosotros')
    <section class="nosotros">
        <div class="">
            <h1 class="titulo text-3xl ">Apicultura con Corazón y Tecnología</h1>
            <h2>Aprende más sobre nuestra historia y visión de la apicultura moderna.</h2>
        </div>
    </section>



    {{-- <section class="nosotros">
    <div class="nos1"
        style="width: 100%; height: 100%; position: relative; flex-direction: column; justify-content: flex-start; align-items: flex-start; display: inline-flex">
        <div class="nos2"
            style="width: 248.26px; background: white; justify-content: flex-start; align-items: center; gap: 15.28px; display: inline-flex">
            <div class="nos3"
                style="flex: 1 1 0; flex-direction: column; justify-content: flex-start; align-items: flex-start; display: inline-flex">
                <div class="nos4"
                    style="align-self: stretch; color: #111827; font-size: 36px; font-family: Inter; font-weight: 700; line-height: 45px; word-wrap: break-word">
                    Tecnología Eficaz</div>
            </div>
        </div>
        <div
            style="width: 248.26px; background: white; justify-content: flex-start; align-items: center; gap: 15.28px; display: inline-flex">
            <div
                style="flex: 1 1 0; flex-direction: column; justify-content: flex-start; align-items: flex-start; display: inline-flex">
                <div
                    style="align-self: stretch; color: #111827; font-size: 36px; font-family: Inter; font-weight: 700; line-height: 45px; word-wrap: break-word">
                    Pasión por las Abejas</div>
            </div>
        </div>
        <div style="width: 57.29px; height: 57.29px; position: relative">
            <div
                style="width: 42.24px; height: 29.93px; left: 7.53px; top: 15.88px; position: absolute; background: #F7A733">
            </div>
            <div
                style="width: 13.92px; height: 9.74px; left: 21.69px; top: 10.09px; position: absolute; background: #F7A733">
            </div>
            <div
                style="width: 6.64px; height: 10.80px; left: 25.32px; top: 19.84px; position: absolute; background: #F7A733">
            </div>
            <div
                style="width: 12.27px; height: 5.37px; left: 22.51px; top: 30.64px; position: absolute; background: #F7A733">
            </div>
            <div
                style="width: 18.11px; height: 5.37px; left: 19.59px; top: 36.01px; position: absolute; background: #F7A733">
            </div>
            <div
                style="width: 18.11px; height: 5.37px; left: 19.59px; top: 41.38px; position: absolute; background: #F7A733">
            </div>
            <div
                style="width: 14.97px; height: 4.06px; left: 21.16px; top: 46.75px; position: absolute; background: #F7A733">
            </div>
            <div style="width: 42.24px; height: 44.34px; left: 7.53px; top: 6.47px; position: absolute">
                <div
                    style="width: 18.11px; height: 9.43px; left: 12.06px; top: 34.91px; position: absolute; border: 1.49px white solid">
                </div>
                <div
                    style="width: 12.27px; height: 0px; left: 14.99px; top: 29.54px; position: absolute; border: 1.49px white solid">
                </div>
                <div
                    style="width: 6.64px; height: 0px; left: 17.80px; top: 24.17px; position: absolute; border: 1.49px white solid">
                </div>
                <div
                    style="width: 21.12px; height: 29.93px; left: 0px; top: 9.41px; position: absolute; border: 1.49px white solid">
                </div>
                <div
                    style="width: 21.12px; height: 29.93px; left: 21.12px; top: 9.41px; position: absolute; border: 1.49px white solid">
                </div>
                <div
                    style="width: 13.92px; height: 7.57px; left: 14.16px; top: 3.63px; position: absolute; border: 1.49px white solid">
                </div>
                <div
                    style="width: 2.83px; height: 3.62px; left: 15.02px; top: -0px; position: absolute; border: 1.49px white solid">
                </div>
                <div
                    style="width: 2.83px; height: 3.62px; left: 24.39px; top: -0px; position: absolute; border: 1.49px white solid">
                </div>
                <div
                    style="width: 14.97px; height: 0px; left: 13.64px; top: 40.28px; position: absolute; border: 1.49px white solid">
                </div>
                <div
                    style="width: 0px; height: 0.48px; left: 12.06px; top: 34.43px; position: absolute; border: 1.49px white solid">
                </div>
                <div
                    style="width: 0px; height: 0.48px; left: 30.17px; top: 34.43px; position: absolute; border: 1.49px white solid">
                </div>
            </div>
        </div>
        <div style="width: 57.29px; height: 57.29px; position: relative">
            <div
                style="width: 44.37px; height: 46.75px; left: 6.46px; top: 5.27px; position: absolute; background: #F7A733">
            </div>
        </div>
        <div
            style="width: 248.26px; height: 57.29px; color: black; font-size: 19.10px; font-family: Inter; font-weight: 700; line-height: 18.14px; word-wrap: break-word">
            Herramientas personalizadas para monitoreo y gestión apícola</div>
        <div
            style="width: 248.26px; height: 57.29px; color: black; font-size: 19.10px; font-family: Inter; font-weight: 700; line-height: 18.14px; word-wrap: break-word">
            Amamos y respetamos a nuestras abejas.</div>
    </div>

    </section> --}}
@endsection

@section('footer')
    {{-- w-max h-fit --}}
    <footer>
        <div class="p-10  bg-gradient-to-b from-amber-400 to-amber-100 text-gray-200">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap2">
                    <div class="logofut flex flex-grow items-center bg-center">
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
