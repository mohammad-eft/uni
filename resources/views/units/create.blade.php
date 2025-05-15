<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>create units</title>
</head>
<body>
    @include('header')
    <h1 class="text-5xl font-bold text-blue-500 text-center my-10">
        ساخت درس
    </h1>

    <form action="{{ url('units/submit') }}" method="post" class="w-1/2 m-auto border rounded-xl p-10">
        @csrf
        <div class="flex flex-col items-start justify-center mb-10">
            <label for="unitName" class="mb-3 font-semibold text-lg">نام واحد درسی :</label>
            <input type="text" name="unitName" id="unitName" placeholder="اسم درستو بنویس دایی" class="outline-none w-full px-5 py-3 border-b" require>
        </div>
        <div class="flex flex-col items-start justify-center mb-10">
            <label for="unitCount" class="mb-3 font-semibold text-lg"> تعداد واحد :</label>
            <input type="text" name="unitCount" id="unitCount" placeholder="تعداد واحدشو بنویس دایی" class="outline-none w-full px-5 py-3 border-b" require>
        </div>
        <div class="text-center">
            <button type="submit" class="px-10 py-2 rounded-lg border text-lg font-bold text-gray-600 transition-all duration-200 hover:bg-gray-500 hover:text-white">بزن ثبتو</button>
        </div>
    </form>
</body>
</html>