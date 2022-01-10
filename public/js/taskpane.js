/*
 * Copyright (c) Microsoft Corporation. All rights reserved. Licensed under the MIT license.
 * See LICENSE in the project root for license information.
 */

// images references in the manifest
// import "../../assets/icon-16.png";
// import "../../assets/icon-32.png";
// import "../../assets/icon-80.png";

/* global document, Office, Word */

// Office.onReady((info) => {
//   if (info.host === Office.HostType.Word) {
//     document.getElementById("sideload-msg").style.display = "none";
//     document.getElementById("app-body").style.display = "flex";
//     document.getElementById("today_solar").onclick = today_solar;
//     document.getElementById("today_lunar").onclick = today_lunar;
//
//     var date = new Date();
//
//     var strDate = date.getDate()+"/"+(date.getMonth()+1)+"/"+date.getFullYear();
//
//     document.getElementById("inputDate").value = strDate;
//   }
// });



class CalendarController {
  calculator = new LunarCalculator();

  listKhmerDate = {};
  listSolarDate = {};

  dateUtil;
  date;
  currentDay;

  currentLunarMonthPair = "";
  currentSolarMonthYear = "";

  generateDateForYear(date) {
    this.currentDay = new DayItem();
    this.calculator = new LunarCalculator(date.getFullYear());
    if (this.listKhmerDate[date.getFullYear()] == null) {
      this.listKhmerDate[date.getFullYear()] = LunarUtils.generateKhmerDate(
        date.getFullYear()
      );
    }
    //console.log('this.listSolarDate '+this.listSolarDate[date.getFullYear()]);
    // if (this.listSolarDate[date.getFullYear()] == null) {
    //   this.listSolarDate[date.getFullYear()] = {};
    //   console.log(' this.listSolarDate '+this.listSolarDate[date.getFullYear()]);
    //   this.listSolarDate[date.getFullYear()] = LunarUtils.generateSolarDate(date);
    //   console.log(' this.listSolarDate '+this.listSolarDate[date.getFullYear()]);
    // }

    // currentLunarMonthPair = getLunarMonth();
    // currentSolarMonthYear =
    //     LunarText.khmerMonthName(date.getMonth())+' '+date.getFullYear();
  }

  constructor(date) {
    this.date = date;
    this.currentDay = new DayItem();
    this.calculator = new LunarCalculator(date.getFullYear());
    if (this.listKhmerDate[date.getFullYear()] == null) {
      this.listKhmerDate[date.getFullYear()] = LunarUtils.generateKhmerDate(
        date.getFullYear()
      );
      // console.log(this.listKhmerDate[date.getFullYear()]);
    }
    // if (this.listSolarDate[date.getFullYear()] == null) {
    //   this.listSolarDate[date.getFullYear()] = LunarUtils.generateSolarDate(date);
    //   console.log(this.listSolarDate[date.getFullYear()]);
    // }
    // console.log('this is solar date');
    // console.log(this.listSolarDate[date.getFullYear()]);

    // currentLunarMonthPair = getLunarMonth();
    // currentSolarMonthYear =
    //     LunarText.khmerMonthName(date.getMonth())+' '+ date.getFullYear();
  }

  getRochKertForThisDate(date) {
    var lunarText = new LunarText();
    var lunarCode =
      this.listKhmerDate[date.getFullYear()][
        date.getFullYear() +
          "-" +
          LunarUtils.f(date.getMonth()) +
          "-" +
          LunarUtils.f(date.getDate())
      ];
    var rochKertDay = lunarText.convertToKhmerNum(
      LunarUtils.removeFirstZero(
        LunarText.getRochKertDayFromFullCode(lunarCode)
      )
    );
    var rochKert = LunarText.getRochKertFromFullCode(lunarCode)
      .replaceAll("K", "ក")
      .replaceAll("R", "រ");
    return rochKertDay + rochKert;
  }

  getLunarMonth() {
    var firstMonth =
      this.listKhmerDate[date.getFullYear()][
        date.getFullYear() + "-" + LunarUtils.f(date.getMonth()) + "-01"
      ];
    var secondMonth =
      this.listKhmerDate[date.getFullYear()][
        date.getFullYear() + "-" + LunarUtils.f(date.getMonth()) + "-01"
      ];
    var shortFirstMonth = firstMonth.substring(8, 10);
    console.log("first month " + shortFirstMonth);
    console.log("second month" + secondMonth);
    var shortSecondMonth = secondMonth.substring(8, 10);
    var day = 1;
    //console.log('khmerdate: ${this.listKhmerDate['2018'].toString()}');
    while (shortFirstMonth == shortSecondMonth) {
      day++;
      secondMonth =
        this.listKhmerDate[date.getFullYear()][
          date.getFullYear() +
            "-" +
            LunarUtils.f(date.getMonth()) +
            "-" +
            LunarUtils.f(day)
        ];
      // console.log(
      //     'date- ${'${date.getFullYear()}-${LunarUtils.f(date.getMonth())}-${LunarUtils.f(day)}'}');
      console.log("date- $secondMonth");
      shortSecondMonth = secondMonth.substring(8, 10);
      if (day > 40) break;
    }

    return (
      LunarUtils.getHashMonth()[LunarUtils.f(int.parse(shortFirstMonth))] +
      "-" +
      LunarUtils.getHashMonth()[LunarUtils.f(int.parse(shortSecondMonth))]
    );
  }
}

class DayItem {
  isSelected = false;
  isVisible = false;
  dayString = "";
  rochKert = "";
  day = "";
  month = "";
  year = "";
  monthKhmer = "";
  isNgaiSel = false;
  eventEachDay = [];
  fullLunarCode = "";

  constructor() {}

  isNgaiChhob() {
    var result = false;
    for (var i = 0; i < this.eventEachDay.length; i++) {
      if (this.eventEachDay[i].isNgaiChhob == true) {
        result = true;
        break;
      }
    }
    return result;
  }

  fromJson(map) {
    this.isVisible = map["isVisible"];
    this.dayString = map["dayString"];
    this.rochKert = map["rochKert"];
    this.day = map["day"];
    this.month = map["month"];
    this.year = map["year"];
    this.monthKhmer = map["monthKhmer"];
    this.isNgaiSel = map["isNgaiSel"];
    this.eventEachDay = map["eventEachDay"];
  }

  toMap() {
    item = {};
    item["dayString"] = this.dayString;
    item["rochKert"] = this.rochKert;
    item["day"] = this.day;
    item["month"] = this.month;
    item["year"] = this.year;
    item["monthKhmer"] = this.monthKhmer;
    item["isNgaiSel"] = this.isNgaiSel;
    item["eventEachDay"] = this.eventEachDay;
    return item;
  }

  toShortDate() {
    return (
      year +
      "-" +
      LunarUtils.f(int.parse(month)) +
      "-" +
      LunarUtils.f(int.parse(day))
    );
  }
}

class DetailItem {
  id;
  title;
  data;
  type;

  constructor(map) {
    id = '${map["id"]}';
    title = map["title"];
    data = map["data"];
    type = map["type"];
  }

  toMap() {
    item = {};
    item["id"] = id;
    item["title"] = title;
    item["data"] = data;
    item["type"] = type;
    return item;
  }

  toText() {
    return toMap().toString();
  }
}

class Holiday {
  static hashHoliday = {};
  static hashHolidayLunar = {};
  enDescription;
  khDescription;
  isChhob;

