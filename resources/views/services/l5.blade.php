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
    top: 88px;
    left: 875px;
}
.h2 {
    top: 115px;
    left: 854px;
}
.img001{
    position: absolute;
    top: 148px;
    left: 895px;
}
.h3 {
    top: 130px;
    left: 150px;
}
.h4 {
    top: 155px;
    left: 120px;
}
.h5 {
    top: 183px;
    left: 75px;
    width: 260px;
    text-align: center;
}
.h6 {
    top: 203px;
    left: 535px;
    font-size: 20px;
}

.h7 {
    top: 238px;
    left: 425px;
    font-size: 18px;
}
.t1 {
    font-size: 14px;
    top: 278px;
    left: 150px;
}
.t2 {
    font-size: 14px;
    top: 278px;
    left: 215px;
}
.t3 {
    font-size: 14px;
    top: 303px;
    left: 215px;
}
.t4 {
    font-size: 14px;
    top: 326px;
    left: 215px;
}
.t5 {
    font-size: 14px;
    top: 352px;
    left: 222px;
}
.t6 {
    font-size: 14px;
    top: 375px;
    left: 215px;
}

.text1 {
    width: 915px;
    top: 407px;
    left: 150px;
}

.namekh{
    font-size: 15px;
}
.name b{
    text-transform: uppercase;
}

.t7 {
    top: 490px;
    left: 215px;
}
.t12 {
    top: 520px;
    left: 215px;
}

.t8 , .t9 {
    font-family: "Khmer", "Khmer OS Battambang", "Khmer OS Siemreap";
    position: absolute;
    font-size: 15.5px;
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
    top: 705px;
    left: 120px;
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

{{--        <div class="photobox"><br><br>4 x 6</div>--}}

        <span class="h6 font-head">បណ្ណអនុញ្ញាត</span>
        <span class="h7 font-head">ប្រកបអាជីវកម្ម-សេវាកម្មវិស័យកសិកម្ម</span>
        <span class="t1">យោង &nbsp; ៖ </span>
        <span class="t2">- អនុក្រិតលេខ ៦៩ អនក្រ ចុះថ្ងៃទី ២៨ ខែតុលា ឆ្នាំ ១៩៩៨ ស្ដីពីបមាណី និង ការគ្រប់គ្រងសម្ភារៈកសិកម្ម។ </span>
        <span class="t3">- សារាចរណែនាំលេខ៣៤៥សរណន.កសកចុះថ្ងៃទី២១ខែ តុលា ឆ្នាំ២០០២ ស្ដីពីការអនុវត្តអនុក្រិតលេខ ៦៩ អនក្រ ចុះថ្ងៃទី ២៨ ខែតុលា ឆ្នាំ១៩៩៨។ </span>
        <span class="t4">- ប្ប្រកាសរួមលេខ ៣៦៣/៧៥៤ ប្រក.កសក/សខភប ចុះថ្ងៃទី២៤ ខែសីហា ឆ្នាំ២០០៧ ស្ដីពីការគ្រប់គ្រងផលិតកម្មអារហ័ណនីរហ័ណកម្ម និង </span>
        <span class="t5">ពាណិជ្ជកម្មបសុឱសថ។  </span>
        <span class="t6">- ប្រកាសលេខ ៤២១ ប្រក.កសក ស្ដីពីការធ្វើប្រតិភូកម្មមុខងារនៃវិស័យកសិកម្ម ជួនការិយាល័យច្រកចេញចូលតែមួយក្រុង ស្រុកគោលដៅ។ </span>

        <span class="text1">
            &emsp;&emsp;&emsp;&emsp;
            អនុញ្ញាតិជូនលោក{{ $cus->gender=='ស្រី'?'ស្រី':'' }}
            <name class="font-head namekh">{{ $cus->namekh }}  </name>
            កាន់អត្តសញ្ញាណប័ណ្ណលេខ {{ $cus->national_id }}
            មានទីលំនៅសព្វថ្ងៃ {{ $cus->home==''?'':'ផ្ទះលេខ'.$cus->home }}
              {{ $cus->street==''?'':'ផ្លូវ'.$cus->street }}
              {{ $cus->group==''?'':'ក្រុមទី'.$cus->group }}
            ភូមិ{{ $cus->village->namekh }}
            សង្កាត់{{ $cus->commune->namekh }}
            ក្រុង{{ $cus->district->namekh }}
            ខេត្ដ{{ $cus->province->namekh }}។
            ធ្វើអាជីវកម្មលក់ <name class="font-head namekh"> {{ $ser_type->namekh }} </name>
            ស្លាកយីហោ <name class="font-head namekh"> {{ $ser->brand_namekh }} </name>
            មានទីតាំងស្ថិតនៅ {{ $ser->home==''?'':'ផ្ទះលេខ'.$ser->home }}
              {{ $ser->street==''?'':'ផ្លូវ'.$ser->street }}
              {{ $ser->group==''?'':'ក្រុមទី'.$ser->group }}
            ភូមិ{{ $vil2->namekh }}
            សង្កាត់{{ $com2->namekh }}
            ក្រុងបាត់ដំបង ខេត្ដបាត់ដំបង។
        </span>

        <span class="t7">សាមីជនត្រូវអនុវត្តឱ្យបានត្រឹមត្រូវតាមបទបញ្ញាត្តិដូចមានចែងក្នុងកិច្ចសន្យានិងលិខិតបទដ្ឋានគតិយុត្តខាងលើ ។ </span>
{{--        <span class="t12">លិខិតអនុញ្ញាតិនេះមានសុពលភាពរយះពេល០១(មួយ)ឆ្នាំ គិតត្រឹម {{ dateKh(\Carbon\Carbon::make($tran->date_out)->addYears($ser_type->validity_period)) }}។</span>--}}
{{--        <span class="t12">លិខិតអនុញ្ញាតិនេះមានសុពលភាពរយះពេល០១(មួយ)ឆ្នាំ គិតត្រឹម {{ $sec->date }} ។</span>--}}
        <span class="t12">
            បណ្ណអនុញ្ញាតិនេះ មានសុពលភាពរយៈពេល <b>{{ $ser_type->validity }}</b>
            មានប្រសិទ្ធិភាពត្រឹម
            <b>
{{--            ថ្ងៃទី........ ខែ............. ឆ្នាំ២០២...--}}
                {{ dateKh(\Carbon\Carbon::make($tran->date_out)->addYears($ser_type->validity_period)) }}
            </b>។
        </span>

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
