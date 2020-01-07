---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#User Management


<!-- START_b19e2ecbb41b5fa6802edaf581aab5f6 -->
## Returns the information of the logged in user

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/me"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Unauthenticated.",
    "status": 500
}
```

### HTTP Request
`GET api/me`


<!-- END_b19e2ecbb41b5fa6802edaf581aab5f6 -->

<!-- START_d131f717df7db546af1657d1e7ce10f6 -->
## Update the current logged in user

> Example request:

```bash
curl -X POST \
    "http://localhost/api/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/me"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/me`


<!-- END_d131f717df7db546af1657d1e7ce10f6 -->

<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Unauthenticated.",
    "status": 500
}
```

### HTTP Request
`GET api/users`


<!-- END_fc1e4f6a697e3c48257de845299b71d5 -->

<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/users`


<!-- END_12e37982cc5398c7100e59625ebb5514 -->

<!-- START_8653614346cb0e3d444d164579a0a0a2 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Unauthenticated.",
    "status": 500
}
```

### HTTP Request
`GET api/users/{user}`


<!-- END_8653614346cb0e3d444d164579a0a0a2 -->

<!-- START_48a3115be98493a3c866eb0e23347262 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/users/{user}`

`PATCH api/users/{user}`


<!-- END_48a3115be98493a3c866eb0e23347262 -->

<!-- START_d2db7a9fe3abd141d5adbc367a88e969 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/users/{user}`


<!-- END_d2db7a9fe3abd141d5adbc367a88e969 -->

#general


