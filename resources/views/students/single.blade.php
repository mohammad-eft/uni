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
        <h1 class="mb-10 font-bold text-5xl text-center text-blue-500 mt-10">
        صفحه سینگل {{ $student->name . " " . $student->family }}
    </h1>
        <div class="w-11/12 m-auto">
            <div class="grid grid-cols-7 gap-5 mb-5 border-b pb-2">
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
                   سن
                </span>
                <span class="block text-xl font-bold text-gray-600 py-3 border-l">
                    نام استاد
                </span>
                <span class="block text-xl font-bold text-gray-600 py-3 border-l">
                   نام واحد درسی
                </span>
                <span class="block text-xl font-bold text-gray-600 py-3">
                    دکمه ها
                </span>
            </div>
            <div class="grid grid-cols-7 gap-5 my-3">        
                    <span class="block text-xl font-semibold text-gray-600 py-3 border-l">
                        {{ $student->id }}
                    </span>
                    <span class="block text-xl font-semibold text-gray-600 py-3 border-l">
                        {{ $student->name }}
                    </span>
                    <span class="block text-xl font-semibold text-gray-600 py-3 border-l">
                        {{ $student->family }}
                    </span>
                    <span class="block text-xl font-semibold text-gray-600 py-3 border-l">
                        {{ $student->age }}
                    </span>
                    <span class="block text-xl font-semibold text-gray-600 py-3 border-l">
                           @foreach($student->teacher as $teacher)
                           <span class="block">
                               {{ $teacher->name . " " . $teacher->family }} 
                           </span>
                           @endforeach
                    </span>
                    <span class="block text-start  text-sm font-normal text-gray-600 py-3 border-l">
                        @foreach($student->unit as $unit)
                        <span class="block">
                            {{ $unit->unitName }}
                        </span>
                           @endforeach
                    </span>
                    <div class="text-xl font-semibold text-gray-600 py-3 flex flex-row justify-between items-center">
                        <a href="{{ url('/students/edit/' . $student->id) }}" class="block px-3 py-1 rounded-sm bg-lime-300 hover:bg-green-600 hover:text-white transition-all duration-200 font-bold">ویرایش</a>
                        <a href="{{ url('/students/delete/' . $student->id) }}" class="block px-3 py-1 rounded-sm bg-rose-400 hover:bg-rose-600 hover:text-white transition-all duration-200 font-bold">حذف</a>
                    </div>
            </div>
        </div>
        <div class="w-11/12 m-auto text-start">
            <a href="{{ url('students') }}" class="py-1 px-3 rounded-md text-white bg-gray-400 transition-all duration-200 hover:bg-gray-600 text-xl font-semibold hover:rounded-r-3xl">چیخ اشیحه ایستمدیم</a>
        </div>
    </div>
</body>
</html>
