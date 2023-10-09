<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cambridge</title>
    @vite('resources/css/app.css')

    <style type="text/css">
        @page {
            size: A4;
            margin: 0;
        }

        .rc-body {
            display: grid;
            grid-template-rows: repeat(12,50px);
        }

        .marks {
            grid-row: span 9;
        }
    </style>
</head>
<body>
    @foreach ($students as $name => $informations)
        @php
            $english = [];
            $mathematics = [];
            $science = [];
            $social_studies = [];
            $chemistry = [];
            $physics = [];
            $biology = [];
            $activity = [];
            $months = [];
            $behaviour = [];
            $mark_count = 0;
            $grades = ['A', 'B', 'C', 'D', 'E'];
            $b_grades = ['5', '4', '3', '2', '1'];
            foreach($informations as $infokey => $infovalue){
                $explodedinfokey = explode('.',$infokey);
                if(count($explodedinfokey) == 1) {
                    if($explodedinfokey[0] == 'English'){
                        $english[$explodedinfokey[0]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Mathematics'){
                        $mathematics[$explodedinfokey[0]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Science'){
                        $science[$explodedinfokey[0]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Social Studies'){
                        $social_studies[$explodedinfokey[0]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Chemistry'){
                        $chemistry[$explodedinfokey[0]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Physics'){
                        $physics[$explodedinfokey[0]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Biology'){
                        $biology[$explodedinfokey[0]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Activity'){
                        $activity[$explodedinfokey[0]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Month'){
                        $months[$explodedinfokey[0]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Behaviour'){
                        $behaviour[$explodedinfokey[0]] = $infovalue;
                    }
                }elseif(count($explodedinfokey) == 2) {
                    if($explodedinfokey[0] == 'English'){
                        $english[$explodedinfokey[1]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Mathematics'){
                        $mathematics[$explodedinfokey[1]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Science'){
                        $science[$explodedinfokey[1]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Social Studies'){
                        $social_studies[$explodedinfokey[1]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Chemistry'){
                        $chemistry[$explodedinfokey[1]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Physics'){
                        $physics[$explodedinfokey[1]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Biology'){
                        $biology[$explodedinfokey[1]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Activity'){
                        $activity[$explodedinfokey[1]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Month'){
                        $months[$explodedinfokey[1]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Behaviour'){
                        $behaviour[$explodedinfokey[1]] = $infovalue;
                    }
                }
            }
            // ----- Marks Table Count ----
            if (!empty($english)) {
                $mark_count += 1;
            }
            if (!empty($mathematics)) {
                $mark_count += 1;
            }
            if (!empty($science)) {
                $mark_count += 1;
            }
            if (!empty($social_studies)) {
                $mark_count += 1;
            }
            if (!empty($chemistry)) {
                $mark_count += 1;
            }
            if (!empty($physics)) {
                $mark_count += 1;
            }
            if (!empty($biology)) {
                $mark_count += 1;
            }
        @endphp
        <div class="[width:21cm] [min-height:29.7cm] p-[12px] my-[20px] mx-auto bg-no-repeat bg-[length:100%_auto] bg-center border border-gray-300 rounded-md shadow-md print:m-0 print:border-none print:rounded-none print:break-after-page print:shadow-none grid grid-rows-6 text-gray-900" style="background-image: url({{ asset('images/backgrounds/is_rcbg.png') }})">
            <div class="row-start-2 row-span-5 text-sm">
                <div class="grid grid-cols-3 mt-2 gap-1">
                    <p><span class="font-extrabold">Name : </span><span>{{ $name }}</span></p>
                    <p><span class="font-extrabold">Academic Year : </span><span>{{ $informations['Academic Year'] }}</span></p>
                    <p><span class="font-extrabold">Grade : </span><span>{{ $informations['Grade'] }}</span></p>
                    <p><span class="font-extrabold">Term : </span><span>{{ $informations['Term'] }}</span></p>
                    <p><span class="font-extrabold">Campus : </span><span>{{ $informations['Campus'] }}</span></p>
                    <p><span class="font-extrabold">Date : </span><span>{{ $informations['Date'] }}</span></p>
                </div>

                <div class="grid grid-cols-2 mt-3 text-xs gap-x-2">
                    <table class="w-full table-fixed">
                        <thead style="background-color: #00223d;">
                            <tr>
                                <th class="border border-gray-500 h-8 text-white" colspan="5">Grade For Subjects</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-500 h-8 bg-amber-400 text-center text-gray-800">Grade A</td>
                                <td class="border border-gray-500 h-8 bg-amber-400 text-center text-gray-800">Grade B</td>
                                <td class="border border-gray-500 h-8 bg-amber-400 text-center text-gray-800">Grade C</td>
                                <td class="border border-gray-500 h-8 bg-amber-400 text-center text-gray-800">Grade D</td>
                                <td class="border border-gray-500 h-8 bg-amber-400 text-center text-gray-800">Grade E</td>
                            </tr>

                            <tr>
                                <td class="border border-gray-500 text-center text-gray-800">81 to 100</td>
                                <td class="border border-gray-500 text-center text-gray-800">61 to 80</td>
                                <td class="border border-gray-500 text-center text-gray-800">41 to 60</td>
                                <td class="border border-gray-500 text-center text-gray-800">21 to 40</td>
                                <td class="border border-gray-500 text-center text-gray-800">0 to 20</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="w-full table-fixed">
                        <thead style="background-color: #00223d;">
                            <tr>
                                <th class="border border-gray-500 h-8 text-white" colspan="5">Academic Improvement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-500 h-8 bg-amber-400 text-center text-gray-800">Progress 5</td>
                                <td class="border border-gray-500 h-8 bg-amber-400 text-center text-gray-800">Progress 4</td>
                                <td class="border border-gray-500 h-8 bg-amber-400 text-center text-gray-800">Progress 3</td>
                                <td class="border border-gray-500 h-8 bg-amber-400 text-center text-gray-800">Progress 2</td>
                                <td class="border border-gray-500 h-8 bg-amber-400 text-center text-gray-800">Progress 1</td>
                            </tr>

                            <tr>
                                <td class="border border-gray-500 text-center text-gray-800">Above Current Level</td>
                                <td class="border border-gray-500 text-center text-gray-800">Meets Current Level</td>
                                <td class="border border-gray-500 text-center text-gray-800">Progressing Towards Current Level</td>
                                <td class="border border-gray-500 text-center text-gray-800">Below Current Level</td>
                                <td class="border border-gray-500 text-center text-gray-800">Slow Progress</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="grid grid-cols-2 gap-x-2 text-xs mt-3">
                    <table class="table table-fixed h-fit">
                        <thead style="background-color: #00223d;">
                            <tr>
                                <th class="border w-[10%] h-10 border-gray-500 text-white">No</th>
                                <th class="border w-[45%] h-10 border-gray-500 text-white">Subjects</th>
                                <th class="border w-[45%] h-10 border-gray-500 text-white" colspan="5">Grade For Subjects & Academic Improvement</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- ----- English ----- --}}
                            @if(!empty($english))
                                <tr>
                                    <td class="border h-9 border-gray-500 text-center">1</td>
                                    <td class="border h-9 border-gray-500 pl-1">English</td>
                                    @php
                                        $mark = "";
                                        if ($english['English'] > 80 && $english['English'] <= 100) {
                                            $mark = "A";
                                        } elseif ($english['English'] > 60 && $english['English'] <= 80) {
                                            $mark = "B";
                                        } elseif ($english['English'] > 40 && $english['English'] <= 60) {
                                            $mark = "C";
                                        } elseif ($english['English'] > 20 && $english['English'] <= 40) {
                                            $mark = "D";
                                        } elseif ($english['English'] > 0 && $english['English'] <= 20) {
                                            $mark = "E";
                                        }
                                        unset($english["English"]);
                                    @endphp
                                    @foreach ($grades as $grade )
                                        @if($mark == $grade)
                                            <td class="border h-9 border-gray-500 bg-amber-400 text-center">{{ $grade }}</td>
                                        @else
                                            <td class="border h-9 border-gray-500 text-center">{{ $grade }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                                @foreach ($english as $description => $subject)
                                    <tr>
                                        <td class="border h-9 border-gray-500"></td>
                                        <td class="border h-9 border-gray-500 pl-1">{{ $description }}</td>
                                        @foreach($b_grades as $b_grade)
                                            @if($b_grade == $subject)
                                                <td class="border h-9 border-gray-500 bg-green-500 text-center">{{ $subject }}</td>
                                            @else
                                                <td class="border h-9 border-gray-500 text-center">{{ $b_grade }}</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            @endif
                            {{-- ----- Mathematics ----- --}}
                            @if(!empty($mathematics))
                                <tr>
                                    <td class="border h-9 border-gray-500 text-center">2</td>
                                    <td class="border h-9 border-gray-500 pl-1">Mathematics</td>
                                    @php
                                        $mark = "";
                                        if ($mathematics['Mathematics'] > 80 && $mathematics['Mathematics'] <= 100) {
                                            $mark = "A";
                                        } elseif ($mathematics['Mathematics'] > 60 && $mathematics['Mathematics'] <= 80) {
                                            $mark = "B";
                                        } elseif ($mathematics['Mathematics'] > 40 && $mathematics['Mathematics'] <= 60) {
                                            $mark = "C";
                                        } elseif ($mathematics['Mathematics'] > 20 && $mathematics['Mathematics'] <= 40) {
                                            $mark = "D";
                                        } elseif ($mathematics['Mathematics'] > 0 && $mathematics['Mathematics'] <= 20) {
                                            $mark = "E";
                                        }
                                        unset($mathematics["Mathematics"]);
                                    @endphp
                                    @foreach ($grades as $grade )
                                        @if($mark == $grade)
                                            <td class="border h-9 border-gray-500 bg-amber-400 text-center">{{ $grade }}</td>
                                        @else
                                            <td class="border h-9 border-gray-500 text-center">{{ $grade }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                                @foreach ($mathematics as $description => $subject)
                                    <tr>
                                        <td class="border h-9 border-gray-500"></td>
                                        <td class="border h-9 border-gray-500 pl-1">{{ $description }}</td>
                                        @foreach($b_grades as $b_grade)
                                            @if($b_grade == $subject)
                                                <td class="border h-9 border-gray-500 bg-green-500 text-center">{{ $subject }}</td>
                                            @else
                                                <td class="border h-9 border-gray-500 text-center">{{ $b_grade }}</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            @endif
                            {{-- ----- Science ----- --}}
                            @if(!empty($science))
                                <tr>
                                    <td class="border h-9 border-gray-500 text-center">3</td>
                                    <td class="border h-9 border-gray-500 pl-1">Science</td>
                                    @php
                                        $mark = "";
                                        if ($science['Science'] > 80 && $science['Science'] <= 100) {
                                            $mark = "A";
                                        } elseif ($science['Science'] > 60 && $science['Science'] <= 80) {
                                            $mark = "B";
                                        } elseif ($science['Science'] > 40 && $science['Science'] <= 60) {
                                            $mark = "C";
                                        } elseif ($science['Science'] > 20 && $science['Science'] <= 40) {
                                            $mark = "D";
                                        } elseif ($science['Science'] > 0 && $science['Science'] <= 20) {
                                            $mark = "E";
                                        }
                                        unset($science["Science"]);
                                    @endphp
                                    @foreach ($grades as $grade )
                                        @if($mark == $grade)
                                            <td class="border h-9 border-gray-500 bg-amber-400 text-center">{{ $grade }}</td>
                                        @else
                                            <td class="border h-9 border-gray-500 text-center">{{ $grade }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                                @foreach ($science as $description => $subject)
                                    <tr>
                                        <td class="border h-9 border-gray-500"></td>
                                        <td class="border h-9 border-gray-500 pl-1">{{ $description }}</td>
                                        @foreach($b_grades as $b_grade)
                                            @if($b_grade == $subject)
                                                <td class="border h-9 border-gray-500 bg-green-500 text-center">{{ $subject }}</td>
                                            @else
                                                <td class="border h-9 border-gray-500 text-center">{{ $b_grade }}</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            @endif
                            {{-- ----- Chemistry ----- --}}
                            @if(!empty($chemistry))
                                <tr>
                                    <td class="border h-9 border-gray-500 text-center">3</td>
                                    <td class="border h-9 border-gray-500 pl-1">Chemistry</td>
                                    @php
                                        $mark = "";
                                        if ($chemistry['Chemistry'] > 80 && $chemistry['Chemistry'] <= 100) {
                                            $mark = "A";
                                        } elseif ($chemistry['Chemistry'] > 60 && $chemistry['Chemistry'] <= 80) {
                                            $mark = "B";
                                        } elseif ($chemistry['Chemistry'] > 40 && $chemistry['Chemistry'] <= 60) {
                                            $mark = "C";
                                        } elseif ($chemistry['Chemistry'] > 20 && $chemistry['Chemistry'] <= 40) {
                                            $mark = "D";
                                        } elseif ($chemistry['Chemistry'] > 0 && $chemistry['Chemistry'] <= 20) {
                                            $mark = "E";
                                        }
                                        unset($chemistry["Chemistry"]);
                                    @endphp
                                    @foreach ($grades as $grade )
                                        @if($mark == $grade)
                                            <td class="border h-9 border-gray-500 bg-amber-400 text-center">{{ $grade }}</td>
                                        @else
                                            <td class="border h-9 border-gray-500 text-center">{{ $grade }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                                @foreach ($chemistry as $description => $subject)
                                    <tr>
                                        <td class="border h-9 border-gray-500"></td>
                                        <td class="border h-9 border-gray-500 pl-1">{{ $description }}</td>
                                        @foreach($b_grades as $b_grade)
                                            @if($b_grade == $subject)
                                                <td class="border h-9 border-gray-500 bg-green-500 text-center">{{ $subject }}</td>
                                            @else
                                                <td class="border h-9 border-gray-500 text-center">{{ $b_grade }}</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    <table class="table h-fit">
                        <thead style="background-color: #00223d;">
                            <tr>
                                <th class="border h-9 border-gray-500 text-white" colspan="2">Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: #00223d;">
                                <td class="border w-1/2 border-gray-500 text-center h-9 text-white">Month</td>
                                <td class="border w-1/2 border-gray-500 text-center h-9 text-white">Percentage</td>
                            </tr>
                            @foreach ($months as $month => $attendance)
                                <tr>
                                    <td class="border border-gray-500 text-center h-9">{{ $month }}</td>
                                    <td class="border border-gray-500 text-center h-9">{{ $attendance }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="[width:21cm] [min-height:29.7cm] p-[12px] my-[20px] mx-auto border border-gray-300 rounded-md shadow-md print:m-0 print:border-none print:rounded-none print:break-after-page print:shadow-none text-gray-900">
            <div class="grid grid-cols-2 text-xs gap-x-2">
                <table class="table table-fixed h-fit">
                    <tbody>
                        {{-- ----- Social Studies ----- --}}
                        @if(!empty($social_studies))
                            <tr>
                                <td class="border h-9 w-[10%] border-gray-500 text-center">4</td>
                                <td class="border h-9 w-[45%] border-gray-500 pl-1">Social Studies</td>
                                @php
                                    $mark = "";
                                    if ($social_studies['Social Studies'] > 80 && $social_studies['Social Studies'] <= 100) {
                                        $mark = "A";
                                    } elseif ($social_studies['Social Studies'] > 60 && $social_studies['Social Studies'] <= 80) {
                                        $mark = "B";
                                    } elseif ($social_studies['Social Studies'] > 40 && $social_studies['Social Studies'] <= 60) {
                                        $mark = "C";
                                    } elseif ($social_studies['Social Studies'] > 20 && $social_studies['Social Studies'] <= 40) {
                                        $mark = "D";
                                    } elseif ($social_studies['Social Studies'] > 0 && $social_studies['Social Studies'] <= 20) {
                                        $mark = "E";
                                    }
                                    unset($social_studies["Social Studies"]);
                                @endphp
                                @foreach ($grades as $grade )
                                    @if($mark == $grade)
                                        <td class="border h-9 border-gray-500 bg-amber-400 text-center">{{ $grade }}</td>
                                    @else
                                        <td class="border h-9 border-gray-500 text-center">{{ $grade }}</td>
                                    @endif
                                @endforeach
                            </tr>
                            @foreach ($social_studies as $description => $subject)
                                <tr>
                                    <td class="border h-9 w-[10%] border-gray-500"></td>
                                    <td class="border h-9 w-[45%] border-gray-500 pl-1">{{ $description }}</td>
                                    @foreach($b_grades as $b_grade)
                                        @if($b_grade == $subject)
                                            <td class="border h-9 border-gray-500 bg-green-500 text-center">{{ $subject }}</td>
                                        @else
                                            <td class="border h-9 border-gray-500 text-center">{{ $b_grade }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        @endif

                        {{-- ----- Physics ----- --}}
                        @if(!empty($physics))
                            <tr>
                                <td class="border h-9 w-[10%] border-gray-500 text-center">4</td>
                                <td class="border h-9 w-[45%] border-gray-500 pl-1">Physics</td>
                                @php
                                    $mark = "";
                                    if ($physics['Physics'] > 80 && $physics['Physics'] <= 100) {
                                        $mark = "A";
                                    } elseif ($physics['Physics'] > 60 && $physics['Physics'] <= 80) {
                                        $mark = "B";
                                    } elseif ($physics['Physics'] > 40 && $physics['Physics'] <= 60) {
                                        $mark = "C";
                                    } elseif ($physics['Physics'] > 20 && $physics['Physics'] <= 40) {
                                        $mark = "D";
                                    } elseif ($physics['Physics'] > 0 && $physics['Physics'] <= 20) {
                                        $mark = "E";
                                    }
                                    unset($physics["Physics"]);
                                @endphp
                                @foreach ($grades as $grade )
                                    @if($mark == $grade)
                                        <td class="border h-9 border-gray-500 bg-amber-400 text-center">{{ $grade }}</td>
                                    @else
                                        <td class="border h-9 border-gray-500 text-center">{{ $grade }}</td>
                                    @endif
                                @endforeach
                            </tr>
                            @foreach ($physics as $description => $subject)
                                <tr>
                                    <td class="border h-9 w-[10%] border-gray-500"></td>
                                    <td class="border h-9 w-[45%] border-gray-500 pl-1">{{ $description }}</td>
                                    @foreach($b_grades as $b_grade)
                                        @if($b_grade == $subject)
                                            <td class="border h-9 border-gray-500 bg-green-500 text-center">{{ $subject }}</td>
                                        @else
                                            <td class="border h-9 border-gray-500 text-center">{{ $b_grade }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        @endif

                        {{-- ----- Biology ----- --}}
                        @if(!empty($biology))
                            <tr>
                                <td class="border h-9 w-[10%] border-gray-500 text-center">5</td>
                                <td class="border h-9 w-[45%] border-gray-500 pl-1">Biology</td>
                                @php
                                    $mark = "";
                                    if ($biology['Biology'] > 80 && $biology['Biology'] <= 100) {
                                        $mark = "A";
                                    } elseif ($biology['Biology'] > 60 && $biology['Biology'] <= 80) {
                                        $mark = "B";
                                    } elseif ($biology['Biology'] > 40 && $biology['Biology'] <= 60) {
                                        $mark = "C";
                                    } elseif ($biology['Biology'] > 20 && $biology['Biology'] <= 40) {
                                        $mark = "D";
                                    } elseif ($biology['Biology'] > 0 && $biology['Biology'] <= 20) {
                                        $mark = "E";
                                    }
                                    unset($biology["Biology"]);
                                @endphp
                                @foreach ($grades as $grade)
                                    @if($mark == $grade)
                                        <td class="border h-9 border-gray-500 bg-amber-400 text-center">{{ $grade }}</td>
                                    @else
                                        <td class="border h-9 border-gray-500 text-center">{{ $grade }}</td>
                                    @endif
                                @endforeach
                            </tr>
                            @foreach ($biology as $description => $subject)
                                <tr>
                                    <td class="border h-9 w-[10%] border-gray-500"></td>
                                    <td class="border h-9 w-[45%] border-gray-500 pl-1">{{ $description }}</td>
                                    @foreach($b_grades as $b_grade)
                                        @if($b_grade == $subject)
                                            <td class="border h-9 border-gray-500 bg-green-500 text-center">{{ $subject }}</td>
                                        @else
                                            <td class="border h-9 border-gray-500 text-center">{{ $b_grade }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                @if($mark_count == 5 && !empty($activity))
                    <table class="table table-fixed h-fit">
                        <thead style="background-color: #00223d;">
                            <tr>
                                <th class="border border-gray-500 h-9 text-white" colspan="2">Grading For Activities Subjects</th>
                            </tr>
                            <tr>
                                <th class="border border-gray-500 h-9 text-white w-1/2">Subjects</th>
                                <th class="border border-gray-500 h-9 text-white w-1/2">Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activity as $activity_name => $activity_grade)
                                <tr>
                                    <td class="border border-gray-500 h-9 text-center">{{ $activity_name }}</td>
                                    <td class="border border-gray-500 h-9 text-center">{{ $activity_grade }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            @if (($mark_count == 3 || $mark_count == 4) && !empty($activity))
                <div class="mt-2 text-xs">
                    <table class="table table-fit h-fit w-full">
                        <thead style="background-color: #00223d;">
                            <tr>
                                <th colspan="{{ count($activity) }}" class="border border-gray-500 h-9 text-white">Grading For Activities Subjects</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($activity as $activity_name => $activity_grade)
                                    <td style="background-color: #00223d;" class="border border-gray-500 h-9 w-[14%] text-white text-center">{{ $activity_name }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($activity as $activity_name => $activity_grade)
                                    <td class="border border-gray-500 h-9 w-[14%] text-center">{{ $activity_grade }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="text-xs mt-3 w-full">
                <table class="table h-fit w-full">
                    <thead style="background-color: #00223d;">
                        <tr class="border border-gray-500">
                            <th colspan="6" class="h-9 text-white">Grade for overall behaviour (A - Above 90, B - Between 80 and 90, C - Between 70 and 79, D - Between 60 and 69, E - Under 60)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($behaviour as $behaviour_name => $behaviour_grade )
                            <tr>
                                <td class="border border-gray-500 h-9 w-3/4 pl-1">{{ $behaviour_name }}</td>
                                @foreach ($grades as $grade)
                                    @if(trim($behaviour_grade) == $grade)
                                        <td class="border border-gray-500 h-9 text-center bg-amber-400">{{ $behaviour_grade }}</td>
                                    @else
                                        <td class="border border-gray-500 h-9 text-center">{{ $grade }}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6" class="border border-gray-500">
                                <div class="py-2 pl-1">
                                    <p class="font-bold py-2">Feed Back Of The Class Teacher</p>
                                    <p class="">{{ $informations['Feedback Of The Class Teacher'] }}</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div @class([
                'mt-2 flex',
                'justify-between' => isset($informations['Dean Sign']),
                'justify-end' => !isset($informations['Dean Sign']),
            ])>
                <div>
                    <img src="{{ asset($signs->where('keyword',$informations['Class Teacher Sign'])->first()->path) }}" class="h-20"/>
                    <p class="text-[12px] font-bold">Signature Of Class Teacher</p>
                </div>
                @if(isset($informations['Dean Sign']))
                    @php
                        $dean = explode('/',$informations['Dean Sign'])
                    @endphp
                    <div>
                        <img src="{{ asset($signs->where('keyword',$dean[0])->first()->path) }}" class="h-20"/>
                        <p class="text-[12px] font-bold">Signature Of Dean
                        </p>
                        @if(count($dean) == 2)
                            @if(strtoupper($dean[1]) == 'L')
                                <p class="text-[12px] font-bold">(Lower Primary)</p>
                            @elseif(strtoupper($dean[1]) == 'U')
                                <p class="text-[12px] font-bold">(Upper Primary)</p>
                            @elseif(strtoupper($dean[1]) == 'S')
                                <p class="text-[12px] font-bold">(Secondary Division)</p>
                            @endif
                        @endif
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</body>
</html>