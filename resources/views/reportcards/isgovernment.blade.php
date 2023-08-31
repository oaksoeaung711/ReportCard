<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Government</title>
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
        <div class="[width:21cm] [min-height:29.7cm] my-[20px] mx-auto bg-no-repeat bg-[length:100%_auto] bg-center border border-gray-300 rounded-md shadow-md print:m-0 print:border-none print:rounded-none print:break-after-page print:shadow-none text-gray-800 relative p-10">
            <div>
                <h1 class="font-bold text-4xl text-center mt-8 text-gray-900">Student Report Card</h1>
            </div>
            <div class="mt-8">
                <p class="font-bold my-4 text-sm">Name : <span class="font-normal">{{ $name }}</span></p>
                <p class="font-bold my-4 text-sm">Academic Year : <span class="font-normal">{{ $informations['Academic Year'] }}</span></p>
                <p class="font-bold my-4 text-sm">Grade : <span class="font-normal">{{ $informations['Cambridge Grade'] }}</span> <span class="font-normal">({{ $informations['Government Grade'] }})</span></p>
                <p class="font-bold my-4 text-sm">Campus : <span class="font-normal">{{ $informations['Campus'] }}</span></p>
            </div>
            @php
                if(strtolower($informations['Government Grade']) === 'kg' || strtolower($informations['Government Grade']) === 'grade-1' || strtolower($informations['Government Grade']) === 'grade-2' || strtolower($informations['Government Grade']) === 'grade-3' ) {
                    $grade = "lower";
                }elseif(strtolower($informations['Government Grade']) === 'grade-4' || strtolower($informations['Government Grade']) === 'grade-5' || strtolower($informations['Government Grade']) === 'grade-6' || strtolower($informations['Government Grade']) === 'grade-7' || strtolower($informations['Government Grade']) === 'grade-8' || strtolower($informations['Government Grade']) === 'grade-9' || strtolower($informations['Government Grade']) === 'grade-10') {
                    $grade = "upper";
                }
            @endphp
            <div class="text-xs mt-3 @php echo $grade == 'upper' ? "hidden" : "" @endphp">
                <table class="table w-full">
                    <thead style="background-color: #00223d;">
                        <tr>
                            <th class="text-white border border-gray-500 h-8" colspan="3">Grade Boundary Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="border font-bold border-gray-500 bg-amber-400 h-8 text-center">Grade A</th>
                            <th class="border font-bold border-gray-500 bg-amber-400 h-8 text-center">Grade S</th>
                            <th class="border font-bold border-gray-500 bg-amber-400 h-8 text-center">Grade E</th>
                        </tr>
                        <tr>
                            <td class="border font-bold border-gray-500 h-8 text-center">75% to 100%</td>
                            <td class="border font-bold border-gray-500 h-8 text-center">40% to 74%</td>
                            <td class="border font-bold border-gray-500 h-8 text-center">0% to 39%</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-xs mt-3 @php echo $grade == 'lower' ? "hidden" : "" @endphp">
                <table class="table w-full">
                    <thead style="background-color: #00223d;">
                        <tr>
                            <th class="text-white border border-gray-500 h-8" colspan="4">Grade Boundary Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="border font-bold border-gray-500 bg-amber-400 h-8 text-center">Grade A</th>
                            <th class="border font-bold border-gray-500 bg-amber-400 h-8 text-center">Grade B</th>
                            <th class="border font-bold border-gray-500 bg-amber-400 h-8 text-center">Grade C</th>
                            <th class="border font-bold border-gray-500 bg-amber-400 h-8 text-center">Grade D</th>
                        </tr>
                        <tr>
                            <td class="border font-bold border-gray-500 h-8 text-center">80% to 100%</td>
                            <td class="border font-bold border-gray-500 h-8 text-center">60% to 79%</td>
                            <td class="border font-bold border-gray-500 h-8 text-center">40% to 59%</td>
                            <td class="border font-bold border-gray-500 h-8 text-center">0% to 39%</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-xs mt-3">
                <table class="table table-fixed w-full">
                    <thead>
                        <tr>
                            <th class="font-bold border border-gray-500 h-8 w-[5%]">No</th>
                            <th class="font-bold border border-gray-500 h-8 w-[40%]">Subject</th>
                            <th class="font-bold border border-gray-500 h-8">July</th>
                            <th class="font-bold border border-gray-500 h-8">October</th>
                            <th class="font-bold border border-gray-500 h-8">December</th>
                            <th class="font-bold border border-gray-500 h-8">February</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($grade == 'lower')
                            @php
                                $subjects = [];
                                $months = explode(',',$informations['Month']);
                                $no = 0;
                                foreach ($informations as $infoheader => $infocontent) {
                                    $explodedinfos = explode('.',$infoheader);
                                    if($explodedinfos[0] == "Subject"){
                                        $explodedcontent = explode(',',$infocontent);
                                        if(count($explodedcontent) === count($months)){
                                            $contentandmonths = array_combine($months,$explodedcontent);
                                        }
                                        $subjects[$explodedinfos[1]] = $contentandmonths;
                                    }
                                }
                            @endphp

                            @foreach ($subjects as $name => $marks )
                                <tr>
                                    <td class="border font-bold border-gray-500 h-8 w-[5%] text-center">{{ $no += 1 }}</td>
                                    <td class="border font-bold border-gray-500 h-8 w-[40%] pl-1">{{ $name }}</td>
                                    <td class="border font-bold border-gray-500 h-8 text-center">
                                        @if(array_key_exists("july",$marks))
                                            @if ($marks['july'] >= 75 && $marks['july'] <= 100)
                                                <span>A</span>
                                            @elseif ($marks['july'] >= 40 && $marks['july'] <= 74)
                                                <span>S</span>
                                            @elseif ($marks['july'] >= 0 && $marks['july'] <= 39)
                                                <span>E</span>
                                            @else
                                                <span>{{ $marks['july'] }}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="border font-bold border-gray-500 h-8 text-center">
                                        @if(array_key_exists("october",$marks))
                                            @if ($marks['october'] >= 75 && $marks['october'] <= 100)
                                                <span>A</span>
                                            @elseif ($marks['october'] >= 40 && $marks['october'] <= 74)
                                                <span>S</span>
                                            @elseif ($marks['october'] >= 0 && $marks['october'] <= 39)
                                                <span>E</span>
                                            @else
                                                <span>{{ $marks['october'] }}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="border font-bold border-gray-500 h-8 text-center">
                                        @if(array_key_exists("december",$marks))
                                            @if ($marks['december'] >= 75 && $marks['december'] <= 100)
                                                <span>A</span>
                                            @elseif ($marks['december'] >= 40 && $marks['december'] <= 74)
                                                <span>S</span>
                                            @elseif ($marks['december'] >= 0 && $marks['december'] <= 39)
                                                <span>E</span>
                                            @else
                                                <span>{{ $marks['december'] }}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="border font-bold border-gray-500 h-8 text-center">
                                        @if(array_key_exists("february",$marks))
                                            @if ($marks['february'] >= 75 && $marks['february'] <= 100)
                                                <span>A</span>
                                            @elseif ($marks['february'] >= 40 && $marks['february'] <= 74)
                                                <span>S</span>
                                            @elseif ($marks['february'] >= 0 && $marks['february'] <= 39)
                                                <span>E</span>
                                            @else
                                                <span>{{ $marks['february'] }}</span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @elseif ($grade = 'upper')
                            @php
                                $subjects = [];
                                $months = explode(',',$informations['Month']);
                                $no = 0;
                                foreach ($informations as $infoheader => $infocontent) {
                                    $explodedinfos = explode('.',$infoheader);
                                    if($explodedinfos[0] == "Subject"){
                                        $explodedcontent = explode(',',$infocontent);
                                        if(count($explodedcontent) === count($months)){
                                            $contentandmonths = array_combine($months,$explodedcontent);
                                        }
                                        $subjects[$explodedinfos[1]] = $contentandmonths;
                                    }
                                }
                            @endphp

                            @foreach ($subjects as $name => $marks )
                                <tr>
                                    <td class="border font-bold border-gray-500 h-8 w-[5%] text-center">{{ $no += 1 }}</td>
                                    <td class="border font-bold border-gray-500 h-8 w-[40%] pl-1">{{ $name }}</td>
                                    <td class="border font-bold border-gray-500 h-8 text-center">
                                        @if(array_key_exists("july",$marks))
                                            @if ($marks['july'] >= 80 && $marks['july'] <= 100)
                                                <span>A</span>
                                            @elseif ($marks['july'] >= 60 && $marks['july'] <= 79)
                                                <span>B</span>
                                            @elseif ($marks['july'] >= 40 && $marks['july'] <= 59)
                                                <span>C</span>
                                            @elseif ($marks['july'] >= 0 && $marks['july'] <= 39)
                                                <span>D</span>
                                            @else
                                                <span>{{ $marks['july'] }}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="border font-bold border-gray-500 h-8 text-center">
                                        @if(array_key_exists("october",$marks))
                                            @if ($marks['october'] >= 80 && $marks['october'] <= 100)
                                                <span>A</span>
                                            @elseif ($marks['october'] >= 60 && $marks['october'] <= 79)
                                                <span>B</span>
                                            @elseif ($marks['october'] >= 40 && $marks['october'] <= 59)
                                                <span>C</span>
                                            @elseif ($marks['october'] >= 0 && $marks['october'] <= 39)
                                                <span>D</span>
                                            @else
                                                <span>{{ $marks['october'] }}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="border font-bold border-gray-500 h-8 text-center">
                                        @if(array_key_exists("december",$marks))
                                            @if ($marks['december'] >= 80 && $marks['december'] <= 100)
                                                <span>A</span>
                                            @elseif ($marks['december'] >= 60 && $marks['december'] <= 79)
                                                <span>B</span>
                                            @elseif ($marks['december'] >= 40 && $marks['december'] <= 59)
                                                <span>C</span>
                                            @elseif ($marks['december'] >= 0 && $marks['december'] <= 39)
                                                <span>D</span>
                                            @else
                                                <span>{{ $marks['december'] }}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="border font-bold border-gray-500 h-8 text-center">
                                        @if(array_key_exists("february",$marks))
                                            @if ($marks['february'] >= 80 && $marks['february'] <= 100)
                                                <span>A</span>
                                            @elseif ($marks['february'] >= 60 && $marks['february'] <= 79)
                                                <span>B</span>
                                            @elseif ($marks['february'] >= 40 && $marks['february'] <= 59)
                                                <span>C</span>
                                            @elseif ($marks['february'] >= 0 && $marks['february'] <= 39)
                                                <span>D</span>
                                            @else
                                                <span>{{ $marks['february'] }}</span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="absolute right-10">
                <img src="{{ asset($signs->where('keyword',$informations['Class Teacher Sign'])->first()->path) }}" class="h-20" />
                <p class="font-bold text-[12px]">Class Teacher's Sign</p>
            </div>
        </div>
    @endforeach
</body>
</html>