<!-- START_316a4c3b4f6a4c4ff34e5893943cdebd -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/countries" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/countries"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": "AFG",
            "name": "Afghanistan",
            "cca2": "AF",
            "cca3": "AFG"
        },
        {
            "id": "WSB",
            "name": "Akrotiri",
            "cca2": "WSB",
            "cca3": "WSB"
        },
        {
            "id": "ALB",
            "name": "Albania",
            "cca2": "AL",
            "cca3": "ALB"
        },
        {
            "id": "DZA",
            "name": "Algeria",
            "cca2": "DZ",
            "cca3": "DZA"
        },
        {
            "id": "ASM",
            "name": "American Samoa",
            "cca2": "AS",
            "cca3": "ASM"
        },
        {
            "id": "AND",
            "name": "Andorra",
            "cca2": "AD",
            "cca3": "AND"
        },
        {
            "id": "AGO",
            "name": "Angola",
            "cca2": "AO",
            "cca3": "AGO"
        },
        {
            "id": "AIA",
            "name": "Anguilla",
            "cca2": "AI",
            "cca3": "AIA"
        },
        {
            "id": "ATA",
            "name": "Antarctica",
            "cca2": "AQ",
            "cca3": "ATA"
        },
        {
            "id": "ATG",
            "name": "Antigua and Barbuda",
            "cca2": "AG",
            "cca3": "ATG"
        },
        {
            "id": "ARG",
            "name": "Argentina",
            "cca2": "AR",
            "cca3": "ARG"
        },
        {
            "id": "ARM",
            "name": "Armenia",
            "cca2": "AM",
            "cca3": "ARM"
        },
        {
            "id": "ABW",
            "name": "Aruba",
            "cca2": "AW",
            "cca3": "ABW"
        },
        {
            "id": "ATC",
            "name": "Ashmore and Cartier Is.",
            "cca2": "ATC",
            "cca3": "ATC"
        },
        {
            "id": "AUS",
            "name": "Australia",
            "cca2": "AU",
            "cca3": "AUS"
        },
        {
            "id": "AUT",
            "name": "Austria",
            "cca2": "AT",
            "cca3": "AUT"
        },
        {
            "id": "AZE",
            "name": "Azerbaijan",
            "cca2": "AZ",
            "cca3": "AZE"
        },
        {
            "id": "BHS",
            "name": "Bahamas",
            "cca2": "BS",
            "cca3": "BHS"
        },
        {
            "id": "BHR",
            "name": "Bahrain",
            "cca2": "BH",
            "cca3": "BHR"
        },
        {
            "id": "KAB",
            "name": "Baikonur",
            "cca2": "KAB",
            "cca3": "KAB"
        },
        {
            "id": "BJN",
            "name": "Bajo Nuevo Bank",
            "cca2": "BJN",
            "cca3": "BJN"
        },
        {
            "id": "BGD",
            "name": "Bangladesh",
            "cca2": "BD",
            "cca3": "BGD"
        },
        {
            "id": "BRB",
            "name": "Barbados",
            "cca2": "BB",
            "cca3": "BRB"
        },
        {
            "id": "BLR",
            "name": "Belarus",
            "cca2": "BY",
            "cca3": "BLR"
        },
        {
            "id": "BEL",
            "name": "Belgium",
            "cca2": "BE",
            "cca3": "BEL"
        },
        {
            "id": "BLZ",
            "name": "Belize",
            "cca2": "BZ",
            "cca3": "BLZ"
        },
        {
            "id": "BEN",
            "name": "Benin",
            "cca2": "BJ",
            "cca3": "BEN"
        },
        {
            "id": "BMU",
            "name": "Bermuda",
            "cca2": "BM",
            "cca3": "BMU"
        },
        {
            "id": "BTN",
            "name": "Bhutan",
            "cca2": "BT",
            "cca3": "BTN"
        },
        {
            "id": "BOL",
            "name": "Bolivia",
            "cca2": "BO",
            "cca3": "BOL"
        },
        {
            "id": "BIH",
            "name": "Bosnia and Herzegovina",
            "cca2": "BA",
            "cca3": "BIH"
        },
        {
            "id": "BWA",
            "name": "Botswana",
            "cca2": "BW",
            "cca3": "BWA"
        },
        {
            "id": "BVT",
            "name": "Bouvet Island",
            "cca2": "BV",
            "cca3": "BVT"
        },
        {
            "id": "BRA",
            "name": "Brazil",
            "cca2": "BR",
            "cca3": "BRA"
        },
        {
            "id": "IOT",
            "name": "British Indian Ocean Territory",
            "cca2": "IO",
            "cca3": "IOT"
        },
        {
            "id": "VGB",
            "name": "British Virgin Islands",
            "cca2": "VG",
            "cca3": "VGB"
        },
        {
            "id": "BRN",
            "name": "Brunei",
            "cca2": "BN",
            "cca3": "BRN"
        },
        {
            "id": "BGR",
            "name": "Bulgaria",
            "cca2": "BG",
            "cca3": "BGR"
        },
        {
            "id": "BFA",
            "name": "Burkina Faso",
            "cca2": "BF",
            "cca3": "BFA"
        },
        {
            "id": "BDI",
            "name": "Burundi",
            "cca2": "BI",
            "cca3": "BDI"
        },
        {
            "id": "KHM",
            "name": "Cambodia",
            "cca2": "KH",
            "cca3": "KHM"
        },
        {
            "id": "CMR",
            "name": "Cameroon",
            "cca2": "CM",
            "cca3": "CMR"
        },
        {
            "id": "CAN",
            "name": "Canada",
            "cca2": "CA",
            "cca3": "CAN"
        },
        {
            "id": "CPV",
            "name": "Cape Verde",
            "cca2": "CV",
            "cca3": "CPV"
        },
        {
            "id": "BES",
            "name": "Caribbean Netherlands",
            "cca2": "BQ",
            "cca3": "BES"
        },
        {
            "id": "CYM",
            "name": "Cayman Islands",
            "cca2": "KY",
            "cca3": "CYM"
        },
        {
            "id": "CAF",
            "name": "Central African Republic",
            "cca2": "CF",
            "cca3": "CAF"
        },
        {
            "id": "TCD",
            "name": "Chad",
            "cca2": "TD",
            "cca3": "TCD"
        },
        {
            "id": "CHL",
            "name": "Chile",
            "cca2": "CL",
            "cca3": "CHL"
        },
        {
            "id": "CHN",
            "name": "China",
            "cca2": "CN",
            "cca3": "CHN"
        },
        {
            "id": "CXR",
            "name": "Christmas Island",
            "cca2": "CX",
            "cca3": "CXR"
        },
        {
            "id": "CLP",
            "name": "Clipperton I.",
            "cca2": "CLP",
            "cca3": "CLP"
        },
        {
            "id": "CCK",
            "name": "Cocos (Keeling) Islands",
            "cca2": "CC",
            "cca3": "CCK"
        },
        {
            "id": "COL",
            "name": "Colombia",
            "cca2": "CO",
            "cca3": "COL"
        },
        {
            "id": "COM",
            "name": "Comoros",
            "cca2": "KM",
            "cca3": "COM"
        },
        {
            "id": "COK",
            "name": "Cook Islands",
            "cca2": "CK",
            "cca3": "COK"
        },
        {
            "id": "CSI",
            "name": "Coral Sea Is.",
            "cca2": "CSI",
            "cca3": "CSI"
        },
        {
            "id": "CRI",
            "name": "Costa Rica",
            "cca2": "CR",
            "cca3": "CRI"
        },
        {
            "id": "HRV",
            "name": "Croatia",
            "cca2": "HR",
            "cca3": "HRV"
        },
        {
            "id": "CUB",
            "name": "Cuba",
            "cca2": "CU",
            "cca3": "CUB"
        },
        {
            "id": "CUW",
            "name": "Curaçao",
            "cca2": "CW",
            "cca3": "CUW"
        },
        {
            "id": "CYP",
            "name": "Cyprus",
            "cca2": "CY",
            "cca3": "CYP"
        },
        {
            "id": "CNM",
            "name": "Cyprus U.N. Buffer Zone",
            "cca2": "CNM",
            "cca3": "CNM"
        },
        {
            "id": "CZE",
            "name": "Czechia",
            "cca2": "CZ",
            "cca3": "CZE"
        },
        {
            "id": "COD",
            "name": "DR Congo",
            "cca2": "CD",
            "cca3": "COD"
        },
        {
            "id": "DNK",
            "name": "Denmark",
            "cca2": "DK",
            "cca3": "DNK"
        },
        {
            "id": "ESB",
            "name": "Dhekelia",
            "cca2": "ESB",
            "cca3": "ESB"
        },
        {
            "id": "DJI",
            "name": "Djibouti",
            "cca2": "DJ",
            "cca3": "DJI"
        },
        {
            "id": "DMA",
            "name": "Dominica",
            "cca2": "DM",
            "cca3": "DMA"
        },
        {
            "id": "DOM",
            "name": "Dominican Republic",
            "cca2": "DO",
            "cca3": "DOM"
        },
        {
            "id": "ECU",
            "name": "Ecuador",
            "cca2": "EC",
            "cca3": "ECU"
        },
        {
            "id": "EGY",
            "name": "Egypt",
            "cca2": "EG",
            "cca3": "EGY"
        },
        {
            "id": "SLV",
            "name": "El Salvador",
            "cca2": "SV",
            "cca3": "SLV"
        },
        {
            "id": "GNQ",
            "name": "Equatorial Guinea",
            "cca2": "GQ",
            "cca3": "GNQ"
        },
        {
            "id": "ERI",
            "name": "Eritrea",
            "cca2": "ER",
            "cca3": "ERI"
        },
        {
            "id": "EST",
            "name": "Estonia",
            "cca2": "EE",
            "cca3": "EST"
        },
        {
            "id": "SWZ",
            "name": "Eswatini",
            "cca2": "SZ",
            "cca3": "SWZ"
        },
        {
            "id": "ETH",
            "name": "Ethiopia",
            "cca2": "ET",
            "cca3": "ETH"
        },
        {
            "id": "EUR",
            "name": "Europe Union",
            "cca2": "EU",
            "cca3": "EUR"
        },
        {
            "id": "FLK",
            "name": "Falkland Islands",
            "cca2": "FK",
            "cca3": "FLK"
        },
        {
            "id": "FRO",
            "name": "Faroe Islands",
            "cca2": "FO",
            "cca3": "FRO"
        },
        {
            "id": "FJI",
            "name": "Fiji",
            "cca2": "FJ",
            "cca3": "FJI"
        },
        {
            "id": "FIN",
            "name": "Finland",
            "cca2": "FI",
            "cca3": "FIN"
        },
        {
            "id": "FRA",
            "name": "France",
            "cca2": "FR",
            "cca3": "FRA"
        },
        {
            "id": "GUF",
            "name": "French Guiana",
            "cca2": "GF",
            "cca3": "GUF"
        },
        {
            "id": "PYF",
            "name": "French Polynesia",
            "cca2": "PF",
            "cca3": "PYF"
        },
        {
            "id": "ATF",
            "name": "French Southern and Antarctic Lands",
            "cca2": "TF",
            "cca3": "ATF"
        },
        {
            "id": "GAB",
            "name": "Gabon",
            "cca2": "GA",
            "cca3": "GAB"
        },
        {
            "id": "GMB",
            "name": "Gambia",
            "cca2": "GM",
            "cca3": "GMB"
        },
        {
            "id": "GEO",
            "name": "Georgia",
            "cca2": "GE",
            "cca3": "GEO"
        },
        {
            "id": "DEU",
            "name": "Germany",
            "cca2": "DE",
            "cca3": "DEU"
        },
        {
            "id": "GHA",
            "name": "Ghana",
            "cca2": "GH",
            "cca3": "GHA"
        },
        {
            "id": "GIB",
            "name": "Gibraltar",
            "cca2": "GI",
            "cca3": "GIB"
        },
        {
            "id": "GRC",
            "name": "Greece",
            "cca2": "GR",
            "cca3": "GRC"
        },
        {
            "id": "GRL",
            "name": "Greenland",
            "cca2": "GL",
            "cca3": "GRL"
        },
        {
            "id": "GRD",
            "name": "Grenada",
            "cca2": "GD",
            "cca3": "GRD"
        },
        {
            "id": "GLP",
            "name": "Guadeloupe",
            "cca2": "GP",
            "cca3": "GLP"
        },
        {
            "id": "GUM",
            "name": "Guam",
            "cca2": "GU",
            "cca3": "GUM"
        },
        {
            "id": "GTM",
            "name": "Guatemala",
            "cca2": "GT",
            "cca3": "GTM"
        },
        {
            "id": "GGY",
            "name": "Guernsey",
            "cca2": "GG",
            "cca3": "GGY"
        },
        {
            "id": "GIN",
            "name": "Guinea",
            "cca2": "GN",
            "cca3": "GIN"
        },
        {
            "id": "GNB",
            "name": "Guinea-Bissau",
            "cca2": "GW",
            "cca3": "GNB"
        },
        {
            "id": "GUY",
            "name": "Guyana",
            "cca2": "GY",
            "cca3": "GUY"
        },
        {
            "id": "HTI",
            "name": "Haiti",
            "cca2": "HT",
            "cca3": "HTI"
        },
        {
            "id": "HMD",
            "name": "Heard Island and McDonald Islands",
            "cca2": "HM",
            "cca3": "HMD"
        },
        {
            "id": "HND",
            "name": "Honduras",
            "cca2": "HN",
            "cca3": "HND"
        },
        {
            "id": "HKG",
            "name": "Hong Kong",
            "cca2": "HK",
            "cca3": "HKG"
        },
        {
            "id": "HUN",
            "name": "Hungary",
            "cca2": "HU",
            "cca3": "HUN"
        },
        {
            "id": "ISL",
            "name": "Iceland",
            "cca2": "IS",
            "cca3": "ISL"
        },
        {
            "id": "IND",
            "name": "India",
            "cca2": "IN",
            "cca3": "IND"
        },
        {
            "id": "IOA",
            "name": "Indian Ocean Ter.",
            "cca2": "IOA",
            "cca3": "IOA"
        },
        {
            "id": "IDN",
            "name": "Indonesia",
            "cca2": "ID",
            "cca3": "IDN"
        },
        {
            "id": "IRN",
            "name": "Iran",
            "cca2": "IR",
            "cca3": "IRN"
        },
        {
            "id": "IRQ",
            "name": "Iraq",
            "cca2": "IQ",
            "cca3": "IRQ"
        },
        {
            "id": "IRL",
            "name": "Ireland",
            "cca2": "IE",
            "cca3": "IRL"
        },
        {
            "id": "IMN",
            "name": "Isle of Man",
            "cca2": "IM",
            "cca3": "IMN"
        },
        {
            "id": "ISR",
            "name": "Israel",
            "cca2": "IL",
            "cca3": "ISR"
        },
        {
            "id": "ITA",
            "name": "Italy",
            "cca2": "IT",
            "cca3": "ITA"
        },
        {
            "id": "CIV",
            "name": "Ivory Coast",
            "cca2": "CI",
            "cca3": "CIV"
        },
        {
            "id": "JAM",
            "name": "Jamaica",
            "cca2": "JM",
            "cca3": "JAM"
        },
        {
            "id": "JPN",
            "name": "Japan",
            "cca2": "JP",
            "cca3": "JPN"
        },
        {
            "id": "JEY",
            "name": "Jersey",
            "cca2": "JE",
            "cca3": "JEY"
        },
        {
            "id": "JOR",
            "name": "Jordan",
            "cca2": "JO",
            "cca3": "JOR"
        },
        {
            "id": "KAZ",
            "name": "Kazakhstan",
            "cca2": "KZ",
            "cca3": "KAZ"
        },
        {
            "id": "KEN",
            "name": "Kenya",
            "cca2": "KE",
            "cca3": "KEN"
        },
        {
            "id": "KIR",
            "name": "Kiribati",
            "cca2": "KI",
            "cca3": "KIR"
        },
        {
            "id": "UNK",
            "name": "Kosovo",
            "cca2": "XK",
            "cca3": "UNK"
        },
        {
            "id": "KWT",
            "name": "Kuwait",
            "cca2": "KW",
            "cca3": "KWT"
        },
        {
            "id": "KGZ",
            "name": "Kyrgyzstan",
            "cca2": "KG",
            "cca3": "KGZ"
        },
        {
            "id": "LAO",
            "name": "Laos",
            "cca2": "LA",
            "cca3": "LAO"
        },
        {
            "id": "LVA",
            "name": "Latvia",
            "cca2": "LV",
            "cca3": "LVA"
        },
        {
            "id": "LBN",
            "name": "Lebanon",
            "cca2": "LB",
            "cca3": "LBN"
        },
        {
            "id": "LSO",
            "name": "Lesotho",
            "cca2": "LS",
            "cca3": "LSO"
        },
        {
            "id": "LBR",
            "name": "Liberia",
            "cca2": "LR",
            "cca3": "LBR"
        },
        {
            "id": "LBY",
            "name": "Libya",
            "cca2": "LY",
            "cca3": "LBY"
        },
        {
            "id": "LIE",
            "name": "Liechtenstein",
            "cca2": "LI",
            "cca3": "LIE"
        },
        {
            "id": "LTU",
            "name": "Lithuania",
            "cca2": "LT",
            "cca3": "LTU"
        },
        {
            "id": "LUX",
            "name": "Luxembourg",
            "cca2": "LU",
            "cca3": "LUX"
        },
        {
            "id": "MAC",
            "name": "Macau",
            "cca2": "MO",
            "cca3": "MAC"
        },
        {
            "id": "MDG",
            "name": "Madagascar",
            "cca2": "MG",
            "cca3": "MDG"
        },
        {
            "id": "MWI",
            "name": "Malawi",
            "cca2": "MW",
            "cca3": "MWI"
        },
        {
            "id": "MYS",
            "name": "Malaysia",
            "cca2": "MY",
            "cca3": "MYS"
        },
        {
            "id": "MDV",
            "name": "Maldives",
            "cca2": "MV",
            "cca3": "MDV"
        },
        {
            "id": "MLI",
            "name": "Mali",
            "cca2": "ML",
            "cca3": "MLI"
        },
        {
            "id": "MLT",
            "name": "Malta",
            "cca2": "MT",
            "cca3": "MLT"
        },
        {
            "id": "MHL",
            "name": "Marshall Islands",
            "cca2": "MH",
            "cca3": "MHL"
        },
        {
            "id": "MTQ",
            "name": "Martinique",
            "cca2": "MQ",
            "cca3": "MTQ"
        },
        {
            "id": "MRT",
            "name": "Mauritania",
            "cca2": "MR",
            "cca3": "MRT"
        },
        {
            "id": "MUS",
            "name": "Mauritius",
            "cca2": "MU",
            "cca3": "MUS"
        },
        {
            "id": "MYT",
            "name": "Mayotte",
            "cca2": "YT",
            "cca3": "MYT"
        },
        {
            "id": "MEX",
            "name": "Mexico",
            "cca2": "MX",
            "cca3": "MEX"
        },
        {
            "id": "FSM",
            "name": "Micronesia",
            "cca2": "FM",
            "cca3": "FSM"
        },
        {
            "id": "MDA",
            "name": "Moldova",
            "cca2": "MD",
            "cca3": "MDA"
        },
        {
            "id": "MCO",
            "name": "Monaco",
            "cca2": "MC",
            "cca3": "MCO"
        },
        {
            "id": "MNG",
            "name": "Mongolia",
            "cca2": "MN",
            "cca3": "MNG"
        },
        {
            "id": "MNE",
            "name": "Montenegro",
            "cca2": "ME",
            "cca3": "MNE"
        },
        {
            "id": "MSR",
            "name": "Montserrat",
            "cca2": "MS",
            "cca3": "MSR"
        },
        {
            "id": "MAR",
            "name": "Morocco",
            "cca2": "MA",
            "cca3": "MAR"
        },
        {
            "id": "MOZ",
            "name": "Mozambique",
            "cca2": "MZ",
            "cca3": "MOZ"
        },
        {
            "id": "MMR",
            "name": "Myanmar",
            "cca2": "MM",
            "cca3": "MMR"
        },
        {
            "id": "CYN",
            "name": "N. Cyprus",
            "cca2": "CYN",
            "cca3": "CYN"
        },
        {
            "id": "NAM",
            "name": "Namibia",
            "cca2": "NA",
            "cca3": "NAM"
        },
        {
            "id": "NRU",
            "name": "Nauru",
            "cca2": "NR",
            "cca3": "NRU"
        },
        {
            "id": "NPL",
            "name": "Nepal",
            "cca2": "NP",
            "cca3": "NPL"
        },
        {
            "id": "NLD",
            "name": "Netherlands",
            "cca2": "NL",
            "cca3": "NLD"
        },
        {
            "id": "NCL",
            "name": "New Caledonia",
            "cca2": "NC",
            "cca3": "NCL"
        },
        {
            "id": "NZL",
            "name": "New Zealand",
            "cca2": "NZ",
            "cca3": "NZL"
        },
        {
            "id": "NIC",
            "name": "Nicaragua",
            "cca2": "NI",
            "cca3": "NIC"
        },
        {
            "id": "NER",
            "name": "Niger",
            "cca2": "NE",
            "cca3": "NER"
        },
        {
            "id": "NGA",
            "name": "Nigeria",
            "cca2": "NG",
            "cca3": "NGA"
        },
        {
            "id": "NIU",
            "name": "Niue",
            "cca2": "NU",
            "cca3": "NIU"
        },
        {
            "id": "NFK",
            "name": "Norfolk Island",
            "cca2": "NF",
            "cca3": "NFK"
        },
        {
            "id": "PRK",
            "name": "North Korea",
            "cca2": "KP",
            "cca3": "PRK"
        },
        {
            "id": "MKD",
            "name": "North Macedonia",
            "cca2": "MK",
            "cca3": "MKD"
        },
        {
            "id": "MNP",
            "name": "Northern Mariana Islands",
            "cca2": "MP",
            "cca3": "MNP"
        },
        {
            "id": "NOR",
            "name": "Norway",
            "cca2": "NO",
            "cca3": "NOR"
        },
        {
            "id": "OMN",
            "name": "Oman",
            "cca2": "OM",
            "cca3": "OMN"
        },
        {
            "id": "PAK",
            "name": "Pakistan",
            "cca2": "PK",
            "cca3": "PAK"
        },
        {
            "id": "PLW",
            "name": "Palau",
            "cca2": "PW",
            "cca3": "PLW"
        },
        {
            "id": "PSE",
            "name": "Palestine",
            "cca2": "PS",
            "cca3": "PSE"
        },
        {
            "id": "PAN",
            "name": "Panama",
            "cca2": "PA",
            "cca3": "PAN"
        },
        {
            "id": "PNG",
            "name": "Papua New Guinea",
            "cca2": "PG",
            "cca3": "PNG"
        },
        {
            "id": "PRY",
            "name": "Paraguay",
            "cca2": "PY",
            "cca3": "PRY"
        },
        {
            "id": "PER",
            "name": "Peru",
            "cca2": "PE",
            "cca3": "PER"
        },
        {
            "id": "PHL",
            "name": "Philippines",
            "cca2": "PH",
            "cca3": "PHL"
        },
        {
            "id": "PCN",
            "name": "Pitcairn Islands",
            "cca2": "PN",
            "cca3": "PCN"
        },
        {
            "id": "POL",
            "name": "Poland",
            "cca2": "PL",
            "cca3": "POL"
        },
        {
            "id": "PRT",
            "name": "Portugal",
            "cca2": "PT",
            "cca3": "PRT"
        },
        {
            "id": "PRI",
            "name": "Puerto Rico",
            "cca2": "PR",
            "cca3": "PRI"
        },
        {
            "id": "QAT",
            "name": "Qatar",
            "cca2": "QA",
            "cca3": "QAT"
        },
        {
            "id": "COG",
            "name": "Republic of the Congo",
            "cca2": "CG",
            "cca3": "COG"
        },
        {
            "id": "ROU",
            "name": "Romania",
            "cca2": "RO",
            "cca3": "ROU"
        },
        {
            "id": "RUS",
            "name": "Russia",
            "cca2": "RU",
            "cca3": "RUS"
        },
        {
            "id": "RWA",
            "name": "Rwanda",
            "cca2": "RW",
            "cca3": "RWA"
        },
        {
            "id": "REU",
            "name": "Réunion",
            "cca2": "RE",
            "cca3": "REU"
        },
        {
            "id": "BLM",
            "name": "Saint Barthélemy",
            "cca2": "BL",
            "cca3": "BLM"
        },
        {
            "id": "SHN",
            "name": "Saint Helena, Ascension and Tristan da Cunha",
            "cca2": "SH",
            "cca3": "SHN"
        },
        {
            "id": "KNA",
            "name": "Saint Kitts and Nevis",
            "cca2": "KN",
            "cca3": "KNA"
        },
        {
            "id": "LCA",
            "name": "Saint Lucia",
            "cca2": "LC",
            "cca3": "LCA"
        },
        {
            "id": "MAF",
            "name": "Saint Martin",
            "cca2": "MF",
            "cca3": "MAF"
        },
        {
            "id": "SPM",
            "name": "Saint Pierre and Miquelon",
            "cca2": "PM",
            "cca3": "SPM"
        },
        {
            "id": "VCT",
            "name": "Saint Vincent and the Grenadines",
            "cca2": "VC",
            "cca3": "VCT"
        },
        {
            "id": "WSM",
            "name": "Samoa",
            "cca2": "WS",
            "cca3": "WSM"
        },
        {
            "id": "SMR",
            "name": "San Marino",
            "cca2": "SM",
            "cca3": "SMR"
        },
        {
            "id": "SAU",
            "name": "Saudi Arabia",
            "cca2": "SA",
            "cca3": "SAU"
        },
        {
            "id": "SCR",
            "name": "Scarborough Reef",
            "cca2": "SCR",
            "cca3": "SCR"
        },
        {
            "id": "SEN",
            "name": "Senegal",
            "cca2": "SN",
            "cca3": "SEN"
        },
        {
            "id": "SRB",
            "name": "Serbia",
            "cca2": "RS",
            "cca3": "SRB"
        },
        {
            "id": "SER",
            "name": "Serranilla Bank",
            "cca2": "SER",
            "cca3": "SER"
        },
        {
            "id": "SYC",
            "name": "Seychelles",
            "cca2": "SC",
            "cca3": "SYC"
        },
        {
            "id": "KAS",
            "name": "Siachen Glacier",
            "cca2": "KAS",
            "cca3": "KAS"
        },
        {
            "id": "SLE",
            "name": "Sierra Leone",
            "cca2": "SL",
            "cca3": "SLE"
        },
        {
            "id": "SGP",
            "name": "Singapore",
            "cca2": "SG",
            "cca3": "SGP"
        },
        {
            "id": "SXM",
            "name": "Sint Maarten",
            "cca2": "SX",
            "cca3": "SXM"
        },
        {
            "id": "SVK",
            "name": "Slovakia",
            "cca2": "SK",
            "cca3": "SVK"
        },
        {
            "id": "SVN",
            "name": "Slovenia",
            "cca2": "SI",
            "cca3": "SVN"
        },
        {
            "id": "SLB",
            "name": "Solomon Islands",
            "cca2": "SB",
            "cca3": "SLB"
        },
        {
            "id": "SOM",
            "name": "Somalia",
            "cca2": "SO",
            "cca3": "SOM"
        },
        {
            "id": "SOL",
            "name": "Somaliland",
            "cca2": "SOL",
            "cca3": "SOL"
        },
        {
            "id": "ZAF",
            "name": "South Africa",
            "cca2": "ZA",
            "cca3": "ZAF"
        },
        {
            "id": "SGS",
            "name": "South Georgia",
            "cca2": "GS",
            "cca3": "SGS"
        },
        {
            "id": "KOR",
            "name": "South Korea",
            "cca2": "KR",
            "cca3": "KOR"
        },
        {
            "id": "SSD",
            "name": "South Sudan",
            "cca2": "SS",
            "cca3": "SSD"
        },
        {
            "id": "ESP",
            "name": "Spain",
            "cca2": "ES",
            "cca3": "ESP"
        },
        {
            "id": "PGA",
            "name": "Spratly Is.",
            "cca2": "PGA",
            "cca3": "PGA"
        },
        {
            "id": "LKA",
            "name": "Sri Lanka",
            "cca2": "LK",
            "cca3": "LKA"
        },
        {
            "id": "SDN",
            "name": "Sudan",
            "cca2": "SD",
            "cca3": "SDN"
        },
        {
            "id": "SUR",
            "name": "Suriname",
            "cca2": "SR",
            "cca3": "SUR"
        },
        {
            "id": "SJM",
            "name": "Svalbard and Jan Mayen",
            "cca2": "SJ",
            "cca3": "SJM"
        },
        {
            "id": "SWE",
            "name": "Sweden",
            "cca2": "SE",
            "cca3": "SWE"
        },
        {
            "id": "CHE",
            "name": "Switzerland",
            "cca2": "CH",
            "cca3": "CHE"
        },
        {
            "id": "SYR",
            "name": "Syria",
            "cca2": "SY",
            "cca3": "SYR"
        },
        {
            "id": "STP",
            "name": "São Tomé and Príncipe",
            "cca2": "ST",
            "cca3": "STP"
        },
        {
            "id": "TWN",
            "name": "Taiwan",
            "cca2": "TW",
            "cca3": "TWN"
        },
        {
            "id": "TJK",
            "name": "Tajikistan",
            "cca2": "TJ",
            "cca3": "TJK"
        },
        {
            "id": "TZA",
            "name": "Tanzania",
            "cca2": "TZ",
            "cca3": "TZA"
        },
        {
            "id": "THA",
            "name": "Thailand",
            "cca2": "TH",
            "cca3": "THA"
        },
        {
            "id": "TLS",
            "name": "Timor-Leste",
            "cca2": "TL",
            "cca3": "TLS"
        },
        {
            "id": "TGO",
            "name": "Togo",
            "cca2": "TG",
            "cca3": "TGO"
        },
        {
            "id": "TKL",
            "name": "Tokelau",
            "cca2": "TK",
            "cca3": "TKL"
        },
        {
            "id": "TON",
            "name": "Tonga",
            "cca2": "TO",
            "cca3": "TON"
        },
        {
            "id": "TTO",
            "name": "Trinidad and Tobago",
            "cca2": "TT",
            "cca3": "TTO"
        },
        {
            "id": "TUN",
            "name": "Tunisia",
            "cca2": "TN",
            "cca3": "TUN"
        },
        {
            "id": "TUR",
            "name": "Turkey",
            "cca2": "TR",
            "cca3": "TUR"
        },
        {
            "id": "TKM",
            "name": "Turkmenistan",
            "cca2": "TM",
            "cca3": "TKM"
        },
        {
            "id": "TCA",
            "name": "Turks and Caicos Islands",
            "cca2": "TC",
            "cca3": "TCA"
        },
        {
            "id": "TUV",
            "name": "Tuvalu",
            "cca2": "TV",
            "cca3": "TUV"
        },
        {
            "id": "USG",
            "name": "USNB Guantanamo Bay",
            "cca2": "USG",
            "cca3": "USG"
        },
        {
            "id": "UGA",
            "name": "Uganda",
            "cca2": "UG",
            "cca3": "UGA"
        },
        {
            "id": "UKR",
            "name": "Ukraine",
            "cca2": "UA",
            "cca3": "UKR"
        },
        {
            "id": "ARE",
            "name": "United Arab Emirates",
            "cca2": "AE",
            "cca3": "ARE"
        },
        {
            "id": "GBR",
            "name": "United Kingdom",
            "cca2": "GB",
            "cca3": "GBR"
        },
        {
            "id": "USA",
            "name": "United States",
            "cca2": "US",
            "cca3": "USA"
        },
        {
            "id": "UMI",
            "name": "United States Minor Outlying Islands",
            "cca2": "UM",
            "cca3": "UMI"
        },
        {
            "id": "VIR",
            "name": "United States Virgin Islands",
            "cca2": "VI",
            "cca3": "VIR"
        },
        {
            "id": "URY",
            "name": "Uruguay",
            "cca2": "UY",
            "cca3": "URY"
        },
        {
            "id": "UZB",
            "name": "Uzbekistan",
            "cca2": "UZ",
            "cca3": "UZB"
        },
        {
            "id": "VUT",
            "name": "Vanuatu",
            "cca2": "VU",
            "cca3": "VUT"
        },
        {
            "id": "VAT",
            "name": "Vatican City",
            "cca2": "VA",
            "cca3": "VAT"
        },
        {
            "id": "VEN",
            "name": "Venezuela",
            "cca2": "VE",
            "cca3": "VEN"
        },
        {
            "id": "VNM",
            "name": "Vietnam",
            "cca2": "VN",
            "cca3": "VNM"
        },
        {
            "id": "WLF",
            "name": "Wallis and Futuna",
            "cca2": "WF",
            "cca3": "WLF"
        },
        {
            "id": "ESH",
            "name": "Western Sahara",
            "cca2": "EH",
            "cca3": "ESH"
        },
        {
            "id": "YEM",
            "name": "Yemen",
            "cca2": "YE",
            "cca3": "YEM"
        },
        {
            "id": "ZMB",
            "name": "Zambia",
            "cca2": "ZM",
            "cca3": "ZMB"
        },
        {
            "id": "ZWE",
            "name": "Zimbabwe",
            "cca2": "ZW",
            "cca3": "ZWE"
        },
        {
            "id": "ALA",
            "name": "Åland Islands",
            "cca2": "AX",
            "cca3": "ALA"
        }
    ]
}
```

### HTTP Request
`GET api/countries`


<!-- END_316a4c3b4f6a4c4ff34e5893943cdebd -->

<!-- START_56d7be9447e2ce39ac69b09141bf5902 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/cities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/cities"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (400):

```json
{
    "message": "Request has no \"country\" parameter",
    "status": 400
}
```

### HTTP Request
`GET api/cities`


<!-- END_56d7be9447e2ce39ac69b09141bf5902 -->

<!-- START_6470e6b987921f5c45bf7a2d8e674f57 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Unauthenticated.",
    "status": 500
}
```