  static initialize() {
    if (this.hashHoliday == null) {
      this.hashHoliday = new Map();
      this.hashHoliday["0101"] = Holiday(
        "International New Year Day",
        "ទិវាចូលឆ្នាំសកល",
        true
      );
      this.hashHoliday["0107"] = Holiday(
        "Victory over Genocide Day",
        "ជម្នះលើរបបប្រល័យពូជសាសន៍",
        true
      );
      this.hashHoliday["0214"] = Holiday(
        "Valentine's Day",
        "បុណ្យនៃសេចក្ដីស្រលាញ់",
        false
      );
      this.hashHoliday["0308"] = Holiday(
        "International Women's Day",
        "ទិវានារីអន្តរជាតិ",
        true
      );
      this.hashHoliday["0501"] = Holiday(
        "International Labour Day",
        "ទិវាពលកម្មអន្តរជាតិ",
        true
      );
      this.hashHoliday["0520"] = Holiday(
        "National Memorial Day",
        "ទិវា​ជាតិ​នៃ​ការ​ចងចាំ",
        false
      );
      // this.hashHoliday["0513"]=Holiday("King Norodom Sihaoni's Birthday", "ព្រះរាជពិធីបុណ្យចម្រើនព្រះជន្ម ព្រះករុណាព្រះបាទសម្ដេច ព្រះបរមនាថ នរោត្តម សីហមុនី");
      this.hashHoliday["0514"] = Holiday(
        "King Norodom Sihaoni's Birthday",
        "ព្រះរាជពិធីបុណ្យចម្រើនព្រះជន្ម ព្រះករុណាព្រះបាទសម្ដេច ព្រះបរមនាថ នរោត្តម សីហមុនី",
        true
      );
      // this.hashHoliday["0515"]=Holiday("King Norodom Sihaoni's Birthday", "ព្រះរាជពិធីបុណ្យចម្រើនព្រះជន្ម ព្រះករុណាព្រះបាទសម្ដេច ព្រះបរមនាថ នរោត្តម សីហមុនី");
      this.hashHoliday["0601"] = Holiday(
        "International Children's Day",
        "ទិវាកុមារអន្ដរជាតិ",
        true
      );
      this.hashHoliday["0618"] = Holiday(
        "Queen Norodom Monineath Sihanouk's Birthday",
        "ព្រះរាជពិធីបុណ្យចម្រើនព្រះជន្ម សម្ដេចព្រះមហាក្សត្រី ព្រះវររាជមាតា នរោត្តមមុនីនាថ សីហនុ",
        true
      );
      this.hashHoliday["0924"] = Holiday(
        "Constitution and Coronation Day",
        "ទិវាប្រកាសរដ្ឋធម្មនុញ្ញ",
        true
      );
      this.hashHoliday["1015"] = Holiday(
        "Commenmoration Day of Former King Norodom Sihanouk",
        "ទិវាប្រារព្ធពិធីគោរពព្រះវិញ្ញាណក្ខន្ធ ព្រះករុណាព្រះបាទ សម្ដេចព្រះនរោត្តមសីហនុ",
        true
      );
      this.hashHoliday["1023"] = Holiday(
        "Paris Peace Agreement",
        "ទិវារំលឹកខួបនៃកិច្ចព្រមព្រៀងសន្ដិភាពទីក្រុងប៉ារីស",
        true
      );
      this.hashHoliday["1029"] = Holiday(
        "King Norodom Sihaoni's Coronation Day",
        "ព្រះរាជពិធីគ្រងព្រះបរមរាជសម្បត្តិរបស់ ព្រះករុណាព្រះបាទសម្ដេចព្រះបរមនាថនរោត្តមសីហមុនី",
        true
      );
      this.hashHoliday["1109"] = Holiday(
        "Independence Day",
        "ពិធីបុណ្យឯករាជ្យជាតិ",
        true
      );
      this.hashHoliday["1210"] = Holiday(
        "International Human Rights Day",
        "ទិវាសិទ្ធិមនុស្សអន្តរជាតិ",
        true
      );
    }
    if (this.hashHolidayLunar == null) {
      this.hashHolidayLunar = new Map();
      this.hashHolidayLunar["03R15S"] = Holiday(
        "Chinese NewYear's Eve",
        "សែនចូលឆ្នាំចិន",
        false
      );
      this.hashHolidayLunar["04K01"] = Holiday(
        "Chinese New Year",
        "ចូលឆ្នាំចិន",
        false
      );
      this.hashHolidayLunar["04K02"] = Holiday(
        "Chinese New Year",
        "ចូលឆ្នាំចិន",
        false
      );
      this.hashHolidayLunar["04K03"] = Holiday(
        "Chinese New Year",
        "ចូលឆ្នាំចិន",
        false
      );
      this.hashHolidayLunar["03K15S"] = Holiday(
        "Meak Bochea Day",
        "ពិធីបុណ្យមាឃបូជា",
        false
      );
      this.hashHolidayLunar["06K15S"] = Holiday(
        "Visak Bochea Day",
        "ពិធីបុណ្យវិសាខបូជា",
        true
      );
      this.hashHolidayLunar["06R04"] = Holiday(
        "Royal Ploughing Ceremony Day",
        "ព្រះរាជពិធីច្រត់ព្រះនង្គ័ល",
        true
      );
      this.hashHolidayLunar["12R14"] = Holiday(
        "Pchum Ben Festival",
        "ពិធីបុណ្យភ្ជុំបិណ្ឌ",
        true
      );
      this.hashHolidayLunar["12R15S"] = Holiday(
        "Pchum Ben Festival",
        "ពិធីបុណ្យភ្ជុំបិណ្ឌ",
        true
      );
      this.hashHolidayLunar["13K01"] = Holiday(
        "Pchum Ben Festival",
        "ពិធីបុណ្យភ្ជុំបិណ្ឌ",
        true
      );
      this.hashHolidayLunar["14K14"] = Holiday(
        "Water Festival",
        "ព្រះរាជពិធីបុណ្យអុំទូក បណ្ដែតប្រទីប អកអំបុក និងសំពះព្រះខែ",
        true
      );
      this.hashHolidayLunar["14K15S"] = Holiday(
        "Water Festival",
        "ព្រះរាជពិធីបុណ្យអុំទូក បណ្ដែតប្រទីប អកអំបុក និងសំពះព្រះខែ",
        true
      );
      this.hashHolidayLunar["14R01"] = Holiday(
        "Water Festival",
        "ព្រះរាជពិធីបុណ្យអុំទូក បណ្ដែតប្រទីប អកអំបុក និងសំពះព្រះខែ",
        true
      );
    }
  }

  constructor(str, str2, isChhob) {
    this.enDescription = str;
    this.khDescription = str2;
    this.isChhob = isChhob;
  }

  getEnDescription() {
    return this.enDescription;
  }

  setEnDescription(str) {
    this.enDescription = str;
  }

  getKhDescription() {
    return this.khDescription;
  }

  setKhDescription(str) {
    this.khDescription = str;
  }

  static getHolidayInfo(calendar) {
    initialize();
    if (calendar.getFullYear() < 2018) {
      return null;
    }
    month = calendar.getMonth();
    day = calendar.getDate();
    return this.hashHoliday["$month$day"];
  }

  static getHolidayInfoLunar(calendar, str) {
    initialize();
    if (calendar.getFullYear() < 2018) {
      return null;
    }
    if (str.indexOf("_NY_") != -1) {
      return new Holiday(
        "Khmer New Year",
        "ពិធីបុណ្យចូលឆ្នាំខ្មែរ ប្រពៃណីជាតិ",
        true
      );
    }
    return this.hashHolidayLunar[str.substring(8, str.length)];
  }
}

class HolidayDayItem {
  ngaiChhob = "";
  isNgaiChhob = false;

  constructor(map) {
    this.ngaiChhob = map["ngaiChhob"];
    this.isNgaiChhob = map["isNgaiChhob"];
  }

  toMap() {
    item = {};
    item["ngaiChhob"] = this.ngaiChhob;
    item["isNgaiChhob"] = this.isNgaiChhob;
    return item;
  }

  toText() {
    return toMap().toString();
  }
}

class LunarCalculator {
  solar_year = 0;
  be_year = 0;
  aharkun = 0;
  aharkun_mod = 0;
  kromthupul = 0;
  avoman = 0;
  bodithey = 0;

  constructor(year) {
    this.solar_year = year;
    this.be_year = year + 544;
    this.aharkun = Math.floor((this.be_year * 292207 + 499) / 800) + 4;
    this.aharkun_mod = (this.be_year * 292207 + 499) % 800;
    this.kromthupul = 800 - this.aharkun_mod;
    this.avoman = (this.aharkun * 11 + 25) % 692;
    this.bodithey =
      (Math.floor((this.aharkun * 11 + 25) / 692) + this.aharkun + 29) % 30;
  }

  isSolarLeapYear() {
    return this.kromthupul <= 207;
  }

  getBoditheyLeap(year) {
    let thisYear = new LunarCalculator(year);
    let nextYear = new LunarCalculator(year + 1);

    var leapMonth = false;
    var leapDay = false;

    //check leap day
    if (thisYear.isSolarLeapYear()) {
      if (thisYear.avoman < 127) {
        leapDay = true;
      } else {
        leapDay = false;
      }
    } else {
      if (thisYear.avoman == 137 && nextYear.avoman == 0) {
        leapDay = false;
        //next year is the leapday year
      } else if (thisYear.avoman < 138) {
        leapDay = true;
      } else {
        leapDay = false;
      }
    }

    //check leap month
    if (thisYear.bodithey == 24 && nextYear.bodithey == 6) {
      //special case
      leapMonth = true;
    } else if (thisYear.bodithey == 25 && nextYear.bodithey == 5) {
      //special case
      leapMonth = false;
    } else if (thisYear.bodithey > 24 || thisYear.bodithey < 6) {
      leapMonth = true;
    } else {
      leapMonth = false;
    }
    if (leapMonth && leapDay) {
      return "MD";
    } else if (leapMonth && !leapDay) {
      return "M";
    } else if (!leapMonth && leapDay) {
      return "D";
    } else {
      return "N";
    }
  }
}

class LunarDayItem {
  solarYear;
  solarMonth;
  solarDay;

  constructor(dateTime) {
    this.solarYear = dateTime.getFullYear();
    this.solarMonth = dateTime.getMonth();
    this.solarDay = dateTime.getDate();
  }

  toText() {
    print("Date: $solarYear-$solarMonth-$solarDay - $lunarDate}");
  }
}

class LunarText {
  days = [];

  khmerMonthName(i) {
    switch (i) {
      case 1:
        return "មករា";
      case 2:
        return "កុម្ភៈ";
      case 3:
        return "មីនា";
      case 4:
        return "មេសា";
      case 5:
        return "ឧសភា";
      case 6:
        return "មិថុនា";
      case 7:
        return "កក្កដា";
      case 8:
        return "សីហា";
      case 9:
        return "កញ្ញា";
      case 10:
        return "តុលា";
      case 11:
        return "វិច្ឆិកា";
      case 12:
        return "ធ្នូ";
      default:
        return "";
    }
  }

  checkLeapYear(year) {
    if (year % 4 == 0) {
      if (year % 100 == 0) {
        if (year % 400 == 0) {
          return true;
        } else {
          return false;
        }
      } else {
        return true;
      }
    } else {
      return false;
    }
  }

