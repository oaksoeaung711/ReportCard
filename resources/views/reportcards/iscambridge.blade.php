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
            // dd($informations);
            foreach($informations as $infokey => $infovalue){
                $explodedinfokey = explode('.',$infokey);
                if(count($explodedinfokey) == 2) {
                    
                }
            }
        @endphp
        <div class="[width:21cm] [min-height:29.7cm] p-[12px] my-[20px] mx-auto bg-no-repeat bg-[length:100%_auto] bg-center border border-gray-300 rounded-md shadow-md print:m-0 print:border-none print:rounded-none print:break-after-page print:shadow-none grid grid-rows-6" style="background-image: url({{ asset('images/backgrounds/is_rcbg.jpg') }})">
            
        </div>

        <div class="[width:21cm] [min-height:29.7cm] p-[12px] my-[20px] mx-auto border border-gray-300 rounded-md shadow-md print:m-0 print:border-none print:rounded-none print:break-after-page print:shadow-none">
            
        </div>
    @endforeach
</body>
</html>