### HTTP Request
`GET api/roles`


<!-- END_6470e6b987921f5c45bf7a2d8e674f57 -->

<!-- START_90c780acaefab9740431579512d07101 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/roles`


<!-- END_90c780acaefab9740431579512d07101 -->

<!-- START_eb37fe1fa9305b4b78850dd87031670b -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Unauthenticated.",
    "status": 500
}
```

### HTTP Request
`GET api/roles/{role}`


<!-- END_eb37fe1fa9305b4b78850dd87031670b -->

<!-- START_cccebfff0074c9c5f499e215eee84e86 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/roles/{role}`

`PATCH api/roles/{role}`


<!-- END_cccebfff0074c9c5f499e215eee84e86 -->

<!-- START_9aab750214722ffceebef64f24a2e175 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/roles/{role}`


<!-- END_9aab750214722ffceebef64f24a2e175 -->

<!-- START_42db014707f615cd5cafb5ad1b6d0675 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/permissions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/permissions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Unauthenticated.",
    "status": 500
}
```

### HTTP Request
`GET api/permissions`


<!-- END_42db014707f615cd5cafb5ad1b6d0675 -->

<!-- START_d513e82f79d47649a14d2e59fda93073 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/permissions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/permissions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/permissions`


<!-- END_d513e82f79d47649a14d2e59fda93073 -->

