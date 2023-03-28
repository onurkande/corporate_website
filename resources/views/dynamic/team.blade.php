@extends('layouts.dynamic')
@section('title','TEAM')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
		        
                

                @if($record)
                    <form method="post" action="team-update" enctype="multipart/form-data">
                        @csrf
                        <div style="display:grid; grid-template-columns:1fr 1fr;">
                            <input type="text" name="title" value="{{$record->title}}">
                            <input type="text" name="content" value="{{$record->content}}">
                        </div>
                        <br>
                        @if($record->employee != null)
                            @php
                                $employee=json_decode($record->employee, TRUE);
                            @endphp
                            

                            @foreach($employee as $single)
                            <div >
                                <br>
                                <br>
                                <img style="width:250px" src="{{ asset('images/' . $single['image']) }}">
                                <input type="hidden" name="oldImage[]" value="{{$single['image']}}">
                                <input type="file" name="image[]">
                                <br>
                                <input type="text" name="name[]" value="{{$single['name']}}">
                                <input type="text" name="task[]" value="{{$single['task']}}">
                                <a href="{{route('team-delete', ['name'=>$single['name']])}}"> sil </a>
                                
                            </div>
                            <br>
                            @endforeach
                            <hr>
                            <section id="more-employee">

                            </section>
                           
                        @else
                            <div style="display:grid; grid-template-columns:1fr 1fr 1fr;">
                                <input type="file" name="image[]">
                                <input type="text" name="name[]">
                                <input type="text" name="task[]">
                            </div>
                            <hr>
                            <section id="more-employee">
                                
                            </section>
                        @endif
                        <br>
                        <div>
                            <a onclick="addEmployee()">+</a>
                            <a onclick="removeEmployee()">-</a>
                        </div>
                        
                        <input type="submit" value="güncelle">
                    </form>
                @else
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="title">
                        <input type="text" name="content">
                        <input type="text" name="name">
                        <input type="text" name="task">
                        <br>
                        <input type="file" name="image">
                        <section id="more-employee">

                        </section>
                        <input type="submit" value="kaydet">
                    </form>
                @endif

                

            </div>
        </div>
    </div>

    <script>
        function addEmployee()
        {
            const moreEmployee = document.getElementById('more-employee');
            const row = document.createElement("div");
            row.innerHTML = '<div><input type="file" name="image[]" required><input type="text" name="name[]" required><input type="text" name="task[]" required></div>';
            moreEmployee.appendChild(row);
        }

        function removeEmployee()
        {
            const employeeSection = document.getElementById("more-employee");
            const lastEmployee = employeeSection.querySelector("div:last-child");
            lastEmployee.parentElement.removeChild(lastEmployee);
        }
    </script>
@endsection
    



{{-- <x-app-layout>

    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Featured Project
            </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
		        
                

                @if($record)
                    <form method="post" action="team-update" enctype="multipart/form-data">
                        @csrf
                        <div style="display:grid; grid-template-columns:1fr 1fr;">
                            <input type="text" name="title" value="{{$record->title}}">
                            <input type="text" name="content" value="{{$record->content}}">
                        </div>
                        <br>
                        @if($record->employee != null)
                            @php
                                $employee=json_decode($record->employee, TRUE);
                            @endphp
                            

                            @foreach($employee as $single)
                            <div >
                                <br>
                                <br>
                                <img style="width:250px" src="/storage/images/{{$single['image']}}">
                                <input type="hidden" name="oldImage[]" value="{{$single['image']}}">
                                <input type="file" name="image[]">
                                <br>
                                <input type="text" name="name[]" value="{{$single['name']}}">
                                <input type="text" name="task[]" value="{{$single['task']}}">
                                <a href="{{route('team-delete', ['name'=>$single['name']])}}"> sil </a>
                                
                            </div>
                            <br>
                            @endforeach
                            <hr>
                            <section id="more-employee">

                            </section>
                           
                        @else
                            <div style="display:grid; grid-template-columns:1fr 1fr 1fr;">
                                <input type="file" name="image[]">
                                <input type="text" name="name[]">
                                <input type="text" name="task[]">
                            </div>
                            <hr>
                            <section id="more-employee">
                                
                            </section>
                        @endif
                        <br>
                        <div>
                            <a onclick="addEmployee()">+</a>
                            <a onclick="removeEmployee()">-</a>
                        </div>
                        
                        <input type="submit" value="güncelle">
                    </form>
                @else
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="title">
                        <input type="text" name="content">
                        <input type="text" name="name">
                        <input type="text" name="task">
                        <br>
                        <input type="file" name="image">
                        <section id="more-employee">

                        </section>
                        <input type="submit" value="kaydet">
                    </form>
                @endif

                

            </div>
        </div>
    </div>

    <script>
        function addEmployee()
        {
            const moreEmployee = document.getElementById('more-employee');
            const row = document.createElement("div");
            row.innerHTML = '<div><input type="file" name="image[]" required><input type="text" name="name[]" required><input type="text" name="task[]" required></div>';
            moreEmployee.appendChild(row);
        }

        function removeEmployee()
        {
            const employeeSection = document.getElementById("more-employee");
            const lastEmployee = employeeSection.querySelector("div:last-child");
            lastEmployee.parentElement.removeChild(lastEmployee);
        }
    </script>
</x-app-layout> --}}