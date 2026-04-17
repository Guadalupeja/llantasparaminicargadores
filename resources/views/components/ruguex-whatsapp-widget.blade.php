@php
    use Carbon\Carbon;

    $now = Carbon::now('America/Mexico_City');
    $isBusinessHours = $now->isWeekday() && $now->hour >= 9 && $now->hour < 18;

    $phone = '528332395885';
    $encodedMessage = rawurlencode('¡Hola RUGUEX! Tengo una pregunta.');
    $privacyUrl = url('/politica-de-privacidad');
    $logoUrl = asset('img/chat/logo-rgx.png');
@endphp

@if ($isBusinessHours)
<div
    x-data="{
        open: window.innerWidth >= 640,
        phone: '{{ $phone }}',
        message: '{{ $encodedMessage }}',
        privacyUrl: '{{ $privacyUrl }}',
        getWhatsAppUrl() {
            const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|Mobile/i.test(navigator.userAgent);
            return isMobile
                ? `https://wa.me/${this.phone}?text=${this.message}`
                : `https://web.whatsapp.com/send?phone=${this.phone}&text=${this.message}`;
        },
        openWhatsapp() {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ event: 'Click to Chat' });
            window.open(this.getWhatsAppUrl(), '_blank', 'noopener,noreferrer');
        }
    }"
    class="fixed inset-x-3 bottom-[132px] z-[9990] flex flex-col items-stretch gap-2 sm:inset-x-auto sm:right-5 sm:bottom-[132px] sm:items-end"
