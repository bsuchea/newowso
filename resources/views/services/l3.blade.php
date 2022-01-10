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
    top: 148px;
    left: 875px;
}
.h2 {
    top: 175px;
    left: 854px;
}
.img001{
    position: absolute;
    top: 208px;
    left: 895px;
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
    top: 230px;
    left: 535px;
    font-size: 20px;
}

.h7 {
    top: 262px;
    left: 425px;
    font-size: 18px;
}
.t1 {
    font-size: 14px;
    top: 300px;
    left: 260px;
}
.t2 {
    font-size: 14px;
    top: 300px;
    left: 345px;
}
.t3 {
    font-size: 14px;
    top: 322px;
    left: 355px;
}
.t4 {
    font-size: 14px;
    top: 344px;
    left: 345px;
}
.t5 {
    font-size: 14px;
    top: 368px;
    left: 355px;
}
.n1, .name, .s1, .ser_type, .b1, .brand, .a1, .addr, .t6, .t7, .t8 {
    font-size: 15px;
}
.n1 {
    top: 400px;
    left: 260px;
}
.name {
    top: 400px;
    left: 415px;
}
.namekh{
    font-size: 15px;
}
.name b{
    text-transform: uppercase;
}
.s1 {
    top: 428px;
    left: 260px;
}
.ser_type {
    top: 428px;
    left: 415px;
}
.b1 {
    top: 453px;
    left: 260px;
}
.brand {
    top: 453px;
    left: 415px;
}
.a1 {
    top: 478px;
    left: 260px;
}
.addr {
    top: 478px;
    left: 415px;
}
.t6 {
    top: 502px;
    left: 355px;
}
.t7 {
    top: 528px;
    left: 355px;
}
.t8 , .t9 {
    font-family: "Khmer", "Khmer OS Battambang", "Khmer OS Siemreap";
    position: absolute;
    font-size: 15px;
    border: none;
    background: none;
    text-align: center;
    width: 420px;
    height: 30px;
    left: 670px;
}
.t8 {
    top: 550px;
}
.t9 {
    top: 574px;
}

.t10 {
    top: 599px;
    left: 835px;
}
.t11 {
    font-size: 12px;
    top: 695px;
    left: 125px;
}

.photobox{
    position: absolute;
    width: 85px;
    height: 105px;
    text-align: center;
    border: 1px solid #1a202c;
    top: 315px;
    left: 140px;
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

        <span class="h3 font-head">ខេត្តបាត់ដំបង</span>
        <span class="h4 font-head">រដ្ឋបាលក្រុងបាត់ដំបង</span>
        <span class="h5">លេខៈ &nbsp;&nbsp; {{ $tran->letter_number }} &nbsp;&nbsp; កបប</span>

        <div class="photobox"><br><br>4 x 6</div>

        <span class="h6 font-head">បណ្ណអនុញ្ញាត</span>
        <span class="h7 font-head">ប្រកបអាជីវកម្ម-សេវាកម្មវិស័យទេសចរណ៍</span>
        <span class="t1">យោង &nbsp; ៖ </span>
        <span class="t2">- អនុក្រឹត្យលេខ១៨ អនក្រ.បក ចុះថ្ងៃទី០៨ ខែកុម្ភៈ ឆ្នាំ២០១៧ ស្តីពីការបង្កើតយន្តការច្រកចេញចូលតែមួយសម្រាប់ </span>
        <span class="t3">ការផ្តល់សេវារដ្ឋបាលនៅរដ្ឋបាលថ្នាក់ក្រោមជាតិ </span>
        <span class="t4">- ប្រកាសរួមលេខ៦៥៧ សហវ.ប្រក ចុះថ្ងៃទី០៦ ខែមិថុនា ឆ្នាំ២០១៦ ស្តីពីការផ្តល់សេវាសាធារណៈរបស់ក្រសួងវប្បធម៌ </span>
        <span class="t5">និងវិចិត្រសិល្បៈ រវាងក្រសួងសេដ្ឋកិច្ចនិងហិរញ្ញវត្ថុ និងក្រសួងវប្បធម៌និងវិចិត្រសិល្បៈ </span>
        <span class="n1">អនុញ្ញាតឲ្យឈ្មោះ </span>
        <span class="name">: <name class="font-head namekh">{{ $cus->namekh }}  </name> អក្សឡាតាំង <b> {{ $cus->nameen }} &nbsp; </b>  ថ្ងៃខែឆ្នាំកំណើត {{ formatDateKh($cus->dob) }} </span>
        <span class="s1">ប្រភេទសេវាកម្ម </span>
        <span class="ser_type">
            : {{ $ser_type->namekh }} &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
            @if($tran->amount != '') ចំនួន  {{ convertToKhmerNumber($tran->amount) }}{{ $ser_type->gauge }} @endif
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
        <span class="t6">បណ្ណអនុញ្ញាតសេវាកម្មនេះមានសុពលភាពត្រឹម {{ dateKh(\Carbon\Carbon::make($tran->date_out)->addYears($ser_type->validity_period)) }}។</span>
        <span class="t7">មុនផុតកំណត់រយៈពេល១៥ថ្ងៃ អាជីវករត្រូវ មកដាក់សុំបន្តអាជីវកម្មនៅឆ្នាំបន្ទាប់។ </span>

        <input class="t8" value="{{ $sec->lunar_date }}" >
        <input type="text" value="ក្រុងបាត់ដំបង {{ $sec->date }}" class="t9">
        <span class="t10 font-head">អភិបាលក្រុង </span>

        <span class="t11">បញ្ជាក់៖ បណ្ណអនុញ្ញាតនេះត្រូវដាក់តាំង ឬ ព្យួរនៅកន្លែងទទួលភ្ញៀវ  </span>

    </div>

<script type="application/javascript">
    window.onafterprint = function () { window.close(); }
</script>

</body>
</html>