  getCalendarLeap(i) {
    boditheyLeap = LunarCalculator(i).getBoditheyLeap(i);
    boditheyLeap2 = LunarCalculator(i - 1).getBoditheyLeap(i - 1);
    if (boditheyLeap == "MD") {
      return "M";
    }
    return boditheyLeap2 == "MD" ? "D" : boditheyLeap;
  }

  dateDiffInDays(calendar, calendar2) {
    timeInMillis =
      calendar2.millisecondsSinceEpoch - calendar.millisecondsSinceEpoch;
    j = timeInMillis / 1000;
    j = timeInMillis / 60000;
    j = timeInMillis / 3600000;
    //print(
    //    'date diff ${calendar.toString()} - ${calendar2.toString()} ${(timeInMillis / 86400000).toInt()}');
    return (timeInMillis / 86400000).toInt();
  }

  getKhmerLunarCode(calendar) {
    // console.log("getKhmerLunarCode" + calendar.getFullYear());
    var list = LunarUtils.generateKhmerDate(calendar.getFullYear());
    var result = list[
        calendar.getFullYear() +
          "-" +
          this.f(calendar.getMonth()+1) +
          "-" +
          this.f(calendar.getDate())
      ];
      // console.log(calendar.getFullYear() +
      // "-" +
      // this.f(calendar.getMonth()+1) +
      // "-" +
      // this.f(calendar.getDate())+' - getKhmerLunarCode - '+result);
    return result;
  }

  padLeadingZeros(num, size) {
    var s = num + "";
    while (s.length < size) s = "0" + s;
    return s;
  }

  f(value) {
    return this.padLeadingZeros(value, 2);
  }

  convertToKhmerNum(input) {
    var result = "";
    var str = "" + input;
    for (var i = 0; i < str.length; i++) {
      var char = str[i];
      // console.log(result + "convertToKhmerNum" + char);
      switch (char) {
        case "0":
          result = result + "០";
          break;
        case "1":
          result = result + "១";
          break;
        case "2":
          result = result + "២";
          break;
        case "3":
          result = result + "៣";
          break;
        case "4":
          result = result + "៤";
          break;
        case "5":
          result = result + "៥";
          break;
        case "6":
          result = result + "៦";
          break;
        case "7":
          result = result + "៧";
          break;
        case "8":
          result = result + "៨";
          break;
        case "9":
          result = result + "៩";
          break;
        default:
          result = result + char;
          break;
      }
    }

    return result;
  }

  getKhmerLunarString(calendar) {
    //console.log('getKhmerLunarString '+calendar.getFullYear());
    var khmerLunarCode = this.getKhmerLunarCode(calendar);
    //print(
    //    'khmer lunar code from getKhmerLunarString '+khmerLunarCode - calendar.weekday);
    var str = "";
    switch (calendar.getDay()) {
      case 0:
        str = "អាទិត្យ";
        break;
      case 1:
        str = "ចន្ទ";
        break;
      case 2:
        str = "អង្គារ";
        break;
      case 3:
        str = "ពុធ";
        break;
      case 4:
        str = "ព្រហស្បតិ៍";
        break;
      case 5:
        str = "សុក្រ";
        break;
      case 6:
        str = "សៅរ៍";
        break;
    }
    var result = "";
    result += "ថ្ងៃ" + str;
    result += this.getKhmerLunarStringFromString(khmerLunarCode);
    return result;
  }

  getWeekDay(input) {
    var str = "";
    switch (input) {
      case 0:
        str = "អាទិត្យ";
        break;
      case 1:
        str = "ចន្ទ";
        break;
      case 2:
        str = "អង្គារ";
        break;
      case 3:
        str = "ពុធ";
        break;
      case 4:
        str = "ព្រហស្បតិ៍";
        break;
      case 5:
        str = "សុក្រ";
        break;
      case 6:
        str = "សៅរ៍";
        break;
    }
    return str;
  }

  static getSakFromFullCode(lunarCode) {
    return lunarCode.substring(0, 2);
  }

  static getAnimalYearFromFullCode(lunarCode) {
    return lunarCode.substring(2, 4);
  }

  static getKhmerYearFromFullCode(lunarCode) {
    return lunarCode.substring(4, 8);
  }

  static getKhmerMonthFromFullCode(lunarCode) {
    return lunarCode.substring(8, 10);
  }

  static getRochKertFromFullCode(lunarCode) {
    return lunarCode.substring(10, 11);
  }

  static getRochKertDayFromFullCode(lunarCode) {
    return lunarCode.substring(11, 13);
  }

  getKhmerLunarStringFromString(str) {
    var hashMonth = LunarUtils.getHashMonth();
    var hashAnimalYear = LunarUtils.getHashAnimalYear();
    var hashSak = LunarUtils.getHashSak();
    var sSak = LunarText.getSakFromFullCode(str);
    var sAnimalYear = LunarText.getAnimalYearFromFullCode(str);
    var sKhmerYear = LunarText.getKhmerYearFromFullCode(str);
    var sKhmerMonth = LunarText.getKhmerMonthFromFullCode(str);
    var sRochKert = LunarText.getRochKertFromFullCode(str);
    var sRochKertDay = LunarText.getRochKertDayFromFullCode(str);

    var result = "";

    var sSak = hashSak[sSak];
    var sKhmerYear = this.convertToKhmerNum(sKhmerYear);
    var sKhmerMonth = hashMonth[sKhmerMonth];
    var sAnimalYear = hashAnimalYear[sAnimalYear];
    var sRochKert = sRochKert.replaceAll("K", "កើត").replaceAll("R", "រោច");
    var sRochKertDay = this.convertToKhmerNum(
      LunarUtils.removeFirstZero(sRochKertDay)
    );
    result += " ";
    result += sRochKertDay;
    result += sRochKert;
    result += " ខែ";
    result += sKhmerMonth;
    result += " ឆ្នាំ";
    result += sAnimalYear;
    result += " ";
    result += sSak;
    result += " ព.ស.";
    result += sKhmerYear;
    return result;
  }

  getKhmerFullSolarString(calendar) {
    console.log("getKhmerFullSolarString" + calendar.getFullYear());
    var result = "";
    result += "ថ្ងៃ";
    result += this.getWeekDay(calendar.getDay());
    result += " ទី";
    result += this.convertToKhmerNum(calendar.getDate());
    result += " ខែ";
    result += this.khmerMonthName(calendar.getMonth()+1);
    result += " ឆ្នាំ";
    result += this.convertToKhmerNum(calendar.getFullYear());
    console.log("getKhmerFullSolarString" + result);
    return result;
  }
}

function daysInMonth(month, year) {
  return new Date(year, month, 0).getDate();
}

