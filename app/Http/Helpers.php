<?php

use Illuminate\Support\Str;

// the request shurthund of admin resource
if (!function_exists('adminUrl')) {
    function adminUrl($url = null)
    {
        if (env('APP_ENV') == "production") {
            return secure_url('/admin/' . $url);
        } else {
            return url('/admin/' . $url);
        }
    }
}

// the request shurthund of user resource
if (!function_exists('userUrl')) {
    function userUrl($url = null)
    {
        if (env('APP_ENV') == "production") {
            return secure_url('/user/' . $url);
        } else {
            return url('/user/' . $url);
        }
    }
}

// redirect with flash msg
if (!function_exists('redirect_with_flash')) {
    function redirect_with_flash($alerType, $msg, $redirectTo, $admin = "")
    {
        request()->session()->flash($alerType, $msg);
        $url = $admin == "" ? adminUrl($redirectTo) : userUrl($redirectTo);
        return redirect($url);
    }
}

// Question Type
if (!function_exists('question_type')) {
    function question_type()
    {
        return [
            'single_line' => "Single Line",
            'multi_line' => "Multi Line"
        ];
    }
}

// Question Is Required
if (!function_exists('question_is_required')) {
    function question_is_required()
    {
        return [
            'required' => "Required",
            'optional' => "Optional"
        ];
    }
}

// Prompt type
if (!function_exists('prompt_type_list')) {
    function prompt_type_list()
    {
        return [
            'text' => "Text",
            'image' => "Image"
        ];
    }
}

// plan type list
if (!function_exists('plans_type')) {
    function plans_type()
    {
        return [
            'free' => "Free",
            'paid' => "Paid"
        ];
    }
}

// paypal env list list
if (!function_exists('paypal_env_list')) {
    function paypal_env_list()
    {
        return [
            'sandbox' => "Sandox",
            'production' => "Production"
        ];
    }
}

// ----------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------

// active sidebar link
if (!function_exists('activeSideLink')) {
    function activeSideLink($path)
    {
        return request()->segment(2) == $path ? "active" : "";
    }
}

if (!function_exists('setActive')) {
    function setActive($path, $active = 'text-primary')
    {
        $currentUrl = request()->server("REQUEST_URI");

        $contains = Str::contains($currentUrl, $path);
        return $contains ? $active : "";
    }
}

if (!function_exists('setActiveFront')) {
    function setActiveFront($path, $active = 'text-primary')
    {
        $currentUrl = request()->server("REQUEST_URI");
        $contains = strcmp($currentUrl, $path);

        return !$contains ? $active : "";
    }
}

if (!function_exists("active_menu")) {
    function active_menu($link)
    {
        if (preg_match("/" . $link . "/i", request()->segment(2))) {
            return ["menu-open", "active"];
        } else {
            return ["", ""];
        }
    }
}
//this function for active dashboard link in the navigation bar its a link not has a item
if (!function_exists("active_dashboard_item")) {
    function active_dashboard_item($link)
    {
        if (request()->segment(2) == null and $link == "dashboard") {
            return "active";
        }
    }
}


