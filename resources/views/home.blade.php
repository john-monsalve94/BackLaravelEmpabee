@extends('layouts/template')

@section('estilos')
    <link rel="stylesheet" href="/css/estilos.css">
@endsection

@section('nav')
    <header>
        <nav class=" bg-white py-6 relative text-center">
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

                {{-- <div class="flex lg:hidden cursor-pointer">
                    <img src="/images/menu.svg" onclick="openMenu();">
                </div>

                <div id="menu"
                    class="lg:flex hidden flex-grow justify-end absolute lg:relative lg:top-0 top-28 left-0 bg-white w-full lg:w-auto items-center py-14 lg:py-0 px-8 sm:px-24 lg:px-0 ">
                    <div class="flex flex-col lg:flex-row mb-8 lg:mb-0">
                        <a href="" class="text-black lg:mr-9 mb-8 lg:mb-0 justify-items-end">Nosotros</a>
                    </div>
                    <div class="flex flex-col lg:flex-row text-center">
                        <a href="register"
                            class="text-black bg-amber-200 py-4 px-5 rounded-lg hover:bg-amber-300 hover:text-white transition duration-200 ease-in-out lg:mr-5 mb-8 lg:mb-0">Registrarse</a>
                        <a href="login"
                            class="text-black bg-gradient-to-b from-amber-600 to-amber-100 py-4 px-5 rounded-lg hover:bg-amber-300 hover:text-white transition duration-200 ease-in-out mb-8 lg:mb-0">Iniciar
                            Sesión</a>
                    </div>
                </div> --}}

                {{-- AQUÍ --}}


                <input type="checkbox" id="menu" class="peer hidden">
                <label for="menu"
                    class="bg-open-menu w-6 h-5 bg-cover bg-center cursor-pointer peer-checked:bg-close-menu transition-all z-50 md:hidden"></label>

                <div
                    class="fixed inset-0 bg-gradient-to-b from-amber-200/70 to-black/70 translate-x-full peer-checked:translate-x-0 transition-transform z-40 md:static md:bg-none md:translate-x-0">

                    <ul
                        class="absolute inset-x-0 top-24 p-12 bg-white w-[90%] mx-auto rounded-md h-max text-center grid gap-6 font-sans text-dark-blue md:w-max md:bg-transparent md:p-0 md:grid-flow-col sm:grid-flow-col md:static">

                        <li class="nos m-5">
                            <a href="nosotros" class="textnos text-black lg:mr-9 mb-8 lg:mb-0 ">Nosotros</a>
                        </li>

                        <div class=" flex flex-col md:flex-row sm:flex-col gap-3 lg:flex-row text-center">
                            <a href="register"
                                class="text-black bg-amber-200 py-4 px-5 rounded-lg hover:bg-amber-300 hover:text-white transition duration-200 ease-in-out lg:mr-5 mb-8 lg:mb-0">Registrarse</a>
                            <a href="login"
                                class="text-black bg-gradient-to-b from-amber-600 to-amber-100 py-4 px-5 rounded-lg hover:bg-amber-300 hover:text-white transition duration-200 ease-in-out mb-8 lg:mb-0">Iniciar
                                Sesión</a>
                        </div>
                    </ul>



                </div>


                {{-- AQUÍ --}}


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
    <section class="ben pt-20 w-full ">
        <div>
            <h1 class="tituloben">Beneficios de Nuestra Plataforma</h1>
            <h2 class="subt">Potencia tu producción de miel con nuestro monitoreo en tiempo real. Maximiza eficiencia,
                protege abejas y garantiza sostenibilidad.</h2>
        </div>
        <div>
            <ul class="honeycomb py-36">
                <li class="honeyicons">
                    {{-- <div class="fondoicon"></div> --}}
                    <div class="honey_title1">Mejora de la Eficiencia</div>
                    <img class="honey_img1 " src="/images/imgcolmena/engranaje.svg" alt="">
                    <img class="honey_img_1">
                    <h3 class="subhoney1">Selección precisa de procesos para aumentar la eficiencia de extracción y
                        producción.</h3>
                </li>
                <li class="honeyicons">
                    <div class="honey_title2">Mejora de la eficiencia</div>
                    <img class="honey_img2" src="/images/imgcolmena/abejaicon.svg" alt="">
                    <img class="honey_img" src="" alt="">
                    <h3 class="subhoney2">Alertas tempranas y menos interacción humana para preservar la salud de las
                        colmenas.</h3>
                </li>
                <li class="honeyicons">
                    <div class="honey_title3">Mejora de la eficiencia</div>
                    <img class="honey_img3" src="/images/imgcolmena/cell.svg" alt="">
                    <img class="honey_img" src="" alt="">
                    <h3 class="subhoney3">Control de colmenas desde dispositivos móviles, en cualquier lugar y momento, para
                        una gestión ágil y eficiente.</h3>
                </li>
                <li class="honeyicons">
                    <div class="honey_title4">Mejora de la eficiencia</div>
                    <img class="honey_img4" src="/images/imgcolmena/miel.svg" alt="">
                    <img class="honey_img" src="" alt="">
                    <h3 class="subhoney4">Datos en tiempo real para maximizar la producción de miel.</h3>
                </li>
                <li class="honeyicons ">
                    <div class="honey_title5">Mejora de la eficiencia</div>
                    <img class="honey_img5" src="/images/imgcolmena/matas.svg" alt="">
                    <img class="honey_img_5" src="" alt="">
                    <h3 class="subhoney5">Prácticas sostenibles para cumplir con los objetivos productivos y preservar el
                        medio ambiente.</h3>
                </li>
                {{-- <li class="honeyicons honeycomb_hidden"></li> --}}
            </ul>
        </div>

    </section>
