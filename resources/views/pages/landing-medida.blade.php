@extends('layouts.public')

@push('meta')
@php
    $structuredData = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'Organization',
                '@id' => url('/') . '#organization',
                'name' => 'Ruguex',
                'url' => url('/'),
                'logo' => asset('img/home/logo-ruguex.png'),
            ],
            [
                '@type' => 'WebSite',
                '@id' => url('/') . '#website',
                'url' => url('/'),
                'name' => 'Ruguex',
                'publisher' => ['@id' => url('/') . '#organization'],
                'inLanguage' => 'es-MX',
            ],
            [
                '@type' => 'WebPage',
                '@id' => url()->current() . '#webpage',
                'url' => url()->current(),
                'name' => $seo['title'],
                'description' => $seo['description'],
                'isPartOf' => ['@id' => url('/') . '#website'],
                'about' => ['@id' => url('/') . '#organization'],
                'inLanguage' => 'es-MX',
            ],
            [
                '@type' => 'FAQPage',
                '@id' => url()->current() . '#faq',
                'mainEntity' => collect($landing['faq'])->map(fn ($item) => [
                    '@type' => 'Question',
                    'name' => $item['q'],
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $item['a'],
                    ],
                ])->values()->all(),
            ],
        ],
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($structuredData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<div class="rgx-landing">
    <section class="rgx-hero" style="background-image:url('{{ asset($landing['hero_image']) }}');">
        <div class="ruguex-container rgx-hero__inner">
            <span class="rgx-badge">{{ $landing['badge'] }}</span>
            <h1 class="rgx-title">{{ $landing['title'] }}</h1>
            <p class="rgx-subtitle">{{ $landing['description'] }}</p>

            <div class="rgx-btns">
                <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Cotiza ahora</a>
                <a class="rgx-btn rgx-btn-secondary" href="{{ $landing['shop_url'] }}" target="_blank" rel="noopener">Compra en línea</a>
            </div>
        </div>
    </section>

    <section class="rgx-band">
        <div class="ruguex-container">
            <p>25% más vida llanta contra llanta, GARANTIZADO por escrito.</p>
        </div>
    </section>

    <section class="rgx-section rgx-accent">
        <div class="ruguex-container rgx-grid-2">
            <div>
                <h2 class="rgx-h2">{{ $landing['intro_title'] }}</h2>
                <p class="rgx-text">{{ $landing['intro_text_1'] }}</p>
                <p class="rgx-text">{{ $landing['intro_text_2'] }}</p>

                <div class="rgx-block-cta">
                    <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Solicitar asesoría</a>
                    <a class="rgx-btn rgx-btn-secondary-dark" href="{{ $landing['shop_url'] }}" target="_blank" rel="noopener">Ver opciones</a>
                </div>
            </div>

            <div class="rgx-cover" style="background-image:url('{{ asset($landing['intro_image']) }}');"></div>
        </div>
    </section>

    <section class="rgx-section">
        <div class="ruguex-container">
            <div class="rgx-grid-cards">
                <div class="rgx-card rgx-card-dark">
                    <h3 class="rgx-h3">{{ $landing['solid_title'] }}</h3>
                    <p class="rgx-text">{{ $landing['solid_text'] }}</p>

                    <ul class="rgx-list">
                        @foreach ($landing['solid_items'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>

                    <div class="rgx-block-cta">
                        <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Cotizar llanta sólida</a>
                    </div>
                </div>

                <div class="rgx-card">
                    <h3 class="rgx-h3">{{ $landing['pneumatic_title'] }}</h3>
                    <p class="rgx-text">{{ $landing['pneumatic_text'] }}</p>

                    <ul class="rgx-list">
                        @foreach ($landing['pneumatic_items'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>

                    <div class="rgx-block-cta">
                        <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Cotizar llanta neumática</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="rgx-section rgx-light">
        <div class="ruguex-container rgx-grid-2">
            <div>
                <img class="rgx-img" src="{{ asset($landing['uses_image']) }}" alt="{{ $landing['title'] }}">
            </div>

            <div>
                <h2 class="rgx-h2">{{ $landing['uses_title'] }}</h2>
                <p class="rgx-text">{{ $landing['uses_text'] }}</p>

                <ul class="rgx-list">
                    @foreach ($landing['uses_items'] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>

                <div class="rgx-block-cta">
                    <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Quiero una recomendación</a>
                </div>
            </div>
        </div>
    </section>

    <section class="rgx-section">
        <div class="ruguex-container">
            <h2 class="rgx-h2 rgx-text-center">Ventajas de comprar tus llantas con Ruguex</h2>
            <p class="rgx-subtitle rgx-text-center">No solo te ayudamos a comprar una llanta: te ayudamos a elegir la mejor opción para la aplicación real de tu equipo.</p>

            <div class="rgx-grid-3">
                <div class="rgx-card">
                    <h3 class="rgx-h3">Asesoría técnica</h3>
                    <p class="rgx-text">Te orientamos para elegir la mejor opción según el piso, el nivel de exigencia y el riesgo de ponchadura.</p>
                </div>
                <div class="rgx-card">
                    <h3 class="rgx-h3">Entrega inmediata</h3>
                    <p class="rgx-text">Disponibilidad en productos seleccionados para reducir tiempos de espera y mantener tu operación activa.</p>
                </div>
                <div class="rgx-card">
                    <h3 class="rgx-h3">Respaldo comercial</h3>
                    <p class="rgx-text">Atención por WhatsApp, teléfono y correo, con seguimiento para cotización o compra.</p>
                </div>
            </div>

            <div class="rgx-block-cta-center">
                <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Solicitar cotización</a>
            </div>
        </div>
    </section>

    <section class="rgx-section rgx-accent">
        <div class="ruguex-container rgx-grid-2">
            <div>
                <h2 class="rgx-h2">{{ $landing['distributor_title'] }}</h2>
                <p class="rgx-text">{{ $landing['distributor_text_1'] }}</p>
                <p class="rgx-text">{{ $landing['distributor_text_2'] }}</p>

                <div class="rgx-block-cta">
                    <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Hablar con un asesor</a>
                </div>
            </div>

            <div class="rgx-cover" style="background-image:url('{{ asset($landing['distributor_image']) }}');"></div>
        </div>
    </section>

    <section class="rgx-section">
        <div class="ruguex-container">
            <h2 class="rgx-h2 rgx-text-center">Preguntas frecuentes</h2>

            <div class="rgx-faq">
                @foreach ($landing['faq'] as $item)
                    <details>
                        <summary>{{ $item['q'] }}</summary>
                        <p>{{ $item['a'] }}</p>
                    </details>
                @endforeach
            </div>

            <div class="rgx-block-cta-center">
                <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Resolver mis dudas y cotizar</a>
            </div>
        </div>
    </section>

    <section class="rgx-section rgx-form-section" id="cotizacion">
        <div class="ruguex-container">
            <div class="rgx-form-box rgx-form-box-dark lg:text-[35px]">
                <h2 class="rgx-contacto-h2 rgx-text-center">Cotiza tus llantas para minicargador</h2>
                <p class="rgx-contacto-subtitle rgx-text-center">
                    Te ayudamos a elegir la mejor opción para tu operación: sólida o neumática.
                </p>

                <div id="{{ $landing['hubspot_target'] }}"></div>
            </div>
        </div>
    </section>

    <section class="rgx-section">
        <div class="ruguex-container">
            <div class="rgx-cta-final">
                <h2 class="rgx-h2">{{ $landing['cta_title'] }}</h2>
                <p class="rgx-text">{{ $landing['cta_text'] }}</p>

                <div class="rgx-btns rgx-btns-center">
                    <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Solicitar cotización</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="//js.hsforms.net/forms/shell.js" charset="utf-8"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (window.hbspt) {
        hbspt.forms.create({
            region: "na1",
            portalId: "7547674",
            formId: "f8177bc5-6a7b-4364-92a4-1731bef2ecdd",
            target: "#{{ $landing['hubspot_target'] }}"
        });
    }
});
</script>
@endpush