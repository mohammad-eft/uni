<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login students</title>
</head>
<body>
    @include('header')
    <h1 class="text-5xl font-bold text-blue-500 text-center my-10">
        ساخت دانشجو
    </h1>

   
    <form action="{{ url('students/submit') }}" method="post" class="w-1/2 m-auto border rounded-xl p-10">
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
            <label for="age" class="mb-3 font-semibold text-lg">سن :</label>
            <input type="text" name="age" id="age" placeholder="سنتو بنویس دایی" class="outline-none w-full px-5 py-3 border-b">
        </div>
        <!-- <div class="flex flex-col items-start justify-center mb-10">
            <label for="teacher" class="mb-3 font-semibold text-lg">نام استاد :</label>
            <select name="teacher" id="teacher" class="outline-none w-full px-5 py-3 border-b">
                @ foreach($ teachers as $teacher)
                <option value="{,{ $teacher->id }}">{,{ $teacher->name . " " . $teacher->family }}</option>
                @ endforeach
            </select>
        </div> -->
        <div class="flex flex-col items-start justify-center mb-10">
            <label for="unit" class="mb-3 font-semibold text-lg">نام واحد درسی :</label>
                <ul>
                    @foreach($units as $unit)
                    <li>
                        <div>
                            <input type="checkbox" name="unit[]" id="unit" value="{{ $unit->id }}" class="mb-5">
                            <label for="unit" class="mb-1">{{ $unit->unitName }}</label>
                        </div>
                        <div class="mr-10 mb-5">
                            <ul>
                                <?php 
                                    $i=1; 
                                    // // dd($units_teachers);
                                    // // foreach ($units_teachers['teachers'] as $teacher) {
                                    // //     dd($teacher);
                                    // // }
                                    // // print_r($units_teachers);
                                    // foreach ($units_teachers as $unit_teacher) {
                                    //     foreach($unit_teacher as $techer){
                                    //         foreach ($techer as $x) {
                                    //             echo $x->name." ". $x->family ."</br>";
                                    //         }
                                    //     }
                                    // }
                                    // dd($teacherss);
                                    // foreach($units as $unit){
                                        // foreach ($unit->teachers as $teacher) {

                                            // echo $teacher->name . " " . $teacher->family . " -- ";
                                            // if ($teacher_unit->unit_id == $unit->id) {
                                                // echo $teacher->name . " " . $teacher->family . "</br>";
                                                // print_r($teacher['teachers']);
                                            // }
                                        // }
                                    // }
                                ?>
                                <!-- @ foreach($ teacher_units as $ teacher_unit)
                                    @ foreach($ teachers as $ teacher)
                                        @ if($ teacher_unit- >unit_id = = $ unit->id) -->
                                        @foreach($unit->teachers as $teacher)
                                            <li>
                                                <input type="radio" name="{{$unit->id}}" id="teacher" value="{{ $teacher->id }}">
                                                <label for="teacher"> <?php echo $i . " : "; $i++ ?> {{ $teacher->name . " " . $teacher->family }}</label>
                                            </li>
                                        @endforeach
                                        <!-- @ endif
                                    @ endforeach
                                @ endforeach -->
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
        </div>
        <div class="text-center">
            <button type="submit" class="px-10 py-2 rounded-lg border text-lg font-bold text-gray-600 transition-all duration-200 hover:bg-gray-500 hover:text-white">بزن ثبتو</button>
        </div>
    </form>
</body>
</html>