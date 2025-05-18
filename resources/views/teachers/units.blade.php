<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>units</title>
</head>
<body>
    @include('header')
    <h1 class="mb-10 font-bold text-5xl text-center text-blue-500 mt-10">
        لیست دروس {{ $teacher->name . " " . $teacher->family }}
    </h1>
    <div class="w-11/12 m-auto my-5 text-start">
        <a href="{{ url('teachers') }}" class="py-1 px-3 rounded-md text-white bg-gray-400 transition-all duration-200 hover:bg-gray-600 text-xl font-semibold hover:rounded-r-3xl">بازگشت</a>
    </div>
    <div>
        <ul class="flex flex-col justify-between items-start w-1/2 m-auto mt-10">
            <?php $i=1;  ?>
        @foreach($teacher->units as $unit)
            <li class="font-bold px-5 py-2 rounded-md text-md text-gray-600 mb-5">
                <span class="font-normal text-black">
                <?= $i." : " ?>
                </span>
                {{ $unit->unitName }} 
            </li>
            <?php $i++; ?>
        @endforeach
        </ul>
    </div>
</body>
</html>
