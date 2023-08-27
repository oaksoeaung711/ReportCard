<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            $subjects = [];
            $months = [];
            $behaviour = [];
            $grades = ['A', 'B', 'C', 'D', 'E'];
            foreach($informations as $infokey => $infovalue){
                $explodedinfokey = explode('.',$infokey);
                if(count($explodedinfokey) == 2) {
                    if($explodedinfokey[0] == 'Subject'){
                        $subjects[$explodedinfokey[1]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Month'){
                        $months[$explodedinfokey[1]] = $infovalue;
                    }elseif($explodedinfokey[0] == 'Behaviour'){
                        $behaviour[$explodedinfokey[1]] = $infovalue;
                    }
                }
            }
        @endphp
        <div class="[width:21cm] [min-height:29.7cm] p-[12px] my-[20px] mx-auto bg-no-repeat bg-[length:100%_auto] bg-center border border-gray-300 rounded-md shadow-md print:m-0 print:border-none print:rounded-none print:break-after-page print:shadow-none grid grid-rows-6" style="background-image: url({{ asset('images/backgrounds/preuni_rcbg.png') }})">
            <div class="row-start-2 row-span-4 rc-body grid grid-cols-3 gap-y-3 text-sm">
                <div class="col-span-3">
                    <div class="grid grid-cols-3 gap-y-2 mt-3">
                        <p class=""><span class="font-extrabold">Name : </span><span>{{ $name }}</span></p>
                        <p class=""><span class="font-extrabold">School Year : </span><span>{{ $informations['School Year'] }}</span></p>
                        <p class=""><span class="font-extrabold">Grade : </span><span>{{ $informations['Grade'] }}</span></p>
                        <p class=""><span class="font-extrabold">Term : </span><span>{{ $informations['Term'] }}</span></p>
                        <p class=""><span class="font-extrabold">Campus : </span><span>{{ $informations['Campus'] }}</span></p>
                        <p class=""><span class="font-extrabold">Date : </span><span>{{ $informations['Date'] }}</span></p>
                    </div>
                </div>

                <div class="row-span-2 col-span-3 mt-4">
                    <div class="">
                        @if($type == '80marks')
                            <table class="w-full h-full table">
                                <thead style="background-color: #000733">
                                    <tr>
                                        <th colspan="4" class="py-1 border border-gray-500 text-white">Academic Progress</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border border-gray-500 py-1 text-center font-bold">Grade A</td>
                                        <td class="border border-gray-500 py-1 text-center font-bold">Grade B</td>
                                        <td class="border border-gray-500 py-1 text-center font-bold">Grade C</td>
                                        <td class="border border-gray-500 py-1 text-center font-bold">Grade D</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-500 py-1 text-center">61 - 80</td>
                                        <td class="border border-gray-500 py-1 text-center">41 - 60</td>
                                        <td class="border border-gray-500 py-1 text-center">21 - 40</td>
                                        <td class="border border-gray-500 py-1 text-center">0 - 20</td>
                                    </tr>
                                </tbody>
                            </table>
                        @elseif($type == '50marks')
                            <table class="w-full h-full table">
                                <thead style="background-color: #000733">
                                    <tr>
                                        <th colspan="4" class="py-1 border border-gray-500 text-white">Academic Progress</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border border-gray-500 py-1 text-center font-bold">Grade A</td>
                                        <td class="border border-gray-500 py-1 text-center font-bold">Grade B</td>
                                        <td class="border border-gray-500 py-1 text-center font-bold">Grade C</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-gray-500 py-1 text-center">50 - 31</td>
                                        <td class="border border-gray-500 py-1 text-center">30 - 16</td>
                                        <td class="border border-gray-500 py-1 text-center">15 - 0</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>

                <div class="col-span-3 marks grid grid-cols-2 gap-x-3">
                    <div>
                        <table class="w-full">
                            <thead style="background-color: #000733">
                                <tr>
                                    <th colspan="3" class="text-white py-1 border border-gray-500">Marks And Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="background-color: #000733">
                                    <td class="border border-gray-500 text-white text-center py-1 w-1/2">Subjects</td>
                                    <td class="border border-gray-500 text-white text-center py-1 ">Marks</td>
                                    <td class="border border-gray-500 text-white text-center py-1 ">Grade</td>
                                </tr>
                                @foreach ($subjects as $subjectname => $marks)
                                    @if ($type == '80marks')
                                        <tr>
                                            <td class="border border-gray-500 py-1 px-2">{{ $subjectname }}</td>
                                            <td class="border border-gray-500 py-1 px-2 text-center ">{{ $marks }}</td>
                                            @if((int)$marks)
                                                @if ( (int)$marks >= 61 && (int)$marks <= 80)
                                                    <td class="border border-gray-500 py-1 px-2 text-center ">A</td>
                                                @elseif ((int)$marks >= 41 && (int)$marks <= 60)
                                                    <td class="border border-gray-500 py-1 px-2 text-center ">B</td>
                                                @elseif ((int)$marks >= 21 && (int)$marks <= 40)
                                                    <td class="border border-gray-500 py-1 px-2 text-center ">C</td>
                                                @elseif ((int)$marks >= 0 && (int)$marks <= 20)
                                                    <td class="border border-gray-500 py-1 px-2 text-center ">D</td>
                                                @endif
                                            @else
                                                <td class="border border-gray-500 py-1 px-2 text-center "></td>
                                            @endif
                                        </tr>
                                    @elseif ($type == '50marks')
                                        <tr>
                                            <td class="border border-gray-500 py-1 px-2">{{ $subjectname }}</td>
                                            <td class="border border-gray-500 py-1 px-2 text-center ">{{ $marks }}</td>
                                            @if((int)$marks)
                                                @if ( (int)$marks >= 31 && (int)$marks <= 50)
                                                    <td class="border border-gray-500 py-1 px-2 text-center ">A</td>
                                                @elseif ((int)$marks >= 16 && (int)$marks <= 30)
                                                    <td class="border border-gray-500 py-1 px-2 text-center ">B</td>
                                                @elseif ((int)$marks >= 0 && (int)$marks <= 15)
                                                    <td class="border border-gray-500 py-1 px-2 text-center ">C</td>
                                                @endif
                                            @else
                                                <td class="border border-gray-500 py-1 px-2 text-center "></td>
                                            @endif
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <table class="w-full">
                            <thead style="background-color: #000733">
                                <tr>
                                    <th colspan="3" class="text-white py-1 border border-gray-500">Monthly Attendance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="background-color: #000733">
                                    <td class="border border-gray-500 text-white text-center py-1">Month</td>
                                    <td class="border border-gray-500 text-white text-center py-1">Percentage</td>
                                    <td class="border border-gray-500 text-white text-center py-1">Remark</td>
                                </tr>
                                @foreach ($months as $month => $attendance)
                                    <tr>
                                        <td class="border border-gray-500 py-1 px-2">{{ $month }}</td>
                                        @php
                                            $explodeattendance = explode(',',$attendance);
                                        @endphp
                                        @if (count($explodeattendance) == 1)
                                            <td class="border border-gray-500 py-1 px-2 text-center ">{{ $attendance }}</td>
                                            <td class="border border-gray-500 py-1 px-2 text-center "></td>
                                        @elseif (count($explodeattendance) == 2)
                                            <td class="border border-gray-500 py-1 px-2 text-center ">{{ $explodeattendance[0] }}</td>
                                            <td class="border border-gray-500 py-1 px-2 text-center ">{{ $explodeattendance[1] }}</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="[width:21cm] [min-height:29.7cm] p-[12px] my-[20px] mx-auto border border-gray-300 rounded-md shadow-md print:m-0 print:border-none print:rounded-none print:break-after-page print:shadow-none">
            <div class="text-sm">
                <table class="w-full">
                    <thead style="background-color: #000733">
                        <tr class="">
                            <th colspan="5" class="py-2 border border-gray-500 text-white">Grade For Overall Behaviour</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 border border-gray-500 text-center">A - Above 90</td>
                            <td class="py-2 border border-gray-500 text-center">B - Between 80 and 90</td>
                            <td class="py-2 border border-gray-500 text-center">C - Between 70 and 79</td>
                            <td class="py-2 border border-gray-500 text-center">D - Between 60 and 69</td>
                            <td class="py-2 border border-gray-500 text-center">E - Under 60</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 text-sm">
                <table class="w-full">
                    <thead style="background-color: #000733">
                        <tr class="">
                            <td colspan="6" class="py-2 px-2 border border-gray-500 text-white">Overall Behaviour</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($behaviour as $behaviourname => $behaviourgrade )
                            <tr>
                                <td class="px-2 py-2 w-[70%] border border-gray-500">{{ $behaviourname }}</td>
                                @foreach ($grades as $grade)
                                    <td class="px-2 py-2 border border-gray-500 text-center {{ ($behaviour[$behaviourname] == $grade) ? 'bg-green-500' : '' }}">{{ $grade }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        <tr>
                            <td class="px-2 py border border-gray-500" colspan="6">
                                <div>
                                    <p class="font-bold my-4">Feedback Of The Class Teacher</p>
                                    <p class="text-sm my-4">{{ $informations['Feedback Of The Class Teacher'] }}</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-end mt-4 font-bold text-sm">
                <div>
                    <p class="my-2 text-xs">Class Teacher's Sign</p>
                    <img src="{{ asset($signs->where('keyword',$informations['Class Teacher Sign'])->first()->path) }}" class=" h-20 mx-auto" />
                </div>
            </div>
        </div>
    @endforeach
</body>
</html>