class LunarUtils {
  static getPresetLunarCode() {
    var hashMap = {};
    hashMap[1] = "01K01";
    hashMap[2] = "01K02";
    hashMap[3] = "01K03";
    hashMap[4] = "01K04";
    hashMap[5] = "01K05";
    hashMap[6] = "01K06";
    hashMap[7] = "01K07";
    hashMap[8] = "01K08S";
    hashMap[9] = "01K09";
    hashMap[10] = "01K10";
    hashMap[11] = "01K11";
    hashMap[12] = "01K12";
    hashMap[13] = "01K13";
    hashMap[14] = "01K14";
    hashMap[15] = "01K15S";
    hashMap[16] = "01R01";
    hashMap[17] = "01R02";
    hashMap[18] = "01R03";
    hashMap[19] = "01R04";
    hashMap[20] = "01R05";
    hashMap[21] = "01R06";
    hashMap[22] = "01R07";
    hashMap[23] = "01R08S";
    hashMap[24] = "01R09";
    hashMap[25] = "01R10";
    hashMap[26] = "01R11";
    hashMap[27] = "01R12";
    hashMap[28] = "01R13";
    hashMap[29] = "01R14S";
    hashMap[30] = "02K01";
    hashMap[31] = "02K02";
    hashMap[32] = "02K03";
    hashMap[33] = "02K04";
    hashMap[34] = "02K05";
    hashMap[35] = "02K06";
    hashMap[36] = "02K07";
    hashMap[37] = "02K08S";
    hashMap[38] = "02K09";
    hashMap[39] = "02K10";
    hashMap[40] = "02K11";
    hashMap[41] = "02K12";
    hashMap[42] = "02K13";
    hashMap[43] = "02K14";
    hashMap[44] = "02K15S";
    hashMap[45] = "02R01";
    hashMap[46] = "02R02";
    hashMap[47] = "02R03";
    hashMap[48] = "02R04";
    hashMap[49] = "02R05";
    hashMap[50] = "02R06";
    hashMap[51] = "02R07";
    hashMap[52] = "02R08S";
    hashMap[53] = "02R09";
    hashMap[54] = "02R10";
    hashMap[55] = "02R11";
    hashMap[56] = "02R12";
    hashMap[57] = "02R13";
    hashMap[58] = "02R14";
    hashMap[59] = "02R15S";
    hashMap[60] = "03K01";
    hashMap[61] = "03K02";
    hashMap[62] = "03K03";
    hashMap[63] = "03K04";
    hashMap[64] = "03K05";
    hashMap[65] = "03K06";
    hashMap[66] = "03K07";
    hashMap[67] = "03K08S";
    hashMap[68] = "03K09";
    hashMap[69] = "03K10";
    hashMap[70] = "03K11";
    hashMap[71] = "03K12";
    hashMap[72] = "03K13";
    hashMap[73] = "03K14";
    hashMap[74] = "03K15S";
    hashMap[75] = "03R01";
    hashMap[76] = "03R02";
    hashMap[77] = "03R03";
    hashMap[78] = "03R04";
    hashMap[79] = "03R05";
    hashMap[80] = "03R06";
    hashMap[81] = "03R07";
    hashMap[82] = "03R08S";
    hashMap[83] = "03R09";
    hashMap[84] = "03R10";
    hashMap[85] = "03R11";
    hashMap[86] = "03R12";
    hashMap[87] = "03R13";
    hashMap[88] = "03R14S";
    hashMap[89] = "04K01";
    hashMap[90] = "04K02";
    hashMap[91] = "04K03";
    hashMap[92] = "04K04";
    hashMap[93] = "04K05";
    hashMap[94] = "04K06";
    hashMap[95] = "04K07";
    hashMap[96] = "04K08S";
    hashMap[97] = "04K09";
    hashMap[98] = "04K10";
    hashMap[99] = "04K11";
    hashMap[100] = "04K12";
    hashMap[101] = "04K13";
    hashMap[102] = "04K14";
    hashMap[103] = "04K15S";
    hashMap[104] = "04R01";
    hashMap[105] = "04R02";
    hashMap[106] = "04R03";
    hashMap[107] = "04R04";
    hashMap[108] = "04R05";
    hashMap[109] = "04R06";
    hashMap[110] = "04R07";
    hashMap[111] = "04R08S";
    hashMap[112] = "04R09";
    hashMap[113] = "04R10";
    hashMap[114] = "04R11";
    hashMap[115] = "04R12";
    hashMap[116] = "04R13";
    hashMap[117] = "04R14";
    hashMap[118] = "04R15S";
    hashMap[119] = "05K01";
    hashMap[120] = "05K02";
    hashMap[121] = "05K03";
    hashMap[122] = "05K04";
    hashMap[123] = "05K05";
    hashMap[124] = "05K06";
    hashMap[125] = "05K07";
    hashMap[126] = "05K08S";
    hashMap[127] = "05K09";
    hashMap[128] = "05K10";
    hashMap[129] = "05K11";
    hashMap[130] = "05K12";
    hashMap[131] = "05K13";
    hashMap[132] = "05K14";
    hashMap[133] = "05K15S";
    hashMap[134] = "05R01";
    hashMap[135] = "05R02";
    hashMap[136] = "05R03";
    hashMap[137] = "05R04";
    hashMap[138] = "05R05";
    hashMap[139] = "05R06";
    hashMap[140] = "05R07";
    hashMap[141] = "05R08S";
    hashMap[142] = "05R09";
    hashMap[143] = "05R10";
    hashMap[144] = "05R11";
    hashMap[145] = "05R12";
    hashMap[146] = "05R13";
    hashMap[147] = "05R14S";
    hashMap[148] = "06K01";
    hashMap[149] = "06K02";
    hashMap[150] = "06K03";
    hashMap[151] = "06K04";
    hashMap[152] = "06K05";
    hashMap[153] = "06K06";
    hashMap[154] = "06K07";
    hashMap[155] = "06K08S";
    hashMap[156] = "06K09";
    hashMap[157] = "06K10";
    hashMap[158] = "06K11";
    hashMap[159] = "06K12";
    hashMap[160] = "06K13";
    hashMap[161] = "06K14";
    hashMap[162] = "06K15S";
    hashMap[163] = "06R01";
    hashMap[164] = "06R02";
    hashMap[165] = "06R03";
    hashMap[166] = "06R04";
    hashMap[167] = "06R05";
    hashMap[168] = "06R06";
    hashMap[169] = "06R07";
    hashMap[170] = "06R08S";
    hashMap[171] = "06R09";
    hashMap[172] = "06R10";
    hashMap[173] = "06R11";
    hashMap[174] = "06R12";
    hashMap[175] = "06R13";
    hashMap[176] = "06R14";
    hashMap[177] = "06R15S";
    hashMap[178] = "07K01";
    hashMap[179] = "07K02";
    hashMap[180] = "07K03";
    hashMap[181] = "07K04";
    hashMap[182] = "07K05";
    hashMap[183] = "07K06";
    hashMap[184] = "07K07";
    hashMap[185] = "07K08S";
    hashMap[186] = "07K09";
    hashMap[187] = "07K10";
    hashMap[188] = "07K11";
    hashMap[189] = "07K12";
    hashMap[190] = "07K13";
    hashMap[191] = "07K14";
    hashMap[192] = "07K15S";
    hashMap[193] = "07R01";
    hashMap[194] = "07R02";
    hashMap[195] = "07R03";
    hashMap[196] = "07R04";
    hashMap[197] = "07R05";
    hashMap[198] = "07R06";
    hashMap[199] = "07R07";
    hashMap[200] = "07R08S";
    hashMap[201] = "07R09";
    hashMap[202] = "07R10";
    hashMap[203] = "07R11";
    hashMap[204] = "07R12";
    hashMap[205] = "07R13";
    hashMap[206] = "07R14";
    hashMap[207] = "07R15S";
    hashMap[208] = "08K01";
    hashMap[209] = "08K02";
    hashMap[210] = "08K03";
    hashMap[211] = "08K04";
    hashMap[212] = "08K05";
    hashMap[213] = "08K06";
    hashMap[214] = "08K07";
    hashMap[215] = "08K08S";
    hashMap[216] = "08K09";
    hashMap[217] = "08K10";
    hashMap[218] = "08K11";
    hashMap[219] = "08K12";
    hashMap[220] = "08K13";
    hashMap[221] = "08K14";
    hashMap[222] = "08K15S";
    hashMap[223] = "08R01";
    hashMap[224] = "08R02";
    hashMap[225] = "08R03";
    hashMap[226] = "08R04";
    hashMap[227] = "08R05";
    hashMap[228] = "08R06";
    hashMap[229] = "08R07";
    hashMap[230] = "08R08S";
    hashMap[231] = "08R09";
    hashMap[232] = "08R10";
    hashMap[233] = "08R11";
    hashMap[234] = "08R12";
    hashMap[235] = "08R13";
    hashMap[236] = "08R14";
    hashMap[237] = "08R15S";
    hashMap[238] = "09K01";
    hashMap[239] = "09K02";
    hashMap[240] = "09K03";
    hashMap[241] = "09K04";
    hashMap[242] = "09K05";
    hashMap[243] = "09K06";
    hashMap[244] = "09K07";
    hashMap[245] = "09K08S";
    hashMap[246] = "09K09";
    hashMap[247] = "09K10";
    hashMap[248] = "09K11";
    hashMap[249] = "09K12";
    hashMap[250] = "09K13";
    hashMap[251] = "09K14";
    hashMap[252] = "09K15S";
    hashMap[253] = "09R01";
    hashMap[254] = "09R02";
    hashMap[255] = "09R03";
    hashMap[256] = "09R04";
    hashMap[257] = "09R05";
    hashMap[258] = "09R06";
    hashMap[259] = "09R07";
    hashMap[260] = "09R08S";
    hashMap[261] = "09R09";
    hashMap[262] = "09R10";
    hashMap[263] = "09R11";
    hashMap[264] = "09R12";
    hashMap[265] = "09R13";
    hashMap[266] = "09R14";
    hashMap[267] = "09R15S";
    hashMap[268] = "10K01";
    hashMap[269] = "10K02";
    hashMap[270] = "10K03";
    hashMap[271] = "10K04";
    hashMap[272] = "10K05";
    hashMap[273] = "10K06";
    hashMap[274] = "10K07";
    hashMap[275] = "10K08S";
    hashMap[276] = "10K09";
    hashMap[277] = "10K10";
    hashMap[278] = "10K11";
    hashMap[279] = "10K12";
    hashMap[280] = "10K13";
    hashMap[281] = "10K14";
    hashMap[282] = "10K15S";
    hashMap[283] = "10R01";
    hashMap[284] = "10R02";
    hashMap[285] = "10R03";
    hashMap[286] = "10R04";
    hashMap[287] = "10R05";
    hashMap[288] = "10R06";
    hashMap[289] = "10R07";
    hashMap[290] = "10R08S";
    hashMap[291] = "10R09";
    hashMap[292] = "10R10";
    hashMap[293] = "10R11";
    hashMap[294] = "10R12";
    hashMap[295] = "10R13";
    hashMap[296] = "10R14";
    hashMap[297] = "10R15S";
    hashMap[298] = "11K01";
    hashMap[299] = "11K02";
    hashMap[300] = "11K03";
    hashMap[301] = "11K04";
    hashMap[302] = "11K05";
    hashMap[303] = "11K06";
    hashMap[304] = "11K07";
    hashMap[305] = "11K08S";
    hashMap[306] = "11K09";
    hashMap[307] = "11K10";
    hashMap[308] = "11K11";
    hashMap[309] = "11K12";
    hashMap[310] = "11K13";
    hashMap[311] = "11K14";
    hashMap[312] = "11K15S";
    hashMap[313] = "11R01";
    hashMap[314] = "11R02";
    hashMap[315] = "11R03";
    hashMap[316] = "11R04";
    hashMap[317] = "11R05";
    hashMap[318] = "11R06";
    hashMap[319] = "11R07";
    hashMap[320] = "11R08S";
    hashMap[321] = "11R09";
    hashMap[322] = "11R10";
    hashMap[323] = "11R11";
    hashMap[324] = "11R12";
    hashMap[325] = "11R13";
    hashMap[326] = "11R14S";
    hashMap[327] = "12K01";
    hashMap[328] = "12K02";
    hashMap[329] = "12K03";
    hashMap[330] = "12K04";
    hashMap[331] = "12K05";
    hashMap[332] = "12K06";
    hashMap[333] = "12K07";
    hashMap[334] = "12K08S";
    hashMap[335] = "12K09";
    hashMap[336] = "12K10";
    hashMap[337] = "12K11";
    hashMap[338] = "12K12";
    hashMap[339] = "12K13";
    hashMap[340] = "12K14";
    hashMap[341] = "12K15S";
    hashMap[342] = "12R01";
    hashMap[343] = "12R02";
    hashMap[344] = "12R03";
    hashMap[345] = "12R04";
    hashMap[346] = "12R05";
    hashMap[347] = "12R06";
    hashMap[348] = "12R07";
    hashMap[349] = "12R08S";
    hashMap[350] = "12R09";
    hashMap[351] = "12R10";
    hashMap[352] = "12R11";
    hashMap[353] = "12R12";
    hashMap[354] = "12R13";
    hashMap[355] = "12R14";
    hashMap[356] = "12R15S";
    hashMap[357] = "13K01";
    hashMap[358] = "13K02";
    hashMap[359] = "13K03";
    hashMap[360] = "13K04";
    hashMap[361] = "13K05";
    hashMap[362] = "13K06";
    hashMap[363] = "13K07";
    hashMap[364] = "13K08S";
    hashMap[365] = "13K09";
    hashMap[366] = "13K10";
    hashMap[367] = "13K11";
    hashMap[368] = "13K12";
    hashMap[369] = "13K13";
    hashMap[370] = "13K14";
    hashMap[371] = "13K15S";
    hashMap[372] = "13R01";
    hashMap[373] = "13R02";
    hashMap[374] = "13R03";
    hashMap[375] = "13R04";
    hashMap[376] = "13R05";
    hashMap[377] = "13R06";
    hashMap[378] = "13R07";
    hashMap[379] = "13R08S";
    hashMap[380] = "13R09";
    hashMap[381] = "13R10";
    hashMap[382] = "13R11";
    hashMap[383] = "13R12";
    hashMap[384] = "13R13";
    hashMap[385] = "13R14S";
    hashMap[386] = "14K01";
    hashMap[387] = "14K02";
    hashMap[388] = "14K03";
    hashMap[389] = "14K04";
    hashMap[390] = "14K05";
    hashMap[391] = "14K06";
    hashMap[392] = "14K07";
    hashMap[393] = "14K08S";
    hashMap[394] = "14K09";
    hashMap[395] = "14K10";
    hashMap[396] = "14K11";
    hashMap[397] = "14K12";
    hashMap[398] = "14K13";
    hashMap[399] = "14K14";
    hashMap[400] = "14K15S";
    hashMap[401] = "14R01";
    hashMap[402] = "14R02";
    hashMap[403] = "14R03";
    hashMap[404] = "14R04";
    hashMap[405] = "14R05";
    hashMap[406] = "14R06";
    hashMap[407] = "14R07";
    hashMap[408] = "14R08S";
    hashMap[409] = "14R09";
    hashMap[410] = "14R10";
    hashMap[411] = "14R11";
    hashMap[412] = "14R12";
    hashMap[413] = "14R13";
    hashMap[414] = "14R14";
    hashMap[415] = "14R15S";
    return hashMap;
  }