<!-- START_29ec1a9c6f20445dcd75bf6a4cc63e2a -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/permissions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/permissions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Unauthenticated.",
    "status": 500
}
```

### HTTP Request
`GET api/permissions/{permission}`


<!-- END_29ec1a9c6f20445dcd75bf6a4cc63e2a -->

<!-- START_cbdd1fce06181b5d5d8d0f3ae85ed0ee -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/permissions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/permissions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/permissions/{permission}`

`PATCH api/permissions/{permission}`


<!-- END_cbdd1fce06181b5d5d8d0f3ae85ed0ee -->

<!-- START_58309983000c47ce901812498144165a -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/permissions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/permissions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/permissions/{permission}`


<!-- END_58309983000c47ce901812498144165a -->

<!-- START_5bb0ba403a8577668cb5e7dfa158a6fe -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/candidates" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/candidates"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Unauthenticated.",
    "status": 500
}
```

### HTTP Request
`GET api/candidates`


<!-- END_5bb0ba403a8577668cb5e7dfa158a6fe -->

<!-- START_1b759188c9f983d6106bf9be66daec02 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/candidates/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/candidates/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Unauthenticated.",
    "status": 500
}
```

### HTTP Request
`GET api/candidates/{candidate}`


<!-- END_1b759188c9f983d6106bf9be66daec02 -->

<!-- START_1af1a947e16afcb5289fad8940c57ec5 -->
## Display a listing of the resource

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Unauthenticated.",
    "status": 500
}
```

