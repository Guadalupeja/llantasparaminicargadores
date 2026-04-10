@extends('layouts.public')

@section('content')
<section class="relative overflow-hidden">
    <div class="absolute inset-0">
        <x-responsive-image
            path="heros/venta-de-llantas-para-montacargas.jpg"
            alt="Llantas para minicargador"
            class="h-full w-full object-cover object-center"
            sizes="100vw"
        />
    </div>

    <div class="absolute inset-0"></div>

    <div class="relative mx-auto flex min-h-[400px] max-w-[1140px] items-center px-[10px]">
        <div class="w-full py-[74px]">
            <div class="h-[64px] md:h-[138px]"></div>

            <div class="mb-5 text-center">
                <h1 class="font-['Roboto',sans-serif] text-[28px] font-semibold leading-[1.2] text-white md:text-[36px] md:leading-[36px]">
                    Muchas gracias por tu interés en breve un asesor se pondrá en contacto contigo.
                    <br><br>
                    Te invitamos a conocer nuestra tienda en línea.
                </h1>
            </div>

            <div class="h-[30px] md:h-[50px]"></div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="text-center">
                    <a
                        href="{{ url('https://llantasdemontacargas.com/tienda-en-linea/') }}"
                        class="inline-flex items-center justify-center rounded-[3px] bg-[#ff6400] px-6 py-3 font-['Roboto',sans-serif] text-[15px] font-medium leading-[15px] text-white transition duration-300 hover:bg-[#e65b00]"
                    >
                        IR A LA TIENDA EN LINEA
                    </a>
                </div>

                <div class="text-center">
                    <a
                        href="https://wa.me/528332395885"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center justify-center rounded-[3px] bg-[#009c05] px-6 py-3 font-['Roboto',sans-serif] text-[15px] font-medium leading-[15px] text-white transition duration-300 hover:bg-[#008a04]"
                    >
                        COTIZA POR WHATSAPP
                    </a>
                </div>
            </div>

            <div class="h-[40px] md:h-[74px]"></div>
        </div>
    </div>
</section>
@endsection