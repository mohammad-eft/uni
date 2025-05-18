<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>teachers</title>
</head>
<body>
    @include('header')
    <div class="w-full mt-10 text-center">
        <h1 class="mb-10 font-bold text-5xl text-center text-blue-500">
            لیست اساتید
        </h1>
        <div class="w-11/12 m-auto">
            <div class="grid grid-cols-6 gap-5 mb-5 border-b pb-2">
                <span class="block text-xl font-bold text-gray-600 py-3 border-l">
                    آیدی
                </span>
                <span class="block text-xl font-bold text-gray-600 py-3 border-l">
                    نام
                </span>
                <span class="block text-xl font-bold text-gray-600 py-3 border-l">
                   نام خانوادگی
                </span>
                <span class="block text-xl font-bold text-gray-600 py-3 border-l col-span-2">
                   جزئیات
                </span>
                <span class="block text-xl font-bold text-gray-600 py-3">
                    دکمه ها
                </span>
            </div>
            @foreach($teachers as $teacher)
            <div class="grid grid-cols-6 gap-5 my-3 border-b pb-3">

              
                    <span class="block text-md font-semibold text-gray-600 py-3 border-l">
                        {{ $teacher->id }}
                    </span>
                    <span class="block text-md font-semibold text-gray-600 py-3 border-l">
                        {{ $teacher->name }}
                    </span>
                    <span class="block text-md font-semibold text-gray-600 py-3 border-l">
                        {{ $teacher->family }}
                    </span>
                    <span class="text-md font-semibold col-span-2 text-gray-600 py-3 pl-5 border-l grid grid-cols-2 gap-4">
                        <div>
                            <a href="{{ url('/teachers/show_units/' . $teacher->id) }}" class="block text-sm px-3 py-1 rounded-sm bg-blue-300 hover:bg-blue-600 hover:text-white transition-all duration-200 font-bold">
                                ببین چی ارائه داده
                            </a>
                        </div>
                        <div>
                            <a href="{{ url('/teachers/show_students/' . $teacher->id) }}" class="block text-sm px-3 py-1 rounded-sm bg-purple-300 hover:bg-purple-600 hover:text-white transition-all duration-200 font-bold">
                                نمایش دانشجویان
                            </a>
                        </div>
                    </span>
                    <div class="text-sm font-semibold text-gray-600 py-3 flex flex-row justify-between items-center">
                        <a href="{{ url('/teachers/show/' . $teacher->id) }}" class="block px-3 py-1 rounded-sm bg-blue-300 hover:bg-blue-600 hover:text-white transition-all duration-200 font-bold">نمایش</a>
                        <a href="{{ url('/teachers/edit/' . $teacher->id) }}" class="block px-3 py-1 rounded-sm bg-lime-300 hover:bg-green-600 hover:text-white transition-all duration-200 font-bold">ویرایش</a>
                        <a href="{{ url('/teachers/delete/' . $teacher->id) }}" class="block px-3 py-1 rounded-sm bg-rose-400 hover:bg-rose-600 hover:text-white transition-all duration-200 font-bold">حذف</a>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</body>
</html>