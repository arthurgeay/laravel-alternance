# Endpoints


## api/company/all




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/company/all?api_token=AONnaBz1bVMF0POOV4ySxZ123pKDfWq8cbzXWhremIuj6VP9qpbbp8zGGUKz" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/company/all"
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

    "companies": [
        {
            "id": 2,
            "name": "Bouygues Telecom",
            "area_activity": "Télécommunications",
            "address": "Paris",
            "email": "rh@bouygues.com",
            "phone": "0142586952",
            "img": "https://www.edcom.fr/actu/images/bouyguestelecom-logo.jpg",
            "contacts": [
                {
                    "id": 2,
                    "fullname": "Dupont Francis",
                    "jobname": "Directeur général",
                    "phone": "0658214530",
                    "mail": "dupont.francis@bouygues.com",
                    "company_id": 2
                },
                {
                    "id": 16,
                    "fullname": "Martin Manon",
                    "jobname": "Secrétaire",
                    "phone": "0762813024",
                    "mail": "martin.manon@bouygues.com",
                    "company_id": 2
                }
            ]
        },
        {
            "id": 3,
            "name": "Free",
            "area_activity": "Télécommunications",
            "address": "Bordeaux",
            "email": "contact@free.com",
            "phone": "0415849577",
            "img": "https://www.peimg.fr/annonceurs/images/417355kL9p4FsNbu_fb.gif",
            "contacts": [
                {
                    "id": 3,
                    "fullname": "Aivyan Cindy",
                    "jobname": "Directrice adjointe",
                    "phone": "0702014635",
                    "mail": "aivyan.cindy@free.fr",
                    "company_id": 3
                },
                {
                    "id": 17,
                    "fullname": "Petit Catherine",
                    "jobname": "Secrétaire",
                    "phone": "0652349820",
                    "mail": "petit.catherine@free.fr",
                    "company_id": 3
                }
            ]
        }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/company/all`**



## api/company/{id}




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/company/2?api_token=AONnaBz1bVMF0POOV4ySxZ123pKDfWq8cbzXWhremIuj6VP9qpbbp8zGGUKz" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/company/1"
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
    "company": {
        "id": 2,
        "name": "Bouygues Telecom",
        "area_activity": "Télécommunications",
        "address": "Paris",
        "email": "rh@bouygues.com",
        "phone": "0142586952",
        "img": "https://www.edcom.fr/actu/images/bouyguestelecom-logo.jpg",
        "contacts": [
            {
                "id": 2,
                "fullname": "Dupont Francis",
                "jobname": "Directeur général",
                "phone": "0658214530",
                "mail": "dupont.francis@bouygues.com",
                "company_id": 2
            },
            {
                "id": 16,
                "fullname": "Martin Manon",
                "jobname": "Secrétaire",
                "phone": "0762813024",
                "mail": "martin.manon@bouygues.com",
                "company_id": 2
            }
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/company/{id}`**



## api/user/{id}




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user/1?api_token=AONnaBz1bVMF0POOV4ySxZ123pKDfWq8cbzXWhremIuj6VP9qpbbp8zGGUKz" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user/1"
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
    "user": {
        "id": 1,
        "name": "Arthur",
        "email": "arthur.geay@ynov.com",
        "email_verified_at": null,
        "created_at": "2020-04-29T07:57:20.000000Z",
        "updated_at": "2020-04-29T07:57:20.000000Z",
        "alcohol": 1,
        "applications": [
            {
                "id": 206,
                "created_at": "2020-05-07T12:26:56.000000Z",
                "updated_at": "2020-05-07T12:26:56.000000Z",
                "description": "eeee",
                "contact_type": "tel",
                "state": "in-progress",
                "company_id": 4,
                "contact_id": 4,
                "user_id": 1
            },
            {
                "id": 208,
                "created_at": "2020-05-20T14:11:08.000000Z",
                "updated_at": "2020-05-20T14:11:08.000000Z",
                "description": "eeeee",
                "contact_type": "tel",
                "state": "to-do",
                "company_id": 5,
                "contact_id": 5,
                "user_id": 1
            }
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/user/{id}`**
