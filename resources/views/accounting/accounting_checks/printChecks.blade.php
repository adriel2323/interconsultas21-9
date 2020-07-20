<html>
<head>
    <title>Cheques</title>
    <meta charset="utf-8"/>

    <style>
        body,html {
            padding: 0;
            margin: 0;
            width: 184mm !important;
            height: 75mm !important;
        }
        .page {
            font-family: "sans-serif";
            font-size: 15px;
        }

        .newPage {

            page-break-after: always;
        }
        .page {
            position: relative;
            width: 99.9% !important;
            height: 99.9% !important;
            padding: 0;
            margin: 0;
            white-space: nowrap;
        }

        .amount {
            position: absolute;
            /*left: 155mm;
            top: 15mm;*/
            left: {{$checkParameters['amountLeft']}}mm;
            top: {{$checkParameters['amountTop']}}mm;
        }

        .emissionDate {
            position: absolute;
            /*left: 55mm;
            top: 18mm;*/
            left: {{$checkParameters['emissionDateLeft']}}mm;
            top: {{$checkParameters['emissionDateTop']}}mm;
            white-space: nowrap;
        }
        .emissionYear {
            position: absolute;
            /*left: 115mm;
            top: 18mm;*/
            left: {{$checkParameters['emissionYearLeft']}}mm;
            top: {{$checkParameters['emissionYearTop']}}mm;
            white-space: nowrap;
        }
        .expirationDay {
            position: absolute;
            /*left: 28mm;
            top: 25mm;*/
            left: {{$checkParameters['expirationDayLeft']}}mm;
            top: {{$checkParameters['expirationDayTop']}}mm;
            white-space: nowrap;
        }

        .expirationMonth {
            position: absolute;
            /*left: 52mm;
            top: 25mm;*/
            left: {{$checkParameters['expirationMonthLeft']}}mm;
            top: {{$checkParameters['expirationMonthTop']}}mm;
            white-space: nowrap;
        }

        .expirationYear {
            position: absolute;
            /*left: 82mm;
            top: 25mm;*/
            left: {{$checkParameters['expirationYearLeft']}}mm;
            top: {{$checkParameters['expirationYearTop']}}mm;
            white-space: nowrap;
        }

        .beneficiary {
            position: absolute;
            /*left: 50mm;
            top: 30mm;*/
            left: {{$checkParameters['beneficiaryLeft']}}mm;
            top: {{$checkParameters['beneficiaryTop']}}mm;
            white-space: nowrap;
        }

        .amountLetters {
            position: absolute;
            /*left: 28mm;
            top: 48mm;*/
            left: {{$checkParameters['amountLettersLeft']}}mm;
            top: {{$checkParameters['amountLettersTop']}}mm;
            white-space: nowrap;
        }

    </style>
</head>

<body>
@foreach($checks as $key => $check)
    <div class="page">
        <div class="emissionDate">{{\Carbon\Carbon::parse($check->emission_date)->format('d')}} de {{$check->getMonth($check->emission_date)->format('F')}}</div><!---->
        <div class="emissionYear">{{\Carbon\Carbon::parse($check->emission_date)->format('Y')}}</div><!---->
        <div class="amount">{{number_format($check->amount, 2, ',', '.')}}</div>
        <div class="expirationDay">{{\Carbon\Carbon::parse($check->expiration_date)->format('d')}}</div><!---->
        <div class="expirationMonth">{{$check->getMonth($check->expiration_date)->format('F')}}</div><!---->
        <div class="expirationYear">{{\Carbon\Carbon::parse($check->expiration_date)->format('Y')}}</div>
        <div class="beneficiary">{{$check->pay_name}}</div>
        <div class="amountLetters">**{{NumerosEnLetras::convertir(bcdiv($check->amount,1,2))}}**</div>
    </div>
    @if(isset($checks[$key+1]))
        <div class="newPage"></div>
    @endif
@endforeach

</body>
</html>