>
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-2 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-2 scale-95"
        class="w-full overflow-hidden rounded-[18px] border border-zinc-200 bg-white shadow-[0_16px_36px_rgba(15,23,42,0.18)] sm:w-[270px]"
        style="display: none;"
    >
        <div class="relative overflow-hidden bg-[#e76a3e] px-3.5 pb-3.5 pt-3.5 text-white">
            <button
                type="button"
                @click="open = false"
                class="absolute right-3 top-3 flex h-7 w-7 items-center justify-center rounded-full bg-white/15 text-[18px] leading-none text-white transition hover:bg-white/25"
                aria-label="Cerrar chat de WhatsApp"
            >
                ×
            </button>

            <div class="flex items-start gap-2.5 pr-8">
                <div class="flex h-9 w-9 shrink-0 items-center justify-center overflow-hidden rounded-full bg-black ring-2 ring-white/20">
                    <img
                        src="{{ $logoUrl }}"
                        alt="Ruguex"
                        class="h-full w-full object-cover"
                        loading="lazy"
                    >
                </div>

                <div class="pt-0.5">
                    <p class="text-[13px] font-extrabold uppercase leading-none">RUGUEX</p>

                    <div class="mt-1.5 flex items-start gap-1.5 text-[10px] leading-4 text-white/95">
                        <span class="mt-1 inline-block h-2 w-2 rounded-full bg-green-400"></span>
                        <span>Normalmente responde en cuestión de minutos.</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white px-3.5 py-3.5">
            <div class="rounded-[16px] border border-green-100 bg-[#e9f8d8] px-4 py-3 text-[12px] leading-6 text-zinc-800">
                ¿Tienes alguna pregunta? Estoy encantado de poder ayudarte.
            </div>

            <button
                type="button"
                @click="openWhatsapp"
                class="mt-3 inline-flex w-full items-center justify-center gap-2 rounded-full bg-[#25D366] px-4 py-2.5 text-[14px] font-bold text-white shadow-[0_10px_22px_rgba(37,211,102,0.22)] transition hover:-translate-y-0.5 hover:bg-[#1fbe59]"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="h-4 w-4 fill-current" aria-hidden="true">
                    <path d="M19.11 17.25c-.27-.14-1.58-.78-1.83-.87-.24-.09-.42-.14-.6.14-.18.27-.69.86-.84 1.04-.16.18-.31.2-.58.07-.27-.14-1.14-.42-2.18-1.35-.81-.72-1.35-1.6-1.51-1.87-.16-.27-.02-.41.12-.55.12-.12.27-.31.4-.47.13-.16.18-.27.27-.45.09-.18.04-.34-.02-.47-.07-.14-.6-1.45-.82-1.99-.22-.52-.44-.45-.6-.46h-.51c-.18 0-.47.07-.72.34-.25.27-.95.93-.95 2.27 0 1.34.97 2.63 1.11 2.82.13.18 1.9 2.91 4.61 4.08.65.28 1.16.45 1.56.58.66.21 1.25.18 1.73.11.53-.08 1.58-.65 1.8-1.28.22-.63.22-1.16.16-1.28-.07-.11-.25-.18-.51-.31z"/>
                    <path d="M16.01 3.2c-6.99 0-12.64 5.66-12.64 12.64 0 2.22.58 4.39 1.67 6.29L3.2 28.8l6.84-1.79a12.6 12.6 0 0 0 5.97 1.52h.01c6.98 0 12.64-5.66 12.64-12.64S22.99 3.2 16.01 3.2zm0 23.16h-.01a10.5 10.5 0 0 1-5.35-1.47l-.38-.22-4.06 1.06 1.08-3.96-.25-.41a10.48 10.48 0 0 1-1.61-5.6c0-5.82 4.74-10.56 10.57-10.56 2.82 0 5.47 1.1 7.46 3.1 1.99 1.99 3.09 4.64 3.09 7.46 0 5.83-4.74 10.57-10.56 10.57z"/>
                </svg>
                <span>Enviar WhatsApp</span>
            </button>
        </div>

        <div class="border-t border-zinc-200 bg-zinc-50 px-3.5 py-2 text-center text-[11px] text-zinc-600">
            <span class="font-medium text-green-600">● En línea</span>
            <span class="mx-1.5 text-zinc-300">|</span>
            <a href="{{ $privacyUrl }}" class="transition hover:text-zinc-900">
                Política de privacidad
            </a>
        </div>
    </div>

    <button
        type="button"
        @click="open = !open"
        class="inline-flex w-full items-center justify-between gap-2 rounded-full border border-zinc-200 bg-white px-3 py-2 text-[13px] font-semibold text-zinc-800 shadow-[0_10px_22px_rgba(0,0,0,0.14)] transition hover:-translate-y-0.5 hover:shadow-[0_14px_28px_rgba(0,0,0,0.18)] sm:w-auto sm:justify-start"
        aria-label="Abrir chat de WhatsApp Ruguex"
    >
        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#25D366]">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="h-4 w-4 fill-current text-white" aria-hidden="true">
                <path d="M19.11 17.25c-.27-.14-1.58-.78-1.83-.87-.24-.09-.42-.14-.6.14-.18.27-.69.86-.84 1.04-.16.18-.31.2-.58.07-.27-.14-1.14-.42-2.18-1.35-.81-.72-1.35-1.6-1.51-1.87-.16-.27-.02-.41.12-.55.12-.12.27-.31.4-.47.13-.16.18-.27.27-.45.09-.18.04-.34-.02-.47-.07-.14-.6-1.45-.82-1.99-.22-.52-.44-.45-.6-.46h-.51c-.18 0-.47.07-.72.34-.25.27-.95.93-.95 2.27 0 1.34.97 2.63 1.11 2.82.13.18 1.9 2.91 4.61 4.08.65.28 1.16.45 1.56.58.66.21 1.25.18 1.73.11.53-.08 1.58-.65 1.8-1.28.22-.63.22-1.16.16-1.28-.07-.11-.25-.18-.51-.31z"/>
                <path d="M16.01 3.2c-6.99 0-12.64 5.66-12.64 12.64 0 2.22.58 4.39 1.67 6.29L3.2 28.8l6.84-1.79a12.6 12.6 0 0 0 5.97 1.52h.01c6.98 0 12.64-5.66 12.64-12.64S22.99 3.2 16.01 3.2zm0 23.16h-.01a10.5 10.5 0 0 1-5.35-1.47l-.38-.22-4.06 1.06 1.08-3.96-.25-.41a10.48 10.48 0 0 1-1.61-5.6c0-5.82 4.74-10.56 10.57-10.56 2.82 0 5.47 1.1 7.46 3.1 1.99 1.99 3.09 4.64 3.09 7.46 0 5.83-4.74 10.57-10.56 10.57z"/>
            </svg>
        </span>

        <span class="truncate">Cotiza por WhatsApp</span>

        <span class="flex h-8 w-8 shrink-0 items-center justify-center overflow-hidden rounded-full bg-black ring-2 ring-white">
            <img
                src="{{ $logoUrl }}"
                alt="Ruguex"
                class="h-full w-full object-cover"
                loading="lazy"
            >
        </span>
    </button>
</div>
@endif