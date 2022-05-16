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
    top: 130px;
    left: 865px;
}
.h2 {
    top: 159px;
    left: 847px;
}
.img001{
    position: absolute;
    top: 190px;
    left: 886px;
}
.h3 {
    top: 190px;
    left: 150px;
}
.h4 {
    top: 215px;
    left: 120px;
}
.h5 {
    top: 242px;
    left: 75px;
    width: 260px;
    text-align: center;
}
.h6 {
    top: 215px;
    left: 238px;
    font-size: 20px;
    width: 700px;
    text-align: center;
}

.h7 {
    top: 247px;
    left: 237px;
    font-size: 18px;
    width: 700px;
    text-align: center;
}
.t1 {
    font-size: 14px;
    top: 279px;
    left: 257px;
}
.t2 {
    font-size: 14px;
    top: 279px;
    left: 300px;
}
.t3 {
    font-size: 14px;
    top: 299px;
    left: 308px;
}
.t4 {
    font-size: 14px;
    top: 317px;
    left: 300px;
}
.t5 {
    font-size: 14px;
    top: 338px;
    left: 308px;
}
.t51 {
    font-size: 14px;
    top: 357px;
    left: 300px;
}
.t52 {
    font-size: 14px;
    top: 376px;
    left: 308px;
}
.t53 {
    font-size: 14px;
    top: 395px;
    left: 308px;
}
.n1, .name, .s1, .ser_type, .b1, .brand, .a1, .addr, .t6, .t7, .t8 {
    font-size: 15px;
}
.n1 {
    top: 418px;
    left: 260px;
}
.name {
    top: 418px;
    left: 415px;
}
.namekh{
    font-size: 15px;
}
.name b{
    text-transform: uppercase;
}
.s1 {
    top: 440px;
    left: 260px;
}
.ser_type {
    top: 440px;
    left: 415px;
}
.b1 {
    top: 462px;
    left: 260px;
}
.brand {
    top: 462px;
    left: 415px;
}
.a1 {
    top: 483px;
    left: 260px;
}
.addr {
    top: 483px;
    left: 415px;
}
.t6 {
    top: 505px;
    left: 308px;
}
.t7 {
    top: 528px;
    left: 308px;
}
.t8 , .t9, .t10 {
    font-family: "Khmer", "Khmer OS Battambang", "Khmer OS Siemreap";
    position: absolute;
    font-size: 15px;
    border: none;
    background: none;
    text-align: center;
    width: 420px;
    height: 30px;
    left: 655px;
}
.t8 {
    top: 550px;
}
.t9 {
    top: 574px;
}

