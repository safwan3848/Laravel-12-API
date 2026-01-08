**CREATE USER & TOKEN** 

Method: **POST**

REQUEST: http://127.0.0.1:8000/api/v1/register/

BODY:
{

    {
      "name" : "admin",
      "email" : "admin@gmail.com",
      "password" : "admin@123"
    }

}

RESPONSE:

**TOKEN CREATED** 

---------------------------------------

**LOGIN USER & GET TOKEN**

METHOD: **POST**

REQUEST: http://127.0.0.1:8000/api/v1/login

BODY:
{

    {
        "email" : "admin@gmail.com",
        "password" : "admin@123"
    }

}

RESPONSE:
**TOKEN GET**

---------------------------------------

**REVOKE TOKEN BASED ON ID & EMAIL**

METHOD: **POST**

REQUEST: http://127.0.0.1:8000/api/v1/revoke-token

token_id : get from **personal_access_tokens** Table

BODY: 
{

    {
        "email" : "admin@gmail.com",
        "token_id" : "2"
    }

}

---------------------------------------

_**BOOKING API**_

---------------------------------------

**1. Get All Booking Data** 

Method: **GET**

REQUEST: http://127.0.0.1:8000/api/v1/bookings/

RESPONSE: 
{
    
    "data": {
            "title": "First Booking",
            "date": "2025-12-10",
            "status": "Active"
        },
        {
            "title": "Hello World",
            "date": "2024-11-10",
            "status": "Active"
        }
    ]
}

---------------------------------------

**2. Save Booking API**

Method: **POST**

REQUEST: http://127.0.0.1:8000/api/v1/bookings/

BODY:
{

    "title": "Hello World",
    "date": "2024-11-10",
    "status": "Active"

}

RESPONSE:
{
 
    "data": {
        "title": "Hello World",
        "date": "2028-11-10",
        "status": "Active"
    }

}

---------------------------------------

**3. Get ID wise Booking Data**

Method: **GET**

REQUEST: http://127.0.0.1:8000/api/v1/bookings/5

RESPONSE: 
{
   
    "data": {
        "title": "Hello World",
        "date": "2024-11-10",
        "status": "Active"
    }

}

---------------------------------------

**4. Update ID wise Booking Data**

Method: **PUT**

REQUEST: http://127.0.0.1:8000/api/v1/bookings/4

BODY: 
{

    "title" : "update dn",
    "date" : "2028-11-11",
    "status" : "pending"

}

RESPONSE: 
{

    "data": {
        "title": "update dn",
        "date": "2028-11-11",
        "status": "pending"
    }

}

---------------------------------------
**5. Delete Booking using ID**

Method: **Delete**

REQUEST: http://127.0.0.1:8000/api/v1/bookings/5

RESPONSE: 
{
 
    "status": "success",
    "message": "Booking Deleted Successfully"

}
