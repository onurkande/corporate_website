<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Counter
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if($record)
                    @if($record->columns != null)
                        <form action="counter-update" method="post">
                            @csrf
                            @php
                                $columns=json_decode($record->columns, TRUE);
                            @endphp
                            @foreach($columns as $single)
   
                            <div style="display:grid; grid-template-columns:1fr 1fr 1fr 1fr;">
                                <input type="text" name="title[]" value="{{$single['title']}}">
                                <input type="text" name="number[]" value="{{$single['number']}}">
                                <a href="{{route('counter-delete', ['title'=>$single['title']])}}"> sil </a>  
                            </div>
                            <br>
                            @endforeach
                            <hr>
                            <section id="more-column">

                            </section>
                           
                    @else
                            <div style="display:grid; grid-template-columns:1fr 1fr 1fr;">
                                <input type="text" name="title[]">
                                <input type="text" name="number[]">
                            </div>
                            <hr>
                            <section id="more-column">
                                
                            </section>
                    @endif
                            <br>
                            <div>
                                <a onclick="addColumn()">+</a>
                                <a onclick="removeColumn()">-</a>
                            </div>
                        
                            <input type="submit" value="güncelle">
                        </form>
                @else
                    <form method="post">
                        @csrf
                        <input type="text" name="title">
                        <input type="text" name="number">
                        <input type="submit" value="kaydet">
                    </form>
                @endif

		        

            </div>
        </div>
    </div>

    <script>
        function addColumn()
        {
            const moreColumn = document.getElementById('more-column');
            const row = document.createElement("div");
            row.innerHTML = '<div><input type="text" name="title[]" required><input type="text" name="number[]" required></div>';
            moreColumn.appendChild(row);
        }

        function removeColumn()
        {
            const columnSection = document.getElementById("more-column");
            const lastColumn = columnSection.querySelector("div:last-child");
            lastColumn.parentElement.removeChild(lastColumn);
        }
    </script>
</x-app-layout>