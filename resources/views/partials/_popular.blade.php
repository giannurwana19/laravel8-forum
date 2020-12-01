<div class="card">
    <div class="card-header">Populer</div>
    <div class="list-group">
        @forelse ($populars as $popular)
        <a href="{{ route('forums.show', $popular->slug) }}" class="list-group-item list-group-item-action" id="index_hover">{{ $popular->title }}</a>
        @empty
        @endforelse
    </div>
</div>