  static getPresetBeginDayLunar() {
    var hashMap = {};
    hashMap[1900] = 30;
    hashMap[1901] = 41;
    hashMap[1902] = 22;
    hashMap[1903] = 32;
    hashMap[1904] = 43;
    hashMap[1905] = 25;
    hashMap[1906] = 36;
    hashMap[1907] = 46;
    hashMap[1908] = 27;
    hashMap[1909] = 39;
    hashMap[1910] = 20;
    hashMap[1911] = 31;
    hashMap[1912] = 41;
    hashMap[1913] = 23;
    hashMap[1914] = 34;
    hashMap[1915] = 45;
    hashMap[1916] = 26;
    hashMap[1917] = 38;
    hashMap[1918] = 48;
    hashMap[1919] = 29;
    hashMap[1920] = 40;
    hashMap[1921] = 22;
    hashMap[1922] = 33;
    hashMap[1923] = 43;
    hashMap[1924] = 24;
    hashMap[1925] = 36;
    hashMap[1926] = 47;
    hashMap[1927] = 28;
    hashMap[1928] = 38;
    hashMap[1929] = 20;
    hashMap[1930] = 31;
    hashMap[1931] = 42;
    hashMap[1932] = 23;
    hashMap[1933] = 34;
    hashMap[1934] = 45;
    hashMap[1935] = 26;
    hashMap[1936] = 37;
    hashMap[1937] = 49;
    hashMap[1938] = 30;
    hashMap[1939] = 40;
    hashMap[1940] = 21;
    hashMap[1941] = 33;
    hashMap[1942] = 44;
    hashMap[1943] = 25;
    hashMap[1944] = 35;
    hashMap[1945] = 47;
    hashMap[1946] = 28;
    hashMap[1947] = 39;
    hashMap[1948] = 20;
    hashMap[1949] = 31;
    hashMap[1950] = 42;
    hashMap[1951] = 23;
    hashMap[1952] = 34;
    hashMap[1953] = 46;
    hashMap[1954] = 27;
    hashMap[1955] = 37;
    hashMap[1956] = 48;
    hashMap[1957] = 30;
    hashMap[1958] = 41;
    hashMap[1959] = 22;
    hashMap[1960] = 32;
    hashMap[1961] = 44;
    hashMap[1962] = 25;
    hashMap[1963] = 36;
    hashMap[1964] = 46;
    hashMap[1965] = 28;
    hashMap[1966] = 39;
    hashMap[1967] = 20;
    hashMap[1968] = 31;
    hashMap[1969] = 42;
    hashMap[1970] = 23;
    hashMap[1971] = 34;
    hashMap[1972] = 45;
    hashMap[1973] = 27;
    hashMap[1974] = 37;
    hashMap[1975] = 48;
    hashMap[1976] = 29;
    hashMap[1977] = 41;
    hashMap[1978] = 22;
    hashMap[1979] = 32;
    hashMap[1980] = 43;
    hashMap[1981] = 25;
    hashMap[1982] = 36;
    hashMap[1983] = 47;
    hashMap[1984] = 28;
    hashMap[1985] = 39;
    hashMap[1986] = 20;
    hashMap[1987] = 31;
    hashMap[1988] = 42;
    hashMap[1989] = 24;
    hashMap[1990] = 34;
    hashMap[1991] = 45;
    hashMap[1992] = 26;
    hashMap[1993] = 38;
    hashMap[1994] = 19;
    hashMap[1995] = 29;
    hashMap[1996] = 40;
    hashMap[1997] = 22;
    hashMap[1998] = 33;
    hashMap[1999] = 44;
    hashMap[2000] = 25;
    hashMap[2001] = 36;
    hashMap[2002] = 47;
    hashMap[2003] = 28;
    hashMap[2004] = 39;
    hashMap[2005] = 21;
    hashMap[2006] = 31;
    hashMap[2007] = 42;
    hashMap[2008] = 23;
    hashMap[2009] = 35;
    hashMap[2010] = 45;
    hashMap[2011] = 26;
    hashMap[2012] = 37;
    hashMap[2013] = 19;
    hashMap[2014] = 30;
    hashMap[2015] = 41;
    hashMap[2016] = 22;
    hashMap[2017] = 33;
    hashMap[2018] = 44;
    hashMap[2019] = 25;
    hashMap[2020] = 36;
    hashMap[2021] = 47;
    hashMap[2022] = 28;
    hashMap[2023] = 39;
    hashMap[2024] = 20;
    hashMap[2025] = 32;
    hashMap[2026] = 42;
    hashMap[2027] = 23;
    hashMap[2028] = 34;
    hashMap[2029] = 46;
    hashMap[2030] = 27;
    hashMap[2031] = 37;
    hashMap[2032] = 18;
    hashMap[2033] = 30;
    hashMap[2034] = 41;
    hashMap[2035] = 22;
    hashMap[2036] = 32;
    hashMap[2037] = 44;
    hashMap[2038] = 25;
    hashMap[2039] = 36;
    hashMap[2040] = 47;
    hashMap[2041] = 29;
    hashMap[2042] = 39;
    hashMap[2043] = 20;
    hashMap[2044] = 31;
    hashMap[2045] = 43;
    hashMap[2046] = 24;
    hashMap[2047] = 34;
    hashMap[2048] = 45;
    hashMap[2049] = 27;
    hashMap[2050] = 38;
    hashMap[2051] = 19;
    hashMap[2052] = 29;
    hashMap[2053] = 41;
    hashMap[2054] = 22;
    hashMap[2055] = 33;
    hashMap[2056] = 44;
    hashMap[2057] = 26;
    hashMap[2058] = 36;
    hashMap[2059] = 47;
    hashMap[2060] = 28;
    hashMap[2061] = 40;
    hashMap[2062] = 21;
    hashMap[2063] = 31;
    hashMap[2064] = 42;
    hashMap[2065] = 24;
    hashMap[2066] = 35;
    hashMap[2067] = 45;
    hashMap[2068] = 26;
    hashMap[2069] = 38;
    hashMap[2070] = 19;
    hashMap[2071] = 30;
    hashMap[2072] = 40;
    hashMap[2073] = 22;
    hashMap[2074] = 33;
    hashMap[2075] = 44;
    hashMap[2076] = 25;
    hashMap[2077] = 36;
    hashMap[2078] = 47;
    hashMap[2079] = 28;
    hashMap[2080] = 39;
    hashMap[2081] = 21;
    hashMap[2082] = 32;
    hashMap[2083] = 42;
    hashMap[2084] = 23;
    hashMap[2085] = 35;
    hashMap[2086] = 46;
    hashMap[2087] = 27;
    hashMap[2088] = 37;
    hashMap[2089] = 19;
    hashMap[2090] = 30;
    hashMap[2091] = 41;
    hashMap[2092] = 22;
    hashMap[2093] = 33;
    hashMap[2094] = 44;
    hashMap[2095] = 25;
    hashMap[2096] = 36;
    hashMap[2097] = 48;
    hashMap[2098] = 29;
    hashMap[2099] = 39;
    hashMap[2100] = 20;
    return hashMap;
  }