@endsection

@section('nosotros')
    <section class="nosotros">
        <div class="">
            <h1 class="titulonos text-5xl ">Apicultura con Corazón <br> y Tecnología</h1>
            <h2 class="subnos pt-3">Aprende más sobre nuestra historia y visión de la <br> apicultura moderna.</h2>
            <a href="#">
                <div class="btnnos pt-">Descubre más</div>
            </a>
        </div>
        <div class="cuadro">
            <div class="intcuadro1">
                <img class="imgbee" src="/images/bee_icon.svg">
                <h2 class="tit1cuadro">Pasión por las <br> Abejas</h2>
                <p class="ptit1">Amamos y respetamos a nuestras abejas.</p>
            </div>
            <div class="intcuadro2">
                <img class="imgbee" src="/images/rating.svg">
                <h2 class="tit2cuadro">Monitoreo Eficiente</h2>
                <p class="ptit2">Mejoramos el monitoreo de la miel con soluciones prácticas..</p>
            </div>
            <div class="intcuadro3">
                <img class="imgbee" src="/images/cerebro.svg">
                <h2 class="tit3cuadro">Tecnología Eficaz</h2>
                <p class="ptit3">Herramientas personalizadas para monitoreo y gestión apícola</p>
            </div>
            <div class="intcuadro4 ">
                <img class="imgbee" src="/images/hands.svg">
                <h2 class="tit4cuadro">Tu Compañero de Confianza</h2>
                <p class="ptit4">Colaboramos contigo para fortalecer tu producción y comunidad.</p>
            </div>
        </div>

    </section>
@endsection

@section('compromisos')
    <section class="compromisos">
        <div>
            <img class="imgcom" src="/images/comillas.svg">
            <h3 class="titulocomp">¡Actúa Ahora por un Futuro Mejor!</h3>
            <p class="ptitcomp">"Tú puedes ser parte de la transformación hacia una apicultura más sostenible al unirte a
                nuestra causa".</p>
        </div>
        <div class="caja1">
            <img class="imgcom1" src="/images/minicomilla.svg">
            <h3 class="titcom1">Alianza Apícola</h3>
            <p class="ptitcom1">Trabajemos juntos para encontrar soluciones innovadoras y crear un entorno sostenible para
                nuestras abejas.
            </p>
        </div>
        <div class="caja2">
            <img class="imgcom2" src="/images/minicomilla.svg">
            <h3 class="titcom2">Solidaridad Apícola</h3>
            <p class="ptitcom2">Únete a nuestra red para promover una apicultura responsable y proteger a nuestras abejas.
            </p>
        </div>
        <div class="caja3">
            <img class="imgcom3" src="/images/minicomilla.svg">
            <h3 class="titcom3">Apicultura Solidaria</h3>
            <p class="ptitcom3">Únete a nuestra red para promover una apicultura responsable y proteger a nuestras abejas.
            </p>
        </div>
    </section>
@endsection

