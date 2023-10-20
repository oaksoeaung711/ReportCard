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

            body {
                font-family: 'Times New Roman', Times, serif;
            }

            @media print {
                .forbtn{
                    display: none;
                }
            }
            
            .forbtn {
                position: fixed;
                right: 0;
                bottom: 0;
            }

            .print-btn {
                width: 80px;
                height: 80px;

                background-color: #00233B;
                border: none;
                border-radius: 10px;

                color: #fff;
                text-align: center;
            }

            .forbtn i {
                font-size: 30px;
            }
        </style>
    </head>
    <body>
        @foreach ($students as $name => $informations)
            <div class="[width:21cm] [min-height:29.7cm] p-[12px] my-[20px] mx-auto bg-no-repeat bg-[length:100%_auto] bg-center border border-gray-300 rounded-md shadow-md print:m-0 print:border-none print:rounded-none print:break-after-page print:shadow-none grid grid-rows-6 page1" style="background-image: url({{ asset('images/backgrounds/unigraduation.jpg') }})">
                <div class="row-start-3 relative">
                    <div class="absolute right-1/2 translate-x-1/2 top-[75%]">
                        <p class="text-[#A27433] text-2xl">{{ $name }}</p>
                    </div>
                </div>
                @if ($informations['Program'] == 'preig')
                    <div class="row-start-4 space-y-4 text-[#A27433] text-center text-xl pt-14">
                        <p>has successfully completed the <span class="font-bold">Pre-IGCSE</span></p>
                        <p class="font-bold">(International General Certificate of Secondary Education)</p>
                        <p>Program at KBTC Pre University in <span>{{ $informations['AcademicYear'] }}</span> Academic Year.</p>
                    </div>
                @elseif ($informations['Program'] == 'ncc')
                    <div class="row-start-4 space-y-1 text-[#A27433] text-center text-xl pt-14">
                        <p>has successfully completed the</p>
                        <p class="font-bold">NCC Education L3IFDHES (Level 3 International Foundation</p>
                        <p class="font-bold">Diploma for Higher Education Studies)</p>
                        <p>Program at KBTC Pre University in <span>{{ $informations['AcademicYear'] }}</span> Academic Year.</p>
                    </div>
                @elseif ($informations['Program'] == 'ged')
                    <div class="row-start-4 space-y-4 text-[#A27433] text-center text-xl pt-14">
                        <p>has successfully completed the <span class="font-bold">GED</span></p>
                        <p class="font-bold">(General Educational Development)</p>
                        <p>Program at KBTC Pre University in <span>{{ $informations['AcademicYear'] }}</span> Academic Year.</p>
                    </div>
                @endif
                <div class="row-start-5 grid grid-cols-7">
                    <div class="col-start-2 text-[#A27433] pt-28 text-center col-span-2">
                        <p>{{ $informations['Day'] }}-{{ $informations['Month'] }}-{{ $informations['Year'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
        <div class='forbtn'>
            <button class='print-btn' type='button' onclick='printme()'><i class='fa-solid fa-file-pdf'></i></button>
        </div>
        <script type="text/javascript">
            function printme() {
                window.print();
            }
        </script>
    </body>
</html>