  static getHashAnimalYear() {
    var hashMap = {};
    hashMap["01"] = "ជូត";
    hashMap["02"] = "ឆ្លូវ";
    hashMap["03"] = "ខាល";
    hashMap["04"] = "ថោះ";
    hashMap["05"] = "រោង";
    hashMap["06"] = "ម្សាញ់";
    hashMap["07"] = "មមី";
    hashMap["08"] = "មមែ";
    hashMap["09"] = "វក";
    hashMap["10"] = "រកា";
    hashMap["11"] = "ច";
    hashMap["12"] = "កុរ";
    return hashMap;
  }

  static getHashMonth() {
    var hashMap = {};
    hashMap["01"] = "មិគសិរ";
    hashMap["02"] = "បុស្ស";
    hashMap["03"] = "មាឃ";
    hashMap["04"] = "ផល្គុន";
    hashMap["05"] = "ចេត្រ";
    hashMap["06"] = "ពិសាខ";
    hashMap["07"] = "ជេស្ឋ";
    hashMap["08"] = "អាសាធ";
    hashMap["09"] = "បឋមាសាធ";
    hashMap["10"] = "ទុតិយាសាធ";
    hashMap["11"] = "ស្រាពណ៌";
    hashMap["12"] = "ភទ្របទ";
    hashMap["13"] = "អស្សុជ";
    hashMap["14"] = "កក្ដិក";
    return hashMap;
  }

  static getHashSak() {
    var hashMap = {};
    hashMap["01"] = "ឯក​ស័ក";
    hashMap["02"] = "ទោ​ស័ក";
    hashMap["03"] = "ត្រី​ស័ក";
    hashMap["04"] = "ចត្វា​ស័ក";
    hashMap["05"] = "បញ្ច​ស័ក";
    hashMap["06"] = "ឆ​ស័ក";
    hashMap["07"] = "សប្ត​ស័ក";
    hashMap["08"] = "អដ្ឋ​ស័ក";
    hashMap["09"] = "នព្វ​ស័ក";
    hashMap["10"] = "សំរឹទ្ធិ​ស័ក";
    return hashMap;
  }

  static padLeadingZeros(num, size) {
    var s = num + "";
    while (s.length < size) s = "0" + s;
    return s;
  }

  static f(value) {
    return this.padLeadingZeros(value, 2);
  }

  static generateSolarDate(date) {
    var holidays = {};
    var temp = {};
    for (var m = 0; m < 12; m++) {
      var list = [];
      var thisYear = new Date(date.getFullYear(), m + 1, 1);
      var day = 0;
      var limitLoop = 42;
      console.log(
        "month:" +
          m +
          1 +
          "-" +
          "total days:" +
          daysInMonth(thisYear.getMonth(), thisYear.getFullYear())
      );

      for (var i = 0; i < limitLoop; i++) {
        let item = new DayItem();
        //add invisible day
        if (i < thisYear.weekday - 1) {
          item.isVisible = false;
          list.push(item);
        } else if (
          i - thisYear.weekday + 2 <=
          daysInMonth(thisYear.getMonth(), thisYear.getFullYear())
        ) {
          item.isVisible = true;
          item.day =
            1 +
            (day++ % daysInMonth(thisYear.getMonth(), thisYear.getFullYear()));
          item.month = thisYear.getMonth();
          item.year = thisYear.getFullYear();

          item.rochKert = getRochKertForThisDate(
            new Date(
              thisYear.getFullYear(),
              thisYear.getMonth(),
              int.parse(item.getDate())
            )
          );
          // console.log(
          //     'code: ${this.listKhmerDate[date.getFullYear()]['${thisYear.getFullYear()}-${LunarUtils.f(thisYear.getMonth())}-${LunarUtils.f(day)}']}');
          item.isNgaiSel = LunarUtils.isSel(
            this.listKhmerDate[date.getFullYear()][
              thisYear.getFullYear() +
                "-" +
                LunarUtils.f(thisYear.getMonth()) +
                "-" +
                LunarUtils.f(day)
            ]
          );

          //check ngai chob
          temp = new Date(
            date.getFullYear(),
            date.getMonth(),
            int.parse(item.getDate())
          );
          //console.log('check ngai chob: ${temp.toString()} - ${temp.weekday}');
          if (temp.weekday == 7) {
            holidayDayItem = new HolidayDayItem({
              ngaiChhob: "ថ្ងៃអាទិត្យ",
              isNgaiChhob: true,
            });
            item.eventEachDay.push(holidayDayItem);
          }
          //select current day
          now = new Date.now();
          //console.log('item day: ${item.getDate()} - now: ${now.getDate()}');
          if (
            now.getFullYear() == thisYear.getFullYear() &&
            now.getMonth() == thisYear.getMonth() &&
            int.parse(item.getDate()) == now.getDate()
          ) {
            item.isSelected = true;
            currentDay = item;
          }
          list.push(item);
        } else if (
          i - thisYear.weekday + 2 >
          daysInMonth(thisYear.getMonth(), thisYear.getFullYear())
        ) {
          if (list.length <= 35) {
            limitLoop = 35;
          } else {
            item.isVisible = false;
            list.push(item);
          }
        } else {
          item.isVisible = false;
          list.push(item);
        }
      }
      console.log(m + "list size: " + list.length);
      temp[m] = list;
    }
    //add holidy to day item
    for (var i = 0; i < 12; i++) {
      holidays[i] = [];
    }
    Holiday.initialize();
    for (var i = 0; i < Holiday.hashHoliday.length; i++) {
      var key = Holiday.hashHoliday.keys.elementAt(i);
      var month = int.parse(key.substring(0, 2)) - 1;
      var day = int.parse(key.substring(2, 4)) - 1;
      var interval = 0;
      while (temp[month][interval].isVisible == false) {
        interval++;
      }
      day = day + interval;
      console.log(
        key +
          "-" +
          Holiday.hashHoliday[key].khDescription +
          " test" +
          temp[month][day].toString()
      );
      if (temp[month][day].eventEachDay.length > 0) {
        temp[month][day].eventEachDay[0].isNgaiChhob = true;
        temp[month][day].eventEachDay[0].ngaiChhob =
          Holiday.hashHoliday[key].khDescription;
      } else {
        holidayDayItem = new HolidayDayItem({
          ngaiChhob: Holiday.hashHoliday[key].khDescription,
          isNgaiChhob: Holiday.hashHoliday[key].isChhob,
        });
        temp[month][day].eventEachDay.push(holidayDayItem);
      }
      holidays[month].push(temp[month][day]);
    }
    // console.log("solar holiday: " + holidays.toString());
    //khmer lunar holiday
    //LunarText text = LunarText();

    for (var i = 0; i < 12; i++) {
      var interval = 0;
      // console.log("my log" + temp[i][interval].isChhob);
      while (temp[i][interval].isVisible == false) {
        interval++;
      }
      for (
        var j = interval;
        j < daysInMonth(date.getMonth(), date.getFullYear()) + interval;
        j++
      ) {
        // console.log("leng of j each month: $i - $j");
        lunar_code =
          LunarUtils.KhmerLunarCodeForYears[date.getFullYear()][
            date.getFullYear() +
              "-" +
              LunarUtils.f(i + 1) +
              "-" +
              LunarUtils.f(j - interval + 1)
          ];
        if (lunar_code == null) {
          continue;
        } else if (lunar_code.length < 8) {
          continue;
        }
        lunar_code = lunar_code.substring(8, lunar_code.length);
        //console.log('lunar_code: $lunar_code');
        for (var m = 0; m < Holiday.hashHolidayLunar.length; m++) {
          key = Holiday.hashHolidayLunar.keys.elementAt(m);
          if (key == lunar_code) {
            console.log("key: $key = $lunar_code  -  ${i + 1}/${j + 1}");
            holidayDayItem = new HolidayDayItem({
              ngaiChhob: Holiday.hashHolidayLunar[key].khDescription,
              isNgaiChhob: Holiday.hashHolidayLunar[key].isChhob,
            });
            temp[i][j].eventEachDay.push(holidayDayItem);
            // console.log("$i- $j - ${temp[i][j].toMap()}");
            holidays[i].push(temp[i][j]);
          }
        }
      }
    }

    return temp;
  }