### HTTP Request
`GET api/clients`


<!-- END_1af1a947e16afcb5289fad8940c57ec5 -->

<!-- START_dfd23a7e4e59c7e8fd40b41e652b1be8 -->
## Store a newly created resource in storage

> Example request:

```bash
curl -X POST \
    "http://localhost/api/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/clients`


<!-- END_dfd23a7e4e59c7e8fd40b41e652b1be8 -->

<!-- START_9176cc1be6ebc014d0f26db8772c607e -->
## Display the specified resource

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Unauthenticated.",
    "status": 500
}
```

### HTTP Request
`GET api/clients/{client}`


<!-- END_9176cc1be6ebc014d0f26db8772c607e -->

<!-- START_0a9b19cfbd73bcdb15c3a43a30e80601 -->
## Update the specified resourCe in storage

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/clients/{client}`

`PATCH api/clients/{client}`


<!-- END_0a9b19cfbd73bcdb15c3a43a30e80601 -->

<!-- START_79aaca474281833ade0b4315f95ce7c8 -->
## Remove the specified resource from storage

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/clients/{client}`


<!-- END_79aaca474281833ade0b4315f95ce7c8 -->

<!-- START_0a9c7211585945e60a1fdedfbf9e10b7 -->
## Display the specified user resume

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/candidate/resume" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/candidate/resume"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Unauthenticated.",
    "status": 500
}
```

