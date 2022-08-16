<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>Application Form</title>
    <style>
        @font-face {
  font-family: 'header';
  src: url('/fonts/KhmerOSmuollight.ttf') format('truetype');
}
        body{
            font-family: "Khmer", "Khmer OS Battambang", "Khmer OS Siemreap";
        }

        #p1{
            position: relative;
            width: 1200px;
            height: 800px;
            background: url("/img/license{{ $sec->id }}.png");
            background-repeat: no-repeat;
            background-size: 1185px 820px;
        }
        .font-head{
            font-family: "header";
        }
        span {
            position: absolute;
        }
.h1 {
    top: 100px;
    left: 875px;
}
.h2 {
    top: 130px;
    left: 854px;
}
.img001{
    position: absolute;
    top: 167px;
    left: 895px;
}
.h3 {
    top: 150px;
    left: 165px;
}
.h4 {
    top: 175px;
    left: 136px;
}
.h5 {
    top: 200px;
    left: 90px;
    width: 265px;
    text-align: center;
}
.h6 {
    top: 185px;
    left: 510px;
    font-size: 23px;
}

.h7 {
    top: 223px;
    left: 385px;
    font-size: 20px;
}

.h8 {
    top: 258px;
    left: 502px;
    font-size: 18px;
}

.n1 {
    top: 300px;
    left: 200px;
}
.name {
    top: 295px;
    left: 425px;
}
.name ls{
    font-size: 18px;
}
.name b {
    text-transform: uppercase;
}
.s1 {
    top: 333px;
    left: 200px;
}
.ser_type {
    top: 330px;
    left: 425px;
}
.b1 {
    top: 367px;
    left: 200px;
}
.brand {
    top: 364px;
    left: 425px;
}
.a1 {
    top: 398px;
    left: 200px;
}
.addr {
    top: 398px;
    left: 425px;
}
.t6 {
    top: 432px;
    left: 200px;
}
.t61 {
    top: 462px;
    left: 200px;
}
.t62 {
    top: 490px;
    left: 200px;
}
.t7 {
    top: 520px;
    left: 200px;
}
.t8 , .t9 {
    font-family: "Khmer", "Khmer OS Battambang", "Khmer OS Siemreap";
    position: absolute;
    font-size: 16px;
    border: none;
    background: none;
    text-align: center;
    width: 430px;
    left: 635px;
    padding: 10px;
}
.t8{
    top: 536px;
}
.t9 {
    top: 567px;
}

.t10 {
    top: 601px;
    left: 825px;
}


.t11 {
    font-size: 12px;
    top: 675px;
    left: 125px;
}

.t21 {
    font-size: 11px;
    top: 697px;
    left: 125px;
}
.num{
    font-family: "Khmer", "Khmer OS Battambang", "Khmer OS Siemreap";
    position: absolute;
    font-size: 17px;
    border: none;
    background: none;
    text-align: center;
    top: 200px;
    left: 185px;
    width: 125px;
}
input[type="text"]:focus {
    outline: 0px;
}

.photobox{
    position: absolute;
    width: 85px;
    height: 105px;
    text-align: center;
    border: 1px solid #1a202c;
    top: 215px;
    left: 933px;
}

@media print {

  @page {
      size: A4 landscape;
  }

}

    </style>