  static KhmerLunarCodeForYears = {};
  static generateKhmerDate(solar_year) {
    if (this.KhmerLunarCodeForYears[solar_year] != null) {
      return this.KhmerLunarCodeForYears[solar_year];
    }
    var listKhmerDate = {};
    var calculator = new LunarCalculator(solar_year);
    // console.log("start");
    // console.log("solar year" + solar_year);
    // console.log("beginday" + LunarUtils.getPresetBeginDayLunar()[solar_year]);
    var beginDay =
      LunarUtils.getPresetLunarCode()[
        LunarUtils.getPresetBeginDayLunar()[solar_year]
      ];
    var khmerDate = beginDay;
    console.log("begin day: " + khmerDate);
    var tKhmerYear = calculator.be_year - 1;
    var tKhmerMonth = parseInt(khmerDate.substring(0, 2));
    var tKertRoch = khmerDate.substring(2, 3);
    var tKertRochDay = parseInt(khmerDate.substring(3, 5));

    var kertRochDay = tKertRochDay - 1;
    var kertRoch = tKertRoch;
    var khmerMonth = tKhmerMonth;
    var khmerYear = tKhmerYear;
    var sel = "";
    var result = "";

    for (var i = 0; i < 12; i++) {
      for (var j = 0; j < daysInMonth(i + 1, solar_year); j++) {
        sel = "";

        //get sak
        var sak = "02";
        var tempSak = 1 + ((khmerYear - 2563) % 10);
        sak = LunarUtils.f(tempSak);

        //get animal
        var animal = "01";
        var tempAnimal = 1 + ((khmerYear - 2564) % 12);
        animal = LunarUtils.f(tempAnimal);

        kertRochDay = kertRochDay + 1;

        if (khmerMonth == 7 && calculator.getBoditheyLeap(solar_year) == "D") {
          if (kertRoch == "K") {
            if (kertRochDay == 8 || kertRochDay == 15) {
              sel = "S";
            }
            if (kertRochDay > 15) {
              kertRochDay = 1;
              kertRoch = "R";
            } else {
              //nothing
            }
          } else {
            if (kertRochDay == 8 || kertRochDay == 15) {
              sel = "S";
            }
            //it is roch 15
            if (kertRochDay > 15) {
              kertRochDay = 1;
              kertRoch = "K";
              khmerMonth = khmerMonth + 1;
            }
          }
        } else if (
          khmerMonth == 7 &&
          calculator.getBoditheyLeap(solar_year) == "N" &&
          calculator.getBoditheyLeap(solar_year - 1) == "MD"
        ) {
          if (kertRoch == "K") {
            if (kertRochDay == 8 || kertRochDay == 15) {
              sel = "S";
            }
            if (kertRochDay > 15) {
              kertRochDay = 1;
              kertRoch = "R";
            } else {
              //nothing
            }
          } else {
            if (kertRochDay == 8 || kertRochDay == 15) {
              sel = "S";
            }
            //it is roch 15
            if (kertRochDay > 15) {
              kertRochDay = 1;
              kertRoch = "K";

              khmerMonth = khmerMonth + 1;
            }
          }
        } else if (khmerMonth == 8) {
          if (calculator.getBoditheyLeap(solar_year) != "N") {
            //check leap year
            if (
              calculator.getBoditheyLeap(solar_year) == "M" ||
              calculator.getBoditheyLeap(solar_year) == "MD"
            ) {
              var dateTemp = new Date(solar_year, i + 1, j - 1);
              var dataTemp2 = dateTemp;
              khmerMonth = khmerMonth + 1;
              kertRochDay = 0;
              for (var m = 1; m <= 60; m++) {
                // console.log("loop $m");
                dataTemp2 = new Date(
                  dataTemp2.getFullYear(),
                  dataTemp2.getMonth(),
                  dataTemp2.getDate() + 1
                );
                sel = "";
                kertRochDay = kertRochDay + 1;
                if (kertRoch == "K") {
                  if (kertRochDay == 8 || kertRochDay == 15) {
                    sel = "S";
                  }
                  if (kertRochDay > 15) {
                    kertRochDay = 1;
                    kertRoch = "R";
                  } else {
                    //nothing
                  }
                } else {
                  if (kertRochDay == 8 || kertRochDay == 15) {
                    sel = "S";
                  }
                  //it is roch 15
                  if (kertRochDay > 15) {
                    kertRochDay = 1;
                    kertRoch = "K";
                    khmerMonth = khmerMonth + 1;
                  }
                }
                // console.log(
                //   "solar date: " +
                //     solar_year +
                //     "-" +
                //     LunarUtils.f(dataTemp2.getMonth()) +
                //     "-" +
                //     LunarUtils.f(dataTemp2.getDate())
                // );
                result =
                  sak +
                  animal +
                  khmerYear +
                  LunarUtils.f(khmerMonth) +
                  kertRoch +
                  LunarUtils.f(kertRochDay) +
                  sel;
                listKhmerDate[
                  solar_year +
                    "-" +
                    LunarUtils.f(dataTemp2.getMonth()) +
                    "-" +
                    LunarUtils.f(dataTemp2.getDate())
                ] = result;
              }
              i = dataTemp2.getMonth() - 1;
              j = dataTemp2.getDate() - 1;
            } else {
              if (kertRoch == "K") {
                if (kertRochDay == 8 || kertRochDay == 15) {
                  sel = "S";
                }
                if (kertRochDay > 15) {
                  kertRochDay = 1;
                  kertRoch = "R";
                } else {
                  //nothing
                }
              } else {
                if (kertRochDay == 8 || kertRochDay == 15) {
                  sel = "S";
                }
                //it is roch 15
                if (kertRochDay > 15) {
                  kertRochDay = 1;
                  kertRoch = "K";

                  khmerMonth = 11;
                }
              }
            }
          } else {
            if (kertRoch == "K") {
              if (kertRochDay == 8 || kertRochDay == 15) {
                sel = "S";
              }
              if (kertRochDay > 15) {
                kertRochDay = 1;
                kertRoch = "R";
              } else {
                //nothing
              }
            } else {
              if (kertRochDay == 8 || kertRochDay == 15) {
                sel = "S";
              }
              //it is roch 15
              if (kertRochDay > 15) {
                kertRochDay = 1;
                kertRoch = "K";

                khmerMonth = 11;
              }
            }
          }
        } else {
          //normal day
          if (khmerMonth % 2 == 0) {
            //dach 15 roch
            if (kertRoch == "K") {
              if (kertRochDay == 8 || kertRochDay == 15) {
                sel = "S";
              }
              if (kertRochDay > 15) {
                kertRochDay = 1;
                kertRoch = "R";
              } else {
                //nothing
              }
            } else {
              if (kertRochDay == 8 || kertRochDay == 15) {
                sel = "S";
              }
              //it is roch 15
              if (kertRochDay > 15) {
                kertRochDay = 1;
                kertRoch = "K";

                khmerMonth = khmerMonth + 1;
                if (khmerMonth > 14) khmerMonth = 1;
              }
            }
          } else {
            //dach 14 roch
            if (kertRoch == "K") {
              if (kertRochDay == 8 || kertRochDay == 15) {
                sel = "S";
              }
              if (kertRochDay > 15) {
                kertRochDay = 1;
                kertRoch = "R";
              } else {
                //nothing
              }
            } else {
              if (kertRochDay == 8 || kertRochDay == 14) {
                sel = "S";
              }
              //it is roch 14
              if (kertRochDay > 14) {
                kertRochDay = 1;
                kertRoch = "K";

                khmerMonth = khmerMonth + 1;
                if (khmerMonth > 14) khmerMonth = 1;
              }
            }
          }
        }

        //check new year
        if (khmerMonth == 6) {
          //new year khmer
          if (kertRoch == "R" && kertRochDay == 1) {
            khmerYear = khmerYear + 1;
            //get sak
            var tempSak = 1 + ((khmerYear - 2563) % 10);
            sak = LunarUtils.f(tempSak);

            //get animal
            var animal = "01";
            var tempAnimal = 1 + ((khmerYear - 2564) % 12);
            animal = LunarUtils.f(tempAnimal);
          }
        }

        result =
          sak +
          animal +
          khmerYear +
          LunarUtils.f(khmerMonth) +
          kertRoch +
          LunarUtils.f(kertRochDay) +
          sel;
        listKhmerDate[
          solar_year + "-" + LunarUtils.f(i + 1) + "-" + LunarUtils.f(j + 1)
        ] = result;
      }
    }
    this.KhmerLunarCodeForYears[solar_year] = listKhmerDate;
    // console.log('khmer date for year'+solar_year);
    // console.log(this.KhmerLunarCodeForYears[solar_year]);
    // console.log('end');
    return listKhmerDate;
  }

  static isSel(lunarCode) {
    if (lunarCode == null) return false;
    //console.log('$lunarCode - length ${lunarCode.length}');
    if (lunarCode.length == 14) {
      return true;
    } else {
      return false;
    }
  }

  static getYearChong(calendar) {
    //datetime
    var YearChhongA;
    var YearChhongB;

    YearChhongA = (
      ((calendar.millisecondsSinceEpoch / 1000 / 3600 / 24) % 12) +
      105
    ).ceil();
    if (YearChhongA >= 112) {
      YearChhongA -= 12;
    }
    YearChhongB = YearChhongA + 6;
    if (YearChhongB >= 112) {
      YearChhongB -= 12;
    }

    return YearChhongA + "-" + YearChhongB;
  }