// world currencies list
if (!function_exists('currency_list')) {
    function currency_list()
    {
        return [
            "AED" => "United Arab Emirates dirham",
            "AFN" => "Afghan afghani",
            "ALL" => "Albanian lek",
            "AMD" => "Armenian dram",
            "ANG" => "Netherlands Antillean guilder",
            "AOA" => "Angolan kwanza",
            "ARS" => "Argentine peso",
            "AUD" => "Australian dollar",
            "AWG" => "Aruban florin",
            "AZN" => "Azerbaijani manat",
            "BAM" => "Bosnia and Herzegovina convertible mark",
            "BBD" => "Barbados dollar",
            "BDT" => "Bangladeshi taka",
            "BGN" => "Bulgarian lev",
            "BHD" => "Bahraini dinar",
            "BIF" => "Burundian franc",
            "BMD" => "Bermudian dollar",
            "BND" => "Brunei dollar",
            "BOB" => "Boliviano",
            "BRL" => "Brazilian real",
            "BSD" => "Bahamian dollar",
            "BTN" => "Bhutanese ngultrum",
            "BWP" => "Botswana pula",
            "BYN" => "New Belarusian ruble",
            "BYR" => "Belarusian ruble",
            "BZD" => "Belize dollar",
            "CAD" => "Canadian dollar",
            "CDF" => "Congolese franc",
            "CHF" => "Swiss franc",
            "CLF" => "Unidad de Fomento",
            "CLP" => "Chilean peso",
            "CNY" => "Renminbi|Chinese yuan",
            "COP" => "Colombian peso",
            "CRC" => "Costa Rican colon",
            "CUC" => "Cuban convertible peso",
            "CUP" => "Cuban peso",
            "CVE" => "Cape Verde escudo",
            "CZK" => "Czech koruna",
            "DJF" => "Djiboutian franc",
            "DKK" => "Danish krone",
            "DOP" => "Dominican peso",
            "DZD" => "Algerian dinar",
            "EGP" => "Egyptian pound",
            "ERN" => "Eritrean nakfa",
            "ETB" => "Ethiopian birr",
            "EUR" => "Euro",
            "FJD" => "Fiji dollar",
            "FKP" => "Falkland Islands pound",
            "GBP" => "Pound sterling",
            "GEL" => "Georgian lari",
            "GHS" => "Ghanaian cedi",
            "GIP" => "Gibraltar pound",
            "GMD" => "Gambian dalasi",
            "GNF" => "Guinean franc",
            "GTQ" => "Guatemalan quetzal",
            "GYD" => "Guyanese dollar",
            "HKD" => "Hong Kong dollar",
            "HNL" => "Honduran lempira",
            "HRK" => "Croatian kuna",
            "HTG" => "Haitian gourde",
            "HUF" => "Hungarian forint",
            "IDR" => "Indonesian rupiah",
            "ILS" => "Israeli new shekel",
            "INR" => "Indian rupee",
            "IQD" => "Iraqi dinar",
            "IRR" => "Iranian rial",
            "ISK" => "Icelandic króna",
            "JMD" => "Jamaican dollar",
            "JOD" => "Jordanian dinar",
            "JPY" => "Japanese yen",
            "KES" => "Kenyan shilling",
            "KGS" => "Kyrgyzstani som",
            "KHR" => "Cambodian riel",
            "KMF" => "Comoro franc",
            "KPW" => "North Korean won",
            "KRW" => "South Korean won",
            "KWD" => "Kuwaiti dinar",
            "KYD" => "Cayman Islands dollar",
            "KZT" => "Kazakhstani tenge",
            "LAK" => "Lao kip",
            "LBP" => "Lebanese pound",
            "LKR" => "Sri Lankan rupee",
            "LRD" => "Liberian dollar",
            "LSL" => "Lesotho loti",
            "LYD" => "Libyan dinar",
            "MAD" => "Moroccan dirham",
            "MDL" => "Moldovan leu",
            "MGA" => "Malagasy ariary",
            "MKD" => "Macedonian denar",
            "MMK" => "Myanmar kyat",
            "MNT" => "Mongolian tögrög",
            "MOP" => "Macanese pataca",
            "MRO" => "Mauritanian ouguiya",
            "MUR" => "Mauritian rupee",
            "MVR" => "Maldivian rufiyaa",
            "MWK" => "Malawian kwacha",
            "MXN" => "Mexican peso",
            "MXV" => "Mexican Unidad de Inversion",
            "MYR" => "Malaysian ringgit",
            "MZN" => "Mozambican metical",
            "NAD" => "Namibian dollar",
            "NGN" => "Nigerian naira",
            "NIO" => "Nicaraguan córdoba",
            "NOK" => "Norwegian krone",
            "NPR" => "Nepalese rupee",
            "NZD" => "New Zealand dollar",
            "OMR" => "Omani rial",
            "PAB" => "Panamanian balboa",
            "PEN" => "Peruvian Sol",
            "PGK" => "Papua New Guinean kina",
            "PHP" => "Philippine peso",
            "PKR" => "Pakistani rupee",
            "PLN" => "Polish złoty",
            "PYG" => "Paraguayan guaraní",
            "QAR" => "Qatari riyal",
            "RON" => "Romanian leu",
            "RSD" => "Serbian dinar",
            "RUB" => "Russian ruble",
            "RWF" => "Rwandan franc",
            "SAR" => "Saudi riyal",
            "SBD" => "Solomon Islands dollar",
            "SCR" => "Seychelles rupee",
            "SDG" => "Sudanese pound",
            "SEK" => "Swedish krona",
            "SGD" => "Singapore dollar",
            "SHP" => "Saint Helena pound",
            "SLL" => "Sierra Leonean leone",
            "SOS" => "Somali shilling",
            "SRD" => "Surinamese dollar",
            "SSP" => "South Sudanese pound",
            "STD" => "São Tomé and Príncipe dobra",
            "SVC" => "Salvadoran colón",
            "SYP" => "Syrian pound",
            "SZL" => "Swazi lilangeni",
            "THB" => "Thai baht",
            "TJS" => "Tajikistani somoni",
            "TMT" => "Turkmenistani manat",
            "TND" => "Tunisian dinar",
            "TOP" => "Tongan paʻanga",
            "TRY" => "Turkish lira",
            "TTD" => "Trinidad and Tobago dollar",
            "TWD" => "New Taiwan dollar",
            "TZS" => "Tanzanian shilling",
            "UAH" => "Ukrainian hryvnia",
            "UGX" => "Ugandan shilling",
            "USD" => "United States dollar",
            "UYI" => "Uruguay Peso en Unidades Indexadas",
            "UYU" => "Uruguayan peso",
            "UZS" => "Uzbekistan som",
            "VEF" => "Venezuelan bolívar",
            "VND" => "Vietnamese đồng",
            "VUV" => "Vanuatu vatu",
            "WST" => "Samoan tala",
            "XAF" => "Central African CFA franc",
            "XCD" => "East Caribbean dollar",
            "XOF" => "West African CFA franc",
            "XPF" => "CFP franc",
            "YER" => "Yemeni rial",
            "ZAR" => "South African rand",
            "ZMW" => "Zambian kwacha",
            "ZWL" => "Zimbabwean dollar"
        ];
    }
}

// stripe belling method
if (!function_exists('plans_belling_interval')) {
    function plans_belling_interval()
    {
        return [
            "week" => 'Weekly',
            "month" => 'Monthly',
            "year" => "Yearly"
        ];
    }
}
