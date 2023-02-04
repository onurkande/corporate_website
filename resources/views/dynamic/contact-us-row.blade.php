<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact Us Row
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if($record)
                    <form action="ContactUsRow-update" method="post">
                        @csrf
                        <label>title</label>
                        <input type="text" name="title" value="{{$record->title}}">
                        <br>
                        <label>content</label>
                        <input type="text" name="content" value="{{$record->content}}">
                        <br>

                        @if($record->rows != null)
                            @php
                                $rows=json_decode($record->rows, TRUE);
                            @endphp

                        
                            @foreach($rows as $row)
                                <label>header</label>
                                <input type="text" name="header[]" value="{{$row['header']}}">
                                <label>paragraph</label>
                                <input type="text" name="paragraph[]" value="{{$row['paragraph']}}">
                                <label>icon</label>
                                <input type="text" name="icon[]" value="{{$row['icon']}}">
                                <a href="{{route('ContactUsRow-delete', ['header'=>$row['header']])}}"> sil </a>
                                <br>
                            @endforeach
                            <hr>
                            <section id="more-rows">

                            </section>
                        @else
                            <label>header</label>
                            <input type="text" name="header[]">
                            <br>
                            <label>paragraph</label>
                            <input type="text" name="paragraph[]">
                            <br>
                            <label>icon</label>
                            <input type="text" name="icon[]">
                            <br>
                            <hr>
                            <section id="more-rows">

                            </section>
                        @endif
                        <br>
                        <div>
                            <a onclick="addRows()">+</a>
                            <a onclick="removeRows()">-</a>
                        </div>
                        
                        <input type="submit" value="güncelle">
                    </form>
                @else
                    <form method="post">
                        @csrf
                        <label>title</label>
                        <input type="text" name="title">
                        <br>
                        <label>content</label>
                        <input type="text" name="content">
                        <br>
                        <label>header</label>
                        <input type="text" name="header">
                        <br>
                        <label>paragraph</label>
                        <input type="text" name="paragraph">
                         <br>
                        <label>icon</label>
                        <input type="text" name="icon">
                        <br>
                        <section id="more-rows">

                        </section>
                        <input type="submit" value="kaydet">
                    </form>
                @endif
		        

            </div>
        </div>
    </div>

    <script>
        function addRows()
        {
            const moreRows = document.getElementById('more-rows');
            const row = document.createElement("div");
            row.innerHTML = '<div><input type="text" name="header[]" required><input type="text" name="paragraph[]" required><input type="text" name="icon[]" required></div>';
            moreRows.appendChild(row);
        }

        function removeRows()
        {
            const rowsSection = document.getElementById("more-rows");
            const lastRows = rowsSection.querySelector("div:last-child");
            lastRows.parentElement.removeChild(lastRows);
        }
    </script>
</x-app-layout>