  static removeFirstZero(input) {
    return input.substring(0, 1) == "0"
      ? input.substring(1, input.length)
      : input;
  }
}

class YearChhong {
  CHHLOV = 101;
  CHOR = 110;
  CHUT = 100;
  KHAL = 102;
  KOL = 111;
  MASANH = 105;
  MOME = 107;
  MOMI = 106;
  ROKA = 109;
  ROUNG = 104;
  THOS = 103;
  VOK = 108;
}

class SpecialDay {
  static hashSpecialDay;
  static hashSpecialDayLunar;
  enDescription;
  khDescription;

  static initialize() {
    if (hashSpecialDay == null) {
      hashSpecialDay = new Map();
      hashSpecialDay["0131"] = SpecialDay("", "ទិវាជាតិសុខភាពមាត់ធ្មេញ");
      hashSpecialDay["0214"] = SpecialDay(
        "Valentine's Day",
        "ទិវានៃក្ដីស្រឡាញ់"
      );
      hashSpecialDay["0221"] = SpecialDay("", "ទិវាសុខភាពជាតិមាតានិងទារក");
      hashSpecialDay["0224"] = SpecialDay("", "ទិវាសកម្មភាពកំចាត់មីន");
      hashSpecialDay["0303"] = SpecialDay("", "ទិវាវប្បធម៌");
      hashSpecialDay["0304"] = SpecialDay("", "ទិវានយោបាយទឹក");
      hashSpecialDay["0306"] = SpecialDay(
        "",
        "គោរពវិញ្ញាណក្ខ័ន្ធសម្ដេចព្រះសុរាម្រឹត (ព្រះមហាបញ្ចនកោដ្ឋ)"
      );
      hashSpecialDay["0322"] = SpecialDay("", "ទិវាពិភពលោកទឹកនិងឧតុនិយម");
      hashSpecialDay["0324"] = SpecialDay("", "ទិវាកំចាត់ជំងឺរបេង");
      hashSpecialDay["0407"] = SpecialDay("", "ទិវាសុខភាពពិភពលោក");
      hashSpecialDay["0430"] = SpecialDay(
        "",
        "ចូលសមាជិកសមាគមប្រជាជាតិអាស៊ីអាគ្នេយ៍ (1999)"
      );
      hashSpecialDay["0503"] = SpecialDay("", "ទិវាសេរីភាពសារព័ត៌មានពិភពលោក");
      hashSpecialDay["0508"] = SpecialDay("", "ទិវាកាកបាទក្រហមកម្ពុជា");
      hashSpecialDay["0513"] = SpecialDay("", "ទិវាដឹងគុណម្ដាយ");
      hashSpecialDay["0516"] = SpecialDay("", "កំណើតនគរបាលជាតិ");
      hashSpecialDay["0531"] = SpecialDay("", "ទិវាពិភពលោកគ្មានថ្នាំជក់");
      hashSpecialDay["0605"] = SpecialDay("", "ទិវាបរិស្ថានជាតិនិងអន្តរជាតិ");
      hashSpecialDay["0612"] = SpecialDay(
        "",
        "ទិវាពិភពលោកប្រឆាំងនឹងពលកម្មកុមារ"
      );
      hashSpecialDay["0615"] = SpecialDay(
        "",
        "ក្រុងឡាអេប្រគល់ប្រាសាទព្រះវិហារមកកម្ពុជាវិញ"
      );
      hashSpecialDay["0617"] = SpecialDay("", "ទិវាដឹងគុណឪពុក");
      hashSpecialDay["0626"] = SpecialDay("", "ទិវាប្រឆាំងគ្រឿងញៀន");
      hashSpecialDay["0701"] = SpecialDay("", "ទិវាមច្ឆាជាតិ");
      hashSpecialDay["0707"] = SpecialDay(
        "",
        "ប្រាសាទព្រះវិហារចូលជាបេតិកភ័ណ្ឌពិភពលោក (2008)"
      );
      hashSpecialDay["0708"] = SpecialDay(
        "",
        "ប្រាសាទសំបូរព្រៃគុហ៍ចូលជាបេតិកភ័ណ្ឌពិភពលោក"
      );
      hashSpecialDay["0709"] = SpecialDay("", "រុក្ខទិវា(ទិវាដាំកូនឈើ)");
      hashSpecialDay["0812"] = SpecialDay("", "ទិវាយុវជនអន្តរជាតិ");
      hashSpecialDay["0908"] = SpecialDay("", "ទិវាអក្ខរកម្មជាតិ");
      hashSpecialDay["0909"] = SpecialDay("", "ទិវាពិភពលោកគ្មានផ្សែង");
      hashSpecialDay["0916"] = SpecialDay("", "ទិវាអូហ្សូនបរិស្ថានអន្តរជាតិ");
      hashSpecialDay["0921"] = SpecialDay("", "ទិវាសន្តិភាពអន្តរជាតិ");
      hashSpecialDay["0927"] = SpecialDay("", "ទិវាទេសចរណ៍");
      hashSpecialDay["1001"] = SpecialDay("", "ទិវាមនុស្សចាស់");
      hashSpecialDay["1005"] = SpecialDay("", "ទិវាគ្រូបង្រៀន");
      hashSpecialDay["1107"] = SpecialDay(
        "",
        "របាំក្បាច់បូរាណខ្មែរចូលជាសម្បត្តិមនុស្សជាតិ"
      );
      hashSpecialDay["1125"] = SpecialDay(
        "",
        "ល្ខោនស្រមោលស្បែកធំចូលជាសម្បត្តិបេតិកភ័ណ្ឌវប្បធម៌"
      );
      hashSpecialDay["1201"] = SpecialDay("", "ទិវាប្រឆាំងជម្ងឺអេដស៏");
      hashSpecialDay["1203"] = SpecialDay("", "ទិវាជនពិការពិភពលោក");
      hashSpecialDay["1214"] = SpecialDay(
        "",
        "កម្ពុជាចូលជាសមាជិក អ.ស.ប\nក្រុមប្រាសាទអង្គរចូលជាសម្បត្តិបេតិកភ័ណ្ឌពិភពលោក"
      );
      hashSpecialDay["1225"] = SpecialDay("", "បុណ្យណូអែល");
    }
    if (hashSpecialDayLunar == null) {
      hashSpecialDayLunar = new Map();
      hashSpecialDayLunar["08R01"] = SpecialDay("", "ចូលព្រះវស្សា");
      hashSpecialDayLunar["10R01"] = SpecialDay("", "ចូលព្រះវស្សា");
      hashSpecialDayLunar["13K15S"] = SpecialDay("", "ចេញព្រះវស្សា");
      hashSpecialDayLunar["13R01"] = SpecialDay("", "ផ្ដើមកឋិនកាល");
      hashSpecialDayLunar["12R15S"] = SpecialDay(
        "Pchum Ben Festival",
        "ពិធីបុណ្យភ្ជុំបិណ្ឌ"
      );
      hashSpecialDayLunar["13K01"] = SpecialDay(
        "Pchum Ben Festival",
        "ពិធីបុណ្យភ្ជុំបិណ្ឌ"
      );
    }
  }

  constructor(str, str2) {
    this.enDescription = str;
    this.khDescription = str2;
  }

  getEnDescription() {
    return this.enDescription;
  }

  setEnDescription(str) {
    this.enDescription = str;
  }

  getKhDescription() {
    return this.khDescription;
  }

  setKhDescription(str) {
    this.khDescription = str;
  }

  static getSpecialDayInfo(calendar) {
    initialize();
    if (calendar.getFullYear() < 2018) {
      return null;
    }

    var month = calendar.getMonth();
    var day = calendar.getDate();
    return hashSpecialDay["$month$day"];
  }

  static getSpecialDayInfoLunar(calendar, str) {
    initialize();
    if (calendar.getFullYear() < 2018) {
      return null;
    }
    return hashSpecialDay[str.substring(8, str.length)];
  }
}


// export async function today_solar() {
//   return Word.run(async (context) => {
//     /**
//      * Insert your Word code here
//      */
//
//      var today = document.getElementById('inputDate').value;
//     var selectedDate = new Date(today.split("/")[2],(parseInt(today.split("/")[1])-1),today.split("/")[0] );
//
//      var solarText = new LunarText().getKhmerFullSolarString(selectedDate);
//      const paragraph = context.document.body.insertParagraph(solarText, Word.InsertLocation.end);
//
//      paragraph.font.set({
//        bold: false,
//        italic: false,
//        name: "Khmer OS Siemreap",
//        color: "black",
//        size: 12
//      });
//
//
//     await context.sync();
//   });
// }
//
// export async function today_lunar() {
//   return Word.run(async (context) => {
//     /**
//      * Insert your Word code here
//      */
//     var today = document.getElementById('inputDate').value;
//     var selectedDate = new Date(today.split("/")[2],(parseInt(today.split("/")[1])-1),today.split("/")[0] );
//
//      var calendarController = new CalendarController(selectedDate);
//
//      var fullLunarString = new LunarText().getKhmerLunarString(selectedDate);
//
//      const paragraph = context.document.body.insertParagraph(fullLunarString, Word.InsertLocation.end);
//
//      paragraph.font.set({
//        bold: false,
//        italic: false,
//        name: "Khmer OS Siemreap",
//        color: "black",
//        size: 12
//      });
//
//
//
//     await context.sync();
//   });
// }