@section('sensores')
    <section class="sensores">
        <div class="container">

            <div class="slider">


                <input type="radio" name="slider" id="slideOne" checked>
                <input type="radio" name="slider" id="slideTwo">
                <input type="radio" name="slider" id="slideThree">

                <div class="buttons">
                    <label for="slideOne"></label>
                    <label for="slideTwo"></label>
                    <label for="slideThree"></label>
                </div>

                <div class="content">
                    <div class="firstslide">
                        <img class="img1slide" src="/images/ovalosensores1.svg" alt="">
                        <img class="img2slide" src="/images/ovalosensores2.svg" alt="">
                        <img class="img3slide" src="/images/temperatura.svg" alt="">
                        <h1 class="titulogeneral">Nuestros sensores</h1>
                        <div class="cajatit">
                            <h2 class="titsen">Sensor De Temperatura Sht31</h2>
                            <p class="ptitsen">El sensor digital SHT31 ofrece mediciones precisas de temperatura y humedad
                                relativa a bajo costo. Ideal para control de temperatura, aire acondicionado y monitoreo
                                ambiental agrícola.</p>
                        </div>
                    </div>

                    <div class="secondslide">
                        <img class="img1slide" src="/images/ovalosensores1.svg" alt="">
                        <img class="img2slide" src="/images/ovalosensores2.svg" alt="">
                        <img class="img3slide" src="/images/ph.svg" alt="">
                        <h1 class="titulogeneral">Nuestros sensores</h1>
                        <div class="cajatit">
                            <h2 class="titsen">Modulo Detector Ph Ph-4502c </h2>
                            <p class="ptitsen">El módulo sensor de pH PH-4502C mide el pH usando un electrodo. Funciona
                                con 5V y es compatible con dispositivos como Arduino, Raspberry Pi, etc., siempre que tengan
                                una entrada analógica disponible.</p>
                        </div>
                    </div>
                    <div class="thirdslide">
                        <img class="img1slide" src="/images/ovalosensores1.svg" alt="">
                        <img class="img2slide" src="/images/ovalosensores2.svg" alt="">
                        <img class="img3slide" src="/images/peso.svg" alt="">
                        <h1 class="titulogeneral">Nuestros sensores</h1>
                        <div class="cajatit">
                            <h2 class="titsen">Sensor De Fuerza Peso</h2>
                            <p class="ptitsen">La capacidad del sensor de carga es de hasta 110 libras o 55 kg. Este
                                dispositivo convierte la fuerza aplicada sobre él en una señal eléctrica, lo que permite
                                medir el peso de un objeto mediante un voltaje correspondiente.</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection

@section('appmovil')
    <section class="appmovil">
        <div>
            <img class="imgapp1" src="/images/login.png" alt="">
            <img class="imgapp2" src="/images/colmena.png" alt="">
            <a href="https://play.google.com/store/games?hl=es_CO&gl=US&pli=1">
                <img class="imgapp3 h-18" src="/images/play2.svg" alt="">
            </a>
            <h4 class="tituloapp">Gestiona tus colmenas desde cualquier lugar con nuestra app móvil.</h4>
            <p class="ptitapp">Descarga la aplicación móvil para monitorear tu producción de miel, registrar datos y
                optimizar tu trabajo de
                apicultura.</p>
        </div>
    </section>
@endsection

@section('contactenos')
    <section class="contactenos">
        <img class="imgcontact" src="/images/panal.png" alt="">

        <div class="container">
            <h1 class="titulocontact">Contactanos</h1>
            <h2 class="ptitcontact">¿Tienes alguna pregunta? Rellena el formulario para contactar con nuestro equipo.</h2>
            <form action="#" method="post">
                <label for="nombre">Nombre *</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>

                <label for="apellido">Apellido *</label>
                <input type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido" required>

                <label for="correo">Correo *</label>
                <input type="email" id="correo" name="correo" placeholder="Ingrese su correo electrónico"
                    required>

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="4" placeholder="Escriba su mensaje aquí"></textarea>

                <button class="btnform bg-gradient-to-b from-amber-600 to-amber-100" type="submit">Enviar</button>
            </form>
        </div>




        {{--
        <div class="caja-form">
            <form>

                <h3 class="titulocontact">Contactanos</h3>
                <p class="ptitcontact">¿Tienes alguna pregunta? Rellena el formulario para contactar con nuestro equipo</p>

                <div class="input-group">

                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" placeholder="Nombre">

                    <label for="phone">Telefono</label>
                    <input type="tel" name="phone" id="name" placeholder="Telefono">

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email">

                    <label for="message">Mensaje</label>
                    <textarea name="message" id="message" cols="30" rows="5" placeholder="Mensaje"></textarea>

                    <input class="btn" type="submit" value="Enviar">

                </div>

            </form>
        </div> --}}
    </section>
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
                        <p class="text-gray-900 pt-4 text-xl">
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
                            <a href="https://play.google.com/store/games?hl=es_CO&gl=US&pli=1">
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
                <div class="text-center text-xl text-white mb-2 lg:py-0 px-8 sm:px-24 xl:px-0 2xl:px-0">
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
