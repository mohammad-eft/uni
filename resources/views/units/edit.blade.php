<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit unit</title>
</head>
<body>
    <h1 class="text-5xl font-bold text-center mt-10 text-blue-500 text-shadow-rose-500">
        ویرایش درس
    </h1>
    <form action="{{ url('unit/update') }}" method="POST" class="w-1/2 mt-20 border border-gray-400 rounded-2xl shadow shadow-gray-500 flex flex-col items-center m-auto p-10">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $unit->id }}">
        <div class="w-full flex flex-col items-start justify-around mt-5" require>
            <label for="unitName">نام واحد درسی :</label>
            <input type="text" name="unitName" id="unitName" value="{{ $unit->unitName }}" class="w-full outline-none py-2 px-5 border-b">
        </div>
        <div class="w-full flex flex-col items-start justify-around mt-5" require>
            <label for="unitCount">تعداد واحد :</label>
            <input type="text" name="unitCount" id="unitCount" value="{{ $unit->unitCount }}" class="w-full outline-none py-2 px-5 border-b">
        </div>
        <button type="submit" class="mt-10 bg-gray-400 text-white font-bold px-5 py-2 rounded-md hover:bg-slate-500 transition-all duration-200">بزن ثبتو</button>
    </form>
</body>
</html>