</head>
<body>
    <div id="p1">
        <div class="photobox"><br><br>4 x 6</div>
        <span class="h1 font-head">ព្រះរាជាណាចក្រកម្ពុជា</span>
        <span class="h2 font-head">ជាតិ សាសនា ព្រះមហាក្សត្រ</span>
        <img src="/img/img001.png" class="img001" alt="">
        <span class="h3 font-head">{{ $pro }}</span>
        <span class="h4 font-head">រដ្ឋបាល{{ $dis }}</span>
        <span class="h5">លេខៈ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/<sub>២២</sub> កបប</span>
{{--        <span class="h5">លេខៈ {{ $tran->letter_number }} កបប</span>--}}
{{--        <input type="text" class="num">--}}
        <span class="h6 font-head">បណ្ណអនុញ្ញាត</span>
        <span class="h7 font-head">ប្រកបអាជីវកម្ម-សេវាកម្ម-វិស័យទេសចរណ៍ </span>
        <span class="h8 font-head">អភិបាល{{ $dis }}</span>
        <span class="n1">អនុញ្ញាតឱ្យ លោក-លោកស្រី </span>
        <span class="name">: <ls class="font-head">{{ $cus->namekh }}
            </ls>&ensp;&ensp;&ensp;&ensp;&ensp; អក្សរឡាតាំង &ensp;&ensp;<b style="font-family: centuary"> {{ $cus->nameen }} </b> </span>
        <span class="s1">ប្រភេទអាជីវកម្ម-សេវាកម្ម</span>
        <span class="ser_type font-head">
            : {!! $ser_type->namekh !!} &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            @if($tran->amount != '') @if($tran->amount > 0)
                ចំនួន  {{ convertToKhmerNumber($tran->amount) }}{{ $ser_type->gauge }}
            @endif @endif
        </span>
        <span class="b1">នាមករណ៍ </span>
        <span class="brand font-head">: {{ $ser->brand_namekh }} <b>{{ $ser->brand_nameen==''?'':'- '.$ser->brand_nameen }}  </b></span>
        <span class="a1">អាសយដ្ឋានអាជីវកម្ម</span>
        <span class="addr">
            : {{ $ser->home==''?'':'ផ្ទះលេខ'.$ser->home }}
              {{ $ser->locate }}
              {{ $ser->street==''?'':'ផ្លូវ'.$ser->street }}
              {{ $ser->group==''?'':'ក្រុមទី'.$ser->group }}

            ភូមិ{{ $vil2->namekh }} សង្កាត់{{ $com2->namekh }} ក្រុងបាត់ដំបង ខេត្ដបាត់ដំបង។
        </span>
        <span class="t6">
            អ្នកកាន់បណ្ណអនុញ្ញាតត្រូវគោរពយ៉ាងម៉ឺងម៉ាត់តាមច្បាប់ និង បទបញ្ញត្តិផ្សេងៗ។
        </span>
        <span class="t61">
            មុនផុតកំណត់រយៈពេល ៣០ថ្ងៃ អាជីវករ-សេវាករត្រូវមកដាក់ពាក្យសុំបន្ដបណ្ណអនុញ្ញាតអាជីវកម្ម-សេវាកម្ម។
        </span>
        <span class="t62">
            បំរាមៈ ហាមជួញដូរ និងប្រើប្រាស់គ្រឿងញៀន-ហាមជួញដូរផ្លូវភេទ-ហាមការកេងប្រវ័ញ្ញពលកម្មកុមារ និងត្រូវបិទស្លាកហាមជក់បារី។
        </span>
        <span class="t7">
            បណ្ណអនុញ្ញាតសេវាកម្មនេះមានសុពលភាពត្រឹម
            <b>
            ថ្ងៃទី &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ខែ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ឆ្នាំ{{ formatDateKh(\Carbon\Carbon::make(today())->addYears($ser_type->validity_period), 'y') }}
            </b> ។
        </span>

        <input class="t8" value="ថ្ងៃ                       ខែ              ឆ្នាំខាល ចត្វាស័ក ព.ស.២៥៦៦" id="lunar_date">
        <input class="t9" value="ក្រុងបាត់ដំបង ថ្ងៃទី           ខែ             ឆ្នាំ២០២២  ">
{{--        <input class="t8" value="{{ \Carbon\Carbon::make($tran->date_out)->format('d/m/Y') }}" id="lunar_date">--}}
{{--        <input class="t9" value="ក្រុងបាត់ដំបង {{ dateKh($tran->date_out) }}">--}}
        <span class="t10 font-head">អភិបាលក្រុង </span>
        <span class="t21">
            @if(!is_null($tran->barcode))
                {!!   DNS1D::getBarcodeSVG($tran->barcode, 'C128', 1.3,30) !!}
            @endif
        </span>
        <span class="t11">បញ្ជាក់៖ បណ្ណអនុញ្ញាតនេះត្រូវដាក់តាំង ឬ ព្យួរនៅកន្លែងទទួលភ្ញៀវ  </span>

    </div>

<script type="application/javascript">

    window.onafterprint = function () { window.close(); }
</script>

</body>
</html>
