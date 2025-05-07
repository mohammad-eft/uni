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
    <div class="w-full mt-10 text-center">
        <h1 class="mb-10 font-bold text-5xl text-center text-blue-500">
            لیست اواحد درسی
        </h1>
        <div class="w-11/12 m-auto">
            <div class="grid grid-cols-4 gap-5 mb-5 border-b pb-2">
                <span class="block text-xl font-bold text-gray-600 py-3 border-l">
                    آیدی
                </span>
                <span class="block text-xl font-bold text-gray-600 py-3 border-l">
                    نام واحد درسی
                </span>
                <span class="block text-xl font-bold text-gray-600 py-3 border-l">
                   تعداد واحد
                </span>
                <span class="block text-xl font-bold text-gray-600 py-3">
                    دکمه ها
                </span>
            </div>
            @foreach($units as $unit)
            <div class="grid grid-cols-4 gap-5 my-3 border-b pb-3">
                <span class="block text-md font-semibold text-gray-600 py-3 border-l">
                    {{ $unit->id }}
                </span>
                <span class="block text-md font-semibold text-gray-600 py-3 border-l">
                    {{ $unit->unitName }}
                </span>
                <span class="block text-md font-semibold text-gray-600 py-3 border-l">
                    {{ $unit->unitCount }}
                </span>
                <div class="text-md font-semibold text-gray-600 py-3 flex flex-row justify-between items-center">
                    <a href="{{ url('/units/show/' . $unit->id) }}" class="block px-3 py-1 rounded-sm bg-blue-300 hover:bg-blue-600 hover:text-white transition-all duration-200 font-bold">نمایش</a>
                    <a href="{{ url('/units/edit/' . $unit->id) }}" class="block px-3 py-1 rounded-sm bg-lime-300 hover:bg-green-600 hover:text-white transition-all duration-200 font-bold">ویرایش</a>
                    <a href="{{ url('/units/delete/' . $unit->id) }}" class="block px-3 py-1 rounded-sm bg-rose-400 hover:bg-rose-600 hover:text-white transition-all duration-200 font-bold">حذف</a>
                </div>

              

            </div>
                @endforeach
        </div>
    </div>
</body>
</html>