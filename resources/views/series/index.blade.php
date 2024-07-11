<x-layout title="Séries" :mensagem-sucesso="$mensagemSucesso">
    @auth
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-3">Adicionar</a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            @auth
            <a href="{{ route('seasons.index', $serie->id) }}" class="text-decoration-none">
                {{ $serie->nome }}
            </a>
            @else
            {{ $serie->nome }}
            @endauth

            @auth
            <div class="btn-group" role="group">
                <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">
                    Editar
                </a>

                <form action="{{ route('series.destroy', $serie->id) }}" method="post"
                    onsubmit="return confirm('Tem certeza que deseja excluir esta série?');" class="ms-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        Excluir
                    </button>
                </form>
            </div>
            @endauth
        </li>
        @endforeach
    </ul>
</x-layout>
