<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit teacher</title>
</head>
<body>
    <h1 class="text-5xl font-bold text-center mt-10 text-blue-500 text-shadow-rose-500">
        ویرایش استاد
    </h1>
    <form action="{{ url('teacher/update') }}" method="POST" class="w-1/2 mt-20 border border-gray-400 rounded-2xl shadow shadow-gray-500 flex flex-col items-center m-auto p-10">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $teacher->id }}">
        <div class="w-full flex flex-col items-start justify-around mt-5">
            <label for="name">نام :</label>
            <input type="text" name="name" id="name" value="{{ $teacher->name }}" class="w-full outline-none py-2 px-5 border-b">
        </div>
        <div class="w-full flex flex-col items-start justify-around mt-5">
            <label for="family">نام خانوادگی :</label>
            <input type="text" name="family" id="family" value="{{ $teacher->family }}" class="w-full outline-none py-2 px-5 border-b">
        </div>
        <div class="w-full flex flex-col items-start justify-around mt-5">
            <label for="unit" class="mb-3 font-semibold text-lg">واحد درسی :</label>
            <!-- <select name="unit" id="unit" class="outline-none w-full px-5 py-3 border-b"> -->
                <ul>
                    <?php
                    // dd($allUnits);
                    $i=1;
                    ?>
                    @foreach($allUnits as $unit)
                     
                    <li>
                        <?php //print_r($teacher_unit->toArray());
                        echo $i;
                        ?>
                        <input type="checkbox" name="unit[]" id="unit" value="{{ $unit->id }}" class="mb-5" @if(in_array($unit->id, $teacher->units)) {{ 'checked' }} @endif>
                        <label for="unit">{{ $unit->unitName }}</label>
                        <!-- <option value="{,{ $unit->id },}">{,{ $unit->unitName },}</option> -->
                         <?php $i++; ?>
                    </li>
                        
                    @endforeach
                </ul>



               
        </div>
        <button type="submit" class="mt-10 bg-gray-400 text-white font-bold px-5 py-2 rounded-md hover:bg-slate-500 transition-all duration-200">بزن ثبتو</button>
    </form>
</body>
</html>