<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit student</title>
</head>
<body>
    <h1 class="text-5xl font-bold text-center mt-10 text-blue-500 text-shadow-rose-500">
        ویرایش دانشجو
    </h1>
    <div class="w-11/12 m-auto text-start my-5">
        <a href="{{ url('students') }}" class="py-1 px-3 rounded-md text-white bg-gray-400 transition-all duration-200 hover:bg-gray-600 text-xl font-semibold hover:rounded-r-3xl">ایستمیم قییت دالیا</a>
    </div>
    <form action="{{ url('student/update') }}" method="POST" class="w-1/2 mt-20 border border-gray-400 rounded-2xl shadow shadow-gray-500 flex flex-col items-center m-auto p-10">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $student->id }}">
        <div class="w-full flex flex-col items-start justify-around mt-5">
            <label for="name">نام :</label>
            <input type="text" name="name" id="name" value="{{ $student->name }}" class="w-full outline-none py-2 px-5 border-b">
        </div>
        <div class="w-full flex flex-col items-start justify-around mt-5">
            <label for="family">نام خانوادگی :</label>
            <input type="text" name="family" id="family" value="{{ $student->family }}" class="w-full outline-none py-2 px-5 border-b">
        </div>
        <div class="w-full flex flex-col items-start justify-around mt-5">
            <label for="age">سن :</label>
            <input type="text" name="age" id="age" value="{{ $student->age }}" class="w-full outline-none py-2 px-5 border-b">
        </div>
        <div class="w-full flex flex-col items-start justify-around mt-5">
            <label for="teacher">نام استاد :</label>
            <input type="text" name="teacher" id="teacher" value="{{ $teacher->name . ' ' . $teacher->family }}" class="w-full outline-none py-2 px-5 border-b">
        </div>
        <div class="w-full flex flex-col items-start justify-around mt-5">
            <label for="unit">نام واحد درسی :</label>
            <ul>
                    @foreach($units as $unit)
                    <li>
                        <input type="checkbox" name="unit[]" id="unit" value="{{ $unit->id }}" class="mb-5" <?php foreach($units_id as $unit_id){ if($unit->id == $unit_id) { echo "checked"; }} ?>>
                        <label for="unit" class="mb-1">{{ $unit->unitName }}</label>
                    </li>
                    @endforeach
                </ul>
        </div>
        <button type="submit" class="mt-10 bg-gray-400 text-white font-bold px-5 py-2 rounded-md hover:bg-slate-500 transition-all duration-200">بزن ثبتو</button>
    </form>
</body>
</html>