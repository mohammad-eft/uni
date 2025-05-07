<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Single</title>
</head>
<body>
@include('header')
    <div class="w-full mt-10 text-center">
        <div class="w-11/12 m-auto">
            <div class="grid grid-cols-5 gap-5 mb-5 border-b pb-2">
                <span class="block text-xl font-bold text-gray-600 py-3 border-l">
                    آیدی
                </span>
                <span class="block text-xl font-bold text-gray-600 py-3 border-l">
                    نام
                </span>
                <span class="block text-xl font-bold text-gray-600 py-3 border-l">
                    نام خانوادگی
                </span>
                <span class="block text-xl font-bold text-gray-600 py-3 border-l">
                    واحد درسی
                </span>
                <span class="block text-xl font-bold text-gray-600 py-3">
                    دکمه ها
                </span>
            </div>
            <div class="grid grid-cols-5 gap-5 my-3">        
                    <span class="block text-xl font-semibold text-gray-600 py-3 border-l">
                        {{ $teacher->id }}
                    </span>
                    <span class="block text-xl font-semibold text-gray-600 py-3 border-l">
                        {{ $teacher->name }}
                    </span>
                    <span class="block text-xl font-semibold text-gray-600 py-3 border-l">
                        {{ $teacher->family }}
                    </span>
                    <span class="block text-xl font-semibold text-gray-600 py-3 border-l">
                        {{ $unit->unitName }}
                    </span>
                    <div class="text-xl font-semibold text-gray-600 py-3 flex flex-row justify-between items-center">
                        <a href="{{ url('/teachers/edit/' . $teacher->id) }}" class="block px-3 py-1 rounded-sm bg-lime-300 hover:bg-green-600 hover:text-white transition-all duration-200 font-bold">ویرایش</a>
                        <a href="{{ url('/teachers/delete/' . $teacher->id) }}" class="block px-3 py-1 rounded-sm bg-rose-400 hover:bg-rose-600 hover:text-white transition-all duration-200 font-bold">حذف</a>
                    </div>
            </div>
        </div>
        <div class="w-11/12 m-auto text-start">
            <a href="{{ url('teachers') }}" class="py-1 px-3 rounded-md text-white bg-gray-400 transition-all duration-200 hover:bg-gray-600 text-xl font-semibold hover:rounded-r-3xl">بازگشت</a>
        </div>
    </div>
</body>
</html>
