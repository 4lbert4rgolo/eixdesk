@extends('layouts.main')

@section('title', 'AlpDesk Solutions')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque uma Tarefa</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="procurar">
    </form>
</div>
<div id="tasks-container" class="col-md-12">
    @if($search)
        <h2>Buscando por: {{ $search }}</h2>
    @else
        <h2>Tarefas em andamento</h2>
    @endif
    <p class="subtitle">Verifique as tarefas que ainda não foram finalizadas</p>
    <div id="card-container" class="row">
        @foreach($tasks as $task)
        <div class="card col-md-3">
            <img src="img\tasks\{{ $task->image }}" alt="{{ $task->title}}">
            <div class="card-body">
                <p class="card-date">{{ date('d/m/y', strtotime($task->deadline)) }}</p>
                <h5 class="card-title">{{ $task->title }}</h5>
                <p class="card-responsible">Responsável</p>
                <a href="/tasks/{{ $task->id }}" class="btn btn-primary">Visualizar</a>
            </div>
        </div>
        @endforeach
        @if(count($tasks) == 0 && $search)
            <p>Não foi possível encontrar nenhuma tarefa com {{ $search }}! <a href="/">Ver todos!</a></p>
        @elseif(count($tasks) == 0)
            <p>Não há tarefas pendentes</p>
        @endif
    </div>
</div>
  
@endsection