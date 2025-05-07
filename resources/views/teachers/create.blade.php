<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login teachers</title>
</head>
<body>
    @include('header')
    <h1 class="text-5xl font-bold text-blue-500 text-center my-10">
        ساخت استاد
    </h1>

    <form action="{{ url('teachers/submit') }}" method="post" class="w-1/2 m-auto border rounded-xl p-10">
        @csrf
        <div class="flex flex-col items-start justify-center mb-10">
            <label for="name" class="mb-3 font-semibold text-lg">نام :</label>
            <input type="text" name="name" id="name" placeholder="اسمتو بنویس دایی" class="outline-none w-full px-5 py-3 border-b">
        </div>
        <div class="flex flex-col items-start justify-center mb-10">
            <label for="family" class="mb-3 font-semibold text-lg">نام خانوادگی :</label>
            <input type="text" name="family" id="family" placeholder="فامیلیتو بنویس دایی" class="outline-none w-full px-5 py-3 border-b">
        </div>
        <div class="flex flex-col items-start justify-center mb-10">
            <label for="unit" class="mb-3 font-semibold text-lg">واحد درسی :</label>
            <!-- <select name="unit" id="unit" class="outline-none w-full px-5 py-3 border-b"> -->
                <ul>
                    @foreach($units as $unit)
                    <li>
                        <input type="checkbox" name="unit[]" id="unit" value="{{ $unit->id }}" class="mb-5">
                        <label for="unit">{{ $unit->unitName }}</label>
                        <!-- <option value="{,{ $unit->id },}">{,{ $unit->unitName },}</option> -->
                    </li>
                    @endforeach
                </ul>
            <!-- </select> -->
        </div>
        <div class="text-center">
            <button type="submit" class="px-10 py-2 rounded-lg border text-lg font-bold text-gray-600 transition-all duration-200 hover:bg-gray-500 hover:text-white">بزن ثبتو</button>
        </div>
    </form>
</body>
</html>