### HTTP Request
`GET api/candidate/resume`


<!-- END_0a9c7211585945e60a1fdedfbf9e10b7 -->

<!-- START_ca7e6dba637e2cfb7bb1e8100d47bff9 -->
## Store the resume of a certain user

> Example request:

```bash
curl -X POST \
    "http://localhost/api/candidate/resume" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/candidate/resume"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/candidate/resume`


<!-- END_ca7e6dba637e2cfb7bb1e8100d47bff9 -->

<!-- START_4d3cf4d7c12fb9ea85f88c5db09e3d5f -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/authenticate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/authenticate"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/auth/authenticate`


<!-- END_4d3cf4d7c12fb9ea85f88c5db09e3d5f -->

<!-- START_53be1e9e10a08458929a2e0ea70ddb86 -->
## Invoke the controller method.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET /`


<!-- END_53be1e9e10a08458929a2e0ea70ddb86 -->

<!-- START_bf162e7b3e01c09d3e7b7bc3663b1700 -->
## Invoke the controller method.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/signin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/signin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET signin`


<!-- END_bf162e7b3e01c09d3e7b7bc3663b1700 -->

<!-- START_bd63a077cddd553fcf91bf252cbaee11 -->
## Invoke the controller method.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/employer/signup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/employer/signup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET employer/signup`


<!-- END_bd63a077cddd553fcf91bf252cbaee11 -->

<!-- START_68a03e55bb9d21ba98174ac16105e306 -->
## Invoke the controller method.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/candidate/signup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/candidate/signup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET candidate/signup`


<!-- END_68a03e55bb9d21ba98174ac16105e306 -->


