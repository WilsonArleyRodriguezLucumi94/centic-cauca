@props(['categories', 'activeCategory'])

<div class="filters-wrap">
    <button 
        class="filter-btn {{ $activeCategory === 'all' ? 'active' : '' }}" 
        data-cat="all"
        onclick="setFilter('all', this)"
    >
        <span class="dot dot-all"></span> Todos
    </button>

    @foreach($categories as $category)
        <button 
            class="filter-btn {{ $activeCategory === $category->slug ? 'active' : '' }}" 
            data-cat="{{ $category->slug }}"
            onclick="setFilter('{{ $category->slug }}', this)"
        >
            <span class="dot dot-{{ $category->slug }}"></span> {{ $category->name }}
        </button>
    @endforeach
</div>