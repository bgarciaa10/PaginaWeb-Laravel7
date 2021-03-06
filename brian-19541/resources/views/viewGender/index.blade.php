@extends('layouts.app')

@section('content')

    <br>
    <br>
    <br>
    <div class="container">
        <div class="card shadow-lg">
            <div class="card-header"   style="color: #1b1e21; background-color: #4aa0e6; font-weight: bold">
                <i class="fas fa-warehouse fa-1x"></i>
                Genero
            </div>
            <div class="card-body">
                <table class="table table-striped">

                    @if(count($viewGender))
                        <thead>
                        <tr class="text-center" >

                            <th scope="col">{{__('Nombre')}}</th>
                            <th scope="col">{{__('Editar')}}</th>
                            <th scope="col">{{__('Eliminar')}}</th>
                        </tr>

                        </thead>
                    @endif
                    <tbody>
                    @forelse($viewGender as $genders)
                        <tr class="text-center">

                            <td>{{$genders->name_gender}}</td>

                            <td>
                                <a href="{{route('gender.edit',['gender'=>$genders])}}">
                                    <button type="button" class="btn btn-outline-success">{{__('Editar')}}</button>
                                </a>
                            </td>
                            <td>
                                <form id="delete-gender-{{$genders->id}}" action="{{route('gender.destroy',['gender'=>$genders])}}" method="POST" class="     sweetalert-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">{{__('Eliminar')}}</button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <p class="text-center">No existe registros</p>
                    @endforelse
                    </tbody>
                </table>
                <span> {{$viewGender->links()}}</span>
                <a href="{{ url()->previous() }}"  class="btn btn-outline-secondary"><span> Cancelar</span></a>
            </div>
        </div>

    </div>

@endsection
