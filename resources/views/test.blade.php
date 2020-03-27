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
            left: 155mm;
            top: 15mm;
        }

        .emissionDate {
            position: absolute;
            left: 55mm;
            top: 18mm;
            white-space: nowrap;
        }
        .emissionYear {
            position: absolute;
            left: 115mm;
            top: 18mm;
            white-space: nowrap;
        }
        .expirationDay {
            position: absolute;
            left: 28mm;
            top: 25mm;
            white-space: nowrap;
        }

        .expirationMonth {
            position: absolute;
            left: 52mm;
            top: 25mm;
            white-space: nowrap;
        }

        .expirationYear {
            position: absolute;
            left: 82mm;
            top: 25mm;
            white-space: nowrap;
        }

        .beneficiary {
            position: absolute;
            left: 50mm;
            top: 30mm;
            white-space: nowrap;
        }

        .amountLetters {
            position: absolute;
            left: 28mm;
            top: 48mm;
            white-space: nowrap;
        }

    </style>
</head>

<body>
@for($i=0;$i<4;$i++)
    <div class="page">
        <div class="emissionDate">12 de Marzo</div><!---->
        <div class="emissionYear">2019</div><!---->
        <div class="amount">15</div>
        <div class="expirationDay">25</div><!---->
        <div class="expirationMonth">Abril</div><!---->
        <div class="expirationYear">2019</div>
        <div class="beneficiary">Bruno Contartese</div>
        <div class="amountLetters">{{$numbersInLetters}}</div>
    </div>
    @if(($i+1) < 4)
        <div class="newPage"></div>
    @endif
@endfor

</body>
</html>