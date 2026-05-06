@props(['eyebrow', 'title', 'subtitle'])

<section class="hero">
    <div class="hero-eyebrow">{{ $eyebrow }}</div>
    <h1>{!! $title !!}</h1>
    <p>{{ $subtitle }}</p>
</section>