.t10 {
    top: 599px;
    font-family: "header";
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

.photobox{
    position: absolute;
    width: 85px;
    height: 105px;
    text-align: center;
    border: 1px solid #1a202c;
    top: 315px;
    left: 135px;
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
        <span class="h1 font-head">ព្រះរាជាណាចក្រកម្ពុជា</span>
        <span class="h2 font-head">ជាតិ សាសនា ព្រះមហាក្សត្រ</span>
        <img src="/img/img001.png" class="img001" alt="">
        <span class="h3 font-head">{{ $pro }}</span>
        <span class="h4 font-head">រដ្ឋបាល{{ $dis }}</span>
        <<span class="h5">លេខៈ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/<sub>២២</sub> កបប</span>
{{--        <span class="h5">លេខៈ &nbsp;&nbsp; {{ $tran->letter_number }} &nbsp;&nbsp; កបប</span>--}}

        <div class="photobox"><br><br>4 x 6</div>

        <span class="h6 font-head">បណ្ណអនុញ្ញាត</span>
        <span class="h7 font-head">ប្រកបអាជីវកម្ម-សេវាកម្មវិស័យសុខាភិបាល</span>

        <span class="t1">យោង ៖ </span>
        <span class="t2">- សេចក្តីសម្រេចលេខ ១២ សសរ ចុះថ្ងៃទី ៣០ ខែ មិថុនា ឆ្នាំ ២០០៨ របស់រាជរដ្ឋាភិបាលកម្ពុជា ស្តីពីការបង្កើត ការិយាល័យច្រកចេញចូលតែមួយ</span>
        <span class="t3">និងការិយាល័យប្រជាពលរដ្ឋ នៅថ្នាក់ ស្រុក ខណ្ឌ  ។ </span>
        <span class="t4">- ប្រកាសលេខ ០៧៧ សនប ចុះថ្ងៃទី ២០ ខែ មីនា  ឆ្នាំ ២០១៥ របស់ក្រសួងសុខាភិបាល ស្តីពីការធើ្វប្រតិភូកម្មមុខងារ នៃវិស័យសុខាភិបាល ជូន</span>
        <span class="t5">ដល់រដ្ឋបាល ថ្នាក់ក្រោមជាតិ ក្នុងការផ្តល់សេវាសាធារណៈ របស់ក្រសួងសុខាភិបាល ។</span>
        <span class="t51">- ប្រកាសរួមលេខ ១៤៣២ សហវ.ប្រក ចុះថ្ងៃទី ២០ ខែ វិច្ឆិកា ឆ្នាំ២០១៤ របស់ក្រសួងសេដ្ឋកិច្ច និងហិរញ្ញវត្ថុ សី្តពីការកែប្រែកម្រងសេវាសាធារណៈ </span>
        <span class="t52">នៃតារាងឧបសម័្ពន្ឋភ្ជាប់នឹងប្រកាសរួមលេខ៩៩៣ សហវ.ប្រក ចុះថ្ងៃទី ២៨ ខែ ធ្នូ ឆ្នាំ ២០១២ ស្តីពីការផ្តល់សេវាសាធារណៈរបស់ក្រសួងសុខាភិបាល ។</span>

        <span class="n1">អនុញ្ញាតឲ្យលោក{{ $cus->gender=='ស្រី'?'ស្រី':'' }} </span>
        <span class="name">: <name class="font-head namekh">{{ $cus->namekh }}  </name> អត្តសញ្ញាណប័ណ្ណលេខ  <b> {{ $cus->natinal_id }} &nbsp; </b> </span>
        <span class="s1">ប្រភេទសេវាកម្ម </span>
        <span class="ser_type">
            : {{ $ser_type->namekh }}
        </span>
        <span class="b1">នាមករណ៍ </span>
        <span class="brand">: <b>{{ $ser->brand_namekh }} {{ $ser->brand_nameen==''?'':'- '.$ser->brand_nameen }}  </b></span>
        <span class="a1">អាសយដ្ឋានអាជីវកម្ម</span>
        <span class="addr">
            : {{ $ser->home==''?'':'ផ្ទះលេខ'.$ser->home }}
              {{ $ser->street==''?'':'ផ្លូវ'.$ser->street }}
              {{ $ser->group==''?'':'ក្រុមទី'.$ser->group }}

            ភូមិ{{ $vil2->namekh }} សង្កាត់{{ $com2->namekh }} ក្រុងបាត់ដំបង ខេត្ដបាត់ដំបង។
        </span>
        <span class="t6">
            បណ្ណអនុញ្ញាតិនេះ មានសុពលភាពរយៈពេល <b>{{ $ser_type->validity }}</b>
            មានប្រសិទ្ធិភាពត្រឹម <b>
            ថ្ងៃទី &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ខែ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ឆ្នាំ{{ formatDateKh(\Carbon\Carbon::make(today())->addYears($ser_type->validity_period), 'y') }}
            </b>។
        </span>
        <span class="t7">មុនផុតកំណត់ពីរខែ សាម៉ីជនត្រូវអញ្ជើញមកបន្តសុពលភាពសម្រាប់ប្រើប្រាស់ជាថ្មី ។ </span>

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
