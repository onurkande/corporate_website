@extends('layouts.dynamic')
@section('title','TEAM')
@section('content')
    @if(session()->has('store'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('store') }}
    </div>
    <script>
        setTimeout(function() {
            $('.alert').fadeOut();
        }, 5000);
    </script>
    @endif

    @if(session()->has('update'))
    <div class="alert alert-info" role="alert">
        {{ session()->get('update') }}
    </div>
    <script>
        setTimeout(function() {
            $('.alert').fadeOut();
        }, 5000);
    </script>
    @endif

    @if(session()->has('delete'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('delete') }}
    </div>
    <script>
        setTimeout(function() {
            $('.alert').fadeOut();
        }, 5000);
    </script>
    @endif

    <div class="card">
        <div class="card-header">
            <h4>Info Box</h4>
        </div>
        <div class="card-body">
            @if($record)
                <form method="post" action="{{route('team-update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Title :</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{$record->title}}">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Content :</label>
                            <textarea name="content" class="form-control" placeholder="content">{{$record->content}}</textarea>
                        </div>
                    </div>
                    
                    <br>

                    @php
                        $images = json_decode($record->images, true);
                        $names = json_decode($record->names, true);
                        $tasks = json_decode($record->tasks, true);
                    @endphp

                    <div class="form-group row mb-3">
                        <label>Employees :</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Image:</label>
                                    @if($images)
                                        @foreach($images as $key => $image)
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <a href="{{ route('team-delete', $key) }}"><button class="btn-danger" type="button">Sil</button></a>
                                                </div>
                                                <div class="col-md-10">
                                                    <img src="{{asset('admin/teamImage/'.$image)}}" alt="Image" style="width: 100px; height: 100px;">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <section id="more-icons">
                                    </section>
                                </div>
                                <div class="col-md-4">
                                    <label>Name:</label>
                                    @if($names)
                                        @foreach($names as $key => $name)
                                            <input type="text" name="names[]" class="form-control" oninput="checkInputValues()" required placeholder="Name" value="{{$name}}">
                                        @endforeach
                                    @endif
                                    <section id="more-names">
                                    </section>
                                </div>
                                <div class="col-md-4">
                                    <label>Task:</label>
                                    @if($tasks)
                                        @foreach($tasks as $key => $task)
                                            <input type="text" name="tasks[]" class="form-control" oninput="checkInputValues()" required placeholder="Task" value="{{$task}}">
                                        @endforeach
                                    @endif
                                    <section id="more-tasks">
                                    </section>
                                </div>
                            </div>
                            <br>
                            <div>
                                <a onclick="addEmployee()"><button type="button">+</button></a>
                                <a onclick="removeEmployee()"><button type="button">-</button></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Güncelle</button>
                        </div>
                        <div class="col-md-4">
                            <a href="{{route('team-allDelete')}}"><button class="btn-danger btn-lg" type="button">Team Delete</button></a>
                        </div>
                    </div>
                </form>
            @else
                <form method="post" action="{{route('team-update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Title :</label>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Content :</label>
                            <textarea name="content" class="form-control" placeholder="content"></textarea>
                        </div>
                    </div>
                    
                    <br>

                    <div class="form-group row mb-3">
                        <label>Employees :</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Image:</label>
                                    <input type="file" name="images[]" class="form-control" oninput="checkInputValues()" required placeholder="Image">
                                    <section id="more-icons">
                                    </section>
                                </div>
                                <div class="col-md-4">
                                    <label>Name:</label>
                                    <input type="text" name="names[]" class="form-control" oninput="checkInputValues()" required placeholder="Name">
                                    <section id="more-names">
                                    </section>
                                </div>
                                <div class="col-md-4">
                                    <label>Task:</label>
                                    <input type="text" name="tasks[]" class="form-control" oninput="checkInputValues()" required placeholder="Task">
                                    <section id="more-tasks">
                                    </section>
                                </div>
                            </div>
                            <br>
                            <div>
                                <a onclick="addEmployee()"><button type="button">+</button></a>
                                <a onclick="removeEmployee()"><button type="button">-</button></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="display: block; width: 100%;">Kaydet</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <script>
        function addEmployee() {
            const moreImages = document.getElementById('more-icons');
            const moreNames = document.getElementById('more-names');
            const moreTasks = document.getElementById('more-tasks');

            const imageRow = document.createElement("div");
            imageRow.innerHTML = '<input type="file" class="form-control" name="images[]" oninput="checkInputValues()" required placeholder="Image">';
            moreImages.appendChild(imageRow);

            const nameRow = document.createElement("div"); 
            nameRow.innerHTML = '<input type="text" class="form-control" name="names[]" oninput="checkInputValues()" required placeholder="Name">';
            moreNames.appendChild(nameRow);

            const taskRow = document.createElement("div");
            taskRow.innerHTML = '<input type="text" class="form-control" name="tasks[]" oninput="checkInputValues()" required placeholder="Task">';
            moreTasks.appendChild(taskRow);
        }

        function removeEmployee() {
            const imagesSection = document.getElementById("more-icons");
            const namesSection = document.getElementById("more-names");
            const tasksSection = document.getElementById("more-tasks");

            if (imagesSection.children.length > 0) {
                imagesSection.removeChild(imagesSection.lastElementChild);
            }

            if (namesSection.children.length > 0) {
                namesSection.removeChild(namesSection.lastElementChild);
            }

            if (tasksSection.children.length > 0) {
                tasksSection.removeChild(tasksSection.lastElementChild);
            }
        }

        function checkInputValues() {
            const imageInputs = document.querySelectorAll('input[name="images[]"]');
            const nameInputs = document.querySelectorAll('input[name="names[]"]');
            const taskInputs = document.querySelectorAll('input[name="tasks[]"]');

            imageInputs.forEach((imageInput, index) => {
                const nameInput = nameInputs[index];
                const taskInput = taskInputs[index];

                if (imageInput.value !== '' && (nameInput.value === '' || taskInput.value === '')) {
                    nameInput.setCustomValidity('Lütfen isim alanını doldurun');
                    taskInput.setCustomValidity('Lütfen görev alanını doldurun');
                } else if (nameInput.value !== '' && (imageInput.value === '' || taskInput.value === '')) {
                    imageInput.setCustomValidity('Lütfen resim alanını doldurun');
                    taskInput.setCustomValidity('Lütfen görev alanını doldurun');
                } else if (taskInput.value !== '' && (imageInput.value === '' || nameInput.value === '')) {
                    imageInput.setCustomValidity('Lütfen resim alanını doldurun');
                    nameInput.setCustomValidity('Lütfen isim alanını doldurun');
                } else {
                    imageInput.setCustomValidity('');
                    nameInput.setCustomValidity('');
                    taskInput.setCustomValidity('');
                }
            });
        }
    </script>
@endsection