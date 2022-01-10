<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <title>Application Form</title>
    <style>
        body{
            font-family: "Khmer", "Khmer OS Battambang", "Khmer OS Siemreap";
        }

        #p1{
            width: 800px;
            height: 1100px;
            background: url("/img/d1.jpg");
            background-repeat: no-repeat;
            background-size: 800px 1100px;
            margin-top: 25px;
        }
        span{
            position: absolute;
        }
.namekh {
    top: 275px;
    left: 160px;
}
.nameen {
    text-transform: uppercase;
    top: 272px;
    left: 456px;
}
.gender {
    top: 274px;
    left: 700px;
}
.dob {
    top: 302px;
    left: 127px;
}
.national {
    top: 302px;
    left: 315px;
}
.natid {
    top: 302px;
    left: 610px;
}
.phone {
    top: 330px;
    left: 570px;
}
.bus_type3 {
    top: 330px;
    left: 135px;
}
.bus_type {
    top: 248px;
    left: 190px;
}
.bus_type2 {
    top: 386px;
    left: 330px;
}

.ser_home {
    top: 430px;
    left: 525px;
}
.ser_street {
    top: 430px;
    left: 600px;
}
.ser_group {
    top: 430px;
    left: 730px;
}
.ser_village {
    top: 453px;
    left: 282px;
}
.ser_commune {
    top: 453px;
    left: 460px;
}
.namekh2 {
    top: 409px;
    left: 400px;
}
.gender2 {
    top: 409px;
    left: 705px;
}


.bus_t {
    top: 505px;
    left: 285px;
}
.brand_namekh {
    top: 535px;
    left: 285px;
}
.brand_nameen {
    top: 565px;
    left: 383px;
}
.t6 {
    top: 600px;
    left: 285px;
}

.bus_type4 {
    top: 743px;
    left: 343px;
}


.t7, .t8 , .t9, .t10 {
    font-family: "Khmer", "Khmer OS Battambang", "Khmer OS Siemreap";
    position: absolute;
    font-size: 15px;
    border: none;
    background: none;
    text-align: center;
    width: 430px;
    height: 20px;
    left: 345px;
}
.t8{
    top: 927px;
}
.t9 {
    top: 952px;
}
.t7 {
    top: 975px;
    height: 25px;
    font-weight: bold;
}
.t10 {
    top: 1065px;
    width: 230px;
    height: 25px;
    left: 500px;
    font-weight: bold;
}

@media print {

  @page {
      size: A4 portrait;
  }

}

    </style>
</head>
<body>
    <div id="p1">

        <span class="bus_type">បើកអាជីវកម្ម{{ $ser_type->namekh }} (បន្ដ)</span>
        <span class="namekh">{{ $cus->namekh }} </span>
        <span class="nameen">{{ $cus->nameen }} </span>
        <span class="gender">{{ $cus->gender }}  </span>
        <span class="gender2">{{ $cus->gender }}  </span>
        <span class="dob">{{ formatDateKh($cus->dob) }} </span>
        <span class="national">{{ $cus->national }} </span>
        <span class="natid">{{ $cus->national_id }} </span>
        <span class="bus_type3">អាជីវកម្ម{{ $ser_type->namekh }} </span>
        <span class="phone">{{ $cus->phone }} </span>

        <span class="bus_type2">{{ $ser_type->namekh }} </span>
        <span class="namekh2">{{ $cus->namekh }} </span>
        <span class="ser_home">{{ $ser->home }}</span>
        <span class="ser_street">{{ $ser->street }}</span>
        <span class="ser_group">{{ $ser->group }}</span>
        <span class="ser_village">{{ $vil2->namekh }} </span>
        <span class="ser_commune">{{ $com2->namekh }} </span>

        <span class="bus_t">- អាជីវកម្មៈ  {{ $ser_type->namekh }}</span>
        <span class="brand_namekh">-	នាមករណ៍ ៖ {{ $ser->brand_namekh }} </span>
        <span class="brand_nameen">{{ $ser->brand_nameen }} </span>
        <span class="t6">-	លក្ខណៈ  ៖  សមស្រប </span>

        <span class="bus_type4">{{ $ser_type->namekh }} </span>

        <input class="t8" value="{{ $date_kh }}" >
        <input type="text" value="ក្រុងបាត់ដំបង {{ $date_gen }}" class="t9">
        <input type="text" value="មន្ដ្រីទទួលបន្ទុក" class="t7">
        <input type="text" value="បី សុជា" class="t10">

    </div>

    <script type="application/javascript">
        // window.onload = function() { window.print(); window.close(); };

    </script>
</body>
</html>
