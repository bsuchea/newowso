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
    top: 215px;
    left: 510px;
    font-size: 23px;
}

.h7 {
    top: 253px;
    left: 420px;
    font-size: 20px;
}

.h8 {
    top: 288px;
    left: 502px;
    font-size: 18px;
}

.n1 {
    top: 330px;
    left: 200px;
}
.name {
    top: 325px;
    left: 425px;
}
.name ls{
    font-size: 18px;
}
.name b {
    text-transform: uppercase;
}
.s1 {
    top: 363px;
    left: 200px;
}
.ser_type {
    top: 360px;
    left: 425px;
}
.b1 {
    top: 397px;
    left: 200px;
}
.brand {
    top: 394px;
    left: 425px;
}
.a1 {
    top: 428px;
    left: 200px;
}
.addr {
    top: 428px;
    left: 425px;
}
.t6 {
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
        <span class="h3 font-head">ខេត្តបាត់ដំបង</span>
        <span class="h4 font-head">រដ្ឋបាលក្រុងបាត់ដំបង</span>

{{--        <span class="h5">លេខៈ .......................កបប</span>--}}

        <span class="h5">លេខៈ {{ $tran->letter_number }} កបប</span>

{{--        <input type="text" class="num">--}}
        <span class="h6 font-head">បណ្ណអនុញ្ញាត</span>
        <span class="h7 font-head">ប្រកបអាជីវកម្ម-សេវាកម្ម-ទេសចរណ៍ </span>
        <span class="h8 font-head">អភិបាលក្រុងបាត់ដំបង</span>
        <span class="n1">អនុញ្ញាតឱ្យ លោក-លោកស្រី </span>
        <span class="name">: <ls class="font-head">{{ $cus->namekh }}
            </ls>&ensp;&ensp;&ensp;&ensp;&ensp; អក្សរឡាតាំង &ensp;&ensp;<b style="font-family: centuary"> {{ $cus->nameen }} </b> </span>
        <span class="s1">ប្រភេទអាជីវកម្ម-សេវាកម្ម</span>
        <span class="ser_type font-head">:
            : {!! $ser_type->namekh !!} &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            @if($tran->amount != '') ចំនួន  {{ convertToKhmerNumber($tran->amount) }}{{ $ser_type->gauge }} @endif
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
            អ្នកកាន់បណ្ណអនុញ្ញាតត្រូវគោរពយ៉ាងម៉ឺងម៉ាត់តាមច្បាប់ និង បទបញ្ញត្តិផ្សេងៗ ហើយត្រូវដាក់តាំងបង្ហាញជាសាធារណៈ  ។
        </span>
        <span class="t62">
            បំរាមៈ ហាមជួញដូរ និងប្រើប្រាស់គ្រឿងញៀន-ហាមជួញដូរផ្លូវភេទ-ហាមការកេងប្រវ័ញ្ញពលកម្មកុមារ និងត្រូវបិទស្លាកហាមជក់បារី។
        </span>
        <span class="t7">
{{--            បណ្ណអនុញ្ញាតសេវាកម្មនេះមានសុពលភាពត្រឹម ថ្ងៃទី...... ខែ.......... ឆ្នាំ២០២...។--}}
            <!-- {{ dateKh(\Carbon\Carbon::make($tran->date_out)->addYears($ser_type->validity_period)) }}។ -->
        </span>

{{--        <input class="t8" value="ថ្ងៃ......................... ខែ............ ឆ្នាំឆ្លូវ ត្រី​ស័ក ព.ស.២៥៦៥" id="lunar_date">--}}
{{--        <input class="t9" value="ក្រុងបាត់ដំបង ថ្ងៃទី....... ខែ........... ឆ្នាំ២០២២">--}}

        <input class="t8" value="{{ \Carbon\Carbon::make($tran->date_out)->format('d/m/Y') }}" id="lunar_date">
        <input class="t9" value="ក្រុងបាត់ដំបង {{ dateKh($tran->date_out) }}">
        <span class="t10 font-head">អភិបាលក្រុង </span>
        <span class="t11">បញ្ជាក់៖ បណ្ណអនុញ្ញាតនេះត្រូវដាក់តាំង ឬ ព្យួរនៅកន្លែងទទួលភ្ញៀវ  </span>

    </div>

<script src="/js/taskpane.js"></script>
<script type="application/javascript">
    var date = document.getElementById('lunar_date').value;
    // var date = "23/10/2021"
    var selectedDate = new Date(date.split("/")[2],(parseInt(date.split("/")[1])-1),date.split("/")[0] );
    var solarText = new LunarText().getKhmerLunarString(selectedDate);
    document.getElementById('lunar_date').value = solarText;

    window.onafterprint = function () { window.close(); }
</script>

</body>
</html>
